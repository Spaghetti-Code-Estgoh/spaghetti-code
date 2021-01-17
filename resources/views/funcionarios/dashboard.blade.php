@extends('funcionarios/layout')
{{-- //Author: Guilherme Jafar--}}
@section('content')
    <div>
    <h2 class="titulo" >Consultas por Aprovar</h2>
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
                            "<td>"+resonse[i]['DataHora']+"</td>";
                    }

                    $('table').append(query);
                },
                error: function (response){
                    console.log(response)
                }
            });

        });
    </script>

@endsection
