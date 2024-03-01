<?php

namespace App\Models;

use CodeIgniter\Model;

class Messaggi extends Model
{

    protected $table = "messaggi";
    protected $primaryKey = 'codice';
    protected $returnType = 'object';
    protected $allowedFields = ['codice', 'mittente', 'tipomittente', 'messaggio', 'annuncio', 'timestamp'];

}