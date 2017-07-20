<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicatorIndicatorTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicator_indicator_types', function (Blueprint $table) {
            $table->integer('indicator_id')->unsigned()->index();
            $table->foreign('indicator_id')->references('id')->on('indicators')->onDelete('cascade');
            $table->integer('indicator_type_id')->unsigned()->index();
            $table->foreign('indicator_type_id')->references('id')->on('indicator_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicator_indicator_types');
    }
}
