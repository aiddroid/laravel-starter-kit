<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        //fill fake users
        $users = [
            ['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => bcrypt(123456), 'created_at' => Carbon::now()],
            ['name' => 'user', 'email' => 'user@gmail.com', 'password' => bcrypt(123456), 'created_at' => Carbon::now()],
        ];
        DB::table('users')->insert($users);
    }
}
