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

                  @foreach ($medicos as $m)
                <tr>
                    <td>{{ $m->nome }}</td>
                    <td> Médico </td>
                    <td>{{ $m->email }}</td>
                    <td><a href="/eliminarfuncionario"><i class="fa fa-times fa-2x" style="color: black"></i></a></td>
                    <td><a href="{{ url('editarmedico/'.$m->id) }}"><i class="fas fa-chevron-right fa-2x" style="color: black"></i></a></td>
                </tr>
                 @endforeach

                     @foreach ($funcionarios as $f)
                <tr>
                    <td>{{ $f->nome }}</td>
                    <td> Funcionário </td>
                    <td>{{ $f->email }}</td>
                    <td><a href="/eliminarfuncionario"><i class="fa fa-times fa-2x" style="color: black"></i></a></td>
                    <td><a href="{{ url('editarfuncionario/'.$f->id) }}"><i class="fas fa-chevron-right fa-2x" style="color: black"></i></a></td>
                </tr>
                 @endforeach

            </table>
        </div>
    </div>
   
@endsection
