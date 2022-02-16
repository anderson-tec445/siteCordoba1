<?php 
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME,'ptb', 'ptb.utf-8', 'portuguese');
require_once("../../conexao.php"); 
@session_start();
    //verificar se o usuário está autenticado
if(@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'Cliente'){
    echo "<script language='javascript'> window.location='../index.php' </script>";

}

$date = new DateTime();
$agora = date('Y-m-d');

    //variaveis para o menu
$pag = @$_GET["pag"];
$menu1 = "pedidos";


//CONSULTAR O BANCO DE DADOS E TRAZER OS DADOS DO USUÁRIO
$res = $pdo->query("SELECT * FROM usuarios where id = '$_SESSION[id_usuario]'"); 
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$nome_usu = @$dados[0]['nome'];
$email_usu = @$dados[0]['email'];
$cpf_usu = @$dados[0]['cpf'];



?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Dev.org">

    <title>Painel Cliente</title>

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

    <link rel="shortcut icon" href="../img-sistema/icons/miniatura.jpeg" type="image/x-icon">
    <link rel="icon" href="../img-sistema/icons/miniatura.jpeg" type="image/x-icon">

</head>

<body id="page-top">

<div class="main">
        <div class="topbar">
            <div><img src="../img-sistema/cordoba-logo-painel.png" alt=""></div>
           <div class="time">
               <?php
               echo date_format($date,'H:i:s') . '<br>'; ?>
               <?php echo date_format($date,"l d F Y") ?>
           </div>
            <div class="user">
                <h3><?php echo @$nome_usu ?></h3>
                <a href="#" data-toggle="modal" data-target="#ModalPerfil">Configuração <img src="../img-sistema/icons/icon-tools.png" alt=""></a>
                <a href="../logout.php">Sair <img src="../img-sistema/icons/icon-off.png" alt=""></a>
            </div>
        </div>

        <div class="navigation">
            <div class="toggle" onclick="menuToggle()"></div>
        <!-- Page Wrapper -->
        <!-- <div id="wrapper"> -->

        <!-- Sidebar -->
            <ul class="accordion" id="accordionSidebar">

                <li class="side-menu">
                    <a class=" collapsed" href="index.php" >
                        <span class="icon">
                            <img src="../img-sistema/icons/icon-casa.png" alt="Icone de casa">
                        </span>
                        <span class="title">Inicio</span>
                    </a>
                </li>

                <li class="side-menu">
                    <a class=" collapsed" href="index.php?pag=<?php echo $menu1 ?>" >
                        <span class="icon">
                            <img src="../img-sistema/icons/icon-jornal.png" alt="Icone de pedidos">
                        </span>
                        <span class="title">Pedidos <span class="tracinho"></span></span>
                    </a>
                </li>
            </ul>
        </div>

                <!-- Begin Page Content -->
        <div class="container-fluid">

            <?php if ($pag == null) { 
                include_once("home.php"); 
            } else if ($pag==$menu1) {
                include_once($menu1.".php");
            } else {
                include_once("home.php");
            }
            ?>
        </div>
</div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>




                <!--  Modal Perfil-->
                <div class="modal fade" id="ModalPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>



                            <form id="form-perfil" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">



                                    <div class="form-group">
                                        <label >Nome</label>
                                        <input value="<?php echo @$nome_usu ?>" type="text" class="form-control" id="nome-usuario" name="nome-usuario" placeholder="Nome">
                                    </div>

                                    <div class="form-group">
                                        <label >CPF</label>
                                        <input value="<?php echo @$cpf_usu ?>" type="text" class="form-control" id="cpf-usuario" name="cpf-usuario" placeholder="CPF">
                                    </div>

                                    <div class="form-group">
                                        <label >Email</label>
                                        <input value="<?php echo @$email_usu ?>" type="email" class="form-control" id="email-usuario" name="email-usuario" placeholder="Email">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >Senha</label>
                                                <input value="" type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                <label >Confirmar Senha</label>
                                                <input value="" type="password" class="form-control" id="conf-senha" name="conf-senha" placeholder="Senha">
                                            </div>
                                        </div>
                                    </div>






                                    <small>
                                        <div id="mensagem-perfil" class="mr-4">

                                        </div>
                                    </small>



                                </div>
                                <div class="modal-footer">


                                    <!-- Esse input não tem no sistema.php -->
                                    <input value="<?php echo $_SESSION['id_usuario'] ?>" type="hidden" name="txtid" id="txtid">
                                    <input value="<?php echo $_SESSION['cpf_usuario'] ?>" type="hidden" name="antigo" id="antigo">

                                    <button type="button" id="btn-fechar-perfil" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="btn-salvar-perfil" id="btn-salvar-perfil" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>






                <!-- Core plugin JavaScript-->
                <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="../js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="../vendor/chart.js/Chart.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="../js/demo/chart-area-demo.js"></script>
                <script src="../js/demo/chart-pie-demo.js"></script>

                <!-- Page level plugins -->
                <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
                <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="../js/demo/datatables-demo.js"></script>

            </body>

            </html>






<script type="text/javascript">
    $('#btn-salvar-perfil').click(function(event){
        event.preventDefault();
        
        $.ajax({
            url:"editar-perfil.php",
            method:"post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(msg){
               if(msg.trim() === 'Salvo com Sucesso!'){
                                        
                    $('#btn-fechar-perfil').click();
                    window.location='index.php';

                    }
                 else{
                    $('#mensagem-perfil').addClass('text-danger')
                    $('#mensagem-perfil').text(msg);
                   

                 }
            }
        })
    })
</script>




<script type="text/javascript">
    $('#btn-salvar-email').click(function(event){
        event.preventDefault();
        $('#mensagem-email-marketing').addClass('text-info')
        $('#mensagem-email-marketing').removeClass('text-danger')
        $('#mensagem-email-marketing').removeClass('text-success')
        $('#mensagem-email-marketing').text('Enviando')
        $.ajax({
            url:"email-marketing.php",
            method:"post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(msg){
               if(msg.trim() === 'Enviado com Sucesso!'){
                    $('#mensagem-email-marketing').removeClass('text-info')
                    $('#mensagem-email-marketing').addClass('text-success')
                    $('#mensagem-email-marketing').text(msg);
                    $('#assunto-email').val('');
                    $('#link-email').val('');
                    $('#mensagem-email').val('');
                    

                 }else if(msg.trim() === 'Preencha o Campo Assunto!'){
                    
                    $('#mensagem-email-marketing').addClass('text-danger')
                    $('#mensagem-email-marketing').text(msg);
                 

                 }else if(msg.trim() === 'Preencha o Campo Mensagem!'){
                    
                    $('#mensagem-email-marketing').addClass('text-danger')
                    $('#mensagem-email-marketing').text(msg);
                 

                
                 }

                 else{
                    $('#mensagem-email-marketing').addClass('text-danger')
                    $('#mensagem-email-marketing').text('Deu erro ao Enviar o Formulário! Provavelmente seu servidor de hospedagem não está com permissão de envio habilitada ou você está em um servidor local!');
                    //$('#div-mensagem').text(msg);

                 }
            }
        })
    })
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../../js/mascara.js"></script>


<!-- Esse trecho estava na pagina antes -->
<script>
    function detalhesToggle(){
        var detalhes = document.querySelectorAll('.detalhes');

        var iconBox = document.querySelectorAll('.side-menu a');
        for(var i = 0; i <iconBox.length; i++){
            iconBox[i].addEventListener('click', function() {
                for(var i=0; i < detalhes.length; i++){
                    
                    detalhes[i].className = 'detalhes';
                }
                document.getElementById(this.dataset.id).className = 'detalhes active'

                for(var i=0; i < iconBox.length; i++){
                    iconBox[i].className = 'iconBox';
                }

                this.className = "iconBox active";
            })
        }
    }

    function menuToggle(){
        var menuToggle = document.querySelector('.navigation');
        var container = document.querySelector('.container-fluid');
        menuToggle.classList.toggle('active');
        container.classList.toggle('active');
    }
</script>
