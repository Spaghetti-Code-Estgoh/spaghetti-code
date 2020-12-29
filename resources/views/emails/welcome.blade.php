@component('mail::message')
# Registo de Utilizador
<br>
Olá e bem vindo ao SCMed! O seu portal para gestão e marcação de consultas!<br><br>
Para concluir o seu registo e desfrutar de tudo o que lhe temos para oferecer carregue no butão abaixo para confirmar a sua conta.<br><br>
Caso não tenha sido você a criar esta conta ignore este email que em 48 horas a conta será eliminada.


@component('mail::button', ['url' => 'test'])
Confirmar Registo
@endcomponent

Obrigado pela confiança,<br>
SCMed
@endcomponent
