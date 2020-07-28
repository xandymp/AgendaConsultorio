@extends('layouts.logged')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Agendamento</div>
                    <form action="{{ url('agendamento/'.$data->id) }}" method="post">
                        <div class="card-body">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="data_consulta">Data da Consulta</label>
                                <input id="data_consulta"
                                       type="date"
                                       class="form-control{{$errors->has('data_consulta') ? ' is-invalid':''}}"
                                       value="{{ old('data_consulta', $data->data_consulta) }}"
                                       name="data_consulta"
                                       placeholder="00/00/0000"
                                       required>
                                <div class="invalid-feedback">{{ $errors->first('data_consulta') }}</div>
                            </div>

                            <div class="form-group">
                                <label for="observacoes">Observações</label>
                                <textarea id="observacoes"
                                          name="observacoes"
                                          type="text"
                                          class="form-control{{$errors->has('observacoes') ? ' is-invalid':''}}">
                                    {{ $data->observacoes }}
                                </textarea>
                                <div class="invalid-feedback">{{ $errors->first('observacoes') }}</div>
                            </div>

                            <div class="form-group">
                                <label for="medico_id">Médico</label>
                                <select id="medico_id" name="medico_id" class="form-control" required>
                                    <option value="">Selecione...</option>
                                    @foreach($medicos as $medico)
                                        <option value={{ $medico->id }}
                                            {{ ($data->medico_id == $medico->id) ? 'selected' : '' }}>
                                            {{ $medico->nome }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">{{ $errors->first('medico_id') }}</div>
                            </div>

                            <div class="form-group">
                                <label for="paciente_id">Paciente</label>
                                <select id="paciente_id" name="paciente_id" class="form-control" required>
                                    <option value="">Selecione...</option>
                                    @foreach($pacientes as $paciente)
                                        <option value={{ $paciente->id }}
                                            {{ ($data->paciente_id == $paciente->id) ? 'selected' : '' }}>
                                            {{ $paciente->nome }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">{{ $errors->first('paciente_id') }}</div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="#" onclick="history.back()" class="btn btn-secondary">Voltar</a>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
