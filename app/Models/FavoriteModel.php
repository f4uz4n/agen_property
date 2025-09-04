<?php

namespace App\Models;

use CodeIgniter\Model;

class FavoriteModel extends Model
{
  protected $table = 'favorites';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;

  protected $returnType = 'array';
  protected $protectFields = true;
  protected $allowedFields = [
    'property_id',
    'created_at',
  ];

  protected $useTimestamps = false;
}


