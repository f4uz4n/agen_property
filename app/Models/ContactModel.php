<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
  protected $table = 'contact';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;

  protected $returnType = 'array';
  protected $protectFields = true;
  protected $allowedFields = [
    'type',
    'value',
    'icon',
    'status',
  ];

  // Timestamps
  protected $useTimestamps = true;
  protected $dateFormat = 'datetime';
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';

  public function getData($type = null)
  {
    $builder = $this->db->table($this->table);
    if ($type) {
      $builder->where('type', $type);
    }
    $data = $builder->get()->getResultArray();
    
    $result = [];
    foreach ($data as $value) {
      $result[$value['type']] = $value['value'];
    }
    return $result;
  }
}


