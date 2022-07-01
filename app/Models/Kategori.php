<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori extends Model
{
    
    protected $table      = 'kategori';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kategori', 'nilai_bobot','id_user'];
}