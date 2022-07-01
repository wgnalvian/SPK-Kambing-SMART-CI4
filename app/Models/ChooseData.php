<?php

namespace App\Models;

use CodeIgniter\Model;

class ChooseData extends Model
{
    
    protected $table      = 'choose_data';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_subkategori','num_choose','id_user'];
}