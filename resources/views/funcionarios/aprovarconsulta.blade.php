@extends('funcionarios/layout')
{{-- //Author: Guilherme Jafar--}}
@section('content')
    <div>
        <h2 class="titulo" >Aprovar Consulta</h2>
        <div class="card card-dashboard">
            <table class="table-hover" style="width:100%">
                <tr>
                    <td>Medico 1</td>
                    <td>Especialidade1</td>
                    <td>Data1</td>
                    <td><a href="#"><i class="fa fa-times fa-2x" style="color: black"></i></a></td>
                    <td><a href="#"><i class="fa fa-check fa-2x" style="color: black"></i></a></td>
                </tr>
                <tr>
                    <td>Medico 2</td>
                    <td>Especialidade2</td>
                    <td>Data2</td>
                    <td><a href="#"><i class="fa fa-times fa-2x" style="color: black"></i></a></td>
                    <td><a href="#"><i class="fa fa-check fa-2x" style="color: black"></i></a></td>                </tr>
                <tr>
                    <td>Medico 3</td>
                    <td>Especialidade3</td>
                    <td>Data3</td>
                    <td><a href="#"><i class="fa fa-times fa-2x" style="color: black"></i></a></td>
                    <td><a href="#"><i class="fa fa-check fa-2x" style="color: black"></i></a></td>                </tr>
            </table>
        </div>
    </div>
@endsection
