<?php

namespace App\Controllers\Dashboard;

use App\Models\UserModel;
use App\Models\ArticleModel;
use App\Controllers\BaseController;

class Artikel extends BaseController
{
    protected $userModel;
    protected $articleModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->articleModel = new ArticleModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Artikel',
            'subtitle' => 'Kelola semua daftar artikel Anda di Sini.',
            'data' => $this->articleModel->findAll(),
            'users' => $this->userModel
                ->where('status', 'aktif')
                ->orderBy('name', 'ASC')
                ->findAll(),
        ];
        return $this->template->display('dashboard/artikel', $data);
    }
}
