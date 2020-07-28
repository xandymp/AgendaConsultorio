<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Agendamento;
use Faker\Generator as Faker;

$factory->define(Agendamento::class, function (Faker $faker) {
    return [
        'medico_id' => rand(1, 3),
        'paciente_id' => rand(4, 13),
        'data_consulta' => $faker->dateTimeBetween('now', '+6 months'),
        'Observacoes' => $faker->paragraph,
    ];
});
