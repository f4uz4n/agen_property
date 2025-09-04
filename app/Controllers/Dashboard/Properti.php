<?php

namespace App\Controllers\Dashboard;

use App\Models\FavoriteModel;
use App\Models\PropertyModel;
use App\Controllers\BaseController;
use App\Models\PropertyCategoryModel;

class Properti extends BaseController
{
    protected $propertyModel, $propertyCategoryModel;
    protected $favoriteModel;

    public function __construct()
    {
        $this->favoriteModel = new FavoriteModel();
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

    public function favorite($id)
    {
        $value = $this->request->getPost('value');
        if ($value == 1) {
            $this->favoriteModel->insert(['property_id' => $id,]);
        } else {
            $this->favoriteModel->where('property_id', $id)->delete();
        }
        
        return $this->response->setJSON(['status' => 200]);
    }
}
