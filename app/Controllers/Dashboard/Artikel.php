<?php

namespace App\Controllers\Dashboard;

use App\Models\ArticleModel;
use App\Controllers\BaseController;

class Artikel extends BaseController
{
    protected $articleModel;

    public function __construct()
    {
        $this->articleModel = new ArticleModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Artikel',
            'subtitle' => 'Kelola semua daftar artikel Anda di Sini.',
            'data' => $this->articleModel->findAll(),
        ];
        return $this->template->display('dashboard/artikel', $data);
    }
}
