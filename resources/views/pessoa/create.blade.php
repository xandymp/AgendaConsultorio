@extends('layouts.logged')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Pessoa</div>
                    <form action="{{ url('pessoa') }}" method="post">
                        <div class="card-body">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="nome">Nome completo</label>
                                <input id="nome"
                                       name="nome"
                                       type="text"
                                       required
                                       class="form-control{{$errors->has('nome') ? ' is-invalid':''}}"
                                       value="{{ old('nome') }}">
                                <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input id="email"
                                       name="email"
                                       type="email"
                                       class="form-control{{$errors->has('email') ? ' is-invalid':''}}"
                                       value="{{ old('email') }}"
                                       placeholder="email@provedor.com.br"
                                       required>
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            </div>

                            <div class="form-group">
                                <label for="data_nascimento">Data de Nascimento</label>
                                <input id="data_nascimento"
                                       type="date"
                                       class="form-control{{$errors->has('data_nascimento') ? ' is-invalid':''}}"
                                       value="{{ old('data_nascimento') }}"
                                       name="data_nascimento"
                                       placeholder="00/00/0000"
                                       required>
                                <div class="invalid-feedback">{{ $errors->first('data_nascimento') }}</div>
                            </div>

                            <div class="form-group">
                                <label for="tipo">Tipo</label>
                                <select id="tipo" name="tipo" class="form-control" required>
                                    <option value="">Selecione...</option>
                                    <option value="0"{{ old('tipo') == '0' ? ' selected' : ''}}>Paciente</option>
                                    <option value="1"{{ old('tipo') == '1' ? ' selected' : ''}}>Medico</option>
                                </select>
                                <div class="invalid-feedback">{{ $errors->first('tipo') }}</div>
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
