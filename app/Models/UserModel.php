<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table = 'users';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;

  protected $returnType = 'array';
  protected $protectFields = true;
  protected $allowedFields = [
    'name',
    'email',
    'password',
    'phone',
    'location',
    'role',
    'status',
  ];

  protected $useTimestamps = true;
  protected $dateFormat = 'datetime';
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';

  public function getAgents($id = null)
  {
    $builder = $this->db->table($this->table . ' u');
    $builder->select('u.*, t.*, p.*');
    $builder->join('transactions t', 't.agen_id = u.id', 'left');
    $builder->join('properties p', 'p.id = t.property_id', 'left');
    $builder->where('u.role', 'agen');
    $builder->where('u.status', 'aktif');
    if ($id) {
      $builder->where('u.id', $id);
    }
    $builder->orderBy('u.name', 'ASC');
    return $builder->get()->getResultArray();
  }
}


