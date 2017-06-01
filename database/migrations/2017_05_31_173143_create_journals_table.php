<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('national_office_id')
                ->unsigned()->nullable();
            $table->foreign('national_office_id')
                ->references('id')->on('national_offices');
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
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        } catch (\Exception $e) {

        }
        Schema::dropIfExists('journals');
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        } catch (\Exception $e) {

        }
    }
}
