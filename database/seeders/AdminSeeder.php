<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;




class AdminSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $admin = Admin::create([
      'name' => 'ketua',
      'email' => 'ketua@kas.com',
      'password' => bcrypt('password')

    ]);
  }
}
