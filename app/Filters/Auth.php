<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    $session = session();

    // cek login
    if (!$session->get('isLoggedIn')) {
      return redirect()->to(base_url('login'))
        ->with('error', 'Silakan login terlebih dahulu.');
    }

    // cek role kalau filter dipanggil dengan argumen
    if ($arguments && !in_array($session->get('role'), $arguments)) {
      return redirect()->to(base_url('unauthorized'))
        ->with('error', 'Anda tidak memiliki hak akses.');
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    //
  }
}
