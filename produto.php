<?php
require_once("cabecalho.php");
require_once("conexao.php");
// require_once("cabecalho-busca.php");
$tem_cor;
//recuperar o nome do produto para filtrar os dados dele
$produto_get = @$_GET['nome'];

//trazer dados do produto
$query = $pdo->query("SELECT * FROM produtos where nome_url = '$produto_get' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

$nome = $res[0]['nome'];
$imagem = $res[0]['imagem'];
$sub_cat = $res[0]['sub_categoria'];
$valor = $res[0]['valor'];
$estoque = $res[0]['estoque'];
$descricao = $res[0]['descricao'];
$desc_longa = $res[0]['descricao_longa'];
$tipo_envio = $res[0]['tipo_envio'];
$palavras = $res[0]['palavras'];
$ativo = $res[0]['ativo'];
$peso = $res[0]['peso'];
$largura = $res[0]['largura'];
$altura = $res[0]['altura'];
$comprimento = $res[0]['comprimento'];
$modelo = $res[0]['modelo'];
$valor_frete = $res[0]['valor_frete'];
$nome_cat = $res[0]['categoria'];
$promocao = $res[0]['promocao'];
$id_produto = $res[0]['id'];

if($modelo == ""){
    $modelo = "Nenhum";
}

if($promocao == 'Sim'){
    $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id_produto' ");
    $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
    $valor = $resp[0]['valor'];
    $desconto = $resp[0]['desconto'];   
}

$valor = number_format($valor, 2, ',', '.');

?>

<!-- Product Details Section Begin -->
<section id="produto" class="product-details spad">
    <div class="container-cordoba">
        <div class="produto-content">
            <div class="produto-galeria">
                <div
                    style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                    class="swiper mySwiper2"
                    >
                    <div class="swiper-wrapper">
                        <div class="swiper-slide produto">
                        <img class="product__details__pic__item--large"
                            src="img/produtos/<?php echo $imagem ?>" alt="">
                        </div>
                        <?php 
                            $query = $pdo->query("SELECT * FROM imagens where id_produto = '$id_produto' ");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);

                            for ($i=0; $i < count($res); $i++) { 
                              foreach ($res[$i] as $key => $value) {
                                  $imagem_prod = $res[$i]['imagem'];
                                }
                        ?>
                            <div class='swiper-slide produto'>
                                <img data-imgbigurl='img/produtos/detalhes/<?php echo $imagem_prod ?>'
                                src='img/produtos/detalhes/<?php echo $imagem_prod ?>' alt=''>
                            </div>
                        <?php } ?>
                        
                        <!-- <div class="swiper-slide produto">
                        <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                        </div>
                        <div class="swiper-slide produto">
                        <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                        </div> -->
                        
                    </div>
                    <div class="swiper-button-next produto"></div>
                    <div class="swiper-button-prev produto"></div>
                </div>
                <div thumbsSlider="" class="swiper myProductSlide">
                    <div class="swiper-wrapper">
                        <?php 
                         $query = $pdo->query("SELECT * FROM imagens where id_produto = '$id_produto' ");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);

                            for ($i=0; $i < count($res); $i++) { 
                              foreach ($res[$i] as $key => $value) {
                                 
                                  $imagem_prod = $res[$i]['imagem'];
                                }
                                
                         ?>
                            <div class='swiper-slide'>
                                <img data-imgbigurl='img/produtos/detalhes/<?php echo $imagem_prod ?>'
                                src='img/produtos/detalhes/<?php echo $imagem_prod ?>' alt=''>
                                </div>
                    <?php } ?>
                       
                    </div>
                </div>
            </div>

            <div class="produto-info-box">
                <h3><?php echo $nome ?></h3>
                <span>código</span>
                <div class="preco">
                    <h2>R$ <?php echo $valor ?></h2>
                    <p>ou 10x de R$ R$4,90 sem juros</p>
                </div>
                <form method="post" id="form-add">
                    <div class="product__details__quantity">
                        <input type="hidden" value="<?php echo $id_produto ?>" id="idproduto" name="idproduto">
                        <input type="hidden" value="Não" id="combo" name="combo">
                        <input type="hidden" value="carac" id="carac" name="carac">
                    </div>
                    <!--
                        <div class="row mt-4 ml-1"> 
                            <?php 
                               $query2 = $pdo->query("SELECT * from carac_prod where id_prod = '$id_produto' ");
                                $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                                
                                for ($i=0; $i < count($res2); $i++) { 
                                    foreach ($res2[$i] as $key => $value) {
                                    }

                                    $id_carac = $res2[$i]['id_carac'];
                                    $id_carac_prod = $res2[$i]['id'];
                                    $query3 = $pdo->query("SELECT * from carac where id = '$id_carac' ");
                                    $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                                    $nome_carac = $res3[0]['nome'];
                                    if($nome_carac == 'Cor'){
                                        @$tem_cor = 'Sim';
                                    }
                            ?>
                            <div class="mr-3 mt-2">
                                
                                 <span>
                                     <select class='form-control form-control-sm' name='<?php echo $i ?>' id='<?php echo $i ?>'>";
                                <?php 

                                 echo "<option value='0' >Selecionar " . $nome_carac . "</option>"; 
                               
                                $query4 = $pdo->query("SELECT * from carac_itens where id_carac_prod = '$id_carac_prod'");
                                $res4 = $query4->fetchAll(PDO::FETCH_ASSOC);
                                for ($i2=0; $i2 < count($res4); $i2++) { 
                                    foreach ($res4[$i2] as $key => $value) {
                                    }

                                      

                                       echo "<option value='".$res4[$i2]['id']."' >" . $res4[$i2]['nome'] . "</option>"; 
                                  


                               }


                               ?>
                           </select>
                                </span>
                            </div>

                        <?php } ?>
                               </div> -->
                               <?php if(@$tem_cor == 'Sim'){ ?>
                                <div class="mt-4">
                                    <?php 
                                    $query2 = $pdo->query("SELECT * from carac_prod where id_prod = '$id_produto' ");
                                    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                                    for ($i=0; $i < count($res2); $i++) { 
                                        foreach ($res2[$i] as $key => $value) {
                                        }
                                        
                                        $id_carac = $res2[$i]['id_carac'];
                                        $id_carac_prod = $res2[$i]['id'];
                                        $query3 = $pdo->query("SELECT * from carac where id = '$id_carac' ");
                                        $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                                        $nome_carac = $res3[0]['nome'];
                                        
                                        if($nome_carac == 'Cor'){
                                            
                                            $query4 = $pdo->query("SELECT * from carac_itens where id_carac_prod = '$id_carac_prod'");
                                            $res4 = $query4->fetchAll(PDO::FETCH_ASSOC);
                                            
                                            for ($i2=0; $i2 < count($res4); $i2++) { 
                                                foreach ($res4[$i2] as $key => $value) {
                                                }

                                                echo "<span class='mr-3'><i class='fa fa-circle mr-1' style='color:".$res4[$i2]['valor_item']."'></i>" .$res4[$i2]['nome']."</span>";

                                            }
                                        

                                        }
                                    }


                                ?>
                            </div>
                        <?php } ?>





                        <div class="tamanho">
                            <p>Selecione o Tamanho</p>
                            <div class="tamanhos">
                            <?php 
                               $query2 = $pdo->query("SELECT * from carac_prod where id_prod = '$id_produto' ");
                                $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                                
                                for ($i=0; $i < count($res2); $i++) { 
                                    foreach ($res2[$i] as $key => $value) {
                                    }

                                    $id_carac = $res2[$i]['id_carac'];
                                    $id_carac_prod = $res2[$i]['id'];
                                    $query3 = $pdo->query("SELECT * from carac where id = '$id_carac' ");
                                    $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                                    $nome_carac = $res3[0]['nome'];
                                    if($nome_carac == 'Tamanho'){
                                        $query5 = $pdo->query("SELECT * from carac_itens where id_carac_prod = '$id_carac_prod'");
                                        $res5 = $query5->fetchAll(PDO::FETCH_ASSOC);
                                        
                                        
                                        for ($i2=0; $i2 < count($res5); $i2++) { 
                                            foreach ($res5[$i2] as $key => $value) {
                                            }
                                                ?>
                                <input type="checkbox"class="input-tamanho-produto" name="<?php echo $res5[$i2]['id'] ?>" id="<?php echo $res5[$i2]['nome'] ?>" value="<?php echo $res5[$i2]['nome'] ?>">
                                <label for="<?php echo $res5[$i2]['nome'] ?>"></label>
                            
                            <?php } }}?>
                                <!-- <input type="checkbox"class="input-tamanho-produto" name="<?php echo $i ?>" id="tamanho-m" value="m">
                                <label for="tamanho-m"></label>
                                <input type="checkbox"class="input-tamanho-produto" name="<?php echo $i ?>" id="tamanho-g" value="g">
                                <label for="tamanho-g"></label>
                                <input type="checkbox"class="input-tamanho-produto" name="<?php echo $i ?>" id="tamanho-gg" value="gg">
                                <label for="tamanho-gg"></label> -->
                            </div>
                        </div>

                    <div class="product__details__quantity">
                        <div class="quantity">
                            <span>Quantidade</span>
                            <div class="pro-qty-produto">
                                <span class="dec qtybtn">-</span>
                                <input type="text" value="1" id="quantidade" name="quantidade">
                                <span class="inc qtybtn">+</span>
                            </div>
                        </div>
                    </div>
                <div class="texto-frete">
                    <p>
                        <?php echo $texto_destaque ?>
                    </p>
                </div>
                <div class="botao">
                    <button id="btn-add-car">
                    <img src="img/icons/cesto-produto.png" alt="icone cesto de produto">
                    SELECIONE O TAMANHO
                    </button>
                    <small><div id="div-mensagem-prod"></div></small>
                </div>

                
                <div class="produto-social">
                    <p>Compartilhe</p>
                    <div class="social-box">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <!-- <a href="#"><img src="img/icons/instagram-red.png" alt="Logo Instagram"></a> -->
                        <a href="#"><img src="img/icons/logo-facebook.png" alt="Logo Facebook"></a>
                    </div>
                </div>
                <div class="produto-calcular-frete">
                    <p>Consultar Frete e Entrega</p>
                    <input type="text" name="cep-calcular-frete" placeholder="13400-000">
                    <span>Não sei meu frete</span>
                    <button>CALCULAR FRETE</button>
                </div>
                
                </form>

            </div>
        </div>
    </div>
</section> 
<section id="produto-descricao">
    <div class="container">
        <div class="produto-descricao">
                <h3>Descrição do Produto</h3>
                <p><?php echo $desc_longa ?></p>
        </div>
        <div class="produto-especificacao">
            <h3>Especificações Técnicas</h3>
            <table class="produto-tabela">
                <tbody>
                    <tr>
                        <th>Categoria</th>
                        <td><?php echo $sub_cat ?></td>
                    </tr>
                    <tr>
                        <th>Cor</th>
                        <td><?php echo "#####" ?></td>
                    </tr>
                    <tr>
                        <th>Gênero</th>
                        <td><?php echo "#####" ?></td>
                    </tr>
                    <tr>
                        <th>Detalhes do produto</th>
                        <td><?php echo $descricao ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<section class="produto-relacionado">
    <div class="container-cordoba">
        <h2>Quem viu este produto comprou estes também...</h2>
         
        <div class="product-container">
                <div class="swiper myProducts">
                    <div class="swiper-wrapper">
                        <?php 
                            $query = $pdo->query("SELECT * FROM produtos order by vendas desc limit 8 ");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);

                            for ($i=0; $i < count($res); $i++) { 
                            foreach ($res[$i] as $key => $value) {
                            }

                            $nome = $res[$i]['nome'];
                            $valor = $res[$i]['valor'];
                            $nome_url = $res[$i]['nome_url'];
                            $imagem = $res[$i]['imagem'];
                            $promocao = $res[$i]['promocao'];
                            $id = $res[$i]['id'];

                            $valor = number_format($valor, 2, ',', '.');

                            if($promocao == 'Sim'){
                                $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id' ");
                                $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
                                $valor_promo = $resp[0]['valor'];
                                $desconto = $resp[0]['desconto'];
                                $valor_promo = number_format($valor_promo, 2, ',', '.');

                        ?>
    
                            <div class="swiper-slide card">
                                <div class="imgbox">
                                    <img src="img/produtos/<?php echo $imagem ?>" alt="">
                                    <ul class="action">
                                        <!-- <li>
                                            <i class="fas fa-heart"></i>
                                            <span>Add aos Favoritos</span>
                                        </li> -->
                                        <li><a href="" onclick="carrinhoModal('<?php echo $id ?>, Não')"><i class="fa fa-shopping-cart"></i></a>
                                            <span>Adicionar ao carrinho</span>
                                        </li>
                                        <li>
                                        <a href="produto-<?php echo $nome_url ?>"><i class="fas fa-eye"></i></a>
                                            <span>Ver Detalhes</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="productName">
                                        <h3><a href="produto-<?php echo $nome_url ?>"><?php echo $nome ?></h3>
                                        <p>Masculino</p>
                                    </div>
                                    <div class="price-rating">
                                        <h2>R$ <?php echo $valor ?></h2>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas grey fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php }else{ ?>


                        <div class="swiper-slide card">
                            <div class="imgbox">
                                <img src="img/produtos/<?php echo $imagem ?>" alt="">
                                <ul class="action">
                                    <!-- <li>
                                        <i class="fas fa-heart"></i>
                                        <span>Add aos Favoritos</span>
                                    </li> -->
                                    <li><a href="" onclick="carrinhoModal('<?php echo $id ?>, Não')"><i class="fa fa-shopping-cart"></i></a>
                                            <span>Adicionar ao carrinho</span>
                                        </li>
                                    <li>
                                    <a href="produto-<?php echo $nome_url ?>"><i class="fas fa-eye"></i></a>
                                        <span>Ver Detalhes</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <div class="productName">
                                    <h3><a href="produto-<?php echo $nome_url ?>"><?php echo $nome ?></a></h3>
                                    <p>Masculino</p>
                                </div>
                                <div class="price-rating">
                                    <h2>R$ <?php echo $valor ?></h2>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas grey fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } } ?>
                    </div>
                    <!-- <div class="swiper-pagination"></div> -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <a class="link-ver-todos" href="produtos.php">Ver Todos</a>
    </div>
</section>

<section id="promocao">
    <div class="container-cordoba">
        <div class="content">
            <div class="headline">
                <h4>Kits / Promoções</h4>
                <div class="links">
                    <?php 
                        $query = $pdo->query("SELECT * FROM categorias order by nome asc ");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);

                        for ($i=0; $i < count($res); $i++) { 
                        foreach ($res[$i] as $key => $value) {
                        }

                        $nome = $res[$i]['nome'];

                        $nome_url = $res[$i]['nome_url'];
                        
                        ?>
                        <a href="sub-categoria-de-<?php echo $nome_url ?>"><?php echo $nome ?></a>

                    <?php } ?>
                </div>
            </div>

            <div class="product-container">
                <div class="swiper myProducts">
                    <div class="swiper-wrapper">

                    <?php 
                            $query = $pdo->query("SELECT * FROM produtos order by vendas desc limit 8 ");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);

                            for ($i=0; $i < count($res); $i++) { 
                            foreach ($res[$i] as $key => $value) {
                            }

                            $nome = $res[$i]['nome'];
                            $valor = $res[$i]['valor'];
                            $nome_url = $res[$i]['nome_url'];
                            $imagem = $res[$i]['imagem'];
                            $promocao = $res[$i]['promocao'];
                            $id = $res[$i]['id'];

                            $valor = number_format($valor, 2, ',', '.');

                            if($promocao == 'Sim'){
                                $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id' ");
                                $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
                                $valor_promo = $resp[0]['valor'];
                                $desconto = $resp[0]['desconto'];
                                $valor_promo = number_format($valor_promo, 2, ',', '.');

                        ?>
    
                            <div class="swiper-slide card">
                                <div class="imgbox">
                                    <img src="img/produtos/<?php echo $imagem ?>" alt="">
                                    <ul class="action">
                                        <!-- <li>
                                            <i class="fas fa-heart"></i>
                                            <span>Add aos Favoritos</span>
                                        </li> -->
                                        <li><a href="" onclick="carrinhoModal('<?php echo $id ?>, Não')"><i class="fa fa-shopping-cart"></i></a>
                                            <span>Adicionar ao carrinho</span>
                                        </li>
                                        <li>
                                        <a href="produto-<?php echo $nome_url ?>"><i class="fas fa-eye"></i></a>
                                            <span>Ver Detalhes</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="productName">
                                        <h3><a href="produto-<?php echo $nome_url ?>"><?php echo $nome ?></a></h3>
                                        <p>Masculino</p>
                                    </div>
                                    <div class="price-rating">
                                        <h2>R$ <?php echo $valor ?></h2>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas grey fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php }else{ ?>


                        <div class="swiper-slide card">
                            <div class="imgbox">
                                <img src="img/produtos/<?php echo $imagem ?>" alt="">
                                <ul class="action">
                                    <!-- <li>
                                        <i class="fas fa-heart"></i>
                                        <span>Add aos Favoritos</span>
                                    </li> -->
                                    <li><a href="" onclick="carrinhoModal('<?php echo $id ?>, Não')"><i class="fa fa-shopping-cart"></i></a>
                                            <span>Adicionar ao carrinho</span>
                                        </li>
                                    <li>
                                    <a href="produto-<?php echo $nome_url ?>"><i class="fas fa-eye"></i></a>
                                        <span>Ver Detalhes</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <div class="productName">
                                    <h3><a href="produto-<?php echo $nome_url ?>"><?php echo $nome ?></a></h3>
                                    <p>Masculino</p>
                                </div>
                                <div class="price-rating">
                                    <h2>R$ <?php echo $valor ?></h2>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas grey fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } } ?>
                    </div>
                    <!-- <div class="swiper-pagination"></div> -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <a class="link-ver-todos" href="produtos.php">Ver Todos</a>
        </div>
        <div class="banner">
            <img src="img/banner/banner-front-pequeno 1.png" alt="Banner">
        </div>
    </div>
</section>              
                    

<?php
require_once("newsletter.php");
require_once("rodape.php");
// require_once("modal-carrinho.php");
?>



<!-- Precisa verificar o bug que não para de add + e -  -->
<!-- <script type="text/javascript">
    var proQtyProd = $('.pro-qty-produto');
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
</script> -->

<script type="text/javascript">
//   jQuery('<span class="dec qtybtn">-</span>').insertBefore('.pro-qty-produto input'); 
//   jQuery('<span class="inc qtybtn">+</span>').insertAfter('.pro-qty-produto input'); 
  jQuery('.pro-qty-produto').each(function() {
    var spinner = jQuery(this),
    input = spinner.find('input[type="text"]'),
    btnUp = spinner.find('.inc'),
    btnDown = spinner.find('.dec'),
    min = input.attr('min'),
    max = input.attr('max');

    btnUp.click(function() {
      var oldValue = parseFloat(input.val());
      if (oldValue >= max) {
        var newVal = oldValue;
      } else {
        var newVal = oldValue + 1;
      }
      spinner.find("input").val(newVal);
      document.getElementById('txtquantidade').value = newVal;
      spinner.find("input").trigger("change");


    });

    btnDown.click(function() {
      var oldValue = parseFloat(input.val());
      if (oldValue <= min) {
        var newVal = oldValue;
      } else {
        var newVal = oldValue - 1;
      }
      spinner.find("input").val(newVal);
      document.getElementById('txtquantidade').value = newVal;
      spinner.find("input").trigger("change");
    });
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
                    
                    // window.location='Modal_carrinho.php';
                    
                    // alert('Produto Adicionado ao carrinho!');
                   console.log($('form'));
                    atualizarCarrinho();
                    toggleCarrinho();
                    
                    // setTimeout(() => {
                        // window.location.reload(true);
                            // }, 700)
                    }
                 else{
                    console.log(msg);
                    $('#div-mensagem-prod').addClass('text-danger')
                    $('#div-mensagem-prod').text(msg);

                 }
            },
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
