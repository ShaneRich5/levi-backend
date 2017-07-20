<?php

use App\Models\IndicatorType;
use Illuminate\Database\Seeder;

class IndicatorTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IndicatorType::create(['name' => 'expense']);
        IndicatorType::create(['name' => 'source']);
    }
}
