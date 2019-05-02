<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->unique();
            $table->string('alias')->nullable();

            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->string('depth')->nullable();
            $table->string('weight')->nullable();

            $table->date('new_related')->nullable();
            $table->boolean('is_new')->default(1);
            $table->boolean('is_hot')->default(1);

            $table->string('tag')->nullable();
            $table->text('keyword')->nullable();

            $table->string('image')->default('images/noimages.jpg');

            $table->integer('products_types_id')->unsigned();
            $table->integer('products_brands_id')->unsigned();
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

            $table->foreign('products_types_id')->references('id')->on('m_products_types');
            $table->foreign('products_brands_id')->references('id')->on('m_products_brands');
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
        Schema::dropIfExists('m_products');
    }
}
