@extends('medicos/layout')
{{-- //Author: Guilherme Jafar--}}
@section('content')

    <div>
        <div class="row">
            <div class="col-6"> <h2 class="titulo">Consultas</h2></div>
            <div class="col-5"> <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Pesquisa Utente"></div><label for="myInput"><i class="fa fa-search fa-2x"></i></label>
        </div>

        <div class="card card-dashboard">
            <table class="table-hover" id="myTable">
                <tbody>
                    
                    @foreach ($cons as $c)


                    <tr>
                        <td scope="row">Data: {{ $c->DataHora }}</td>
                    </tr>
                    <tr>
                        <td>Nome do Paciente: {{ $c->nome }} </td>
                    </tr>
                    
                </tbody>  
                  
            

            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-6"> <h2 class="titulo">Observações</h2></div>
        <div class="col-md-12">
            <form action="{{ url('consultas/'.$c->id)}}" method="get">
                <textarea class="form-control" name="observacoes" id="exampleFormControlTextarea1" rows="5"></textarea>

                <div class="col-6"> <h2 class="titulo">Preço (€)</h2> </div><br>
                <div class="col-2"> <input class="form-control" name="preco" type="number"></div><br>

                <button type="submit" class="btn btn-primary mb-2">Terminar</button>
            </form>


        </div>
    </div
@endforeach
@endsection
