<?php

use App\Pessoa;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PessoasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Médicos
        DB::table('pessoas')->insert([
            'nome' => $faker->name,
            'email' => $faker->unique()->email,
            'data_nascimento' => $faker->dateTimeBetween('1960-01-01', '1995-12-31')
                ->format('Y-m-d'),
            'tipo' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('pessoas')->insert([
            'nome' => $faker->name,
            'email' => $faker->unique()->email,
            'data_nascimento' => $faker->dateTimeBetween('1960-01-01', '1995-12-31')
                ->format('Y-m-d'),
            'tipo' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('pessoas')->insert([
            'nome' => $faker->name,
            'email' => $faker->unique()->email,
            'data_nascimento' => $faker->dateTimeBetween('1960-01-01', '1995-12-31')
                ->format('Y-m-d'),
            'tipo' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // Pacientes
        factory(Pessoa::class, 10)->create();
    }
}
