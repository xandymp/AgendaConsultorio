<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agendamento extends Model
{
    use SoftDeletes;

    protected $table = 'agendamentos';

    protected $fillable = [
        'data_consulta',
        'observacoes',
    ];

    public function paciente()
    {
        return $this->belongsTo('App\Pessoa', 'paciente_id');
    }

    public function medico()
    {
        return $this->belongsTo('App\Pessoa', 'medico_id');
    }
}
