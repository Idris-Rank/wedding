<?php

defined('DS') or exit('No direct access.');

class Create_Wedding_Rsvps_Table
{
    public function up()
    {
        Schema::create('wedding_rsvps', function ($table) {
            $table->increments('id');
            $table->integer('wedding_id');
            $table->string('guest_name', 150);
            $table->string('phone', 30)->nullable();
            $table->enum('attendance', ['yes', 'no', 'maybe'])->defaults('maybe')->index();
            $table->smallinteger('guest_count')->unsigned()->defaults(1);
            $table->text('message')->nullable();
            $table->timestamps();
            $table->index(['wedding_id', 'created_at']);
            $table->foreign('wedding_id')->references('id')->on('weddings')->on_delete('cascade')->on_update('cascade');
        });
    }

    public function down()
    {
        Schema::drop_if_exists('wedding_rsvps');
    }
}
