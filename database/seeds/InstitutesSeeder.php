<?php

use Illuminate\Database\Seeder;

class InstitutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\LaraModels\Institute::class, 10)->create();
    }
}
