<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'lord gopung',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ],
            [
                'name' => 'man that operate',
                'username' => 'operator',
                'password' => bcrypt('operator'),
                'role' => 'operator',
            ],
            [
                'name' => 'mr smol',
                'username' => 'staff',
                'password' => bcrypt('staff'),
                'role' => 'staff',
            ]
        ];

        foreach($userData as $key => $val){
            ModelsUser::create($val);
        }
    }
}
