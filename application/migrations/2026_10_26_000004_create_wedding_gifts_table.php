<?php

defined('DS') or exit('No direct access.');

class Create_Wedding_Gifts_Table
{
    public function up()
    {
        Schema::create('wedding_gifts', function ($table) {
            $table->increments('id');
            $table->integer('wedding_id')->unsigned();
            $table->string('provider', 50);
            $table->string('account_name', 150)->nullable();
            $table->string('account_number', 100);
            $table->integer('sort_order')->unsigned()->defaults(0);
            $table->boolean('is_visible')->defaults(true)->index();
            $table->timestamps();
            $table->index(['wedding_id', 'sort_order']);
            $table->foreign('wedding_id')->references('id')->on('weddings')->on_delete('cascade')->on_update('cascade');
        });
    }

    public function down()
    {
        Schema::drop_if_exists('wedding_gifts');
    }
}
