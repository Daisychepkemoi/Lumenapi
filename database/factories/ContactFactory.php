<?php




$factory->define(App\Contact::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'company' => $faker->company,
        'title' => $faker->title,
        'notes' => $faker->text,
        'meetings' => $faker->paragraph(1,true),
        'opportunities' => $faker->sentence(10),
        'prefered_notification_method' => $faker->sentence(10),
        
    ];
});
