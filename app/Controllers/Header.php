<?php

namespace App\Controllers;


use App\Models\Amministrazione;
use App\Models\Professionisti;
use App\Models\Utenti;

class Header extends BaseController
{
    public function index(): string
    {
        helper('cookie');
        if (get_cookie('cod_user')) {
            $utenti = new Utenti();
            $data['utente'] = $utenti->find(get_cookie('cod_user'));
        } else {
            $data['utente'] = null;
        }
        return view("header", $data);
    }

    public function admin(): string
    {
        helper('cookie');
        if (get_cookie('cod_admin')) {
            $amministrazione = new Amministrazione();
            $amministrazione->find(urldecode(get_cookie('cod_admin')));
            if($amministrazione) {
                return view("admin/header");
            } else {
                return "login";
            }
        } else {
            return "login";
        }
    }

    public function professionista(): string
    {
        helper('cookie');
        if (get_cookie('cod_professionista')) {
            $professionisti = new Professionisti();
            $data['professionista'] = $professionisti->find(get_cookie('cod_professionista'));
            return view("professionista/header", $data);
        } else {
            return "login";
        }

    }

}