<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ListaProfessionisti extends Controller
{

    public function index($data = array()): string
    {
        $content = (new Header())->index();
        if(is_null($this->request->getPost('mansione')) && is_null($this->request->getPost('valutazione'))) {
            $data['professionisti'] = (new \App\Models\Professionisti())->getProfessionistiConFiltri();
            $data['mansione'] = "";
            $data['valutazioneMedia'] = "";
        }
        $content .= view('professionistiList', $data);
        $content .= view("footer");

        return $content;
    }

    public function filtraLista(): string
    {
        $mansione = $this->request->getPost('mansione');
        $valutazione = $this->request->getPost('valutazione');
        $professionisti = (new \App\Models\Professionisti())->getProfessionistiConFiltri($mansione, $valutazione);
        $data['professionisti'] = $professionisti;
        $data['mansione'] = $mansione;
        $data['valutazioneMedia'] = $valutazione;
        return $this->index($data);
    }

}