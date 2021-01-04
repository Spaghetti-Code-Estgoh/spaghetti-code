@extends('funcionarios/layout')
{{-- //Author: Guilherme Jafar--}}
@section('content')
    <div>
        <div class="row">
            <div class="col-6"> <h2 class="titulo">Desmarcar Consulta</h2></div>
            <div class="col-5"> <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Pesquisa Médico"></div><i class="fa fa-search fa-2x"></i>
        </div>

        <div class="card card-dashboard">
            <table class="table-hover" id="myTable">
                <tbody>
                <tr>
                    <td scope="row">Med1</td>
                    <td>Esp1</td>
                    <td><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> > </button></td>
                </tr>
                <tr>
                    <td scope="row">Med2</td>
                    <td>Esp2</td>
                    <td><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> > </button></td>
                </tr>
                <tr>
                    <td scope="row">Med3</td>
                    <td>Esp3</td>
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
                    <h5 class="modal-title titulo" id="exampleModalLongTitle">Motivo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Desmarcar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
