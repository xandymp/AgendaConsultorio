<?php

use App\Agendamento;
use Illuminate\Database\Seeder;

class AgendamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Agendamento::class, 10)->create();
    }
}
