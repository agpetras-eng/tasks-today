<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = [
            'username'   => 'agpetras29',
            'full_name'  => 'Aris Matthew Petras',
            'email'      => 'agpetras@fit.edu.ph',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Empty the table first so there is always exactly one demo user
        $this->db->table('users')->truncate();
        $this->db->table('users')->insert($user);
    }
}
