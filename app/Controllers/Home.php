<?php

namespace App\Controllers;

use App\Models\ContactModel;

class Home extends BaseController
{
    protected $contactModel;
    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    public function index()
    {
        $data = [
            'contact' => $this->contactModel->getData(),
        ];
        return $this->template->displayLanding('home', $data);
    }
}
