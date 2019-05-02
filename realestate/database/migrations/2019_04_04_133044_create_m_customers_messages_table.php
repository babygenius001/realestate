<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMCustomersMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_customers_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('customers_id_send')->unsigned();
            $table->integer('custommer_id_receive')->unsigned();
            $table->longText('context');
            $table->string('image')->default('images/noimages.jpg');
            $table->string('status')->default('send');
            // status: send - sent - receive - received - error
            $table->integer('ordering')->default(1);
            $table->boolean('published')->default(1);

            $table->foreign('customers_id_send')->references('id')->on('m_customers');
            $table->foreign('custommer_id_receive')->references('id')->on('m_customers');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_customers_messages');
    }
}
