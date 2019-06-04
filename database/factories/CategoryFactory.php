<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'nome' => $faker->nome
    ];
});
