<?php
require_once("cabecalho.php");
require_once("conexao.php");
?>

<?php
require_once("cabecalho-busca.php");
$tem_cor;
?>

<?php 
//recuperar o nome do produto para filtrar os dados dele
$produto_get = @$_GET['nome'];

?>

<?php 
//trazer dados do produto
$query = $pdo->query("SELECT * FROM combos where nome_url = '$produto_get' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

$nome = $res[0]['nome'];
$imagem = $res[0]['imagem'];

$valor = $res[0]['valor'];

$descricao = $res[0]['descricao'];
$desc_longa = $res[0]['descricao_longa'];
$tipo_envio = $res[0]['tipo_envio'];
$palavras = $res[0]['palavras'];
$ativo = $res[0]['ativo'];
$peso = $res[0]['peso'];
$largura = $res[0]['largura'];
$altura = $res[0]['altura'];
$comprimento = $res[0]['comprimento'];

$valor_frete = $res[0]['valor_frete'];


$id_produto = $res[0]['id'];


$valor = number_format($valor, 2, ',', '.');
?>

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                        src="img/combos/<?php echo $imagem ?>" alt="">
                    </div>

                    
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?php echo $nome ?></h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <div class="product__details__price">R$ <?php echo $valor ?></div>
                    <p><?php echo $descricao ?></p>
                    <form method="post" id="form-add">
                        <div class="product__details__quantity">
                            <input type="hidden" value="<?php echo $id_produto ?>" id="idproduto" name="idproduto">
                            <input type="hidden" value="Sim" id="combo" name="combo">
                            <input type="hidden" value="carac" id="carac" name="carac">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" name="quantidade" value="1">
                                </div>
                            </div>
                        </div>
                        <button class="primary-btn" id="btn-add-car">ADD AO CARRINHO</button>
                        <small><div id="div-mensagem-prod"></div></small>

                    </form>

                    <h4 class="mt-2">Produtos do Combo</h4>
                    <?php 
                    $query = $pdo->query("SELECT * FROM prod_combos where id_combo = '$id_produto' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }

                      $id_prod = $res[$i]['id_produto'];
                      $query2 = $pdo->query("SELECT * FROM produtos where id = '$id_prod' ");
                    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                    $nome_prod = $res2[0]['nome'];
                    $nome_url_prod = $res2[0]['nome_url'];

                    ?>

                    <a href="" title="Ver Produto" class="text-dark mr-2" onclick="abrirProduto('<?php echo $nome_url_prod ?>')"><span><small><i class="fa fa-check text-info mr-1"></i><?php echo $nome_prod ?></small></span></a>

                  <?php }
                      ?>


                      
                  </div>
              </div>
              <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                            aria-selected="true">Descrição</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                            aria-selected="false">Informações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                            aria-selected="false">Reviews <span>(1)</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                

                                <h4 class="mt-2 mb-4">Produtos do Combo</h4>
                    <?php 
                    $query = $pdo->query("SELECT * FROM prod_combos where id_combo = '$id_produto' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }

                      $id_prod = $res[$i]['id_produto'];
                      $query2 = $pdo->query("SELECT * FROM produtos where id = '$id_prod' ");
                    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                    $nome_prod = $res2[0]['nome'];
                    $nome_url_prod = $res2[0]['nome_url'];

                    ?>

                    <a href="" title="Ver Produto" class="text-dark mr-2" onclick="abrirProduto('<?php echo $nome_url_prod ?>')"><span><i class="fa fa-check text-info mr-1"></i><?php echo $nome_prod ?></span></a><br>

                  <?php }
                      ?>


                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                Proin eget tortor risus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Outros Combos</h2>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="categories__slider owl-carousel">

                <?php 
                $query = $pdo->query("SELECT * FROM combos order by id desc limit 10 ");
                $res = $query->fetchAll(PDO::FETCH_ASSOC);

                for ($i=0; $i < count($res); $i++) { 
                  foreach ($res[$i] as $key => $value) {
                  }

                  $nome = $res[$i]['nome'];
                  $valor = $res[$i]['valor'];
                  $nome_url = $res[$i]['nome_url'];
                  $imagem = $res[$i]['imagem'];

                  $id = $res[$i]['id'];

                  $valor = number_format($valor, 2, ',', '.');


                  ?>

                  <div class="col-lg-3 col-md-4 col-sm-6 mix sapatos fresh-meat">
                      <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/combos/<?php echo $imagem ?>">
                            <ul class="product__item__pic__hover">
                                <li><a href="combo-<?php echo $nome_url ?>"><i class="fa fa-eye"></i></a></li>
                                <li><a href="" onclick="carrinhoModal('<?php echo $id ?>','Sim')"><i class="fa fa-shopping-cart"></i></a>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <a href="combo-<?php echo $nome_url ?>"><h6><?php echo $nome ?></h6>
                                    <h5><?php echo $valor ?></h5></a>
                                </div>
                            </div>
                        </div>



                    <?php } ?>

                </div>

            </div>
        </div>
    </section>
    <!-- Related Product Section End -->




    <?php
    require_once("modal-carrinho.php");
    require_once("rodape.php");
    ?>


    <script type="text/javascript">
        var proQty = $('.pro-qty');
        proQty.prepend('<span class="dec qtybtn">-</span>');
        proQty.append('<span class="inc qtybtn">+</span>');
        proQty.on('click', '.qtybtn', function () {
            var $button = $(this);
            var oldValue = $button.parent().find('input').val();
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
</script>






<script type="text/javascript">
    $('#btn-add-car').click(function(event){
        event.preventDefault();
        
        $.ajax({
            url:"carrinho/inserir-carrinho.php",
            method:"post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(msg){
                if(msg.trim() === 'Cadastrado com Sucesso!!'){

                    window.location='carrinho.php';

                }
                else{
                    console.log(msg);
                    $('#div-mensagem-prod').addClass('text-danger')
                    $('#div-mensagem-prod').text(msg);

                }
            }
        })
    })
</script>






<script>
    function atualizarCarrinho() {

        $.ajax({
          url:  "carrinho/listar-carrinho.php",
          method: "post",
          data: $('#frm').serialize(),
          dataType: "html",
          success: function(result){
            $('#listar-carrinho').html(result)

        },
    })
    }
</script>



<script>
    function abrirProduto(url) {
        event.preventDefault();
        
        window.location = 'produto-' + url;

     }
   
</script>


