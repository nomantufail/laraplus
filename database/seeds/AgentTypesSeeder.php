<?php

use Illuminate\Database\Seeder;

class AgentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LaraModels\AgentType::class, 10)->create();
    }
}
