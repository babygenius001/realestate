<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMCustomersOrdersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_customers_orders_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('customers_orders_id');
            $table->integer('products_posters_details_id')->unsigned();
            $table->integer('quantity')->unsigned();
            
            $table->integer('ordering')->default(1);
            $table->boolean('published')->default(1);

            $table->foreign('products_posters_details_id')->references('id')->on('m_products_posters_details');
            $table->foreign('customers_orders_id')->references('order_id')->on('m_customers_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_customers_orders_details');
    }
}
