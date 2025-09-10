<?php

namespace App\Controllers\Dashboard;

use App\Models\ContactModel;
use App\Controllers\BaseController;

class Contact extends BaseController
{
    protected $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Daftar Kontak',
            'subtitle' => 'Kelola semua daftar kontak Anda di Sini.',
            'data' => $this->contactModel->findAll(),
        ];
        return $this->template->display('dashboard/kontak', $data);
    }

    public function update()
    {
        $type = $this->request->getPost();
        
        foreach ($type as $key => $value) {
            $this->contactModel->update($key, ['value' => $value]);
        }
        session()->setFlashdata([
            'title' => 'Berhasil',
            'icon' => 'success',
            'text' => 'Data kontak berhasil diperbarui.',
        ]);
        return redirect()->to(base_url('dashboard/kontak'));
    }
}
