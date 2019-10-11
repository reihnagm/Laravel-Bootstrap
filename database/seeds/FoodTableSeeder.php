<?php

use Illuminate\Database\Seeder;

class FoodTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('foods')->insert([
          [
              'id' => 1,
              'name' => 'sup',
          ],
          [
              'id' => 2,
              'name' => 'jus wortel',
          ],
          [
              'id' => 3,
              'name' => 'sayur bayam',
          ],
          [
              'id' => 4,
              'name' => 'sayur asam',
          ],
      ]);
    }
}
