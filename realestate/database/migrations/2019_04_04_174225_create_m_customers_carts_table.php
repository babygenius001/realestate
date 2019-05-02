<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMCustomersCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_customers_carts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('customers_id')->unsigned();
            $table->integer('products_posters_details_id')->unsigned();
            $table->integer('quantity')->unsigned()->default(1);

            $table->foreign('customers_id')->references('id')->on('m_customers');
            $table->foreign('products_posters_details_id')->references('id')->on('m_products_posters_details');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_customers_carts');
    }
}
