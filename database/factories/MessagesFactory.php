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

$factory->define(App\Messages::class, function (Faker\Generator $faker) {
	$name=App\User::pluck('name')->toArray();
    return [
        'type' => $faker->text,
        'subject' => $faker->sentence(10),
        'body' => $faker->sentence(20),
        'recipient' => $faker->randomElement($name),
        'sender' => $faker->randomElement($name),
        
    ];
});
