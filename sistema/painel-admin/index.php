<?php 
require_once("../../conexao.php"); 
@session_start();
    //verificar se o usuário está autenticado
if(@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'Admin'){
    echo "<script language='javascript'> window.location='../index.php' </script>";

}

error_reporting(E_ALL);
ini_set('display_errors', '1');

//verificar se tem estoque baixo
@$query = $pdo->query("SELECT * FROM produtos where estoque <= '$nivel_estoque' order by estoque asc ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0){
    $classe_estoque = 'text-warning';
}else{
    $classe_estoque = '';
}

// $fmt = new IntlDateFormatter(
//     'pt_BR',
//     IntlDateFormatter::FULL,
//     IntlDateFormatter::FULL,
//     'America/Sao_Paulo',
//     IntlDateFormatter::GREGORIAN,
// );
// $date = new DateTime('2022-02-15 11:45:12');
 
// echo $fmt->format($date->getTimestamp());



// $date = new DateTime();
$param = date("Y-m-d");
setlocale(LC_ALL, 'pt_BR', "pt_BR.iso-8859-1", "pt_BR.utf-8", 'portuguese');
ucfirst(utf8_encode(strftime("%A, %d de %B de %Y", strtotime($param))));
$date = date_create();
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
$menu12 = "cupons";
$menu13 = "estoque";
$menu14 = "emitir-nf";
$menu15 = "dashboard";
$menu16 = "chat";
$menu17 = "email-marketing";
$menu18 = "usuarios";
$menu19 = "pedidos";
$menu20 = "rastreio";
$menu21 = "emitir-etiqueta";

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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Company Garcia">

    <title>Painel Administrativo</title>

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
               <?php echo ucfirst(utf8_encode(strftime("%A, %d de %B de %Y", strtotime($param)))); ?>
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
                <a class=" collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span class="icon">
                        <img src="../img-sistema/icons/icon-jornal.png" alt="Icone de pedidos">
                    </span>
                    <span class="title">Pedidos <span class="tracinho"></span></span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="ml-3 py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?pag=<?php echo $menu7 ?>">Pedidos</a>
                        <a class="collapse-item" href="index.php?pag=<?php echo $menu20 ?>">Rastrear Pedido</a>
                        <a class="collapse-item" href="index.php?pag=<?php echo $menu14 ?>">Emitir Nota Fiscal</a>
                        <a class="collapse-item" href="index.php?pag=<?php echo $menu21 ?>">Emitir Etiqueta</a>
                    </div>
                </div>
            </li>

            <li class="side-menu" data-id="content3">
                    <a href="index.php?pag=<?php echo $menu15 ?>" >
                        <span class="icon"><img src="../img-sistema/icons/icon-tabela.png" alt="Icone do dash Board"></span>
                        <span class="title">Dash Board</span>
                    </a>
                </li>

            <li class="side-menu">
                <a class=" collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <span class="icon">
                        <img src="../img-sistema/icons/icon-cesto.png" alt="Icone de Produtos">
                    </span>
                    <span class="title">Produtos</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="ml-3 py-2 collapse-inner rounded">

                        <a class="collapse-item" href="index.php?pag=<?php echo $menu1 ?>">Produtos</a>
                        <a class="collapse-item" href="index.php?pag=<?php echo $menu2 ?>">Categorias</a>
                        <a class="collapse-item" href="index.php?pag=<?php echo $menu3 ?>">Sub Categorias</a>
                        <a class="collapse-item" href="index.php?pag=<?php echo $menu9 ?>">Tipo Envios</a>
                        <a class="collapse-item" href="index.php?pag=<?php echo $menu10 ?>">Características</a>
                    </div>
                </div>
            </li>

            <li class="side-menu" data-id="content5">
                <a href="index.php?pag=<?php echo $menu6 ?>" >
                    <span class="icon"><img src="../img-sistema/icons/icon-usuarios.png" alt="Icone de clientes"></span>
                    <span class="title">Clientes</span>
                </a>
            </li>

            <li class="side-menu" data-id="content6">
                <a href="index.php?pag=<?php echo $menu20 ?>" >
                    <span class="icon"><img src="../img-sistema/icons/icon-carro.png" alt="Icone de Rastrear Pedido"></span>
                    <span class="title">Rastrear Pedido</span>
                </a>
            </li>

            <li class="side-menu" data-id="content7">
                <a href="index.php?pag=<?php echo $menu14 ?>" >
                    <span class="icon"><img src="../img-sistema/icons/icon-papel.png" alt="Icone de Emissão de NF"></span>
                    <span class="title">Emissão de NF</span>
                </a>
            </li>

            <li class="side-menu" data-id="content8">
                <a href="index.php?pag=<?php echo $menu21 ?>" >
                    <span class="icon"><img src="../img-sistema/icons/icon-etiqueta.png" alt="Icone de Emissão de Etiqueta"></span>
                    <span class="title">Emissão de Etiqueta</span>
                </a>
            </li>

            <li class="side-menu" data-id="content9">
                <a href="index.php?pag=<?php echo $menu16 ?>" >
                    <span class="icon"><img src="../img-sistema/icons/icon-converca.png" alt="Icone de Chat Online"></span>
                    <span class="title">Chat Online</span>
                </a>
            </li>

            <li class="side-menu" data-id="content10">
                <a href="index.php?pag=<?php echo $menu17 ?>" data-toggle="modal" data-target="#ModalEmail">
                    <span class="icon"><img src="../img-sistema/icons/icon-email.png" alt="Icone de E-mail Marketing"></span>
                    <span class="title">E-mail Marketing</span>
                </a>
            </li>

            <li class="side-menu" data-id="content11">
                <a href="index.php?pag=<?php echo $menu18 ?>" >
                    <span class="icon"><img src="../img-sistema/icons/icon-usuario.png" alt="Icone de Usuários"></span>
                    <span class="title">Usuários</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="side-menu">
                <a class=" collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <span class="icon"><i class="fas fa-percent"></i></span>
                <span class="title">Combos e Promoções</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="ml-3 py-2 collapse-inner rounded">

                        <a class="collapse-item" href="index.php?pag=<?php echo $menu4 ?>">Combos</a>
                        <a class="collapse-item" href="index.php?pag=<?php echo $menu5 ?>">Promoções</a>
                        <a class="collapse-item" href="index.php?pag=<?php echo $menu11 ?>">Alertas</a>
                        <a class="collapse-item" href="index.php?pag=<?php echo $menu12 ?>">Cupons</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
             <!-- <li class="side-menu">
                <a class="" href="index.php?pag=<?php echo $menu12 ?>">
                    <span class="icon"><i class="fas fa-fw fa-chart-area"></i></span>
                    <span class="title">Cupons</span>
                </a>
            </li> -->

            <li class="nav-item">
                <a class="" href="index.php?pag=<?php echo $menu13 ?>">
                    <span class="icon"><i class="fas fa-fw fa-table <?php echo $classe_estoque ?>"></i></span>
                    <span class="title <?php echo $classe_estoque ?>">Estoque Baixo</span>  
                </a>
            </li>

            <li class="nav-item">
                <a class="" href="backup.php">
                    <span class="icon"><i class="fas fa-fw fa-table"></i></span>
                    <span class="title">Backup</span>
                </a>
            </li>
                        <!-- Sidebar Toggler (Sidebar) -->
                        <!-- <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle"></button>
                        </div> -->
        </ul>
    </div>

    <div class="container-fluid">

            <?php if ($pag == null) {
                include_once("home.php");
            } else if ($pag == $menu1) {
                include_once($menu1 . ".php");
            } else if ($pag == $menu2) {
                include_once($menu2 . ".php");
            } else if ($pag == $menu3) {
                include_once($menu3 . ".php");
            } else if ($pag == $menu4) {
                include_once($menu4 . ".php");
            } else if ($pag == $menu5) {
                include_once($menu5 . ".php");
            } else if ($pag == $menu6) {
                include_once($menu6 . ".php");
            } else if ($pag == $menu7) {
                include_once($menu7 . ".php");
            } else if ($pag == $menu8) {
                include_once($menu8 . ".php");
            } else if ($pag == $menu9) {
                include_once($menu9 . ".php");
            } else if ($pag == $menu10) {
                include_once($menu10 . ".php");
            } else if ($pag == $menu11) {
                include_once($menu11 . ".php");
            } else if ($pag == $menu12) {
                include_once($menu12 . ".php");
            } else if ($pag == $menu13) {
                include_once($menu13 . ".php");
            } else if ($pag == $menu14) {
                include_once($menu14 . ".php");
            } else if ($pag == $menu15) {
                include_once($menu15 . ".php");
            } else if ($pag == $menu16) {
                include_once($menu16 . ".php");
            } else if ($pag == $menu17) {
                include_once($menu17 . ".php");
            } else if ($pag == $menu18) {
                include_once($menu18 . ".php");
            } else if ($pag == $menu19) {
                include_once($menu19 . ".php");
            } else if ($pag == $menu20) {
                include_once($menu20 . ".php");
            } else if ($pag == $menu21) {
                include_once($menu21 . ".php");
            } else {
                include_once("home.php");
            }
            ?>

        </div>
        </div>
        </div>
        </div>
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



                                    <input value="<?php echo $_SESSION['id_usuario'] ?>" type="hidden" name="txtid" id="txtid">
                                    <input value="<?php echo $_SESSION['cpf_usuario'] ?>" type="hidden" name="antigo" id="antigo">

                                    <button type="button" id="btn-fechar-perfil" class="btn-forms" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="btn-salvar-perfil" id="btn-salvar-perfil" class="btn-forms">Salvar</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>





                <!--  Modal Email-->
                <div class="modal fade" id="ModalEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Email Marketing</h5>

                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>



                            <form id="form-perfil" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <?php 

                                     $query = $pdo->query("SELECT * FROM emails where ativo = 'Sim' ");
                 $res = $query->fetchAll(PDO::FETCH_ASSOC);
                 $total_emails = @count($res);
                                     ?>

                                    <p><small>Total de Emails Cadastrados - <?php echo $total_emails ?></small></p>


                                    <div class="form-group">
                                        <label >Assunto Email</label>
                                        <input  type="text" class="form-control" id="assunto-email" name="assunto-email" placeholder="Assunto do Email">
                                    </div>

                                    <div class="form-group">
                                        <label >Link <small>(Se Tiver)</small></label>
                                        <input  type="text" class="form-control" id="link-email" name="link-email" placeholder="Link Caso Exista">
                                    </div>


                                     <div class="form-group">
                                        <label >Mensagem </label>
                                       <textarea maxlength="1000" class="form-control" id="mensagem-email" name="mensagem-email"></textarea>
                                    </div>


                                    <small>
                                        <div id="mensagem-email-marketing" class="mr-4">

                                        </div>
                                    </small>



                                </div>
                                <div class="modal-footer">

                                    <button type="button" id="btn-fechar-email" class="btn-forms" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="btn-salvar-email" id="btn-salvar-email" class="btn-forms">Salvar</button>
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
