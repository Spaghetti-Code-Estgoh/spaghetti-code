<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Relatorio</title>
    <link rel="stylesheet" href="css/stylePDF.css" media="all" />
</head>
<body>
<header class="clearfix">
    <div id="logo">
        <img src="img/logo2.png">
    </div>
    <div id="company">
        <h2 class="name">SCMed</h2>
        <div>R. Gen. Santos Costa 4, 3400-124 Oliveira do Hospital</div>
        <div>919919919</div>
        <div><a href="scmedspaghetti@gmail.com">scmedspaghetti@gmail.com</a></div>
    </div>
</header>
<main>
    <div id="details" class="clearfix">
        <div id="client">
            <div class="to">Dados de Acesso de:</div>
            <h2 class="name">{{$name}}</h2>
            <div class="email"><a href="{{$email}}">{{$email}}</a></div>
        </div>
    </div>
    <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td class="no">Email</td>
            <td class="desc"><h3>{{$email}}</h3></td>
        </tr>
        <tr>
            <td class="no">Password</td>
            <td class="desc"><h3>{{$pass}}</h3></td>
        </tr>
        <tr>
            <td class="no">Tipo</td>
            <td class="desc"><h3>{{$tipoC}}</h3></td>
        </tr>
        </tbody>
    </table>
    <div id="thanks">Obrigado por escolher fazer parte da SCMed!</div>
    <div id="notices">
        <div>AVISO:</div>
        <div class="notice">Por favor mude a sua password quando fizer login pela primeira vez, por precaução </div>
    </div>
</main>
<footer>
    Documento foi gerado pela aplicação sendo que não necessita de assinatura de aprovação.
</footer>
</body>
</html>

