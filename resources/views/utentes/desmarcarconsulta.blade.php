@extends('utentes/layout')
{{-- //Author: Rafael Pais--}}
@section('content')
  <h1 class="titulo">Desmarcar Consulta</h1>
  <div class="col-md-3">
    <h3 class="titulo">Especialidade</h3>
  </div>
  <div class="card card-dashboard col-md-9">
    <input type="text" name="especialidade" value="">
  </div>
  <div class="col-md-3">
    <h3 class="titulo">Médico</h3>
  </div>
  <div class="card card-dashboard col-md-9">
    <input type="text" name="medico" value="">
  </div>
  <div class="col-md-3">
    <h3 class="titulo">Data</h3>
  </div>
  <div class="card card-dashboard col-md-9">
    <input type="date" name="data">
  </div>
  <div class="col-md-3">
    <h3 class="titulo">Motivo</h3>
  </div>
  <div class="card card-dashboard col-md-9">
    <input type="text" name="motivo" value="">
  </div>
@endsection
