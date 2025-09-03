<?php

namespace App\Controllers\Dashboard;

use App\Models\UserModel;
use App\Controllers\BaseController;

class User extends BaseController
{
  protected $userModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
  }

  public function index()
  {
    $users = $this->userModel
      ->orderBy('status', 'ASC')
      ->orderBy('name', 'ASC')
      ->findAll();
    $data = [
      'title' => 'Kelola User',
      'data' => $users,
    ];
    return $this->template->display('dashboard/user', $data);
  }

  public function store()
  {
    $name = $this->request->getPost('nama');
    $email = $this->request->getPost('email');
    $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    $phone = $this->request->getPost('whatsapp');
    $role = $this->request->getPost('role');
    $status = $this->request->getPost('status');

    $data = [
      'name' => $name,
      'email' => $email,
      'password' => $password,
      'phone' => $phone,
      'role' => $role,
      'status' => $status,
    ];

    $validation = \Config\Services::validation();
    $validation->setRules([
      'nama' => 'required|min_length[3]',
      'email' => 'required|valid_email|is_unique[users.email]',
      'password' => 'required|min_length[8]',
      'whatsapp' => 'required|regex_match[/^628\d+$/]|numeric',
      'role' => 'required|in_list[admin,agen]',
      'status' => 'required|in_list[aktif,nonaktif]'
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
      session()->setFlashdata([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'ID user tidak ditemukan'
      ]);
      return redirect()->to(base_url('dashboard/user'));
    }

    $user = $this->userModel->find($id);
    if (!$user) {
      session()->setFlashdata([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'User tidak ditemukan'
      ]);
      return redirect()->to(base_url('dashboard/user'));
    }

    $name = $this->request->getPost('nama');
    $email = $this->request->getPost('email');
    $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    $phone = trim($this->request->getPost('whatsapp'));
    $role = $this->request->getPost('role');
    $status = $this->request->getPost('status');

    $data = [
      'name' => $name,
      'email' => $email,
      'phone' => $phone,
      'role' => $role,
      'status' => $status,
    ];

    // Jika password diisi, update password
    if ($this->request->getPost('password')) {
      $data['password'] = $password;
    }

    $validation = \Config\Services::validation();
    $validation->setRules([
      'nama' => 'required|min_length[3]',
      'email' => 'required|valid_email|is_unique[users.email,id,' . $id . ']',
      'password' => 'permit_empty|min_length[8]',
      'whatsapp' => 'required|regex_match[/^628\d+$/]|numeric',
      'role' => 'required|in_list[admin,agen]',
      'status' => 'required|in_list[aktif,nonaktif]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
      session()->setFlashdata([
        'title' => 'Validasi gagal',
        'icon' => 'error',
        'text' => 'Validasi gagal',
        'open_modal' => 'userForm',
      ]);
      return redirect()->to(base_url('dashboard/user'))->withInput()
        ->with('errors', $validation->getErrors());
    }

    try {
      $this->userModel->update($id, $data);
      log_message('info', '{user} mengubah data user {id}', [
        'user' => 'diki',
        'id' => $id
      ]);

      session()->setFlashdata([
        'title' => 'Berhasil',
        'icon' => 'success',
        'text' => 'User berhasil diperbarui'
      ]);
    } catch (\Exception $e) {
      session()->setFlashdata([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Gagal memperbarui user: ' . $e->getMessage()
      ]);
    }
    return redirect()->to(base_url('dashboard/user'));
  }

  public function disabled($id)
  {
    if (!$id) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'ID user tidak ditemukan'
      ]);
    }
    // TODO: handle tidak bisa disable diri sendiri dan owner
    $user = $this->userModel->find($id);
    if (!$user) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'User tidak ditemukan'
      ]);
    }

    $data = [
      'status' => 'nonaktif',
    ];

    try {
      $this->userModel->update($id, $data);
      return $this->response->setJSON([
        'title' => 'Berhasil',
        'icon' => 'success',
        'text' => 'User berhasil dinonaktifkan.'
      ]);
    } catch (\Exception $e) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Gagal menonaktifkan user: ' . $e->getMessage()
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
