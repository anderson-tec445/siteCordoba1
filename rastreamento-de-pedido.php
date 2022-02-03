<?php
    require_once("cabecalho.php");
?>

<section id="rastreamento-de-pedido" class="institucional">
    <div class="container">
        <h3>Localizar Encomendas</h3>
        <p>
            Acompanhe seu pedido digitando os detalhes abaixo.
        </p>
        <p>
            É necessário informar seu e-mail e número de pedido por motivo de segurança.
        </p>
        <form action="#">
            <input type="text" name="numero-do-pedido-rastreio" placeholder="Número do pedido">
            <input type="email" name="email-rastreio" placeholder="E-mail cadastrado">
            <button class="btn-forms">Rastrear Pedido</button>
        </form>
    </div>
</section>


<?php
    require_once("rodape.php");
?>