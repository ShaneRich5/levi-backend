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
            $table->integer('opening_fund')->default(0);

            $table->integer('journal_id')
                ->unsigned()->nullable();
            $table->foreign('journal_id')->references('id')
                ->on('journals')->onDelete('cascade');

            $table->integer('district_office_id')
                ->unsigned()->nullable();
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
        Schema::dropIfExists('district_reports');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
