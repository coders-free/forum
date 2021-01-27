<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin'
        ]);

        User::create([
            'name' => 'Victor Arana Flores',
            'email' => 'victor.aranaf92@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('admin');
    }
}
