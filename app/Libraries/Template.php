<?php

namespace App\Libraries;

class Template
{
  public function displayLanding($content = "", $data = [])
  {
    $template['pagecontent'] = view($content, $data);
    echo view('template/landing/index', $template);
  }
  
  public function display($content = "", $data = [])
  {
    $template['pagecontent'] = view($content, $data);
    echo view('template/dashboard/index', $template);
  }

  public function displayLogin($content = "", $data = [])
  {
    $template['pagecontent'] = view($content, $data);
    echo view('template/dashboard/login', $template);
  }
}
