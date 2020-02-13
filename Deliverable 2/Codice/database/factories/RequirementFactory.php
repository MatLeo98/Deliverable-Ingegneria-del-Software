<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Requirement;
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

$factory->define(Requirement::class, function (Faker $faker) {

    return [
        'titolodistudio' => $faker->randomElement(['NULL','Middle school','Upper secondary education qualification','Upper secondary education diploma','Extra-university tertiary diploma','University diploma','Bachelors degree','Specialist degree single cycle','Specialized degree','First level university master','Second level university master','Specialization diploma','PhD title']),
        'anniesperienza' => $faker->numberBetween($min = 1, $max = 20),
        'eta' => $faker->numberBetween($min = 16, $max = 65),
        'offer_id' => $faker->numberBetween($min = 1, $max = 100),
    ];
});
