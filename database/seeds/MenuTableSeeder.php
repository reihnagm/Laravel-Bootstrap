<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    public function run()
    {
      DB::table('menus')->insert([
          ['id'=>1, 'title'=>'KONFIGURASI', 'icon'=>'settings', 'parent'=>0, 'url'=>'#', 'order'=>0],
          ['id'=>2, 'title'=>'Menu', 'icon'=>'menu', 'parent'=>1, 'url'=>'menu', 'order'=>1],
          ['id'=>3, 'title'=>'Grup', 'icon'=>'group', 'parent'=>1, 'url'=>'group', 'order'=>2],
          ['id'=>4, 'title'=>'User', 'icon'=>'person', 'parent'=>1, 'url'=>'user', 'order'=>3],
          ['id'=>5, 'title'=>'Setting', 'icon'=>'settings', 'parent'=>1, 'url'=>'setting', 'order'=>4],
      ]);
    }
}
