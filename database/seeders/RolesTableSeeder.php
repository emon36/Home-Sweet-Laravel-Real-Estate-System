<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $role = [

            [
                'role_name' => 'Admin',
                'slug' => 'admin',
            ],
            [
                'role_name' => 'Customer',
                'slug' => 'customer',
            ],
            [
                'role_name' => 'Seller',
                'slug' => 'seller',
            ]
    ];

        foreach ($role as $key => $value) {
            Role::create($value);
        }
    }
}
