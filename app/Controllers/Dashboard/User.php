<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
  protected $userModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
  }

  public function index()
  {
    $users = $this->userModel->orderBy('name', 'ASC')->findAll();
    $data = [
      'data' => $users,
    ];
    return $this->template->display('dashboard/user', $data);
  }

  public function create()
  {
    $data = [
      'name' => $this->request->getPost('name'),
      'email' => $this->request->getPost('email'),
      'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
      'phone' => $this->request->getPost('phone'),
      'role' => $this->request->getPost('role'),
      'status' => $this->request->getPost('status')
    ];

    $validation = \Config\Services::validation();
    $validation->setRules([
      'name' => 'required|min_length[3]',
      'email' => 'required|valid_email|is_unique[users.email]',
      'password' => 'required|min_length[8]',
      'phone' => 'required|regex_match[/^628\d+$/]|numeric',
      'role' => 'required|in_list[admin,user,agent]',
      'status' => 'required|in_list[0,1]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'Validasi gagal',
        'text' => $validation->getErrors()
      ]);
    }

    try {
      $this->userModel->insert($data);
      return $this->response->setJSON([
        'title' => 'Berhasil',
        'icon' => 'success',
        'text' => 'User berhasil ditambahkan'
      ]);
    } catch (\Exception $e) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Gagal menambahkan user: ' . $e->getMessage()
      ]);
    }
  }

  public function update($id = null)
  {
    if (!$id) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'ID user tidak ditemukan'
      ]);
    }

    $user = $this->userModel->find($id);
    if (!$user) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'User tidak ditemukan'
      ]);
    }

    $data = [
      'name' => $this->request->getPost('name'),
      'email' => $this->request->getPost('email'),
      'phone' => $this->request->getPost('phone'),
      'role' => $this->request->getPost('role'),
      'status' => $this->request->getPost('status')
    ];

    // Jika password diisi, update password
    if ($this->request->getPost('password')) {
      $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    }

    $validation = \Config\Services::validation();
    $validation->setRules([
      'name' => 'required|min_length[3]',
      'email' => 'required|valid_email|is_unique[users.email,id,' . $id . ']',
      'password' => 'permit_empty|min_length[8]',
      'phone' => 'required|regex_match[/^628\d+$/]|numeric',
      'role' => 'required|in_list[admin,user,agent]',
      'status' => 'required|in_list[0,1]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
      return $this->response->setJSON([
        'title' => 'Validasi gagal',
        'icon' => 'error',
        'text' => 'Validasi gagal',
        'errors' => $validation->getErrors()
      ]);
    }

    try {
      $this->userModel->update($id, $data);
      return $this->response->setJSON([
        'title' => 'Berhasil',
        'icon' => 'success',
        'text' => 'User berhasil diperbarui'
      ]);
    } catch (\Exception $e) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Gagal memperbarui user: ' . $e->getMessage()
      ]);
    }
  }

  public function delete($id)
  {
    if (!$id) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'ID user tidak ditemukan'
      ]);
    }

    $user = $this->userModel->find($id);
    if (!$user) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'User tidak ditemukan'
      ]);
    }

    try {
      $this->userModel->delete($id);
      return $this->response->setJSON([
        'title' => 'Berhasil',
        'icon' => 'success',
        'text' => 'User berhasil dihapus'
      ]);
    } catch (\Exception $e) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Gagal menghapus user: ' . $e->getMessage()
      ]);
    }
  }
}
