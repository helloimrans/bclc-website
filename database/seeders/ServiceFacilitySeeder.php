<?php

namespace Database\Seeders;

use Database\Factories\ServiceFacilityFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceFacilityFactory::factory(10)->create();
    }
}
