@extends('utentes/layout')
{{-- //Author: Rafael Pais--}}
@section('content')
  <h1 class="titulo">Marcar Consulta</h1>
  <div class="row">
    <div class="col-md-3">
      <h3 class="titulo">Especialidade</h3>
    </div>
    <div class="card card-dashboard col-md-6">
      <input id="especialidade" type="text" name="especialidade" placeholder="Oftalmologia">
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <h3 class="titulo">Médico</h3>
    </div>
    <div class="card card-dashboard col-md-6">
      <input id="medico" type="text" name="medico" placeholder="Fabian Nunes">
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <h3 class="titulo">Agenda</h3>
    </div>
  </div>
  <div class="row">
    <div class="mx-auto text-center">
      <button type="submit" class="btn btn-primary btn-registo">Marcar Consulta</button>
    </div>
  </div>
@endsection
