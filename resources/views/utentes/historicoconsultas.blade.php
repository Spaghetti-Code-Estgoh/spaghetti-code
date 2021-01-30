@extends('utentes/layout')
{{-- //Author: Rafael Pais--}}
@section('content')
<h1 class="titulo">Histórico Consultas</h1>
    <div class="card card-dashboard">
      <table style="width:100%">
        @if ($consultaHistorico->isEmpty())
            <p>Ainda não existem consultas.</p>
        @else
            @foreach ($consultaHistorico as $cons)
                <tr>
                    <td>{{$cons->nome}}</td>
                    <td>{{$cons->especialidae}}</td>
                    <td>{{$cons->DataHora}}</td>
                    <td><a href="#" class="btn" data-toggle="modal" data-target="#{{ $cons->id }}">Saber Mais</a></td>
                    <td><a href="/recibo/printpdf/{{$cons->id}}" class="btn btn-down">Download <i class="fas fa-download"></i></a></td>

                    <div class="modal fade" id="{{ $cons->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title titulo" id="exampleModalLongTitle">Iniciar Consulta</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <p>Médico: {{$cons->nome}} </p>
                                    <p>Especialidade: {{$cons->especialidae}} </p>
                                    <p>Data/Hora: {{$cons->DataHora}} </p>
                                    <p>Observações: {{$cons->observacoesmedicas}} </p>
                                    <p>Estado: {{$cons->estado}} </p>
                                    <p>Preço: {{$cons->preco}} </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </tr>
            @endforeach
        @endif
      </table>
    </div>

<h1 class="titulo">Consultas Canceladas</h1>
<div class="card card-dashboard">
    <table style="width:100%">

         @if ($consultaHistoricoCanceladas->isEmpty())
            <p>Ainda não existem consultas.</p>
        @else
            @foreach ($consultaHistoricoCanceladas as $consCan)
                <tr>
                    <td>{{$consCan->nome}}</td>
                    <td>{{$consCan->especialidae}}</td>
                    <td>{{$consCan->DataHora}}</td>
                    <td><a href="#" class="btn" data-toggle="modal" data-target="#{{ $consCan->id }}">Saber Mais</a></td>
                    <td><a href="/cancelada/printpdf/{{$consCan->id}}" class="btn btn-down">Download <i class="fas fa-download"></i></a></td>

                    <div class="modal fade" id="{{ $consCan->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title titulo" id="exampleModalLongTitle">Iniciar Consulta</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <p>Médico: {{$consCan->nome}} </p>
                                    <p>Especialidade: {{$consCan->especialidae}} </p>
                                    <p>Data/Hora: {{$consCan->DataHora}} </p>
                                    <p>Motivo: {{$consCan->observacoesadmin}} </p>
                                    <p>Estado: {{$consCan->estado}} </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </tr>
            @endforeach
        @endif
    </table>
</div>
@endsection
