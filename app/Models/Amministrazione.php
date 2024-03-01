<?php

namespace App\Models;

use CodeIgniter\Model;

class Amministrazione extends Model
{

    protected $table = "amministrazione";
    protected $primaryKey = 'email';
    protected $returnType = 'object';
    protected $allowedFields = ['email', 'password'];

}