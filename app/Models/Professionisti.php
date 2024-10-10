<?php

namespace App\Models;

use CodeIgniter\Model;

class Professionisti extends Model
{

    protected $table = "professionisti";
    protected $primaryKey = 'cf';
    protected $returnType = 'object';
    protected $allowedFields = ['cf', 'nome', 'cognome', 'specializzazione', 'localita', 'email', 'password', 'foto', 'dataabbonamento', 'scadenzaabbonamento', 'stato'];
    protected $useAutoIncrement = false;

    public function getProfessionistiConFiltri($mansione = null, $valutazione = null ): array {
        $sql = "SELECT p.*, AVG(r.valutazione) as valutazioneMedia FROM professionisti p LEFT JOIN recensioni r ON p.cf = r.professionista";
        $sql .= " WHERE 1=1";
        if($mansione != "") {
            $sql .= " AND lower(p.specializzazione) LIKE lower('%$mansione%')";
        }
        $sql .= " GROUP BY p.cf";
        if($valutazione != 0) {
            $sql .= " HAVING AVG(r.valutazione) >= $valutazione";
        }
        $query = $this->db->query($sql);
        return $query->getResult();
    }

}