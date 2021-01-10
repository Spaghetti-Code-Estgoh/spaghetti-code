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
                    <td scope="row">Paciente1</td>
                    <td>Especialidade 1</td>
                    <td>Data1</td>
                    <td><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> > </button></td>
                </tr>
                <tr>
                    <td scope="row">Paciente2</td>
                    <td>Especialidade 2</td>
                    <td>Data2</td>
                    <td><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> > </button></td>
                </tr>
                <tr>
                    <td scope="row">Paciente3</td>
                    <td>Especialidade 3</td>
                    <td>Data3</td>
                    <td><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> > </button></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title titulo" id="exampleModalLongTitle">Iniciar Consulta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Deseja dar Início a consulta?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Cancelar</button>
                    <button type="button" class="btn btn-primary">Iniciar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
