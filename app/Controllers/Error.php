<?php

namespace App\Controllers;

class Error extends BaseController
{
  public function unauthorized()
  {
    return $this->template->displayLogin('errors/error-403');
  }

  public function notFound()
  {
    return $this->template->displayLogin('errors/error-404');
  }
  
  public function internalServerError()
  {
    return $this->template->displayLogin('errors/error-500');
  }
}
