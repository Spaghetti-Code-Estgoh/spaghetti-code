@extends('admin/layout')
{{-- //Author: Guilherme Jafar--}}
@section('content')
    <div style="height: 100vh">
        <h2 class="titulo" style="padding-bottom: 5rem">Informação sobre Funcionario</h2>
        <br><br>
        <div class="card card-dashboard infoFun">
            <table class="table-hover">

                @foreach ($funcionarios as $f)
                <tr>
                    <td><b>Nome</b></td>
                    <td>{{ $f->nome }}</td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td>{{ $f->email }}</td>
                </tr>
                <tr>
                    <td><b>Contacto</b></td>
                    <td> </td>
                </tr>
                <tr>
                    <td><b>Especialidade</b></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
                @endforeach

@endsection
