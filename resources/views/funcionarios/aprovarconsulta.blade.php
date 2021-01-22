@extends('funcionarios/layout')
{{-- //Author: Fabio Rodrigues--}}
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div>
        <h2 class="titulo" >Aprovar Consulta</h2>
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
                url: '/GetConsulta',
                type: 'POST',
                dataType: "JSON",
                success: function(resonse){
                    var query=[];
                       for (let i=0;i<resonse.length;i++){

                            indece=resonse[i]['id'];
                           query=query+"<tr>"+
                                        "<td>"+resonse[i]['nome']+"</td>"+
                                        "<td>"+resonse[i]['especialidae']+"</td>"+
                                        "<td>"+resonse[i]['DataHora']+"</td>"+
                                        "<td><button  class=\"btn btn-primary openModal\" data-toggle=\"modal\" data-target=\"#exampleModalCenter"+indece+"\" > Não Aprovar</button>" +
                               "         <td><button   class=\"btn btn-primary remove\"  onclick=' ChangeStatus("+indece+",\"agendada\");'>Aprovar</button>" +

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
                               "                            <textarea class=\"form-control\" id=\"message-text"+indece+"\" ></textarea>\n" +
                               "                           <p id=\"error"+indece+"\" ></p>"+
                               "                </div>\n" +
                               "                <div class=\"modal-footer\">\n" +
                               "                    <button type=\"button\" class=\"btn btn-primary remove\"  id=\"desmarcar\" onclick=\"ChangeStatusCancelar("+indece+",'message-text"+indece+"','error"+indece+"')\">Desmarcar</button>\n" +
                               "                </div>\n" +
                               "            </div>\n" +
                               "        </div>\n" +
                               "    </div></td>";

                       }

                        $('table').append(query);
                },
                error: function (response){
                    console.log(response)
                }
            });

        });

        $(document).on('click','.remove',function(){
            $(this).closest('tr').remove();});


        function ChangeStatus(id,estado){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url : "/ChgConsulta",
                type : "Post",
                data : { 'id' : id ,
                        'estado':estado},
                success:function(data){//200 response comes here

                },
                error:function(e){
                    console.log(e)
                }
            })


        }


        function ChangeStatusCancelar(id ,val,erro){
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
            }}
    </script>

@endsection
