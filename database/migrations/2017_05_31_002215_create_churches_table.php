<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChurchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('churches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')
                ->on('addresses')->onDelete('cascade');

            $table->integer('district_office_id')->unsigned()->nullable();
            $table->foreign('district_office_id')->references('id')
                ->on('district_offices')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('churches');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
