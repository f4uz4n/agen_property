<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyImageModel extends Model
{
  protected $table = 'property_images';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;

  protected $returnType = 'array';
  protected $protectFields = true;
  protected $allowedFields = [
    'property_id',
    'image_url',
    'is_primary',
  ];

  protected $useTimestamps = false;
}



