@extends('admin/layout')
{{-- //Author: Guilherme Jafar--}}
@section('content')
    <div style="height: 100vh">
        <h2 class="titulo" style="padding-bottom: 5rem">Informação sobre Funcionario</h2>
        <br><br>
        <div class="card card-dashboard infoFun">
            <table class="table-hover">
                <tr>
                    <td><b>Nome</b></td>
                    <td>Médico 1</td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td>Email 1</td>
                </tr>
                <tr>
                    <td><b>Contacto</b></td>
                    <td>Contacto 1</td>
                </tr>
                <tr>
                    <td><b>Especialidade</b></td>
                    <td>Especialidade 1</td>
                </tr>
                <tr>
                    <td>etc</td>
                    <td>etc</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
