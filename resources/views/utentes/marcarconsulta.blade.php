@extends('utentes/layout')
{{-- //Author: Rafael Pais--}}
@section('content')
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
    <h3 class="titulo">Agenda</h3>
  </div>
@endsection
