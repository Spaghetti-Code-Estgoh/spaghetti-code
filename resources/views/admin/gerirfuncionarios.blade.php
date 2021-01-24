@extends('admin/layout')
{{-- //Author: Fabian Nunes--}}
@section('content')
    <div style="height: 100vh">
        <div class="row">
            <div class="col-6"> <h2 class="titulo">Lista Funcionários</h2></div>
            <div class="col-5"> <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Pesquisa Funcionario"></div><i class="fa fa-search fa-2x"></i>
        </div>
        <div class="card card-dashboard">
            <table class="table-hover" style="width:100%">
                <tr>
                    <td>Funcionario 1</td>
                    <td>Cargo</td>
                    <td>Email 1</td>
                    <td><a href="/eliminarfuncionario"><i class="fa fa-times fa-2x" style="color: black"></i></a></td>
                    <td><a href="/editarfuncionario"><i class="fas fa-chevron-right fa-2x" style="color: black"></i></a></td>
                </tr>
                <tr>
                    <td>Funcionario 2</td>
                    <td>Cargo</td>
                    <td>Email 2</td>
                    <td><a href="/eliminarfuncionario"><i class="fa fa-times fa-2x" style="color: black"></i></a></td>
                    <td><a href="/editarfuncionario"><i class="fas fa-chevron-right fa-2x" style="color: black"></i></a></td>
                </tr>
                <tr>
                    <td>Funcionario 3</td>
                    <td>Cargo</td>
                    <td>Email 3</td>
                    <td><a href="/eliminarfuncionario"><i class="fa fa-times fa-2x" style="color: black"></i></a></td>
                    <td><a href="/editarfuncionario"><i class="fas fa-chevron-right fa-2x" style="color: black"></i></a></td>
                </tr>
            </table>
        </div>
    </div>
@endsection
