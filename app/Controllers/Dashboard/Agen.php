<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Agen extends BaseController
{
    public function index()
    {
        return $this->template->display('dashboard/home');
    }
}
