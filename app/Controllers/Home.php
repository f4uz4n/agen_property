<?php

namespace App\Controllers;

use App\Models\ContactModel;
use App\Models\LaporanModel;
use App\Controllers\BaseController;

class Home extends BaseController
{
    protected $contactModel;
    protected $laporanModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
        $this->laporanModel = new LaporanModel();
    }

    public function index()
    {
        $testimoni = [
            ['name' => 'John Doe', 'alamat' => 'Jakarta', 'text' => 'Terimakasih atas pelayanannya yang sangat baik.'],
            ['name' => 'Jane Doe', 'alamat' => 'Bandung', 'text' => 'Saya sangat puas dengan pelayanannya yang ramah dan cepat.'],
            ['name' => 'Bob Smith', 'alamat' => 'Surabaya', 'text' => 'Pelayanannya sangat profesional dan saya sangat merekomendasikan.'],
        ];
        $data = [
            'contact' => $this->contactModel->getData(),
            'stat' => $this->laporanModel->getStatistik(),
            'testimoni' => $testimoni,
        ];
        return $this->template->displayLanding('home', $data);
    }
}
