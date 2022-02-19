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

if ($modelo == "") {
    $modelo = "Nenhum";
}

if ($promocao == 'Sim') {
    $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id_produto' ");
    $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
    $valor = $resp[0]['valor'];
    $desconto = $resp[0]['desconto'];
}

$valor = number_format($valor, 2, ',', '.');

$querye = $pdo->query("SELECT * FROM tipo_envios where id = '$tipo_envio' ");
$rese = $querye->fetchAll(PDO::FETCH_ASSOC);
$nome_frete = @$rese[0]['nome'];


@session_start();
@$nivel_usuario = $_SESSION['nivel_usuario'];

?>

<!-- Product Details Section Begin -->
<section id="produto" class="product-details spad">
    <div class="container-cordoba">
        <div class="produto-content">
            <div class="produto-galeria">
                <div style="--swiper-navigation-color: #961913; --swiper-pagination-color: #961913" class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide produto">
                            <img class="product__details__pic__item--large" src="img/produtos/<?php echo $imagem ?>" alt="">
                        </div>
                        <?php
                        $query = $pdo->query("SELECT * FROM imagens where id_produto = '$id_produto' ");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);

                        for ($i = 0; $i < count($res); $i++) {
                            foreach ($res[$i] as $key => $value) {
                                $imagem_prod = $res[$i]['imagem'];
                            }
                        ?>
                            <div class='swiper-slide produto'>
                                <img data-imgbigurl='img/produtos/detalhes/<?php echo $imagem_prod ?>' src='img/produtos/detalhes/<?php echo $imagem_prod ?>' alt=''>
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

                        for ($i = 0; $i < count($res); $i++) {
                            foreach ($res[$i] as $key => $value) {

                                $imagem_prod = $res[$i]['imagem'];
                            }

                        ?>
                            <div class='swiper-slide'>
                                <img data-imgbigurl='img/produtos/detalhes/<?php echo $imagem_prod ?>' src='img/produtos/detalhes/<?php echo $imagem_prod ?>' alt=''>
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

                    <!-- Inicio do trecho original -->
                    <!-- <div class="row mt-4 ml-1">  -->
                    
                            <?php
                            $query2 = $pdo->query("SELECT * from carac_prod where id_prod = '$id_produto' ");
                            $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);

                            for ($i = 0; $i < count($res2); $i++) {
                                foreach ($res2[$i] as $key => $value) {
                                }

                                $id_carac = $res2[$i]['id_carac'];
                                $id_carac_prod = $res2[$i]['id'];

                                // if($res2[$i]['id_carac'] === 1){
                                $query3 = $pdo->query("SELECT * from carac where id = '$id_carac' ");
                                $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                                $nome_carac = $res3[0]['nome'];
                                if ($nome_carac == 'Tamanho') {
                                    $query5 = $pdo->query("SELECT * from carac_itens where id_carac_prod = '$id_carac_prod'");
                                    $res5 = $query5->fetchAll(PDO::FETCH_ASSOC);


                                    for ($i2 = 0; $i2 < count($res5); $i2++) {
                                        foreach ($res5[$i2] as $key => $value) {
                                        }
                            ?>


                            <?php }
                                }
                            } ?>
                            <?php
                            print_r(@$_POST['carac']);
                            echo @$res5[$i2]['nome'];
                            $query2 = $pdo->query("SELECT * from carac_prod where id_prod = '$id_produto' ");
                            $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);

                            for ($i = 0; $i < count($res2); $i++) {
                                foreach ($res2[$i] as $key => $value) {
                                }

                                $id_carac = $res2[$i]['id_carac'];
                                $id_carac_prod = $res2[$i]['id'];
                                $query3 = $pdo->query("SELECT * from carac where id = '$id_carac' ");
                                $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                                $nome_carac = $res3[0]['nome'];
                                if ($nome_carac == 'Cor') {
                                    @$tem_cor = 'Sim';
                                    ?>
                                    <div class="tamanho">
                                        <p>Selecione a Cor</p>
                                        <div class="tamanhos">
                                        <span>
                                            <select class='select1' name='<?php echo $i ?>' id='<?php echo $i ?>' size="5" style="display:none">";
                                                <?php

                                                $query4 = $pdo->query("SELECT * from carac_itens where id_carac_prod = '$id_carac_prod'");
                                                $res4 = $query4->fetchAll(PDO::FETCH_ASSOC);
                                                for ($i2 = 0; $i2 < @count($res4); $i2++) {
                                                    foreach ($res4[$i2] as $key => $value) {
                                                    }

                                                    echo "<option value='" . $res4[$i2]['id'] . "' >" . $res4[$i2]['nome'] . "</option>";
                                                    
                                                    // echo "<option value='" . $res4[$i2]['id'] . "' ><img data-imgbigurl='img/produtos/detalhes/". $imagem_prod ."' src='img/produtos/detalhes/". $imagem_prod ."' alt=''> </option>";
                                                }
                                                ?>
                                            </select>
                                        </span>
                                    </div>

                                <?php }


                                if ($nome_carac == 'Tamanho') { ?>
                                    <div class="tamanho">
                                        <p>Selecione o Tamanho</p>
                                        <div class="tamanhos">
                                        <span>
                                            <select class='select1' name='<?php echo $i ?>' id='<?php echo $i ?>' size="5" style="display:none">";
                                                <?php

                                                $query4 = $pdo->query("SELECT * from carac_itens where id_carac_prod = '$id_carac_prod'");
                                                $res4 = $query4->fetchAll(PDO::FETCH_ASSOC);
                                                for ($i2 = 0; $i2 < @count($res4); $i2++) {
                                                    foreach ($res4[$i2] as $key => $value) {
                                                    }

                                                    echo "<option value='" . $res4[$i2]['id'] . "' >" . $res4[$i2]['nome'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </span>
                                    </div>
                            <?php }
                            } ?>

                        <!-- </div> -->

                        <script>
                            $(document).ready(function() {
                                $('.select1').toggle();
                                $(document).click(function(e) {
                                    $('.select1').attr('size', 5);
                                });
                            });
                        </script>


                        <!-- trecho do código original -->
                        <div class="quantity">
                            <span>Quantidade</span>
                            <div class="pro-qty">
                                <span class="dec qtybtn">-</span>
                                <input type="text" name="quantidade" value="1">
                                <span class="inc qtybtn">+</span>
                            </div>
                        </div>
                        <!--  -->

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
                            <small>
                                <div id="div-mensagem-prod"></div>
                            </small>
                        </div>
                </form>
                <!-- fim do trecho original -->

                <div class="produto-social">
                    <p>Compartilhe</p>
                    <div class="social-box">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <!-- <a href="#"><img src="img/icons/instagram-red.png" alt="Logo Instagram"></a> -->
                        <a href="#"><img src="img/icons/logo-facebook.png" alt="Logo Facebook"></a>
                    </div>
                </div>

                <div class="checkout__order__total produto-calcular-frete">
                    <p> Calcular Frete</p>
                    <div class="checkout__input py-2">
                        <form id="frm" method="post">
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <input type="hidden" value="<?php echo @$total_peso ?>" name="total_peso" id="total_peso">
                                    <div class="checkout__input">
                                        <input type="text" name="cep2" id="cep2" placeholder="CEP">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="checkout__input">
                                        <select name="codigo_servico" id="codigo_servico">
                                            <option value="0">Escolher</option>
                                            <option value="40010">Sedex</option>
                                            <option value="41106">PAC</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div id="listar-frete"></div>
                    </div>
                    <div class="checkout__order__total">
                        <p>Total </p><span id="total_final"></span>
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
                        <td><?php echo $nome ?></td>
                    </tr>
                    <tr>
                        <th>Cor</th>
                        <td><?php echo @$res4[$i2]['nome'] ?></td>
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

        <div class="product-container relacionado">
            <div class="swiper  myProducts">
                <div class="swiper-wrapper">
                    <?php
                    $query = $pdo->query("SELECT * FROM produtos order by vendas desc limit 8 ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

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

                        if ($promocao == 'Sim') {
                            $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id' ");
                            $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
                            $valor_promo = $resp[0]['valor'];
                            $desconto = $resp[0]['desconto'];
                            $valor_promo = number_format($valor_promo, 2, ',', '.');

                    ?>

                            <div class="swiper-slide card">
                                <div class="imgbox">
                                    <a href="produto-<?php echo $nome_url ?>"><img src="img/produtos/<?php echo $imagem ?>" alt=""></a>
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
                                        <p><?php echo $nome_categoria ?></p>
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

                        <?php } else { ?>


                            <div class="swiper-slide card">
                                <div class="imgbox">
                                    <a href="produto-<?php echo $nome_url ?>"><img src="img/produtos/<?php echo $imagem ?>" alt=""></a>
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
                                        <p><?php echo $nome_categoria ?></p>
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

                    <?php }
                    } ?>
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
            </div>

            <div class="product-container">
                <div class="swiper myProducts">
                    <div class="swiper-wrapper">

                        <?php
                        $query = $pdo->query("SELECT * FROM produtos order by vendas desc limit 8 ");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);

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

                            if ($promocao == 'Sim') {
                                $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id' ");
                                $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
                                $valor_promo = $resp[0]['valor'];
                                $desconto = $resp[0]['desconto'];
                                $valor_promo = number_format($valor_promo, 2, ',', '.');

                        ?>

                                <div class="swiper-slide card">
                                    <div class="imgbox">
                                        <a href="produto-<?php echo $nome_url ?>"><img src="img/produtos/<?php echo $imagem ?>" alt=""></a>
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
                                            <p><?php echo $nome_categoria ?></p>
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

                            <?php } else { ?>


                                <div class="swiper-slide card">
                                    <div class="imgbox">
                                        <a href="produto-<?php echo $nome_url ?>"><img src="img/produtos/<?php echo $imagem ?>" alt=""></a>
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
                                            <p><?php echo $nome_categoria ?></p>
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

                        <?php }
                        } ?>
                    </div>
                    <!-- <div class="swiper-pagination"></div> -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <a class="link-ver-todos" href="produtos.php?categoria=Promocao">Ver Todos</a>
        </div>
        <div class="banner">
            <img src="img/banner/banner-front-pequeno 1.png" alt="Banner">
        </div>
    </div>
</section>


<?php
require_once("newsletter.php");
require_once("rodape.php");
?>


<script type="text/javascript">
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
    $('#btn-add-car').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: "carrinho/inserir-carrinho.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(msg) {
                if (msg.trim() === 'Cadastrado com Sucesso!!') {
                    console.log($('form'));
                    atualizarCarrinho();
                    toggleCarrinho();
                } else {
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
            url: "carrinho/listar-carrinho.php",
            method: "post",
            data: $('#frm').serialize(),
            dataType: "html",
            success: function(result) {
                $('#listar-carrinho').html(result)
            },
        })
    }
</script>