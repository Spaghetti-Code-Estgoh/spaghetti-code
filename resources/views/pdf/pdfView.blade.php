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
            <div class="to">Consulta De:</div>
            <h2 class="name">{{$utente}}</h2>
            <div class="address">{{$morada}}</div>
            <div class="email"><a href="{{$email}}">{{$email}}</a></div>
        </div>
    </div>
    <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td class="no">Tipo</td>
            <td class="desc"><h3>{{$tipoC}}</h3></td>
        </tr>
        <tr>
            <td class="no">Médico</td>
            <td class="desc"><h3>Drº {{$medico}}</h3></td>
        </tr>
        <tr>
            <td class="no">Data e Hora</td>
            <td class="desc"><h3>{{$hora}} {{$data}}</h3></td>
        </tr>
        <tr>
            <td class="no">Observações</td>
            <td class="desc"><h3>{{$obs}}</h3></td>
        </tr>
        <tr>
            <td class="no">Valor</td>
            <td class="desc"><h3>{{$valorT}}</h3></td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td>SUBTOTAL</td>
            <td>{{$valorSI}}</td>
        </tr>
        <tr>
            <td>Imposto 23%</td>
            <td>{{$valorI}}</td>
        </tr>
        <tr>
            <td>TOTAL</td>
            <td>{{$valorT}}</td>
        </tr>
        </tfoot>
    </table>
    <div id="thanks">Obrigado por escolher o SCMed!</div>
    <div id="notices">
        <div>AVISO:</div>
        <div class="notice">Caso o valor cobrado não seja pago em 30 dias terá um aumento de 1.5% ao valor atual</div>
    </div>
</main>
<footer>
   Documento foi gerado pela aplicação sendo que não necessita de assinatura de aprovação.
</footer>
</body>
</html>
