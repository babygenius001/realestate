<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMProductsVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_products_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('alias');
            $table->string('title');
            $table->string('video');
            $table->text('description_short')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->integer('customers_id')->unsigned();
            $table->boolean('published')->default(1);
            $table->integer('ordering')->default(1);
            $table->string('seo_title')->nullable();
            $table->text('seo_keyword')->nullable();

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
        Schema::dropIfExists('m_products_videos');
    }
}
