@extends('admin/layout')
{{-- //Author: Guilherme Jafar--}}
@section('content')
    <div style="height: 100vh">
        <h2 class="titulo" style="padding-bottom: 5rem">Informação sobre Funcionario</h2>
        <br><br>
        <div class="card card-dashboard infoFun">
            <table class="table-hover">

                @foreach ($medicos as $m)
                <tr>
                    <td><b>Nome</b></td>
                    <td>{{ $m->nome }}</td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td>{{ $m->email }}</td>
                </tr>
                <tr>
                    <td><b>Especialidade</b></td>
                    <td>{{ $m->especialidae }}</td>
                </tr>
                <tr>
                    <td><b>NIF</b></td>
                    <td>{{ $m->nif }}</td>
                </tr>
                  <tr>
                    <td><b>Nº de Celuta</b></td>
                    <td>{{ $m->numeroCeluta }}</td>
                </tr>
            </table>
        </div>
    </div>
                @endforeach

@endsection
