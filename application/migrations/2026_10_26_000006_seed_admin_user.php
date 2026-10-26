<?php

defined('DS') or exit('No direct access.');

class Seed_Admin_User
{
    public function up()
    {
        $existing = DB::table('users')->where('email', '=', 'admin@gmail.com')->first();
        if ($existing) { return; }

        DB::table('users')->insert([
            'name' => 'Wedding Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$CIR4Rpd5YRPoRlZTjkmN0e1s6d9CnLeJni7n6iM67gD/Rvvh3xGby',
        ]);
    }

    public function down()
    {
        DB::table('users')->where('email', '=', 'admin@gmail.com')->delete();
    }
}
