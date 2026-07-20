<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'nama'     => 'Admin PPAT',
                'email'    => 'admin@sipema.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role'     => 'admin',
                'no_hp'    => '081200000001',
            ],
            [
                'nama'     => 'Staff PPAT',
                'email'    => 'staff@sipema.com',
                'password' => password_hash('staff123', PASSWORD_DEFAULT),
                'role'     => 'staff',
                'no_hp'    => '081200000002',
            ],
            [
                'nama'     => 'Eliana, S.H., M.Kn',
                'email'    => 'notaris@sipema.com',
                'password' => password_hash('notaris123', PASSWORD_DEFAULT),
                'role'     => 'notaris',
                'no_hp'    => '081200000003',
            ],
            [
                'nama'     => 'Pak Budi',
                'email'    => 'pemohon@sipema.com',
                'password' => password_hash('pemohon123', PASSWORD_DEFAULT),
                'role'     => 'pemohon',
                'no_hp'    => '081234567893',
            ],
        ];

        foreach ($users as $user) {
            // Anti-duplikat: lewati kalau email sudah terdaftar
            $ada = $this->db->table('users')->where('email', $user['email'])->countAllResults();
            if ($ada == 0) {
                $user['created_at'] = date('Y-m-d H:i:s');
                $this->db->table('users')->insert($user);
            }
        }
    }
}