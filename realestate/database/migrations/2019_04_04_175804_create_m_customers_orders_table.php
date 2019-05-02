<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMCustomersOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_customers_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id')->unique();
            $table->timestamps();
            $table->integer('customers_id')->unsigned();
            $table->integer('customers_addresses_id')->unsigned();
            $table->string('tel');
            $table->text('note')->nullable();

            $table->integer('ordering')->default(1);
            $table->boolean('published')->default(1);

            $table->string('checking')->default('request'); //request -> accept -> shipping -> received

            $table->foreign('customers_id')->references('id')->on('m_customers');
            $table->foreign('customers_addresses_id')->references('id')->on('m_customers_addresses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_customers_orders');
    }
}
