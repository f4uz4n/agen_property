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
    'user_id',
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

  public function getData($param = null)
  {
    $builder = $this->db->table($this->table . ' p');
    $builder->select('p.*, c.name AS kategori, u.name AS agen, u.phone, 
      (CASE WHEN f.id IS NULL THEN 0 ELSE 1 END) AS favorite');
    $builder->join('users u', 'p.user_id = u.id', 'left');
    $builder->join('categories c', 'p.type = c.id', 'left');
    $builder->join('property_images pi', 'p.id = pi.property_id', 'left');
    $builder->join('favorites f', 'p.id = f.property_id', 'left');
    if (is_numeric($param)) {
      $builder->where('p.user_id', $param);
    }
    if (is_string($param)) {
      $builder->where('p.status', $param);
    }
    $builder->orderBy('p.status', 'ASC');
    $builder->orderBy('c.name', 'ASC');
    $query = $builder->get();
    return $query->getResultArray();
  }
}


