<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'role_id' => '1',
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'phone' => '8801719738512',
                'username'=> '8801719738512',
                'password' => bcrypt('pass@admin'),
            ],
            [
                'role_id' => '2',
                'name' => 'User',
                'email' => 'user@gmail.com',
                'phone' => '8801977451259',
                'username' => '8801977451259',
                'password' => bcrypt('pass@user'),
            ],
            [
                'role_id' => '3',
                'name' => 'Seller',
                'email' => 'seller@gmail.com',
                'phone' => '8801687451259',
                'username' => '8801687451259',
                'password' => bcrypt('pass@seller'),
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
