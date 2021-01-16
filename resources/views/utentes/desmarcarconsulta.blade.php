@extends('utentes/layout')
{{-- //Author: Rafael Pais--}}
@section('content')
  <h1 class="titulo">Desmarcar Consulta</h1>
  <div class="row">
    <div class="col-md-3">
      <h3 class="titulo">Especialidade</h3>
    </div>
    <div class="card card-dashboard col-md-9">
      <input id="especialidade" type="text" name="especialidade" placeholder="Oftalmologia">
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <h3 class="titulo">Médico</h3>
    </div>
    <div class="card card-dashboard col-md-9">
      <input id="medico" type="text" name="medico" placeholder="Fabian Nunes">
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <h3 class="titulo">Data</h3>
    </div>
    <div class="card card-dashboard col-md-9">
      <input id="data" type="date" name="data">
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <h3 class="titulo">Motivo</h3>
    </div>
    <div class="card card-dashboard col-md-9">
      <input id="motivo" type="text" name="motivo" placeholder="Incompatibilidade de horário">
    </div>
  </div>
  <div class="row">
    <div class="mx-auto text-center">
      <button type="submit" class="btn btn-primary btn-registo">Desmarcar Consulta</button>
    </div>
  </div>
@endsection
