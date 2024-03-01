<?php

namespace App\Models;

use CodeIgniter\Model;

class Utenti extends Model
{

    protected $table = "utenti";
    protected $primaryKey = 'cf';
    protected $returnType = 'object';
    protected $allowedFields = ['cf', 'nome', 'cognome', 'email', 'password', 'telefono', 'stato'];
    protected $useAutoIncrement = false;

}