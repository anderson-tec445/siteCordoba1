<?php
require_once("cabecalho.php");
require_once("conexao.php");
@session_start();
?>
<!-- comentario -->
<!-- Seção do banner -->
<section id="inicio">
    <div class="swiper bannerprincipal mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide banner">
                <img src="img/banner/banner-front 1.png" alt="banner">
            </div>
            <div class="swiper-slide banner">
                <img src="img/banner/banner-front 1.png" alt="banner">
            </div>
            <div class="swiper-slide banner">
                <img src="img/banner/banner-front 1.png" alt="banner">
            </div>
        </div>
    </div>
    <div class="info-cards">
        <div class="info-card">
            <img src="img/icons/icon-desconto.png" alt="Ícone de porcentagem">
            <div class="text">
                <h6>No pix tem <br>desconto</h6>
                <p>*Exceto produtos em promoção</p>
            </div>
        </div>

        <div class="info-card">
            <img src="img/icons/icon-escudo.png" alt="Ícone de proteção">
            <div class="text">
                <h6>Site 100% seguro</h6>
            </div>
        </div>

        <div class="info-card">
            <img src="img/icons/icon-comercio.png" alt="Ícone de comércio">
            <div class="text">
                <h6>+ de 200 mil clientes <br>satisfeitos</h6>
            </div>
        </div>
    </div>
    <div class="container-cordoba">
        <div class="categoria-box">
            <div class="categoria-card">
                <div class="categoria-card-img">
                    <a class="btn-normal" href="produtos.php?subcategoria=Cuecas"><img src="img/categorias/cueca.png" alt=""></a>
                </div>
                <a class="btn-normal" href="produtos.php?subcategoria=Cuecas">Cuecas</a>
            </div>
            <div class="categoria-card">
                <div class="categoria-card-img">
                    <a class="btn-normal" href="produtos.php?subcategoria=Calcinhas"><img src="img/categorias/calcinhas.png" alt=""></a>
                </div>
                <a class="btn-normal" href="produtos.php?subcategoria=Calcinhas">Calcinhas</a>
            </div>
            <div class="categoria-card">
                <div class="categoria-card-img">
                    <a class="btn-normal" href="produtos.php?subcategoria=Meias"><img src="img/categorias/meia.png" alt=""></a>
                </div>
                <a class="btn-normal" href="produtos.php?subcategoria=Meias">Meias</a>
            </div>
        </div>

        <div class="cordoba-text-box">
            <h3>
            Conheça o verdadeiro significado de 
            <br>Estilo e Conforto!
            </h3>
            <a class="btn-forms" href="produtos.php">Produtos</a>
        </div>
    </div>
</section>
<!-- Fim da Seção do banner -->

<!-- DESTAQUE -->

<section id="destaques">
    <div class="container-cordoba">
        <div class="banner">
            <img src="img/banner/banner-pix.png" alt="Banner de pagamento com pix">
        </div>
        <div class="content">
            <div class="headline">
                <h4>DESTAQUES</h4>
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

             

    </div>
</section>
<!-- FIM DO DESTAQUE -->

<!-- PROMOÇÃO -->

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
            <a class="link-ver-todos" href="produtos.php?categoria=Promocao">Ver Todos</a>
        </div>
        <div class="banner">
            <img src="img/banner/banner-front-pequeno 1.png" alt="Banner">
        </div>
    </div>
</section>

<!-- FIM PROMOÇÃO -->



<?php
require_once("newsletter.php");
require_once("rodape.php");
//require_once("modal_carrinho.php");
?>
