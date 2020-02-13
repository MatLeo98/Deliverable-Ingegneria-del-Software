<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'cognome' => $faker->lastName,
        'indirizzo' => $faker->streetAddress,
        'recapito' => $faker->phoneNumber,
        'ragionesociale' => $faker->company,
        'sede' => $faker->city,
        'eta' => $faker->numberBetween($min = 16, $max = 65),
        'titolodistudio' => $faker->randomElement(['NULL','Middle school','Upper secondary education qualification','Upper secondary education diploma','Extra-university tertiary diploma','University diploma','Bachelors degree','Specialist degree single cycle','Specialized degree','First level university master','Second level university master','Specialization diploma','PhD title']),
        'corsodistudi' => $faker->randomElement(['NULL','Ingegneria Informatica', 'Scienze Informatiche','Medicina','Ingegneria Civile','Ingengeria Edile','Biotecnologie','Ingegneria Meccanica','Ingegneria Matematica','Fisica']),
        'flag' => $faker->boolean($chanceOfGettingTrue = 50),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
