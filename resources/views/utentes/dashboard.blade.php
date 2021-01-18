@extends('utentes/layout')
{{-- //Author: Guilherme Jafar--}}
@section('content')
    <h2 class="titulo" >Proximas Consultas</h2>
    <div class="card card-dashboard">
        <table style="width:100%">
            <tr>
                <td>Medico 1</td>
                <td>Especialidade1</td>
                <td>Data1</td>
                <td><a href="#" class="btn"  data-toggle="modal" data-target="#exampleModalCenter">Saber Mais</a></td>
            </tr>
            <tr>
                <td>Medico 2</td>
                <td>Especialidade2</td>
                <td>Data2</td>
                <td><a href="#" class="btn">Saber Mais</a></td>
            </tr>
            <tr>
                <td>Medico 3</td>
                <td>Especialidade3</td>
                <td>Data3</td>
                <td><a href="#" class="btn">Saber Mais</a></td>
            </tr>

        </table>
    </div>

    <h2 class="titulo"  >Consultas Em Espera</h2>
    <div class="card card-dashboard">
        <table style="width:100%">
            <tr>
                <td>Medico 1</td>
                <td>Especialidade1</td>
                <td>Data1</td>
                <td><a href="#" class="btn" data-toggle="modal" data-target="#exampleModalCenter1">Saber Mais</a></td>
            </tr>
            <tr>
                <td>Medico 2</td>
                <td>Especialidade2</td>
                <td>Data2</td>
                <td><a href="#" class="btn">Saber Mais</a></td>
            </tr>
            <tr>
                <td>Medico 3</td>
                <td>Especialidade3</td>
                <td>Data3</td>
                <td><a href="#" class="btn">Saber Mais</a></td>
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


@endsection
