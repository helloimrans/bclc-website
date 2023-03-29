<?php

namespace Database\Seeders;

use Database\Factories\OfficeFunctionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeFunctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OfficeFunctionFactory::factory(10)->create();
    }
}
