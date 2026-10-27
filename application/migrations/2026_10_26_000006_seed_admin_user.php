<?php

defined('DS') or exit('No direct access.');

class Seed_Admin_User
{
    public function up()
    {
        $existing = DB::table('users')->where('email', '=', 'admin@gmail.com')->first();
        if ($existing) { return; }

        // Tidak ada password default yang bisa dipakai: seed meng-hash password
        // acak, dan kredensial aktif didapat lewat 'php rakit adminpassword'.
        DB::table('users')->insert([
            'name' => 'Wedding Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(Str::random(16)),
        ]);
    }

    public function down()
    {
        DB::table('users')->where('email', '=', 'admin@gmail.com')->delete();
    }
}
