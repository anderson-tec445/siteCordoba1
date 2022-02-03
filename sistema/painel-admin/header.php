<?php 
require_once("../../conexao.php"); 
@session_start();
    //verificar se o usuário está autenticado
if(@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'Admin'){
    echo "<script language='javascript'> window.location='../index.php' </script>";

}


$agora = date('Y-m-d');

    //variaveis para o menu
$pag = @$_GET["pag"];
$menu1 = "produtos";
$menu2 = "categorias";
$menu3 = "sub-categorias";
$menu4 = "combos";
$menu5 = "promocoes";
$menu6 = "clientes";
$menu7 = "vendas";
$menu8 = "backup";
$menu9 = "tipo-envios";
$menu10 = "carac";
$menu11 = "alertas";


//CONSULTAR O BANCO DE DADOS E TRAZER OS DADOS DO USUÁRIO
$res = $pdo->query("SELECT * FROM usuarios where id = '$_SESSION[id_usuario]'"); 
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$nome_usu = @$dados[0]['nome'];
$email_usu = @$dados[0]['email'];
$cpf_usu = @$dados[0]['cpf'];



//SCRIPT PARA VERIFICAR OS PRODUTOS QUE ESTÃO EM PROMOÇÃO
$pdo->query("UPDATE produtos SET promocao = 'Não' "); 
$res = $pdo->query("SELECT * FROM promocoes where ativo = 'Sim' and data_inicio <= curDate() and data_final >= curDate() "); 
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
for ($i=0; $i < count($dados); $i++) { 
                      foreach ($dados[$i] as $key => $value) {
                      }
$id_pro = @$dados[$i]['id_produto'];

$pdo->query("UPDATE produtos SET promocao = 'Sim' where id = $id_pro"); 
}
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">


    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/style-painel.css" rel="stylesheet">

    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <link rel="shortcut icon" href="../../img/cordoba-logo" type="image/x-icon">
    <link rel="icon" href="../../img/cordoba-logo" type="image/x-icon">


    <title>Painel Administrativo</title>
</head>

<body>
  

           
