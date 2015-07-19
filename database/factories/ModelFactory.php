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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'is_active' => true
    ];
});

$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->companyEmail,
        'email_notification' => $faker->boolean(),
        'sms_notification' => $faker->boolean(),
        'is_active' => true
    ];
});

$factory->define(App\Site::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->domainName,
        'url' => $faker->url,
        'is_active' => true
    ];
});

$factory->define(App\Page::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraphs(3, true),
        'is_active' => true
    ];
});

