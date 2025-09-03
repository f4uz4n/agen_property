<?php

namespace App\Controllers\Dashboard;

use App\Models\UserModel;
use App\Controllers\BaseController;

class Agen extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Agen',
            'data' => $this->userModel->getAgents(),
        ];
        return $this->template->display('dashboard/agen', $data);
    }
}
