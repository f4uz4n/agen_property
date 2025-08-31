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
    'role',
    'status',
  ];

  protected $useTimestamps = true;
  protected $dateFormat = 'datetime';
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';

  public function getAgents()
  {
    $builder = $this->db->table($this->table);
    $builder->where('role', 'agen');
    $builder->where('status', 'aktif');
    $builder->orderBy('name', 'ASC');
    return $builder->get()->getResultArray();
  }
}


