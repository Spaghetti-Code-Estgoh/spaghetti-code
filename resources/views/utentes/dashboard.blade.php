@extends('utentes/layout')
{{-- //Author: Guilherme Jafar--}}
@section('content')
<h2 class="titulo" >Proximas Consultas</h2>
    <div class="card card-dashboard">
        <table style="width:100%">
        
        @if($consulta->isEmpty())
        <p>Ainda não existem consultas.</p>    
        @else 
            @foreach ($consulta as $cons)
                <tr>
                    <td>{{$cons->nome}}</td>
                    <td>{{$cons->especialidae}}</td>
                    <td>{{$cons->DataHora}}</td>
                    <td><a href="#" class="btn" data-toggle="modal" data-target="#{{ $cons->id }}">Saber Mais</a></td>
                    <td><a href="/pc/printpdf/{{$cons->id}}" class="btn btn-down">Download <i class="fas fa-download"></i></a></td>

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
                                    <p>Estado: {{$cons->estado}} </p>
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

    <h2 class="titulo"  >Consultas Em Espera</h2>
    <div class="card card-dashboard">
        <table style="width:100%">

        @if ($consultaEspera->isEmpty())
            <p>Ainda não existem consultas.</p>
         @else 
            @foreach ($consultaEspera as $consEspera)
                <tr>
                    <td>{{$consEspera->nome}}</td>
                    <td>{{$consEspera->especialidae}}</td>
                    <td>{{$consEspera->DataHora}}</td>
                    <td><a href="#" class="btn"  data-toggle="modal" data-target="#{{ $consEspera->id }}">Saber Mais</a></td>

                    <div class="modal fade" id="{{ $consEspera->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title titulo" id="exampleModalLongTitle">Iniciar Consulta</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Médico: {{$consEspera->nome}}</p>
                                    <p>Especialidade: {{$consEspera->especialidae}} </p>
                                    <p>Data/Hora: {{$consEspera->DataHora}}</p>
                                    <p>Estado: {{$consEspera->estado}}</p>
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
