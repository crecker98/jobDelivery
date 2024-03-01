<?php

namespace App\Controllers;

use App\Models\Annunci;
use App\Models\Candidature;
use App\Models\Localita;
use App\Models\Messaggi;
use App\Models\Pagamenti;
use App\Models\Preferiti;
use App\Models\Recensioni;
use App\Models\Segnalazioni;
use App\Models\Utenti;
use Config\Services;

class Profilo extends BaseController
{

    public function index($data = array()): string
    {
        $header = new Header();
        $content = $header->index();
        $annunci = new Annunci();
        $data['annunciAperti'] = $annunci->getListaAnnunciForUtente(1, $this->request->getCookie('cod_user'));
        $data['annunciConclusi'] = $annunci->getListaAnnunciForUtente(3, $this->request->getCookie('cod_user'));
        $content .= view('areaRiservata', $data);
        $content .= view("footer");
        return $content;
    }

    /**
     * @throws \ReflectionException
     */
    public function recensisci(): string {
        $recensioni = new Recensioni();
        $recensione = $this->request->getPost();
        $recensione['utente'] = $this->request->getCookie('cod_user');
        $recensione['timestamp'] = date('Y-m-d H:i:s');
        $recensioni->insert($recensione);
        $data['messaggio'] = "Recensione inserita correttamente";
        return $this->index($data);
    }

    /**
     * @throws \ReflectionException
     */
    public function inviaMessaggio(): string {
        $messaggi = new Messaggi();
        $messaggio = $this->request->getPost();
        $messaggio['mittente'] = $this->request->getCookie('cod_user');
        $messaggio['timestamp'] = date('Y-m-d H:i:s');
        $messaggi->insert($messaggio);
        $data['messaggio'] = "Messaggio inviato correttamente";
        return $this->index($data);
    }

    /**
     * @throws \ReflectionException
     */
    public function confermaCandidatura($codAnnuncio, $codProfessionista): string {
        $candidature = new Candidature();
        $conditions = [
            'annuncio' => $codAnnuncio,
            'professionista' => $codProfessionista
        ];
        $candidatura = $candidature->where($conditions)->first();
        $candidatura->stato = 2;
        $candidature->save($candidatura);
        $annunci = new Annunci();
        $annuncio = $annunci->find($codAnnuncio);
        $annuncio->stato = 2;
        $annunci->save($annuncio);

        $cands = $candidature->where(['annuncio' => $codAnnuncio, 'stato' => 1])->findAll();
        foreach ($cands as $candidatura) {
            $candidature->delete($candidatura);
        }

        $data['messaggio'] = "Candidatura confermata correttamente";

        return $this->index($data);
    }

    public function eliminaAnnuncio($codice): string {
        $annuncio = new Annunci();
        $annuncio->delete($codice);
        return $this->index();
    }

    public function aggiornaProfilo(): string
    {

        $updateRules = [
            'nome' => 'required|min_length[3]|max_length[20]',
            'cognome' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|valid_email|is_unique[utenti.email,utenti.cf,' . $this->request->getCookie('cod_user'). ']',
            'telefono' => 'required|exact_length[10]',
        ];

        $validation = Services::validation();
        $validation->setRules($updateRules);
        if ($validation->run($this->request->getPost())) {
            $utente = $this->request->getPost();
            $utente['cf'] = $this->request->getCookie('cod_user');
            if ($this->request->getPost('password') != "") {
                $utente['password'] = hash("sha256", ($this->request->getPost('password')));
            }
            $utenti = new Utenti();
            try {
                $utenti->save($utente);
            } catch (\Exception $e) {
                exit($e->getMessage());
            }
            $data['messaggio'] = "Informazioni aggiornate correttamente";
        } else {
            $data['errori'] = $validation->getErrors();
        }

        return $this->index($data);
    }

    public function inserisciAnnuncio(): string {
        $rulesAnnuncio = [
            'nome' => 'required|min_length[3]|max_length[20]',
            'specializzazione' => 'required',
            'localita' => 'required',
            'indirizzo' => 'required|min_length[3]|max_length[50]',
            'descrizione' => 'required|min_length[10]|max_length[500]',
            'foto' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]',
        ];
        $validation = Services::validation();
        $validation->setRules($rulesAnnuncio);
        if ($validation->run($this->request->getPost())) {
            $annuncio = $this->request->getPost();
            $annuncio['utente'] = $this->request->getCookie('cod_user');
            if (!is_null($this->request->getFile('foto')) && $this->request->getFile('foto')->isValid() && !$this->request->getFile('foto')->hasMoved()) {
                $file = $this->request->getFile('foto');
                $newName = $file->getRandomName();
                $file->move(ROOTPATH . 'public/uploads', $newName);
                $annuncio['foto'] = $newName;
            }
            $annunci = new Annunci();
            try {
                $annunci->save($annuncio);
            } catch (\Exception $e) {
                exit($e->getMessage());
            }
            $data['messaggio'] = "Annuncio inserito correttamente";
        } else {
            $data['errori'] = $validation->getErrors();
        }
        return $this->index($data);
    }

}