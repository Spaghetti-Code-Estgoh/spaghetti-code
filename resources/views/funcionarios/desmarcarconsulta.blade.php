@extends('funcionarios/layout')
{{-- //Author: Guilherme Jafar--}}
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div>
        <h2 class="titulo" >Desmarcar Consulta</h2>
        <div class="card card-dashboard">
            <table class="table-hover" style="width:100%">

            </table>
        </div>
    </div>
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
                            "                    <button type=\"button\" class=\"btn btn-primary remove\"  id=\"desmarcar\" onclick=\"ChangeStatus("+indece+")\">Desmarcar</button>\n" +
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


        function ChangeStatus(id ){
           var erro='error'+id;
            var val='message-text'+id;
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


@endsection
