<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
  protected $table = 'transactions';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;

  protected $returnType = 'array';
  protected $protectFields = true;
  protected $allowedFields = [
    'property_id',
    'agen_id',
    'buyer',
    'wa_buyer',
    'price',
    'status',
    'tanggal_penjualan',
    'tanggal_serah_terima',
    'validator',
    'note',
    'created_at',
  ];

  protected $useTimestamps = false;

  public function getData($agent_id = null, $status = null, $kategori = null)
  {
    $builder = $this->db->table('properties p');
    $builder->select('p.*, c.name AS kategori, t.status AS transaksi,
      (CASE WHEN f.id IS NULL THEN 0 ELSE 1 END) AS favorite');
    $builder->join('transactions t', 'p.id = t.property_id', 'left');
    $builder->join('categories c', 'p.type = c.id', 'left');
    $builder->join('favorites f', 'p.id = f.property_id', 'left');
    $builder->where('t.property_id IS NOT NULL');
    if ($agent_id != null) {
      $builder->join('agents a', 'p.id = a.property_id');
      $builder->where('a.agent_id', $agent_id);
    }
    if ($status != null) {
      $builder->where('p.status', $status);
    }
    if ($kategori != null) {
      $builder->where('p.type', $kategori);
    }
    $builder->orderBy('p.status', 'ASC');
    $builder->orderBy('p.publish', 'DESC');
    $builder->orderBy('p.created_at', 'DESC');
    $builder->orderBy('c.name', 'ASC');
    $query = $builder->get();
    $data = $query->getResultArray();

    foreach ($data as $key => $value) {
      $builder = $this->db->table('agents a');
      $builder->select('u.name');
      $builder->join('users u', 'a.agent_id = u.id', 'left');
      $builder->where('a.property_id', $value['id']);
      $query = $builder->get();
      $tempAgents = $query->getResultArray();
      $agents = array_column($tempAgents, 'name');
      $data[$key]['agen'] = implode(', ', $agents);

      $builder = $this->db->table('property_images pi');
      $builder->select('pi.*');
      $builder->where('pi.property_id', $value['id']);
      $builder->orderBy('pi.is_primary', 'DESC');
      $query = $builder->get();
      $images = $query->getResultArray();
      $data[$key]['images'] = $images;
    }

    return $data;
  }
}


