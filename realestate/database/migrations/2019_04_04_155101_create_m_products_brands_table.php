<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMProductsBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_products_brands', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('alias')->nullable();
            $table->string('abbreviation')->nullable();
            $table->string('url')->nullable();
            $table->string('image')->nullable()->default('images/noimages.jpg');
            $table->string('icon')->nullable()->default('images/noimages.jpg');
            $table->text('description_short')->nullable();
            $table->longText('description')->nullable();
            $table->text('keyword')->nullable();
            $table->boolean('published')->default(1);
            $table->integer('ordering')->default(1);
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
        Schema::dropIfExists('m_products_brands');
    }
}
