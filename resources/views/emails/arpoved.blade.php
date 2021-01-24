@component('mail::message')
# Consulta Agendada

@foreach($data as $d)
Olá {{$d->unome}}! A sua consulta de {{$d->tipoC}} com o Drº {{$d->mnome}} foi agendada para as {{$d->hora}} no dia {{$d->data}}.<br>
Caso ocorra algum imprevisto pro favor desmarque a consulta ou contacte nos por email ou telemóvel para a desmarcarmos.

@endforeach
Obrigado pela sua confiança,<br>
{{ config('app.name') }}
@endcomponent
