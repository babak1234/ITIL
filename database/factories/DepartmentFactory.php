<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Repositories\DepartmentRepository::class, function (Faker $faker) {
    return [
		'name'			=> 'sub_1',
		'description'	=> 'department description.',
		'user_id'		=> 1,
		'parent_id'		=> 1,
		'_lft'			=> 1,
		'_rgt'			=> 2,
    ];
});
