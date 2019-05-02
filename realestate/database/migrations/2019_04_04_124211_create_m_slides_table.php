<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_slides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('alias');
            $table->string('url')->nullable();
            $table->string('image')->default('images/noimages.jpg');
            $table->text('summary')->nullable();
            $table->text('description_short')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->boolean('published')->default(1);
            $table->integer('ordering')->default(1);
            $table->integer('slides_categories_id')->unsigned();
            $table->integer('action_id')->nullable();

            $table->foreign('slides_categories_id')->references('id')->on('m_slides_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_slides');
    }
}
