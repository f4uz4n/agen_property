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
    'price',
    'status',
    'tanggal_penjualan',
    'tanggal_serah_terima',
    'validator',
    'created_at',
  ];

  protected $useTimestamps = false;
}


