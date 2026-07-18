<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Belum login → redirect ke login
        if (!session()->get('user_id')) {
            return redirect()->to('/login');
        }

        // Cek role jika ada argument
        if ($arguments) {
            $role = session()->get('role');
            if (!in_array($role, $arguments)) {
                return redirect()->to('/login')
                                 ->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // tidak perlu
    }
}