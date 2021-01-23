@extends('funcionarios/layout')
{{-- //Author: Guilherme Jafar--}}
@section('content')
    <div>









        <div class="row">
            <div class="col-6"> <h2 class="titulo">Agenda Médica</h2></div>
            <div class="col-5">
                <form action="/agendamedicaFuncionario" method="GET" class="row">
                    <div class="cal-8">
                    <input class="form-control" type="text" id="myInput"  name="nome" placeholder="Pesquisa Médico"></div>
                    <div class="cal-4">
                    <input class="btn btn-primary form-control" value="pesquisar"  name="submit" type="submit" id="submit" >
                        </div>

                </form></div>
            <div class="col-12" id="cal" style="margin-top: 2rem">
                {!! $calendar->calendar() !!}
                {!! $calendar->script() !!}

            </div>
        </div>


    </div>

    <script>

    </script>

@endsection
