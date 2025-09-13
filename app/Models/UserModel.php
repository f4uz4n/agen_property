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
    $builder->select('u.id, u.name, u.email, u.phone, u.location, u.role, u.status');
    $builder->where('u.role', 'agen');
    $builder->where('u.status', 'aktif');
    if ($id) {
      $builder->where('u.id', $id);
    }
    $builder->orderBy('u.name', 'ASC');
    $query = $builder->get();
    $data = $query->getResultArray();

    foreach ($data as $key => $value) {
      $builder = $this->db->table('transactions t');
      $builder->select("
      CASE p.status WHEN 'terjual' THEN 'Terjual' WHEN 'tersewakan' THEN 'Tersewakan' END AS property_status,
      COUNT(*) AS jumlah_transaksi
      ");
      $builder->join('properties p', 't.property_id = p.id');
      $builder->where('t.agen_id', $value['id']);
      $builder->where('t.status', 'Valid');
      $builder->groupBy('p.status');
      $query = $builder->get();
      $tempTransactions = $query->getResultArray();
      if ($tempTransactions == null) {
        $data[$key]['terjual'] = 0;
        $data[$key]['tersewakan'] = 0;
      } else {
        foreach ($tempTransactions as $row) {
          $data[$key][$row['property_status']] = $row['jumlah_transaksi'];
        }
      }
      
    }

    return $data;
  }
}


