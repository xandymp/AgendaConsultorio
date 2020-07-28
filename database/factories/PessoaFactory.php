<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pessoa;
use Faker\Generator as Faker;

$factory->define(Pessoa::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'data_nascimento' => $faker->date('Y-m-d'),
        'tipo' => 0,
    ];
});
