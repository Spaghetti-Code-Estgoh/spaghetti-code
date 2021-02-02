@component('mail::message')
# Criação da Conta

Olá! E bem vindo a família SCMed. Esperemos que você tenha muito sucesso na nossa emperesa!
Após receber este email já irá conseguir fazer login na sua conta utilizando as credenciais facultadas.

@component('mail::button3', ['url' => '/'])
Começe a utilizar a plataforma!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
