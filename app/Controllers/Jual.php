<?php

namespace App\Controllers;

use App\Models\PropertyModel;

class Jual extends BaseController
{
  protected $PropertyModel;

  public function __construct()
  {
    $this->PropertyModel = new PropertyModel();
  }

  public function index()
  {
    $data = [
    ];
    return $this->template->displayLanding('jual', $data);
  }

  public function get_ajax()
   {
      
  }
}
