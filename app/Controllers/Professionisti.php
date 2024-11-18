<?php

namespace App\Controllers;

use App\Models\Annunci;
use App\Models\Candidature;
use App\Models\Messaggi;
use App\Models\Recensioni;
use CodeIgniter\Controller;
use Config\Services;

class Professionisti extends Controller
{

    public function index($data = array())
    {
        $content = (new Header())->professionista();
        if($content == "login") {
            return redirect()->to(base_url('professionisti/login'));
        }
        $data['annunciAperti'] = (new Annunci())->getListaAnnunciForProfessionista(1, $this->request->getCookie('cod_professionista'));
        $data['annunciChiusi'] = (new Annunci())->getListaAnnunciForProfessionista(3, $this->request->getCookie('cod_professionista'));
        foreach ($data['annunciChiusi'] as $annuncio) {
            $recensioni = new Recensioni();
            $annuncio->recensione = $recensioni->where('annuncio', $annuncio->codice)->first();
            if ($annuncio->recensione) {
                $annuncio->recensione->valutazione = $annuncio->recensione->valutazione;
            }
        }
        $content .= view('professionista/home', $data);
        $content .= view('professionista/footer');

        return $content;
    }

    /**
     * @throws \ReflectionException
     */
    public function confermaCandidatura($codiceCandidatura) {
        $candidature = new Candidature();
        $candidatura = $candidature->find($codiceCandidatura);
        $candidatura->stato = 3;
        $candidature->save($candidatura);
        $annunci = new Annunci();
        $annuncio = $annunci->find($candidatura->annuncio);
        $annuncio->stato = 3;
        $annunci->save($annuncio);
        $data['messaggio'] = "Candidatura completata correttamente";
        return $this->index($data);
    }

    function eliminaCandidatura($codiceCandidatura) {
        $candidatura = (new Candidature())->find($codiceCandidatura);
        $annuncio = (new Annunci())->find($candidatura->annuncio);
        $annuncio->stato = 1;
        (new Annunci())->save($annuncio);
        (new Candidature())->delete($codiceCandidatura);
        $data['messaggio'] = "Candidatura eliminata correttamente";
        return $this->index($data);
    }

    /**
     * @throws \ReflectionException
     */
    public function inviaMessaggio(): string {
        $messaggi = new Messaggi();
        $messaggio = $this->request->getPost();
        $messaggio['mittente'] = $this->request->getCookie('cod_professionista');
        $messaggio['timestamp'] = date('Y-m-d H:i:s');
        $messaggi->insert($messaggio);
        $data['messaggio'] = "Messaggio inviato correttamente";
        return $this->index($data);
    }

    public function candidati($codiceAnnuncio)
    {
        $candidature = new Candidature();
        $candidatura = new \stdClass();
        $candidatura->annuncio = $codiceAnnuncio;
        $candidatura->professionista = $this->request->getCookie('cod_professionista');
        $candidatura->stato = 1;
        $candidatura->timestamp = date('Y-m-d H:i:s');
        $candidature->insert($candidatura);
        $data['messaggio'] = "Candidatura effettuata correttamente";
        return $this->index($data);
    }

    public function interventiDisponibili() {
        $content = (new Header())->professionista();
        if($content == "login") {
            return redirect()->to(base_url('professionisti/login'));
        }
        $data['annunci'] = (new Annunci())->findAnnunciPerProfessionista((new \App\Models\Professionisti())->find($this->request->getCookie('cod_professionista'))->localita, $this->request->getCookie('cod_professionista'));
        $content .= view('professionista/interventiDisp', $data);
        $content .= view('professionista/footer');

        return $content;
    }

    public function aggiornaProfilo() {
        $updateRules = [
            'nome' => 'required|min_length[3]|max_length[20]',
            'cognome' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|valid_email|is_unique[professionisti.email,professionisti.cf,' . $this->request->getCookie('cod_professionista'). ']',
            'localita' => 'required',
            'foto' => 'permit_empty|uploaded[foto]|max_size[foto,1024]|is_image[foto]'
        ];

        $validation = Services::validation();
        $validation->setRules($updateRules);
        if ($validation->run($this->request->getPost())) {
            $professionista = $this->request->getPost();
            $professionista['cf'] = $this->request->getCookie('cod_professionista');
            if (!is_null($this->request->getFile('foto')) && $this->request->getFile('foto')->isValid() && !$this->request->getFile('foto')->hasMoved()) {
                $file = $this->request->getFile('foto');
                $newName = $file->getRandomName();
                $file->move(ROOTPATH . 'public/uploads', $newName);
                $professionista['foto'] = $newName;
            }
            if ($this->request->getPost('password') != "") {
                $professionista['password'] = hash("sha256", ($this->request->getPost('password')));
            }
            $professionisti = new \App\Models\Professionisti();
            try {
                $professionisti->save($professionista);
            } catch (\Exception $e) {
                exit($e->getMessage());
            }
            $data['messaggio'] = "Informazioni aggiornate correttamente";
        } else {
            $data['errori'] = $validation->getErrors();
        }

        return $this->areaRiservata($data);
    }

    public function premium() {
        $professionista = (new \App\Models\Professionisti())->find($this->request->getCookie('cod_professionista'));
        $professionista->dataabbonamento = date('Y-m-d');
        $professionista->scadenzaabbonamento = date('Y-m-d', strtotime('+1 year'));
        (new \App\Models\Professionisti())->save($professionista);
        $data['messaggio'] = "Abbonamento attivato correttamente";
        return $this->areaRiservata($data);
    }

    public function areaRiservata($data = array()) {
        $content = (new Header())->professionista();
        if($content == "login") {
            return redirect()->to(base_url('professionisti/login'));
        }
        $content .= view('professionista/areaRiservata', $data);
        $content .= view('professionista/footer');
        return $content;
    }

    public function login($data = array()):string
    {
        return view('professionista/login', $data);
    }

    public function logProfessionsita() {
        $conditions = [
            'email' => $this->request->getPost('email'),
            'password' => hash("sha256", $this->request->getPost('password')),
            'stato' => 2
        ];
        $professionista = (new \App\Models\Professionisti())->where($conditions)->first();
        if($professionista) {
            $session = session();
            $session->set('professionista', $professionista);
            $this->response->setCookie('cod_professionista', $professionista->cf, (60 * 60 * 24 * 30));
            return redirect()->to(base_url('professionisti'))->withCookies();
        } else {
            $data['errori'] = "Credenziali non valide";
            return $this->login($data);
        }
    }

    public function signup($data = array()): string
    {
        return view('professionista/signup', $data);
    }

    public function insertProfessionista() {
        $registrationRules = [
            'nome' => 'required|min_length[3]|max_length[20]',
            'cognome' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|valid_email|is_unique[professionisti.email]',
            'cf' => 'required|exact_length[16]|is_unique[professionisti.cf]',
            'password' => 'required',
            'specializzazione' => 'required',
            'localita' => 'required',
            'foto' => 'permit_empty|uploaded[foto]|max_size[foto,1024]|is_image[foto]'
        ];
        $validation = Services::validation();
        $validation->setRules($registrationRules);
        if ($validation->run($this->request->getPost())) {
            $professionista = $this->request->getPost();
            if($this->request->getFile('foto')->isValid() && !$this->request->getFile('foto')->hasMoved()) {
                $file = $this->request->getFile('foto');
                $newName = $file->getRandomName();
                $file->move(ROOTPATH . 'public/uploads', $newName);
                $professionista['foto'] = $newName;
            }
            $professionista['password'] = hash("sha256", ($this->request->getPost('password')));
            try {
                (new \App\Models\Professionisti())->insert($professionista);
            } catch (\Exception $e) {
                exit($e->getMessage());
            }
            $data['messaggio'] = "Professionista inserito correttamente";
        } else {
            $data['errori'] = $validation->getErrors();
        }

        return $this->signup($data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        $this->response->deleteCookie('cod_professionista');
        return redirect()->to(base_url("professionisti"))->withCookies();
    }

}