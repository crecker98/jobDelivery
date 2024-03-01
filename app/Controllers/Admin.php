<?php

namespace App\Controllers;

use App\Models\Amministrazione;
use App\Models\Utenti;
use Config\App;

class Admin extends BaseController
{

    public function index($data= array())
    {
        $header = new Header();
        $content = $header->admin();
        if($content == "login") {
            return redirect()->to(base_url('/admin/login'));
        }
        $utenti = new Utenti();
        $data['utenti'] = $utenti->findAll();
        $content .= view('/admin/utenti', $data);
        $content .= view("/admin/footer");
        return $content;
    }

    public function attivaProfessionista($codice) {
        $professionisti = new \App\Models\Professionisti();
        $professionista = $professionisti->find($codice);
        $professionista->stato = 2;
        $professionisti->save($professionista);
        $data['messaggio'] = "Professionista attivato correttamente";
        return $this->index($data);
    }

    public function professionisti() {
        $header = new Header();
        $content = $header->admin();
        if($content == "login") {
            return redirect()->to(base_url('/admin/login'));
        }
        $professionisti = new \App\Models\Professionisti();
        $data['professionisti'] = $professionisti->findAll();
        $content .= view('/admin/professionisti', $data);
        $content .= view("/admin/footer");
        return $content;
    }

    public function bannaUtente($cf) {
        $utenti = new Utenti();
        $utente = $utenti->find($cf);
        $utente->stato = 2;
        $utenti->save($utente);
        $data['messaggio'] = "Utente bannato correttamente";
        return $this->index($data);
    }

    public function login($data = array()): string
    {
        return view('/admin/login', $data);
    }

    public function doLogin()
    {
        $amministrazione = new Amministrazione();
        $conditions = array('email' => $this->request->getPost('email'), 'password' => hash('sha256', $this->request->getPost('password')));
        $amm = $amministrazione->where($conditions)->first();
        if ($amm) {
            $this->response->setCookie('cod_admin', urlencode($amm->email), (60 * 60 * 24 * 30));
            return redirect()->to(base_url('admin'))->withCookies();
        } else {
            $data['errori'] = "Email o password errati";
        }
        return $this->login($data);
    }

}