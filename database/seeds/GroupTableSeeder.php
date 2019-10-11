<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('groups')->insert([
            ['id' => 1, 'name' => 'Super Administrator'],
            ['id' => 2, 'name' => 'Administrator'],
            ['id' => 3, 'name' => 'User']
        ]);
    }
}
