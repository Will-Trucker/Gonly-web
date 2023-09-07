<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = array(
			array('code' => 'US', 'name' => 'United States'),
			array('code' => 'SV', 'name' => 'El Salvador'),
		);

		DB::table('countries')->insert($countries);
    }
}
