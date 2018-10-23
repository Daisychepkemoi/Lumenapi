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

$factory->define(App\Meeting::class, function (Faker\Generator $faker) {

	$opportunityid = App\Opportunity::pluck('id')->toArray();
    return [
        'place' => $faker->name,
        'opportunity_id' => $faker->randomElement($opportunityid),
        'location' => $faker->name,
        'status' => (bool) rand(0,1),   
    ];
});
