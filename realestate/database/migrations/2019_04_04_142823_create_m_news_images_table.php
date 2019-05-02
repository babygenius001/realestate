<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMNewsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_news_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->integer('news_images_groups_id')->unsigned();
            $table->string('image')->default('images/noimages.jpg');
            $table->integer('ordering')->default(1);
            $table->boolean('published')->default(1);

            $table->foreign('news_images_groups_id')->references('id')->on('m_news_images_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_news_images');
    }
}
