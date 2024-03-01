<?php

namespace App\Models;

use CodeIgniter\Model;

class Recensioni extends Model
{

    protected $table = "recensioni";
    protected $primaryKey = 'codice';
    protected $returnType = 'object';
    protected $allowedFields = ['codice', 'utente', 'professionista', 'candidatura', 'valutazione', 'commento', 'annuncio'];

}