<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
       'name' => ucfirst($faker->word),
        'description' => $faker->sentence(10),
    ];
});
