@extends('utentes/layout')
{{-- //Author: Rafael Pais--}}
@section('content')
  <h1 class="titulo">Marcar Consulta</h1>
  <form action="novaconsulta" method="POST">
  @csrf
  <div class="row">
    <div class="col-md-3">
      <h3 class="titulo">Especialidade</h3>
    </div>
    <div class="card card-dashboard col-md-6">
    
    <select id='especialidadeSelect' name='especialidadeSelect'>
       <option value='0'>-- Selecione a Especialidade --</option>
 
       <!-- Read Departments -->
       @foreach($especialidadeData['data'] as $especialidade)
         <option value='{{ $especialidade->especialidae }}'>{{ $especialidade->especialidae }}</option>
       @endforeach

    </select>

    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <h3 class="titulo">Médico</h3>
    </div>
    <div class="card card-dashboard col-md-6">
      
    <select id='medicoSelect' name='medicoSelect'>
       <option value='0'>-- Selecione o Médico --</option>
    </select>

    <!-- Script -->
    <script type='text/javascript'>

    $(document).ready(function(){

      // Department Change
      $('#especialidadeSelect').change(function(){

         // Department id
         var id = $(this).val();
         // Empty the dropdown
         $('#medicoSelect').find('option').not(':first').remove();

         // AJAX request 
         $.ajax({
           url: 'novaconsulta/'+id,
           type: 'get',
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['data'] != null){
               len = response['data'].length;
             }

             if(len > 0){
               // Read data and create <option >
               for(var i=0; i<len; i++){

                 var id = response['data'][i].id;
                 var nome = response['data'][i].nome;

                 var option = "<option value='"+id+"'>"+nome+"</option>"; 

                 $("#medicoSelect").append(option); 
               }
             }

           }
        });
      });

    });

    </script>

    </div>
  </div>

  <div class="row">
    <div class="mx-auto text-center">
      <button type="submit" class="btn btn-primary btn-registo">Marcar Consulta</button>
    </div>
  </div>
</form>
@endsection
