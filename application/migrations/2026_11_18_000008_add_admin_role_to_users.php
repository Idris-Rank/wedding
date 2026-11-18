<?php

defined('DS') or exit('No direct access.');

class Add_Admin_Role_To_Users
{
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->boolean('is_admin')->defaults(false)->index();
        });

        $admin = DB::table('users')->where('email', '=', 'admin@example.com')->first();
        if (!$admin) { $admin = DB::table('users')->where('email', '=', 'admin@gmail.com')->first(); }
        if ($admin) { DB::table('users')->where('id', '=', $admin->id)->update(['is_admin' => true]); }
    }

    public function down()
    {
        Schema::table('users', function ($table) {
            $table->drop_index('users_is_admin_index');
            $table->drop_column('is_admin');
        });
    }
}
