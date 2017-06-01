<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');

            $table->integer('journal_id')
                ->unsigned()->nullable();
            $table->foreign('journal_id')
                ->references('id')->on('journals');

            $table->integer('district_office_id')
                ->unsigned()->nullable();
            $table->foreign('district_office_id')
                ->references('id')->on('district_offices');

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
        Schema::dropIfExists('district_reports');
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        } catch (\Exception $e) {

        }
    }
}
