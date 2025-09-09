<?php

namespace App\Models;

use CodeIgniter\Model;

class AgentModel extends Model
{
  protected $table = 'agents';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;

  protected $returnType = 'array';
  protected $protectFields = true;
  protected $allowedFields = [
    'agent_id',
    'property_id',
  ];

  protected $useTimestamps = false;
}


