<?php
    require_once("cabecalho.php");

    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);


  $num_cat = '';
  $num_subcat = '';


// Filtro do buscar
if (@$_GET['txtBuscar'] != "") {
    $buscar = '%' . @$_GET['txtBuscar'] . '%';
} else {
    $buscar = '%';
}


// Busca as categorias para fazer o filtro
  $query = $pdo->query("SELECT * FROM categorias order by nome asc ");
  $categorias = $query->fetchAll(PDO::FETCH_ASSOC);

  for($cat = 0 ; $cat < count($categorias) ; $cat++){
      foreach ($categorias[$cat] as $key => $value) {
    }
        // Comparando nome do REQUEST com Categoria
        if(@$_REQUEST['categoria'] === $categorias[$cat]['nome']){
        @$categoria_nome = $categorias[$cat]['nome'];
        @$id_categoria = $categorias[$cat]['id'];
        }
    };

// Busca as SUB categorias para fazer o filtro
  $query = $pdo->query("SELECT * FROM sub_categorias order by nome asc ");
  $subcategorias = $query->fetchAll(PDO::FETCH_ASSOC);

  for($scat = 0 ; $scat < count($subcategorias) ; $scat++){
      foreach ($subcategorias[$scat] as $key => $value) {
    }
        // Comparando nome do REQUEST com Categoria
        if(@$_REQUEST['subcategoria'] === $subcategorias[$scat]['nome']){
            @$subcategoria_nome = $subcategorias[$scat]['nome'];
            
            @$id_subcategoria = $subcategorias[$scat]['id'];
        }
    };

    if(@$_REQUEST['categoria'] === @$categoria_nome){
        echo '
        <div class="container-cordoba">
            <div class="titulo-pag-produto">
                <h4>'.@$categoria_nome.'</h4>
            </div>
        </div>' ;
        @$num_cat = "WHERE categoria = '{$id_categoria}' ";
        // $id_categoria;
    }elseif(@$_REQUEST['categoria'] === 'Lancamento'){
        echo '
            <div class="container-cordoba">
                <div class="titulo-pag-produto">
                    <h4>Lançamentos</h4>
                </div>
            </div>' ;
        $num_cat = '';
    }elseif(@$_REQUEST['categoria'] === 'Promocao'){
        echo '
            <div class="container-cordoba">
                <div class="titulo-pag-produto">
                    <h4>Promoções</h4>
                </div>
            </div>' ;
        $num_cat = "WHERE promocao = 'Sim'";
    }else{
        @$num_cat = "";
    }

if(@$_REQUEST['subcategoria'] === @$subcategoria_nome && !@$_REQUEST['categoria']){
    echo '
        <div class="container-cordoba">
            <div class="titulo-pag-produto">
                <h4>'.@$subcategoria_nome.'</h4>
            </div>
        </div>' ;
        @$num_subcat = "WHERE sub_categoria = '{$id_subcategoria}' ";
}elseif(@$_REQUEST['subcategoria'] === @$subcategoria_nome){
    echo '
        <div class="container-cordoba">
            <div class="titulo-pag-produto">
                <h4>'.@$subcategoria_nome.'</h4>
             </div>
        </div>' ;
    @$num_subcat = " AND sub_categoria = '{$id_subcategoria}' ";
}else{
    @$num_subcat = " ";
}

?>

<!-- Product Section Begin -->
<!-- <section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>SubCategorias</h4>
                        <ul>
                            <?php 
                            $query = $pdo->query("SELECT * FROM sub_categorias order by nome asc ");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);

                            for ($i=0; $i < count($res); $i++) { 
                              foreach ($res[$i] as $key => $value) {
                              }

                              $nome = $res[$i]['nome'];
                              $nome_categoria = $res[$i]['nome'];

                              $nome_url = $res[$i]['nome_url'];

                              ?>
                              <li><a href="produtos-<?php echo $nome_url ?>"><?php echo $nome ?></a></li>

                          <?php } ?>

                      </ul>
                  </div>
                  <div class="sidebar__item">
                    <h4>Filtrar Por Valor R$</h4>
                    <div class="price-range-wrap">
                        <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                        data-min="10" data-max="1000">
                        <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                    </div>
                    <div class="range-slider">
                        <div class="price-input">
                            <form method="get" action="lista-produtos.php" name="form_valor">
                                <input type="text" name="valor-inicial" id="minamount">
                                <input type="text" name="valor-final" id="maxamount">
                                <a href="#" onclick="document.form_valor.submit(); return false;" class="text-dark">
                                    <i class="fa fa-search ml-2"></i>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
            <section id="lista-produtos">
                <div class="container-cordoba">
                    <div class="product-container lista">

                            <?php 
                            if(!@$_REQUEST['categoria'] && !@$_REQUEST['subcategoria'] && !@$_GET['txtBuscar']){
                                $query = $pdo->query("SELECT * FROM produtos order by id desc limit 6 ");
                                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                            }elseif(@$_GET['txtBuscar']){
                                $query = $pdo->query("SELECT * FROM produtos where nome LIKE '$buscar' or palavras like '$buscar' or categoria like '$buscar' or sub_categoria like '$buscar' order by id");
                                $res = @$query->fetchAll(PDO::FETCH_ASSOC);
                            }elseif(@$_REQUEST['categoria'] && !@$_REQUEST['subcategoria']){
                                $query = $pdo->query("SELECT * FROM produtos $num_cat order by id desc limit 6 ");
                                $res = @$query->fetchAll(PDO::FETCH_ASSOC);
                            }
                            elseif(!@$_REQUEST['categoria'] && @$_REQUEST['subcategoria']){
                                $query = $pdo->query("SELECT * FROM produtos $num_subcat order by id desc limit 6 ");
                                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                            }elseif(@$_REQUEST['categoria'] && @$_REQUEST['subcategoria']){
                                $query = $pdo->query("SELECT * FROM produtos $num_cat $num_subcat order by id desc limit 6 ");
                                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                            }
                            // $query = $pdo->query("SELECT * FROM produtos $num_cat order by id desc limit 6 ");
                            // $res = $query->fetchAll(PDO::FETCH_ASSOC);

                            for ($i=0; $i < count($res); $i++) { 
                              foreach ($res[$i] as $key => $value) {
                              }

                              $nome = $res[$i]['nome'];
                              $valor = $res[$i]['valor'];
                              $nome_url = $res[$i]['nome_url'];
                              $imagem = $res[$i]['imagem'];
                              $promocao = $res[$i]['promocao'];
                              $id = $res[$i]['id'];

                              if($promocao == 'Sim'){
                                $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id' ");
                                $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
                                $valor = $resp[0]['valor'];
                                $valor = number_format($valor, 2, ',', '.');
                            }else{
                                $valor = number_format($valor, 2, ',', '.');
                            }

                            ?>


                        <div class="card">
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
                    <?php } ?>
                    <?php 
                        @$query = $pdo->query("SELECT * FROM produtos $num_cat order by id desc limit 6,6 ");
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

                            if($promocao == 'Sim'){
                            $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id' ");
                            $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
                            $valor = $resp[0]['valor'];
                            $valor = number_format($valor, 2, ',', '.');
                        }else{
                            $valor = number_format($valor, 2, ',', '.');
                        }
                    ?>
                        <div class="card">
                            <div class="imgbox">
                            <a href="produto-<?php echo $nome_url ?>"><img src="img/produtos/<?php echo $imagem ?>" alt=""></a>
                                <ul class="action">
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
                    <?php } ?>

                    <?php 
                    $query = $pdo->query("SELECT * FROM produtos order by id desc limit 12,6 ");
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

                      if($promocao == 'Sim'){
                        $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id' ");
                        $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
                        $valor = $resp[0]['valor'];
                        $valor = number_format($valor, 2, ',', '.');
                    }else{
                        $valor = number_format($valor, 2, ',', '.');
                    }
                    ?>


                    <div class="card">
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

                <?php } ?>
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
// require_once("modal-carrinho.php");
?>
