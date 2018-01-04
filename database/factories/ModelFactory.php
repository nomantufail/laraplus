<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(LaraModels\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'username' => $faker->firstNameMale,
        'password' => $password ?: $password = bcrypt('secret'),
    ];
});

	/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\LaraModels\UserLogin::class, function (Faker\Generator $faker) {
    return [
        
		'user_id' => $faker->randomElement(range(1,5)),
		'session_token' => bcrypt('session'),
		'active' => 0,
		'deviceid' => bcrypt('deviceid'),
    ];
});
	//DummyFactory