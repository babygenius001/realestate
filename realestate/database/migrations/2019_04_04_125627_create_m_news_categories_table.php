<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMNewsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_news_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('alias');
            $table->string('parent_id')->default("---");
            $table->string('list_parent')->default(0);
            $table->boolean('published')->default(1);
            $table->integer('ordering')->default(1);
            $table->text('icon')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->boolean('show_in_homepage')->default(1);
            $table->integer('action_id')->nullable();
            $table->text('description_short')->nullable();
            $table->longText('description')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_keyword')->nullable();
            $table->longText('seo_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_news_categories');
    }
}
