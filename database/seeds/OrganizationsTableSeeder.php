<?php

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
        $churchA = Organization::create(['name' => 'Emmanuel Apostolic Church']);
        $churchB = Organization::create(['name' => 'Holy Cross Catholic Church  ']);
        $churchC = Organization::create(['name' => 'Church of God (7th Day)']);
        $churchD = Organization::create(['name' => 'Jamaica Baptist Union']);
        $churchE = Organization::create(['name' => 'St. Matthew’s Anglican Church']);

        $churchA->address()->save(Address::create(['street' => '12 Slipe Road', 'parish' => 'Kingston', 'country'=> 'Jamaica']));
        $churchB->address()->save(Address::create(['street' => '77 Half Way Tree Road', 'parish' => 'Kingston', 'country'=> 'Jamaica']));
        $churchC->address()->save(Address::create(['street' => '58 Maxfield Ave', 'parish' => 'Kingston', 'country'=> 'Jamaica']));
        $churchD->address()->save(Address::create(['street' => '2B Washington Blvd', 'parish' => 'Kingston', 'country'=> 'Jamaica']));
        $churchE->address()->save(Address::create(['street' => 'Hitchen St', 'parish' => 'Kingston', 'country'=> 'Jamaica']));

        $churchA->types()->attach([1]);
        $churchB->types()->attach([1, 2]);
        $churchC->types()->attach([1]);
        $churchD->types()->attach([3]);
        $churchE->types()->attach([1, 2]);

    }
}
