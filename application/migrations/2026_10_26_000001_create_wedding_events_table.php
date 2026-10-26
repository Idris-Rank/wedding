<?php

defined('DS') or exit('No direct access.');

class Create_Wedding_Events_Table
{
    public function up()
    {
        Schema::create('wedding_events', function ($table) {
            $table->increments('id');
            $table->integer('wedding_id')->unsigned();
            $table->string('event_type', 30);
            $table->string('title', 100);
            $table->date('event_date');
            $table->string('start_time', 8);
            $table->string('end_time', 8)->nullable();
            $table->string('venue', 180);
            $table->string('address', 255)->nullable();
            $table->string('maps_url', 500)->nullable();
            $table->integer('sort_order')->unsigned()->defaults(0);
            $table->timestamps();
            $table->index(['wedding_id', 'sort_order']);
            $table->foreign('wedding_id')->references('id')->on('weddings')->on_delete('cascade')->on_update('cascade');
        });
    }

    public function down()
    {
        Schema::drop_if_exists('wedding_events');
    }
}
