<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChurchReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('church_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            
            $table->integer('district_report_id')->unsigned()->nullable();
            $table->foreign('district_report_id')->references('id')
                ->on('district_reports')->onDelete('cascade');

            $table->integer('church_id')->unsigned()->nullable();
            $table->foreign('church_id')->references('id')
                ->on('churches')->onDelete('cascade');

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
        Schema::dropIfExists('church_reports');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
