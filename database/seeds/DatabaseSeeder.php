<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // $this->call(AdminSeeder::class);
        // $this->call(RoleTableSeeder::class);
        // $this->call(MenuTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(FoodTableSeeder::class);
        $this->call(VegetableTableSeeder::class);
    }
}
