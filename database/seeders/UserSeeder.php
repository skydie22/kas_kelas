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
        $ketua_kelas = User::create([
            'name' => 'ketua',
            'email' => 'ketua@kas.com',
            'password' => bcrypt('password')

        ]);

        // $pengurus_sekolah = User::create([
        //     'name' => 'admin',
        //     'email' => 'pengurus_sekolah@kas.com',
        //     'password' => bcrypt('password')

        // ]);

        $bendahara = User::create([
            'name' => 'bendahara',
            'email' => 'bendahara@kas.com',
            'password' => bcrypt('password')

        ]);

        // $permission = Permission::create(['name' => 'edit articles']);
        $role_ketua = Role::findByName('ketua');
        $role_bendahara = Role::findByName('bendahara');
        // $role_pengurusSekolah = Role::findByName('pengurus_sekolah');

        $ketua_kelas->assignRole($role_ketua);

        $bendahara->assignRole($role_bendahara);
        // $pengurus_sekolah->assignRole($role_pengurusSekolah);
    }
}
