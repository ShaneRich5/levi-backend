<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNationalOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('national_offices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses');
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
        try{
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        } catch (\Exception $e) {

        }
        Schema::dropIfExists('national_offices');
        try{
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        } catch (\Exception $e) {

        }
    }
}
