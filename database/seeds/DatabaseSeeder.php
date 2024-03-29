<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SentinelDatabaseSeeder::class);
        $this->call(SampleDataTableSeeder::class);
        // $this->call(OrganizationsTableSeeder::class);
        // $this->call(IndicatorTypesTableSeeder::class);
    }
}
