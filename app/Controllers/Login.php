<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        return $this->template->displayLogin('login');
    }

    public function proses()
    {
        $email = $this->request->getPost('email')
            ? filter_var($this->request->getPost('email'), FILTER_SANITIZE_EMAIL) : '';
        $password = $this->request->getPost('password')
            ? filter_var($this->request->getPost('password'), FILTER_SANITIZE_STRING) : '';
        $user = $this->UserModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session_data = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role'],
                'isLoggedIn' => TRUE
            ];
            session()->set($session_data);
            return redirect()->to(base_url());
        } else {
            session()->setFlashdata([
                'title' => 'Login Gagal',
                'icon' => 'error',
                'text' => 'Email atau Password salah'
            ]);
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
