@extends('utentes/layout')
{{-- //Author: Rafael Pais--}}
@section('content')
    <h1 class="titulo">Histórico Consultas</h1>
    <div class="card card-dashboard">
      <table style="width:100%">
        <tr>
          <td>Médico1</td>
          <td>Especialidade1</td>
          <td>Data1</td>
          <td><a href="#" class="btn" data-toggle="modal" data-target="#exampleModalCenter">Saber Mais</a></td>
        </tr>
        <tr>
          <td>Médico2</td>
          <td>Especialidade2</td>
          <td>Data2</td>
            <td><a href="#" class="btn" data-toggle="modal" data-target="#exampleModalCenter1">Saber Mais</a></td>
        </tr>
        <tr>
          <td>Médico3</td>
          <td>Especialidade3</td>
          <td>Data3</td>
            <td><a href="#" class="btn" data-toggle="modal" data-target="#exampleModalCenter2">Saber Mais</a></td>
        </tr>
        <tr>
          <td>Médico4</td>
          <td>Especialidade4</td>
          <td>Data4</td>
            <td><a href="#" class="btn" data-toggle="modal" data-target="#exampleModalCenter3">Saber Mais</a></td>
        </tr>
        <tr>
          <td>Médico5</td>
          <td>Especialidade5</td>
          <td>Data5</td>
            <td><a href="#" class="btn" data-toggle="modal" data-target="#exampleModalCenter4">Saber Mais</a></td>
        </tr>
      </table>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title titulo" id="exampleModalLongTitle">Iniciar Consulta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Médico: </p>
                    <p>Especialidade: </p>
                    <p>Data: </p>
                    <p>Hora: </p>
                    <p>Estado: </p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title titulo" id="exampleModalLongTitle">Iniciar Consulta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Médico: </p>
                    <p>Especialidade: </p>
                    <p>Data: </p>
                    <p>Hora: </p>
                    <p>Estado: </p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title titulo" id="exampleModalLongTitle">Iniciar Consulta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Médico: </p>
                    <p>Especialidade: </p>
                    <p>Data: </p>
                    <p>Hora: </p>
                    <p>Estado: </p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title titulo" id="exampleModalLongTitle">Iniciar Consulta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Médico: </p>
                    <p>Especialidade: </p>
                    <p>Data: </p>
                    <p>Hora: </p>
                    <p>Estado: </p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title titulo" id="exampleModalLongTitle">Iniciar Consulta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Médico: </p>
                    <p>Especialidade: </p>
                    <p>Data: </p>
                    <p>Hora: </p>
                    <p>Estado: </p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary">Fechar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
