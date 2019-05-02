<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMSlidesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_slides_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('alias');
            $table->boolean('published')->default(1);
            $table->integer('ordering')->default(0);
            $table->timestamps();
            $table->string('width')->default('100%');
            $table->string('height')->default('600px');
            $table->string('width_small')->default('80%');
            $table->string('height_small')->default('400px');
            $table->text('description_short')->nullable();
            $table->longText('description')->nullable();
            $table->integer('action_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_slides_categories');
    }
}
