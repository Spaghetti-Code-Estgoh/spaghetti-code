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
                                        "<td><button type='submit' value='' class=\"fa fa-times fa-2x remove\" style=\"color: black;background: white;\" onclick=' ChangeStatus("+indece+",\"NaoAprovar\");' ></td>\n" +
                               "         <td><button type='submit'   value='' class=\"fa fa-check fa-2x remove\" style=\"color: black;background: white;\" onclick=' ChangeStatus("+indece+",\"agendada\");'></td>\n" +
                               "                </tr>";
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
    </script>

@endsection
