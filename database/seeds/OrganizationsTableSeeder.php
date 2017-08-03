<?php

use App\Models\Church;
use App\Models\DistrictOffice;
use App\Models\NationalOffice;
use App\Models\Address;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $organizationA = Organization::create(['name' => 'Emmanuel Apostolic Church']);
        $organizationB = Organization::create(['name' => 'Holy Cross Catholic Church  ']);
        $organizationC = Organization::create(['name' => 'Church of God (7th Day)']);
        $organizationD = Organization::create(['name' => 'Jamaica Baptist Union']);
        $organizationE = Organization::create(['name' => 'St. Matthew’s Anglican Church']);

        $organizationA->address()->create(['street' => '12 Slipe Road', 'parish' => 'Kingston', 'country'=> 'Jamaica']);
        $organizationB->address()->create(['street' => '77 Half Way Tree Road', 'parish' => 'Kingston', 'country'=> 'Jamaica']);
        $organizationC->address()->create(['street' => '58 Maxfield Ave', 'parish' => 'Kingston', 'country'=> 'Jamaica']);
        $organizationD->address()->create(['street' => '2B Washington Blvd', 'parish' => 'Kingston', 'country'=> 'Jamaica']);
        $organizationE->address()->create(['street' => 'Hitchen St', 'parish' => 'Kingston', 'country'=> 'Jamaica']);

        $nationalOffice = new NationalOffice;

        $churchA = new Church;
        $churchB = new Church;
        $churchC = new Church;
        $churchD = new Church;

        $districtOfficeA = new DistrictOffice;
        $districtOfficeB = new DistrictOffice;

        $organizationA->church()->save($churchA);

        $organizationB->church()->save($churchB);
        $organizationB->districtOffice()->save($districtOfficeA);
        $organizationC->church()->save($churchC);
        $organizationD->nationalOffice()->save($nationalOffice);
        $organizationE->church()->save($churchD);
        $organizationE->districtOffice()->save($districtOfficeB);

        $districtOfficeA->churches()->saveMany([$churchA, $churchB]);
        $districtOfficeB->churches()->saveMany([$churchC, $churchD]);

        $nationalOffice->districtOffices()->save($districtOfficeA);
        $nationalOffice->districtOffices()->save($districtOfficeB);

        // $districtOffices = [$districtOfficeA, $districtOfficeB];
        // $churches = [$churchA, $churchB, $churchC, $churchD];
    }
}
