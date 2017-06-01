<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street');
            $table->string('parish');
            $table->string('country');
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
        } catch (\Exception $e) {}
        Schema::dropIfExists('addresses');
        try{
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        } catch (\Exception $e) {

        }
    }
}
