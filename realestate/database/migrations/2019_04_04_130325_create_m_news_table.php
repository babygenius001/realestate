4<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('alias');
            $table->string('title');
            $table->text('summary')->nullable();
            $table->longtext('content')->nullable();
            $table->text('description_short')->nullable();
            $table->longText('description')->nullable();
            $table->string('tag')->nullable();
            $table->integer('news_categories_id')->unsigned();
            $table->string('image')->nullable()->default('images/noimages.jpg');
            $table->string('creator')->nullable();
            $table->string('source_website')->nullable();
            $table->timestamps();
            $table->boolean('show_in_homepage')->default(1);
            $table->integer('hit')->default(0);
            $table->boolean('published')->default(1);
            $table->integer('ordering')->default(1);
            $table->text('keyword')->nullable();

            $table->string('seo_title')->nullable();
            $table->text('seo_keyword')->nullable();
            $table->longText('seo_description')->nullable();

            $table->boolean('is_new')->default(1);
            $table->boolean('is_hot')->default(1);
            $table->date('new_related')->nullable();
            $table->integer('action_id')->nullable();
            $table->foreign('news_categories_id')->references('id')->on('m_news_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_news');
    }
}
