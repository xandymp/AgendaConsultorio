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
                            <th>Excluir</th>
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
                                <td>
                                    <a href="#" class="btn btn-danger btn-sm delete" data-id="{{ $pessoa->id }}">
                                        <i class="fa fa-trash" style="font-size: inherit"></i>
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

@section('javascript')
    <script type="text/javascript" async>
        $(document).on('click', '.delete', function (e) {
            e.stopPropagation();
            if (confirm("Deseja realmente excluir este registro?")) {
                let id = $(this).data('id');
                let url =`{{ url('/pessoa/') }}/${id}`;

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        openLoad();
                    },
                    success: function () {
                        closeLoad();
                        window.location.reload();
                    },
                    error: function (error) {
                        closeLoad();
                        console.log(error);
                        window.location.reload();
                    }
                });
            }
        });

        function openLoad(){
            $('#load-page').remove();
            $('body').append('<div id="load-page"><i class="fa fa-cog fa-spin"></i></div>');
            $('#load-page').css({'background-color':'rgba(0, 0, 0, 0.5)',
                'position':'fixed',
                'top':'0px',
                'left':'0px',
                'width':'100%',
                'height':'100%',
                'z-index':'999999',
                'text-align':'center',
                'font-size':'70px',
                'color':'#FFF',
                'padding-top':'250px'
            });
        }

        function closeLoad(){
            $('#load-page').fadeOut();
        }
    </script>
@endsection
