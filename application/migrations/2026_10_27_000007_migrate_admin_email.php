<?php

defined('DS') or exit('No direct access.');

class Migrate_Admin_Email
{
    public function up()
    {
        $legacy = DB::table('users')->where('email', '=', 'admin@gmail.com')->first();
        $current = DB::table('users')->where('email', '=', 'admin@example.com')->first();
        if ($legacy && !$current) { DB::table('users')->where('id', '=', $legacy->id)->update(['email' => 'admin@example.com']); }
    }

    public function down()
    {
        $current = DB::table('users')->where('email', '=', 'admin@example.com')->first();
        $legacy = DB::table('users')->where('email', '=', 'admin@gmail.com')->first();
        if ($current && !$legacy) { DB::table('users')->where('id', '=', $current->id)->update(['email' => 'admin@gmail.com']); }
    }
}
