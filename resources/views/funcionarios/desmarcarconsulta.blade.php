@extends('funcionarios/layout')
{{-- //Author: Guilherme Jafar--}}
@section('content')


    <script>

        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/GetConsultaCancelar',
                type: 'POST',
                dataType: "JSON",
                success: function(resonse){
                    var query,  modal;
                    for (let i=0;i<resonse.length;i++){


                        indece=resonse[i]['id'];

                        query+="<tr>"+
                            "<td>"+resonse[i]['nome']+"</td>"+
                            "<td>"+resonse[i]['especialidae']+"</td>"+
                            "<td>"+resonse[i]['DataHora']+"</td>"+
                            "<td><button class=\"btn btn-primary openModal\" data-toggle=\"modal\" data-target=\"#exampleModalCenter"+indece+"\"> + </button>" +

                            "    <div class=\"modal fade\" id=\"exampleModalCenter"+indece+"\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">\n" +
                            "        <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">\n" +
                            "            <div class=\"modal-content\">\n" +
                            "                <div class=\"modal-header\">\n" +
                            "                    <h5 class=\"modal-title titulo\" id=\"exampleModalLongTitle\">Motivo</h5>\n" +
                            "                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">\n" +
                            "                        <span aria-hidden=\"true\">&times;</span>\n" +
                            "                    </button>\n" +
                            "                </div>\n" +
                            "                <div class=\"modal-body\">\n" +
                            "                    <form>\n" +
                            "                        <div class=\"form-group\">\n" +
                            "                            <textarea class=\"form-control\" id=\"message-text"+indece+"\" ></textarea>\n" +
                            "                        </div>\n" +
                            "                           <p id=\"error"+indece+"\" ></p>"+
                            "                    </form>\n" +
                            "                </div>\n" +
                            "                <div class=\"modal-footer\">\n" +
                            "                    <button type=\"button\" class=\"btn btn-primary remove\"  id=\"desmarcar\" onclick=\"ChangeStatus("+indece+",'message-text"+indece+"','error"+indece+"')\">Desmarcar</button>\n" +
                            "                </div>\n" +
                            "            </div>\n" +
                            "        </div>\n" +
                            "    </div>";


                    }


                        $('table').append(query);


                },
                error: function (response){
                    console.log(response)
                }
            });
        });


        function ChangeStatus(id ,val,erro){
            document.getElementById(erro).innerText='';
           var obs= document.getElementById(val).value;
            console.log(obs);

                if (obs.length==0){

                    document.getElementById(erro).style.color='red';
                    document.getElementById(erro).innerText='tem que inserir um motivo para a desmarcação';
                    }
            else if (obs.length==256){
                    document.getElementById(erro).style.color='red';
                document.getElementById(erro).innerText='tem que endicar um motivo mais resumido';
                }
                else {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({

                        url: "/cancelarConsulta",
                        type: "Post",
                        data: {
                            'id': id,
                            'observacoesAdmin': obs
                        },
                        success: function (data) {//200 response comes here
                           location.reload();


                        },
                        error: function (e) {
                            console.log(e)
                        }
                    })
                }
        }




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

    <div>
        <div class="row">
            <div class="col-6"> <h2 class="titulo">Desmarcar Consulta</h2></div>
            <div class="col-5"> <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Pesquisa Médico"></div><i class="fa fa-search fa-2x"></i>
        </div>

        <div class="card card-dashboard">
            <table class="table-hover" id="myTable">

            </table>
        </div>
    </div>
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
                            <textarea class="form-control" id="message-text" name=""></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="desmarcar" onclick="">Desmarcar</button>
                </div>
            </div>
        </div>
    </div>


@endsection
