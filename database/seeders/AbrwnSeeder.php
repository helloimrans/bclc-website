<?php

namespace Database\Seeders;

use App\Models\Abrwn;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbrwnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Abrwn::factory(1)->create();
    }
}
