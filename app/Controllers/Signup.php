<?php

namespace App\Controllers;

use App\Models\Utenti;
use Config\Services;

class Signup extends BaseController
{
    public function index($data = array()): string
    {
        $header = new Header();
        $content = $header->index();
        $content .= view('signup', $data);
        $content .= view("footer");
        return $content;
    }

    /**
     * @throws \ReflectionException
     */
    public function insertUtente(): string
    {
        $registrationRules = [
            'nome' => 'required|min_length[3]|max_length[20]',
            'cognome' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|valid_email|is_unique[utenti.email]',
            'cf' => 'required|exact_length[16]|is_unique[utenti.cf]',
            'password' => 'required',
            'telefono' => 'required|numeric|exact_length[10]',
        ];
        $validation = Services::validation();
        $validation->setRules($registrationRules);
        if ($validation->run($this->request->getPost())) {
            $utente = $this->request->getPost();
            $utente['password'] = hash("sha256", ($this->request->getPost('password')));
            $utenti = new Utenti();
            try {
                $utenti->insert($utente);
            } catch (\Exception $e) {
                exit($e->getMessage());
            }

            $data['messaggio'] = "Utente inserito correttamente";
        } else {
            $data['errori'] = $validation->getErrors();
        }

        return $this->index($data);

    }

}