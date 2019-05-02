<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMProductsPostersCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_products_posters_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('products_posters_id')->unsigned();
            $table->integer('customers_id')->unsigned();
            $table->longText('context');
            $table->integer('ordering')->default(1);
            $table->boolean('published')->default(1);

            $table->foreign('products_posters_id')->references('id')->on('m_products_posters');
            $table->foreign('customers_id')->references('id')->on('m_customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_products_posters_comments');
    }
}
