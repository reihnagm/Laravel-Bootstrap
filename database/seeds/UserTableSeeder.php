<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
          [
              'id' => 1,
              'nickname' => 'superadmin',
              'fullname' => 'Super Admin',
              'email' => 'superadmin@server.com',
              'email_verified_at' => \Carbon\Carbon::now(),
              'gender' => 'm',
              'group_id' => 1,
              'password' => bcrypt('password')
          ],
          [
              'id' => 2,
              'nickname' => 'admin',
              'fullname' => 'Admin',
              'email' => 'admin@server.com',
              'email_verified_at' => \Carbon\Carbon::now(),
              'gender' => 'm',
              'group_id' => 2,
              'password' => bcrypt('password')
          ],
          [
              'id' => 3,
              'nickname' => 'john',
              'fullname' => 'John Doe',
              'email' => 'john@server.com',
              'email_verified_at' => \Carbon\Carbon::now(),
              'gender' => 'm',
              'group_id' => 3,
              'password' => bcrypt('password')
          ],
          [
              'id' => 4,
              'name' => 'ericka',
              'fullname' => 'Ericka Amanda',
              'email' => 'ericka@server.com',
              'email_verified_at' => \Carbon\Carbon::now(),
              'gender' => 'f',
              'group_id' => 3,
              'password' => bcrypt('password')
          ],
      ]);
    }
}
