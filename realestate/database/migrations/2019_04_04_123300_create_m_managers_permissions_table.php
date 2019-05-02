<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMManagersPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_managers_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('managers_id')->unsigned();
            $table->integer('permissions_id')->unsigned();
            $table->boolean('check_action')->default('1');

            $table->foreign('managers_id')->references('id')->on('m_managers');
            $table->foreign('permissions_id')->references('id')->on('m_permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_managers_permissions');
    }
}
