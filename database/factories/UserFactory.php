<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Repositories\UserRepository;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(UserRepository::class, function (Faker $faker) {
	return [
		'first_name'		=> $faker->name,
		'last_name'			=> $faker->lastName,
		'user_name'			=> $faker->unique()->userName,
		'email'				=> $faker->unique()->safeEmail,
		'email_verified_at'	=> now(),
		'cellphone'			=> $faker->phoneNumber,
		'department_id'		=> 1,
		'birth_date'		=> now(),
		'language'			=> 'fa',
		'calendar_type'		=> 1,
		'company'			=> $faker->name,
		'password'			=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
		'remember_token'	=> Str::random(10),
	];
});
