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

  public function getData($user_id = null)
  {
    $builder = $this->db->table($this->table . ' p');
    $builder->select('p.*, pc.name AS kategori, u.name AS agen, u.phone');
    $builder->join('users u', 'p.user_id = u.id', 'left');
    $builder->join('property_categories pc', 'p.type = pc.id', 'left');
    $builder->join('property_images pi', 'p.id = pi.property_id', 'left');
    if ($user_id) {
      $builder->where('p.user_id', $user_id);
    }
    $builder->orderBy('p.status', 'ASC');
    $builder->orderBy('pc.name', 'ASC');
    $query = $builder->get();
    return $query->getResultArray();
  }
}


