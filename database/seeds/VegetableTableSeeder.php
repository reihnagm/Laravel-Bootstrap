<?php

use Illuminate\Database\Seeder;

class VegetableTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vegetables')->insert([
          [
              'id' => 1,
              'name' => 'kentang',
          ],
          [
              'id' => 2,
              'name' => 'wortel',
          ],
          [
              'id' => 3,
              'name' => 'bayam',
          ],
          [
              'id' => 4,
              'name' => 'cabai',
          ],
      ]);
    }
}
