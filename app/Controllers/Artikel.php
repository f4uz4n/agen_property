<?php

namespace App\Controllers;

use App\Models\ArticleModel;

class Artikel extends BaseController
{
  protected $ArticleModel;

  public function __construct()
  {
    $this->ArticleModel = new ArticleModel();
  }

  public function index()
  {
    $data = [
    ];
    return $this->template->displayLanding('artikel', $data);
  }

  public function get_ajax()
   {
      
  }
}
