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
}


