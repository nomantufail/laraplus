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
        $this->call(AgentTypesSeeder::class);
		$this->call(AgentsSeeder::class);
		$this->call(InstitutesSeeder::class);
		$this->call(CampusesSeeder::class);
		//DummySeeder
    }
}
