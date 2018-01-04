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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(LaraModels\AgentType::class, function (Faker\Generator $faker) {
    return [
        'agent_type' => $faker->jobTitle
    ];
});

	/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\LaraModels\Agent::class, function (Faker\Generator $faker) {
    return [
		'agent_type_id' => $faker->randomElement(range(1,5))
    ];
});
	/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\LaraModels\Institute::class, function (Faker\Generator $faker) {
    return [
		'name' => $faker->catchPhrase,
		'head_office_addr' => $faker->address
    ];
});
	/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\LaraModels\Campus::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'institute_id' => $faker->randomElement(range(1,5)),
		'address' => $faker->address,
		'type' => $faker->sentence(),
    ];
});
	//DummyFactory