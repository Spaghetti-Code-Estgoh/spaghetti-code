@component('mail::message')
# Pedido para alteração da password
<br>
Olá! Foi requesitado um pedido para mudança de password para a tua conta.<br>
Para realziares a alteração basta carregares no botão onde serás levado para uma página
para introduzires a tua password nova.<br>
Caso não tenhas sido tu a fazeres este pedido, ignora o simplesmente que o pedido de alteração
será eliminado em 48 horas.

@component('mail::button2', ['url' => $reset])
Alterar Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
