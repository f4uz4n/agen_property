<?php

namespace App\Models;

use CodeIgniter\Model;

class WilayahModel extends Model
{
  protected $table = 'wilayah';
  protected $primaryKey = 'kode';
  protected $useAutoIncrement = true;

  protected $returnType = 'array';
  protected $protectFields = true;
  protected $allowedFields = [
    'kode',
    'name',
    'parent',
    'level',
  ];

  protected $useTimestamps = false;
}


