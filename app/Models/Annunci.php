<?php

namespace App\Models;

use CodeIgniter\Model;

class Annunci extends Model
{

    protected $table = "annunci";
    protected $primaryKey = 'codice';
    protected $returnType = 'object';
    protected $allowedFields = ['codice', 'utente', 'foto', 'nome', 'specializzazione', 'localita', 'indirizzo', 'descrizione', 'stato'];


    public function getListaAnnunciForUtente($stato, $codUtente): array {
        if($stato == 3) {
            $annunci = $this->where(['utente' => $codUtente, 'stato' => 3])->findAll();
        } else {
            $annunci = $this->where(['utente' => $codUtente, 'stato <>' => 3])->findAll();
        }
        foreach ($annunci as $annuncio) {
            $annuncio->candidature = (new Candidature())->where(['annuncio' => $annuncio->codice])->findAll();
            foreach ($annuncio->candidature as $candidatura) {
                $candidatura->professionista = (new Professionisti())->find($candidatura->professionista);
            }
            $annuncio->messaggi = (new Messaggi())->where(['annuncio' => $annuncio->codice])->findAll();
            $annuncio->recensito = (new Recensioni())->where(['annuncio' => $annuncio->codice])->first() != null;
        }

        return $annunci;
    }

    public function getListaAnnunciForProfessionista($stato, $codProfessionista): array {
        if($stato == 3) {
            $stato = "stato = 3";
        } else {
            $stato = "stato = 2";
        }
        $annunci = $this->db->query("SELECT * FROM annunci WHERE codice in (select annuncio from candidature where $stato and professionista = '$codProfessionista')")->getResultObject();
        foreach ($annunci as $annuncio) {
            $annuncio->candidature = (new Candidature())->where(['annuncio' => $annuncio->codice])->findAll();
            foreach ($annuncio->candidature as $candidatura) {
                $candidatura->professionista = (new Professionisti())->find($candidatura->professionista);
            }
            $annuncio->utente = (new Utenti())->find($annuncio->utente);
            $annuncio->messaggi = (new Messaggi())->where(['annuncio' => $annuncio->codice])->findAll();
        }

        return $annunci;
    }

    public function findAnnunciPerProfessionista($localita, $professionista): array {
        $annunci = $this->db->query("SELECT * FROM annunci WHERE localita = '$localita' AND stato = 1 and codice not in (select annuncio from candidature where professionista = '$professionista')")->getResultObject();
        foreach ($annunci as $annuncio) {
            $annuncio->utente = (new Utenti())->find($annuncio->utente);
        }

        return $annunci;
    }

}