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
            'name' => 'Claudio Saavedra',
            'email' => 'claudio.saavedra@customertrigger.com',
            'password' => bcrypt('p3s1c$811')
        ])->assignRole('admin');
    }
}
