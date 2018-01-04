<?php

use Illuminate\Database\Seeder;

class CampusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\LaraModels\Campus::class, 10)->create();
    }
}
