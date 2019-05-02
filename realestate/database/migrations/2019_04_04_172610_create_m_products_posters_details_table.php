<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMProductsPostersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_products_posters_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('alias')->nullable();
            $table->integer('products_posters_id')->unsigned();
            $table->integer('products_colours_id')->unsigned();
            $table->string('manufactories')->nullable();
            
            $table->string('quality')->default('New 100%');
            $table->integer('storage')->unsigned()->default(1);
            $table->integer('price')->unsigned();
            $table->integer('max_buying')->unsigned()->default(1);

            $table->text('description_short')->nullable();
            $table->longText('description')->nullable();

            $table->integer('ordering')->default(1);
            $table->boolean('published')->default(1);

            $table->string('seo_title')->nullable();
            $table->text('seo_keyword')->nullable();
            $table->longText('seo_description')->nullable();
            
            $table->foreign('products_posters_id')->references('id')->on('m_products_posters');
            $table->foreign('products_colours_id')->references('id')->on('m_products_colours');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_products_posters_details');
    }
}
