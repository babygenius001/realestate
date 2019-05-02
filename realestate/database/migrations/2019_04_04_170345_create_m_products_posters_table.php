<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMProductsPostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_products_posters', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('alias');

            $table->string('title');
            $table->text('summary')->nullable();
            $table->longtext('content')->nullable();

            $table->date('new_related')->nullable();
            $table->boolean('is_new')->default(1);
            $table->boolean('is_hot')->default(1);

            $table->string('tag')->nullable();
            $table->text('keyword')->nullable();

            $table->string('image')->nullable();
            
            $table->integer('products_id')->unsigned();
            $table->integer('products_videos_id')->unsigned();
            $table->integer('customers_id')->unsigned();

            $table->text('description_short')->nullable();
            $table->longText('description')->nullable();

            $table->integer('ordering')->default(1);
            $table->boolean('published')->default(1);

            $table->string('seo_title')->nullable();
            $table->text('seo_keyword')->nullable();
            $table->longText('seo_description')->nullable();

            $table->boolean('checking')->default(0);
            $table->integer('action_id')->default(0);

            $table->foreign('products_id')->references('id')->on('m_products');
            $table->foreign('products_videos_id')->references('id')->on('m_products_videos');
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
        Schema::dropIfExists('m_products_posters');
    }
}
