<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['menu_id'=>1, 'group_id'=>1],
            ['menu_id'=>2, 'group_id'=>1],
            ['menu_id'=>3, 'group_id'=>1],
            ['menu_id'=>4, 'group_id'=>1],
            ['menu_id'=>5, 'group_id'=>1],
            ['menu_id'=>1, 'group_id'=>2],
            ['menu_id'=>5, 'group_id'=>2],
        ]);
    }
}
