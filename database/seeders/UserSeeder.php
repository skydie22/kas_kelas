<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;




class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminx = User::create([
            'name' => 'admin',
            'email' => 'admin@kas.com',
            'password' => bcrypt('password')

        ]);

        $bendahara = User::create([
            'name' => 'bendahara',
            'email' => 'bendahara@kas.com',
            'password' => bcrypt('password')

        ]);

        // $permission = Permission::create(['name' => 'edit articles']);
        $role_ketu = Role::findByName('ketua');
        $role_bendahara = Role::findByName('bendahara');

        $adminx->assignRole($role_ketu);

        $bendahara->assignRole($role_bendahara);
    }
}
