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

$factory->define(App\Opportunity::class, function (Faker\Generator $faker) {
    return [
        'contact' => $faker->name,
        'sales_executive' => $faker->name,
        'status' => $faker->text,
        'description' => $faker->paragraph(1,true),
        'value' => (bool) rand(0,1),
        'meetings' => $faker->paragraph(1,true),


        
    ];
});
