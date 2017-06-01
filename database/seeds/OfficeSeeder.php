<?php

use App\Models\Church;
use App\Models\NationalOffice;
use App\Models\DistrictOffice;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
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
        
        DB::table('churches')->truncate();
        DB::table('district_offices')->truncate();
        DB::table('national_offices')->truncate();
        
        DB::table('church_reports')->truncate();
        DB::table('district_reports')->truncate();
        DB::table('journals')->truncate();
        
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $nationalOffice = NationalOffice::create(['name' => 'Island Office']);
    
        $districtOffice = $nationalOffice->districtOffices()->create(['name' => 'National Testament Church of God']);

        $newTestamentChurch = $districtOffice->churches()->create(['name' => 'National Testament Church of God']);
        $bethelBaptistChurch = $districtOffice->churches()->create(['name' => 'ChurchB']);

        $journal = $nationalOffice->journals()->create(['title' => 'Journal Voucher']);

        $districtReport = $journal->districtReports()->create(['title' => "District Overseer's Monthly Report Form"]);
        $districtReport->district_office_id = $districtOffice->id;
        $districtReport->save();

        $churchReportTestament = $districtReport->churchReports()->create(['title' => 'Financial Monthly BreakDown']);
        $churchReportBethel = $districtReport->churchReports()->create(['title' => 'Financial Monthly BreakDown']);

        $churchReportTestament->church_id = $newTestamentChurch->id;
        $churchReportTestament->save();

        $churchReportBethel->church_id = $bethelBaptistChurch->id;
        $churchReportBethel->save();

        $sources = ['Tithes', 'Rally', 'Pension', 'School', 'Mission'];

        foreach ($sources as $source) {
            $temp = ['name' => $source, 'amount' => 0];
            $churchReportTestament->sources()->create($temp);
            $churchReportBethel->sources()->create($temp);
        }
    }
}
