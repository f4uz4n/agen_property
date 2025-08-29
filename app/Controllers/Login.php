<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return $this->template->displayLogin('login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
