@extends('medicos/layout')
{{-- //Author: Guilherme Jafar--}}
@section('content')
    <div>
        <div class="row">
            <div class="col-12 text-center"> <h2 class="titulo">Agenda Médica</h2></div>

            <div class="col-12 text-center" style="margin-top: 2rem">
                {!! $calendar->calendar() !!}
                {!! $calendar->script() !!}
            </div>
        </div>


    </div>
@endsection
