<?php

use Illuminate\Support\Facades\Route;

Route::get('medicos', 'PessoaController@listarMedicos');
Route::get('medico/{medico}', 'PessoaController@mostrarMedico');
Route::post('medico', 'PessoaController@inserirMedico');
Route::put('medico/{medico}', 'PessoaController@atualizarMedico');
Route::delete('medico/{medico}', 'PessoaController@deletarMedico');
