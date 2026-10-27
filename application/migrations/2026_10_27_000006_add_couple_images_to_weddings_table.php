<?php

defined('DS') or exit('No direct access.');

class Add_Couple_Images_To_Weddings_Table
{
    public function up()
    {
        Schema::table('weddings', function ($table) {
            $table->string('bride_image', 255)->nullable();
            $table->string('groom_image', 255)->nullable();
        });
    }

    public function down()
    {
        Schema::table('weddings', function ($table) {
            $table->drop_column('bride_image');
            $table->drop_column('groom_image');
        });
    }
}
