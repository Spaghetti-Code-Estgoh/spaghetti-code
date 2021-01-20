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
                    
        

                    <tr>
                        <td scope="row">Data:</td>
                    </tr>
                    <tr>
                        <td>Nome do Paciente: </td>
                    </tr>
                    
                </tbody>  
                  
            

            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-6"> <h2 class="titulo">Observações</h2></div>
        <div class="col-md-12">
            <form>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>

                <button type="submit" class="btn btn-primary mb-2">Terminar</button>
            </form>


        </div>
    </div>

@endsection
