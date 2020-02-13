<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Offer;
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

$factory->define(Offer::class, function (Faker $faker) {

    return [
        'titolo' => $faker->jobTitle ,
        'descrizione' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'categoria' => $faker->randomElement(['Medicinal field', 'Informatic field', 'Mathematical field', 'Scientific field']),
        'stipendio' => $faker->randomElement(['1000','1250','1500','1750','2000','2250','2500','2750','3000','3250','3500','3750','4000','4250','4500','4750','5000']),
        'tipocontratto' => $faker->randomElement(['Full-time','Part-time','Temporary','Freelance','Internship']),
        'luogo' => $faker->city,
        'email' => $faker->unique()->safeEmail,
    ];
});
