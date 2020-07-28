@extends('layouts.logged')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Pessoas
                <a href="{{ url('pessoa/novo') }}" class="btn btn-primary btn-sm float-right">Novo</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive border-0">
                    <table class="table table-hover" style="margin-bottom: inherit">
                        <tbody>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Data Nasc.</th>
                            <th>Tipo</th>
                        </tr>
                        @foreach ($pessoas as $pessoa)
                            <tr>
                                <td>
                                    <a href="{{ url('pessoa/editar/' . $pessoa->id) }}">
                                        {{ $pessoa->nome }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ url('pessoa/editar/' . $pessoa->id) }}">
                                        {{ $pessoa->email }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ url('pessoa/editar/' . $pessoa->id) }}">
                                        {{ date('d/m/Y', strtotime($pessoa->data_nascimento)) }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ url('pessoa/editar/' . $pessoa->id) }}">
                                        {{ $pessoa->tipo ? 'Médico' : 'Paciente' }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
