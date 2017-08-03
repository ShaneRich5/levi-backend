<?php

use App\Models\Church;
use App\Models\DistrictOffice;
use App\Models\NationalOffice;
use App\Models\Address;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder {

	/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		$organization1 = Organization::create(['name' => 'Clifton']);
        $organization2 = Organization::create(['name' => 'Waltham Park']);
        $organization3 = Organization::create(['name' => 'Eastwood Park']);
        $organization4 = Organization::create(['name' => 'Mountain View']);
        $organization5 = Organization::create(['name' => 'Escarpment Road']);
        $organization6 = Organization::create(['name' => 'Temple Hall']);
        $organization7 = Organization::create(['name' => 'Duhaney Park']);
        $organization8 = Organization::create(['name' => 'Beeston Street']);
        $organization9 = Organization::create(['name' => 'Parks Road']);
        $organization10 = Organization::create(['name' => 'Kintyre']);
        $organization11 = Organization::create(['name' => 'Mc Donald Lane']);
        $organization12 = Organization::create(['name' => 'Franklin Town']);
        $organization13 = Organization::create(['name' => 'Habour View']);
        $organization14 = Organization::create(['name' => 'Bull Bay']);
        $organization15 = Organization::create(['name' => 'Rouseau Road']);

        $organization1->address()->create(['street' => 'Clifton', 'parish' => 'Kingston', 'country'=> 'Jamaica']);
        $organization2->address()->create(['street' => 'Waltham Park', 'parish' => 'Kingston', 'country'=> 'Jamaica']);
        $organization3->address()->create(['street' => 'Eastwood Park', 'parish' => 'Kingston', 'country'=> 'Jamaica']);
        $organization4->address()->create(['street' => 'Mountain View', 'parish' => 'Kingston', 'country'=> 'Jamaica']);
        $organization5->address()->create(['street' => 'Escarpment Road', 'parish' => 'Kingston', 'country'=> 'Jamaica']);
        $organization6->address()->create(['street' => 'Temple Hall', 'parish' => 'Kingston', 'country'=> 'Jamaica']);
        $organization7->address()->create(['street' => 'Duhaney Park', 'parish' => 'Kingston', 'country'=> 'Jamaica']);
        $organization8->address()->create(['street' => 'Beeston Street', 'parish' => 'Kingston', 'country'=> 'Jamaica']);
        $organization9->address()->create(['street' => 'Parks Road', 'parish' => 'Kingston', 'country'=> 'Jamaica']);
        $organization10->address()->create(['street' => 'Kintyre', 'parish' => 'Kingston', 'country'=> 'Jamaica']);
        $organization11->address()->create(['street' => 'Mc Donald Lane', 'parish' => 'Kingston', 'country'=> 'Jamaica']);
        $organization12->address()->create(['street' => 'Franklin Town', 'parish' => 'Kingston', 'country'=> 'Jamaica']);
        $organization13->address()->create(['street' => 'Habour View', 'parish' => 'Kingston', 'country'=> 'Jamaica']);
        $organization14->address()->create(['street' => 'Bull Bay', 'parish' => 'Kingston', 'country'=> 'Jamaica']);
        $organization15->address()->create(['street' => 'Rouseau Road', 'parish' => 'Kingston', 'country'=> 'Jamaica']);

        $organization16 = Organization::create(['name' => 'District Office A']);
        $organization16->address()->create(['street' => 'Placeholder A', 'parish' => 'Kingston', 'country'=> 'Jamaica']);

        $organization17 = Organization::create(['name' => 'National Office A']);
        $organization17->address()->create(['street' => 'Placeholder B', 'parish' => 'Kingston', 'country'=> 'Jamaica']);

		$church1 = new Church;
		$church2 = new Church;
		$church3 = new Church;
		$church4 = new Church;
		$church5 = new Church;
		$church6 = new Church;
		$church7 = new Church;
		$church8 = new Church;
		$church9 = new Church;
		$church10 = new Church;
		$church11 = new Church;
		$church12 = new Church;
		$church13 = new Church;
		$church14 = new Church;
		$church15 = new Church;

		$districtOffice1 = new DistrictOffice;

		$nationalOffice1 = new NationalOffice;

		$organization1->church()->save($church1);
		$organization2->church()->save($church2);
		$organization3->church()->save($church3);
		$organization4->church()->save($church4);
		$organization5->church()->save($church5);
		$organization6->church()->save($church6);
		$organization7->church()->save($church7);
		$organization8->church()->save($church8);
		$organization9->church()->save($church9);
		$organization10->church()->save($church10);
		$organization11->church()->save($church11);
		$organization12->church()->save($church12);
		$organization13->church()->save($church13);
		$organization14->church()->save($church14);
		$organization15->church()->save($church15);

		$organization16->districtOffice()->save($districtOffice1);

		$organization17->nationalOffice()->save($nationalOffice1);

		$nationalOffice1->districtOffices()->save($districtOffice1);
		$districtOffice1->churches()->saveMany([$districtOffice1, $districtOffice2, $districtOffice3, $districtOffice4, $districtOffice5,
			$districtOffice6, $districtOffice7, $districtOffice8, $districtOffice9, $districtOffice10, $districtOffice11,
			$districtOffice12, $districtOffice13, $districtOffice14, $districtOffice15]);
	}
}