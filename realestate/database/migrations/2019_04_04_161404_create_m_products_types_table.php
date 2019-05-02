<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMProductsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_products_types', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('alias');
            $table->integer('products_categories_id')->unsigned();
            $table->string('image')->nullable()->default('images/noimages.jpg');
            $table->text('icon')->nullable();

            $table->boolean('published')->default(1);
            $table->integer('ordering')->default(1);
            
            $table->text('description_short')->nullable();
            $table->longText('description')->nullable();

            $table->foreign('products_categories_id')->references('id')->on('m_products_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_products_types');
    }
}
