<?php

use App\Models\OrganizationType;
use Illuminate\Database\Seeder;

class OrganizationTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $church = OrganizationType::create(['name' => 'church']);
        $districtOffice = OrganizationType::create(['name' => 'district office']);
        $nationalOffice = OrganizationType::create(['name' => 'national office']);
    }
}
