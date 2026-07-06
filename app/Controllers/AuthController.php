<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends BaseController
{
    // =====================
    // HALAMAN LOGIN
    // =====================
    public function index()
    {
        // Kalau sudah login, langsung redirect ke dashboard
        if (session()->get('isLoggedIn')) {
            return $this->redirectToDashboard();
        }
        return view('auth/login');
    }

    // =====================
    // PROSES LOGIN
    // =====================
    public function loginProcess()
    {
        $model = new UserModel();

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Cari user berdasarkan email
        $user = $model->findByEmail($email);

        // Cek apakah user ditemukan & password cocok
        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->to('/login')
                ->with('error', 'Email atau password salah!');
        }

        // Simpan data user ke session
        session()->set([
            'isLoggedIn' => true,
            'user_id'    => $user['id'],
            'nama'       => $user['nama'],
            'email'      => $user['email'],
            'role'       => $user['role'],
            'no_hp'      => $user['no_hp'],
        ]);

        // Redirect ke dashboard sesuai role
        return $this->redirectToDashboard();
    }

    // =====================
    // REDIRECT BERDASARKAN ROLE
    // =====================
    private function redirectToDashboard()
    {
        $role = session()->get('role');

        switch ($role) {
            case 'admin':
                return redirect()->to('/admin/dashboard');
            case 'staff':
                return redirect()->to('/staff/dashboard');
            case 'notaris':
                return redirect()->to('/notaris/dashboard');
            case 'pemohon':
                return redirect()->to('/pemohon/dashboard');
            default:
                return redirect()->to('/login');
        }
    }

    // =====================
    // LOGOUT
    // =====================
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}