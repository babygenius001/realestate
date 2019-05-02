<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_menu_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('alias');
            $table->string('image')->default('images/noimages.jpg');
            $table->string('link')->nullable();
            $table->string('parent_id')->default(0);
            $table->string('list_parent')->default(0);
            $table->string('target')->default('_blank');
            $table->integer('menu_groups_id')->unsigned();
            $table->integer('ordering')->default(1);            
            $table->boolean('published')->default(1);
            $table->timestamps();
            $table->integer('level')->default(0);
            $table->longText('description')->nullable();
            $table->text('description_short')->nullable();
           

            $table->foreign('menu_groups_id')->references('id')->on('m_menu_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_menu_items');
    }
}
