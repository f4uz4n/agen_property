<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyModel extends Model
{
  protected $table = 'properties';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;

  protected $returnType = 'array';
  protected $protectFields = true;
  protected $allowedFields = [
    'title',
    'description',
    'type',
    'price',
    'address',
    'city',
    'province',
    'certificate',
    'status',
    'publish',
    'bedrooms',
    'bathrooms',
    'carport',
    'building_area',
    'land_area',
    'floors',
    'facilities',
  ];

  protected $useTimestamps = true;
  protected $dateFormat = 'datetime';
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';

  public function getData($agent_id = null, $status = null, $kategori = null)
  {
    $builder = $this->db->table($this->table . ' p');
    $builder->select('p.*, c.name AS kategori,
      (CASE WHEN f.id IS NULL THEN 0 ELSE 1 END) AS favorite');
    $builder->join('transactions t', 'p.id = t.property_id', 'left');
    $builder->join('categories c', 'p.type = c.id', 'left');
    $builder->join('favorites f', 'p.id = f.property_id', 'left');
    $builder->where('t.property_id IS NULL');
    if ($status != null) {
      $builder->where('p.status', $status);
    }
    if ($agent_id != null) {
      $builder->join('agent a', 'p.id = a.property_id');
      $builder->where('a.agent_id', $agent_id);
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

  public function getDataById($id)
  {
    $builder = $this->db->table($this->table . ' p');
    $builder->select('p.*, c.name AS kategori, t.status AS transaksi,
      (CASE WHEN f.id IS NULL THEN 0 ELSE 1 END) AS favorite');
    $builder->join('transactions t', 'p.id = t.property_id', 'left');
    $builder->join('categories c', 'p.type = c.id', 'left');
    $builder->join('favorites f', 'p.id = f.property_id', 'left');
    $builder->where('p.id', $id);
    $query = $builder->get();
    $data = $query->getRowArray();

    $builder = $this->db->table('agents a');
    $builder->select('u.name');
    $builder->join('users u', 'a.agent_id = u.id', 'left');
    $builder->where('a.property_id', $data['id']);
    $query = $builder->get();
    $tempAgents = $query->getResultArray();
    $agents = array_column($tempAgents, 'name');
    $data['agen'] = implode(',', $agents);

    $builder = $this->db->table('property_images pi');
    $builder->select('pi.*');
    $builder->where('pi.property_id', $data['id']);
    $builder->orderBy('pi.is_primary', 'DESC');
    $query = $builder->get();
    $images = $query->getResultArray();
    $data['images'] = $images;


    return $data;
  }

  public function getDataByAgent($agent_id)
  {
    $builder = $this->db->table('agents a');
    $builder->select('a.property_id');
    $builder->where('a.agent_id', $agent_id);
    $query = $builder->get();
    $tempProperties = $query->getResultArray();
    $property_ids = array_column($tempProperties, 'property_id');
    $properties = $this->getDataWhereIn('id', $property_ids);
  }
}


