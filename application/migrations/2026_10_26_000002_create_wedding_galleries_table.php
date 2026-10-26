<?php

defined('DS') or exit('No direct access.');

class Create_Wedding_Galleries_Table
{
    public function up()
    {
        Schema::create('wedding_galleries', function ($table) {
            $table->increments('id');
            $table->integer('wedding_id')->unsigned();
            $table->string('image_path', 255);
            $table->string('alt_text', 255);
            $table->string('caption', 255)->nullable();
            $table->integer('sort_order')->unsigned()->defaults(0);
            $table->boolean('is_visible')->defaults(true)->index();
            $table->timestamps();
            $table->index(['wedding_id', 'sort_order']);
            $table->foreign('wedding_id')->references('id')->on('weddings')->on_delete('cascade')->on_update('cascade');
        });
    }

    public function down()
    {
        Schema::drop_if_exists('wedding_galleries');
    }
}
