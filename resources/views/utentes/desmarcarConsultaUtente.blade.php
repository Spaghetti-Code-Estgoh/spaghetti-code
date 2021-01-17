@extends('utentes/layout')
{{-- //Author: Rafael Pais--}}
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
                url: '/GetConsultaCancelarUtente',
                type: 'POST',
                dataType: "JSON",
                success: function(resonse){
                    var query;
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
                            "                    <h5 class=\"modal-title titulo\" id=\"exampleModalLongTitle\">Desmarcar Consulta</h5>\n" +
                            "                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">\n" +
                            "                        <span aria-hidden=\"true\">&times;</span>\n" +
                            "                    </button>\n" +
                            "                </div>\n" +
                            "                <div class=\"modal-body\">\n" +
                            "                    <p>Tem acerteza que quer desmarcar consulta</p>\n" +
                            "                </div>\n" +
                            "                <div class=\"modal-footer\">\n" +
                            "                    <button type=\"button\" class=\"btn btn-primary \"  id=\"desmarcar\" onclick=\"ChangeStatus("+indece+")\">Desmarcar</button>\n" +
                            "                    <button type=\"button\" class=\"btn btn-primary \" data-dismiss=\"modal\" aria-label=\"Close\">Cancelar</button>\n" +
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


        function ChangeStatus(id){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({

                    url: "/cancelarConsultaUtente",
                    type: "Post",
                    data: {
                        'id': id,
                    },
                    success: function (data) {//200 response comes here
                        location.reload();


                    },
                    error: function (e) {
                        console.log(e)
                    }
                })

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
