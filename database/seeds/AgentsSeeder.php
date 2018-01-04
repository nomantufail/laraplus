<?php

use Illuminate\Database\Seeder;

class AgentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\LaraModels\Agent::class, 10)->create();
    }
}
