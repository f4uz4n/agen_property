<?php

namespace App\Controllers\Dashboard;

use App\Models\PropertyModel;
use App\Controllers\BaseController;
use App\Models\PropertyCategoryModel;

class Properti extends BaseController
{
    protected $propertyModel, $propertyCategoryModel;

    public function __construct()
    {
        $this->propertyModel = new PropertyModel();
        $this->propertyCategoryModel = new PropertyCategoryModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Properti',
            'subtitle' => 'Kelola semua daftar properti Anda di Sini.',
            'data' => $this->propertyModel->getData(),
            'kategori' => $this->propertyCategoryModel
                ->where('status', 'aktif')
                ->orderBy('name', 'ASC')
                ->findAll(),
        ];
        return $this->template->display('dashboard/properti', $data);
    }

    public function create()
    {
        $data = [

        ];
        return $this->template->display('dashboard/properti_create', $data);
    }
}
