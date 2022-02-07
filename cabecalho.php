<?php
require_once("config.php");
require_once("conexao.php");
@session_start();
$id_usuario = @$_SESSION['id_usuario'];


//VERIFICAR TOTAIS DO CARRINHO
$res = $pdo->query("SELECT * from carrinho where id_usuario = '$id_usuario' and id_venda = 0 order by id asc");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados);

if ($linhas == 0) {
    $linhas = 0;
    $total = 0;
}

$total;
for ($i = 0; $i < count($dados); $i++) {
    foreach ($dados[$i] as $key => $value) {
    }

    $combo = $dados[$i]['combo'];
    $id_produto = $dados[$i]['id_produto'];
    $quantidade = $dados[$i]['quantidade'];

    if ($combo == 'Sim') {
        $res_p = $pdo->query("SELECT * from combos where id = '$id_produto' ");
    } else {
        $res_p = $pdo->query("SELECT * from produtos where id = '$id_produto' ");
    }

    $dados_p = $res_p->fetchAll(PDO::FETCH_ASSOC);

    if ($combo == 'Sim') {
        $promocao = "";
        $pasta = "combos";
    } else {
        $promocao = $dados_p[0]['promocao'];
        $pasta = "produtos";
    }

    if ($promocao == 'Sim') {
        $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id_produto' ");
        $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
        $valor = $resp[0]['valor'];
    } else {
        $valor = $dados_p[0]['valor'];
    }


    $total_item = $valor * $quantidade;
    @$total = @$total + $total_item;
}

@$total_c = number_format(@$total, 2, ',', '.');

?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Imports -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- style / icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="shortcut icon" href="img/icons/miniatura.jpeg" type="image/x-icon">
    <link rel="icon" href="img/icons/miniatura.jpeg" type="image/x-icon">


    <title><?php echo $nome_loja ?></title>
</head>

<body>


    <!-- Page Preloder 
    <div id="preloder">
        <div class="loader"></div>
    </div> -->


    <header>
        <div class="card-frete">
            <p><?php echo $texto_destaque ?></p>
        </div>
        <div class="menu-acesso">
            <a href="#">Acompanhar Pedidos</a>
            <?php
            if (@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'Cliente') {
            ?>
                <a href="sistema">Login / Inscreva-se</a>
            <?php } else { ?>
                <a href="sistema/painel-cliente">Painel /</a>
                <a href="sistema/logout.php">Sair</a>
            <?php } ?>
        </div>
        <nav class="container-cordoba">
            <div class="logo">
                <a href="index.php"><img src="img/cordoba-logo.png" alt="Cordoba"></a>
            </div>
            <div class="toggle" onclick="toggleMenu()"></div>
            <div class="menu">
                <ul>
                    <!-- precisa ajustar o link para as categorias -->
                    <li><a href="produtos.php?masculino">MASCULINO</a></li>
                    <li><a href="#">FEMININO</a></li>
                    <li><a href="#">LANÇAMENTOS</a></li>
                    <li><a href="promocoes.php">PROMOÇÕES</a></li>
                </ul>
            </div>
            <div class="busca">
                <input type="text" name="buscar" placeholder="O que você procura?">
                <i class="fas fa-search"></i>
            </div>
            <div class="icons">
                <i class="fas fa-shopping-cart" onclick="toggleCarrinho()"></i>
                <i class="fas fa-user" onclick="toggleModalLogin()"></i>
            </div>
        </nav>
    </header>

</body>

</html>

<?php
include_once 'Modal_login.php';
include_once 'Modal_newsletter.php';
include_once 'Modal_carrinho.php';
include_once 'Modal_cookie.php';

?>