<?php
require_once("cabecalho.php");
require_once("conexao.php");

?>

<?php
//PEGAR PAGINA ATUAL PARA PAGINAÇAO
if (@$_GET['pagina'] != null) {
    $pag = $_GET['pagina'];
} else {
    $pag = 0;
}

$limite = $pag * @$itens_por_pagina;
$pagina = $pag;
$nome_pag = 'produtos.php';
?>


<?php
//recuperar o nome da subcat para filtrar os produtos
$subcategoria_get = @$_GET['nome'];
$query = $pdo->query("SELECT * FROM sub_categorias where nome_url = '$subcategoria_get' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_subcategoria = @$res[0]['id'];
?>


<?php
//recuperar o valor inicial e valor final para filtrar produto
$valor_inicial = @$_GET['valor-inicial'];
$valor_final = @$_GET['valor-final'];
?>


<?php
if (@$_GET['txtBuscar'] != "") {
    $buscar = '%' . @$_GET['txtBuscar'] . '%';
} else {
    $buscar = '%';
}

if ($subcategoria_get == "" and $valor_inicial == "") {
    $query = $pdo->query("SELECT * FROM produtos where nome LIKE '$buscar' or palavras like '$buscar' or categoria like '$buscar' or sub_categoria like '$buscar' order by id desc LIMIT $limite, $itens_por_pagina ");
} else if ($valor_inicial != "") {
    $query = $pdo->query("SELECT * FROM produtos where valor >= '$valor_inicial' and valor <= '$valor_final' order by id desc");
} else {
    $query = $pdo->query("SELECT * FROM produtos where sub_categoria = '$id_subcategoria' order by id desc");
}
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_prod = @count($res);
if (@$_GET['txtBuscar'] != "" or @$id_subcategoria != "" or @$valor_inicial != "") {
    echo $total_prod . ' Produtos Encontrados!';
}

echo '<div class="row mt-4">';

for ($i = 0; $i < count($res); $i++) {
    foreach ($res[$i] as $key => $value) {
    }

    $nome = $res[$i]['nome'];
    $valor = $res[$i]['valor'];
    $nome_url = $res[$i]['nome_url'];
    $imagem = $res[$i]['imagem'];
    $promocao = $res[$i]['promocao'];
    $id = $res[$i]['id'];

    $valor = number_format($valor, 2, ',', '.');

    //BUSCAR O TOTAL DE REGISTROS PARA PAGINAR
    $query3 = $pdo->query("SELECT * FROM produtos ");
    $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
    $num_total = @count($res3);
    $num_paginas = ceil($num_total / $itens_por_pagina);

    if ($promocao == 'Sim') {
        $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id' ");
        $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
        $valor_promo = $resp[0]['valor'];
        $desconto = $resp[0]['desconto'];
        $valor_promo = number_format($valor_promo, 2, ',', '.');




?>

        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="product__discount__item">
                <div class="product__discount__item__pic set-bg" data-setbg="img/produtos/<?php echo $imagem ?>">
                    <div class="product__discount__percent">-<?php echo $desconto ?>%</div>
                    <ul class="product__item__pic__hover">
                        <li><a href="produto-<?php echo $nome_url ?>"><i class="fa fa-eye"></i></a></li>
                        <li><a href="" onclick="carrinhoModal('<?php echo $id ?>','Não')"><i class="fa fa-shopping-cart"></i></a>
                    </ul>
                </div>
                <div class="product__discount__item__text">

                    <h5><a href="produto-<?php echo $nome_url ?>"><?php echo $nome ?></a></h5>
                    <div class="product__item__price">R$ <?php echo $valor_promo ?> <span>R$ <?php echo $valor ?></span></div>
                </div>
            </div>
        </div>

    <?php } else { ?>


        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="img/produtos/<?php echo $imagem ?>">
                    <ul class="featured__item__pic__hover">
                        <li><a href="produto-<?php echo $nome_url ?>"><i class="fa fa-eye"></i></a></li>
                        <li><a href="" onclick="carrinhoModal('<?php echo $id ?>','Não')"><i class="fa fa-shopping-cart"></i></a>
                    </ul>
                </div>
                <div class="featured__item__text">
                    <a href="produto-<?php echo $nome_url ?>">
                        <h6><?php echo $nome ?></h6>
                        <h5>R$ <?php echo $valor ?></h5>
                    </a>
                </div>
            </div>
        </div>

<?php }
} ?>



</div>

<?php if (@$_GET['txtBuscar'] == "" and @$id_subcategoria == "" and @$valor_inicial == "") { ?>
    <div class="product__pagination">
        <a href="<?php echo $nome_pag ?>?pagina=0"><i class="fa fa-long-arrow-left"></i></a>

        <?php
        for ($i = 0; $i < @$num_paginas; $i++) {
            $estilo = '';
            if ($pagina == $i) {
                $estilo = 'bg-info text-light';
            }

            if ($pagina >= ($i - 2) && $pagina <= ($i + 2)) { ?>
                <a href="<?php echo $nome_pag ?>?pagina=<?php echo $i ?>" class="<?php echo $estilo ?>"><?php echo $i + 1 ?></a>

        <?php }
        }
        ?>


        <a href="<?php echo $nome_pag ?>?pagina=<?php echo $num_paginas - 1 ?>"><i class="fa fa-long-arrow-right"></i></a>
    </div>
<?php } ?>


</div>
</div>
</div>


<?php

require_once("rodape.php");
require_once("modal_carrinho.php");
?>