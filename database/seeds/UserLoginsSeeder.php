<?php

use Illuminate\Database\Seeder;

class UserLoginsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\LaraModels\UserLogin::class, 10)->create();
    }
}
