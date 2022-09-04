<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;




class KelasSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $list_xii = ['BDP1', 'BDP2', 'OTKP1', 'OTKP2', 'RPL', 'AKL1', 'AKL2'];
    $list_xi = ['BDP1', 'BDP2', 'OTKP1', 'OTKP2', 'RPL', 'AKL1', 'AKL2'];
    $list_x = ['BDP1', 'BDP2', 'OTKP1', 'OTKP2', 'RPL1', 'RPL2', 'AKL1', 'AKL2'];
    foreach ($list_xii as $class)
      $kelasxii = kelas::create([
        'kelas' => 'XII-' . $class,
        'slug' => 'XII-' . $class

      ]);

    foreach ($list_xi as $class)
      $kelasxii = kelas::create([
        'kelas' => 'XI-' . $class,
        'slug' => 'XI-' . $class

      ]);

    foreach ($list_x as $class)
      $kelasxii = kelas::create([
        'kelas' => 'X-' . $class,
        'slug' => 'X-' . $class

      ]);
  }
}
