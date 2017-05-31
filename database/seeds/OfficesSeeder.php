<?php

use App\Models\Church;
use App\Models\NationalOffice;
use App\Models\DistrictOffice;
use Illuminate\Database\Seeder;

class OfficesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

		//disable foreign key check for this connection before running seeders
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
			
        DB::table('national_offices')->truncate();
        DB::table('district_offices')->truncate();
        DB::table('churches')->truncate();

		// supposed to only apply to a single connection and reset it's self
		// but I like to explicitly undo what I've done for clarity
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $baptistUnion = NationalOffice::create(['name' => 'Baptist Union National Office']);
    
        $newTestamentDistrict = $baptistUnion->districtOffices()->create(['name' => 'National Testament Church of God']);


        $newTestamentChurch = $newTestamentDistrict->churches()->create(['name' => 'National Testament Church of God']);
        $bethelBaptistChurch = $newTestamentDistrict->churches()->create(['name' => 'Bethel Baptist Church']);
    }
}
