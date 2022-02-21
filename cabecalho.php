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

<!-- Login Facebook -->
<script>

  function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
    console.log('statusChangeCallback');
    console.log(response);                   // The current login status of the person.
    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
      testAPI();  
    } else {                                 // Not logged into your webpage or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this webpage.';
    }
  }


  function checkLoginState() {               // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function(response) {   // See the onlogin handler
      statusChangeCallback(response);
    });
  }


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '451774609941079',
      cookie     : true,                     // Enable cookies to allow the server to access the session.
      xfbml      : true,                     // Parse social plugins on this webpage.
      version    : 'v13.0'           // Use this Graph API version for this call.
    });


    FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
      statusChangeCallback(response);        // Returns the login status.
    });
  };
 
  function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }

</script>


<!-- The JS SDK Login Button -->

<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>

<!-- Load the JS SDK asynchronously -->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>


<script>
//   window.fbAsyncInit = function() {
//     FB.init({
//       appId      : '',
//       cookie     : true,
//       xfbml      : true,
//       version    : 'v13.0'
//     });
      
//     FB.AppEvents.logPageView();   
      
//   };

//   (function(d, s, id){
//      var js, fjs = d.getElementsByTagName(s)[0];
//      if (d.getElementById(id)) {return;}
//      js = d.createElement(s); js.id = id;
//      js.src = "https://connect.facebook.net/en_US/sdk.js";
//      fjs.parentNode.insertBefore(js, fjs);
//    }(document, 'script', 'facebook-jssdk'));


// function checkLoginState() {
//     FB.getLoginStatus(function(response) {
//     statusChangeCallback(response);
//     });
// }




</script>
    <!-- Fim do Login Facebook -->

    <!-- <fb:login-button  -->
  <!-- scope="public_profile,email" -->
  <!-- onlogin="checkLoginState();"> -->
<!-- </fb:login-button> -->


    <!-- Page Preloder 
    <div id="preloder">
        <div class="loader"></div>
    </div> -->
    <!-- <div id="fb-root"></div> -->
<!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v13.0&appId=451774609941079&autoLogAppEvents=1" nonce="gEcVnlTk"></script> -->

<!-- <div class="fb-login-button" data-width="" data-size="small" data-button-type="login_with" data-layout="default" data-auto-logout-link="true" data-use-continue-as="false"></div> -->

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
                    <li><a href="produtos.php?categoria=Masculino">MASCULINO</a></li>
                    <li><a href="produtos.php?categoria=Feminino">FEMININO</a></li>
                    <li><a href="produtos.php?categoria=Lancamento">LANÇAMENTOS</a></li>
                    <li><a href="produtos.php?categoria=Promocao">PROMOÇÕES</a></li>
                    <!-- <li><a href="promocoes.php">PROMOÇÕES</a></li> -->
                </ul>
            </div>
            <div class="busca">
                <form action="produtos.php" method="get">          
                    <input name="txtBuscar" type="text" placeholder="O que você procura?">
                    <button type="submit" class="site-btn"><i class="fas fa-search"></i></button>
                </form>
                <!-- <input type="text" name="buscar" placeholder="O que você procura?"> -->
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