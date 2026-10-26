<?php

defined('DS') or exit('No direct access.');

class Create_Weddings_Table
{
    public function up()
    {
        Schema::create('weddings', function ($table) {
            $table->increments('id');
            $table->string('slug', 120)->unique();
            $table->string('groom_name', 150);
            $table->string('bride_name', 150);
            $table->string('groom_parents', 255)->nullable();
            $table->string('bride_parents', 255)->nullable();
            $table->text('quote')->nullable();
            $table->string('quote_source', 100)->nullable();
            $table->string('hero_image', 255)->nullable();
            $table->string('audio_path', 255)->nullable();
            $table->string('whatsapp', 30)->nullable();
            $table->boolean('is_active')->defaults(true)->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop_if_exists('weddings');
    }
}
