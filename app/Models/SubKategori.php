<?php

namespace App\Models;

use CodeIgniter\Model;

class SubKategori extends Model
{
    
    protected $table      = 'subkategori';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_kategori', 'subkategori','nilai_utility'];
}