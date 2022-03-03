<?php
require_once("../conexao.php");
//require_once("../cabecalho.php");
@session_start();


if (@$_SESSION['id_usuario'] == null) {
  echo "<script language='javascript'> window.location='sistema' </script>";
}

$id_venda = @$_GET['id_venda'];
$id_usuario = @$_SESSION['id_usuario'];
$nome_usuario = @$_SESSION['nome_usuario'];
$cpf_usuario = @$_SESSION['cpf_usuario'];
$email_usuario = @$_SESSION['email_usuario'];
$valor = @$_SESSION['valor'];
$nome = @$_SESSION['nome'];
$total = 0;
$frete_correios;


$res = $pdo->query("SELECT * from usuarios where id = '$id_usuario'");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$cpf_usuario = $dados[0]['cpf'];


$res = $pdo->query("SELECT * from clientes where cpf = '$cpf_usuario'");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$telefone = $dados[0]['telefone'];
$rua = $dados[0]['rua'];
$numero = $dados[0]['numero'];
$bairro = $dados[0]['bairro'];
$complemento = $dados[0]['complemento'];
$cep = $dados[0]['cep'];
$cidade = $dados[0]['cidade'];
$estado = $dados[0]['estado'];

?>

<!doctype html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    
    <title>Checkout Cordoba</title>
    
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="../css/form-validation.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style-site.css">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
      <img src="../img/cordoba-logo.png" width="200"></a>
 
      </div>

    </div>
    
    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
         
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Sua Compra</h4>
                            <div class="checkout__order__products">Produtos <span>Total</span></div>
                            <ul>

                                <?php
                                $res = $pdo->query("SELECT * from carrinho where id_usuario = '$id_usuario' and id_venda = 0 order by id asc");
                                $dados = $res->fetchAll(PDO::FETCH_ASSOC);
                                $linhas = count($dados);

                                if ($linhas == 0) {
                                    $linhas = 0;
                                    $total = 0;
                                }

                                $total;
                                $total_peso;

                                for ($i = 0; $i < count($dados); $i++) {
                                    foreach ($dados[$i] as $key => $value) {
                                    }

                                    $id_produto = $dados[$i]['id_produto'];
                                    $quantidade = $dados[$i]['quantidade'];
                                    $id_carrinho = $dados[$i]['id'];
                                    $combo = $dados[$i]['combo'];

                                    if ($combo == 'Sim') {
                                        $res_p = $pdo->query("SELECT * from combos where id = '$id_produto' ");
                                    } else {
                                        $res_p = $pdo->query("SELECT * from produtos where id = '$id_produto' ");
                                    }

                                    $dados_p = $res_p->fetchAll(PDO::FETCH_ASSOC);
                                    $nome_produto = $dados_p[0]['nome'];
                                    $tipo_envio = $dados_p[0]['tipo_envio'];
                                    $valor_frete = $dados_p[0]['valor_frete'];

                                    $querye = $pdo->query("SELECT * FROM tipo_envios where id = '$tipo_envio' ");
                                    $rese = $querye->fetchAll(PDO::FETCH_ASSOC);
                                    $envio = $rese[0]['nome'];

                                    if ($envio == 'Correios') {
                                        $frete_correios = 'Sim';
                                        $peso = $dados_p[0]['peso'];
                                        @$total_peso = @$total_peso + $peso;
                                        @$existe_frete = 'Sim';
                                    }





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


                                    $imagem = $dados_p[0]['imagem'];


                                    $total_item = $valor * $quantidade;
                                    @$total = @$total + $total_item;

                                    if ($valor_frete > 0) {

                                        @$total = @$total + @$valor_frete;
                                    }


                                    $valor = number_format($valor, 2, ',', '.');
                                    //$total = number_format( $total , 2, ',', '.');
                                    $total_item = number_format($total_item, 2, ',', '.');


                                ?>
                                    <li><?php echo $nome_produto ?> <span>R$<?php echo $total_item ?></span></li>

                                    <?php if ($valor_frete > 0) { ?>
                                        <p align="right" class="text-danger"><small>Frete Fixo : <?php echo $valor_frete ?></small></p>
                                    <?php } ?>

                                <?php }
                                @$total = number_format(@$total, 2, ',', '.');
                                ?>
                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span>R$ <?php echo $total ?></span></div>

                            <?php if (@$frete_correios == 'Sim') { ?>

                                <div class="checkout__order__total">Calcular Frete<br>
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



                                </div>

                            <?php } ?>

                            <div class="checkout__order__total">Total <span id="total_final"></span></div>


                            <input type="hidden" value="0" id="vlr_frete" name="vlr_frete">
                            <input type="hidden" value="<?php echo @$existe_frete ?>" id="existe_frete" name="existe_frete">
                            <input type="hidden" value="<?php echo @$total ?>" id="total_compra" name="total_compra">
                            <input type="hidden" value="<?php echo @$cpf_usuario ?>" id="antigo" name="antigo">

                           

          </li>
        </ul>

        
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Endereço (Entrega)</h4>
        <form class="needs-validation" novalidate action="efetuar-pagamento.php" method="POST">
          <input type="hidden" name="total" id="total" value="20">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">Nome</label>
              <input type="text" value="<?php echo @$nome_usuario ?>" name="nome" id="nome">
              <div class="invalid-feedback">
                Preencha o campo de nome corretamente.
              </div>
            </div>

          </div>



          <div class="mb-3">
            <label for="email">Email <span class="text-muted">(Optional)</span></label>
            <input value="<?php echo $email_usuario ?>" type="text" name="email" id="email">
            <div class="invalid-feedback">
              Por favor, preencha com um e-mail válido.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Endereco</label>
            <input type="text" value="<?php echo $rua ?>" name="rua" id="rua">
            <div class="invalid-feedback">
              Preencha o Endereço corretamente.
            </div>
          </div>

          <div class="col-lg-4">
            <div class="checkout__input">
              <p>Bairro<span>*</span></p>
              <input type="text" value="<?php echo $bairro ?>" name="bairro" id="bairro">
            </div>
          </div>


          <div class="row">


            <div class="col-lg-2">
              <div class="checkout__input">
                <p>Estado<span>*</span></p>
                <select name="estado" id="estado">
                  <option value="AC" <?php if (@$estado == 'AC') { ?> selected <?php } ?>>AC</option>
                  <option value="AL" <?php if (@$estado == 'AL') { ?> selected <?php } ?>>AL</option>

                  <option value="AP" <?php if (@$estado == 'AP') { ?> selected <?php } ?>>AP</option>

                  <option value="AM" <?php if (@$estado == 'AM') { ?> selected <?php } ?>>AM</option>


                  <option value="BA" <?php if (@$estado == 'BA') { ?> selected <?php } ?>>BA</option>
                  <option value="CE" <?php if (@$estado == 'CE') { ?> selected <?php } ?>>CE</option>
                  <option value="DF" <?php if (@$estado == 'DF') { ?> selected <?php } ?>>DF</option>
                  <option value="ES" <?php if (@$estado == 'ES') { ?> selected <?php } ?>>ES</option>
                  <option value="GO" <?php if (@$estado == 'GO') { ?> selected <?php } ?>>GO</option>
                  <option value="MA" <?php if (@$estado == 'MA') { ?> selected <?php } ?>>MA</option>
                  <option value="MT" <?php if (@$estado == 'MT') { ?> selected <?php } ?>>MT</option>
                  <option value="MS" <?php if (@$estado == 'MS') { ?> selected <?php } ?>>MS</option>
                  <option value="MG" <?php if (@$estado == 'MG') { ?> selected <?php } ?>>MG</option>
                  <option value="PA" <?php if (@$estado == 'PA') { ?> selected <?php } ?>>PA</option>



                  <option value="PB" <?php if (@$estado == 'PB') { ?> selected <?php } ?>>PB</option>
                  <option value="PR" <?php if (@$estado == 'PR') { ?> selected <?php } ?>>PR</option>
                  <option value="PE" <?php if (@$estado == 'PE') { ?> selected <?php } ?>>PE</option>
                  <option value="PI" <?php if (@$estado == 'PI') { ?> selected <?php } ?>>PI</option>
                  <option value="RJ" <?php if (@$estado == 'RJ') { ?> selected <?php } ?>>RJ</option>
                  <option value="RN" <?php if (@$estado == 'RN') { ?> selected <?php } ?>>RN</option>
                  <option value="RS" <?php if (@$estado == 'RS') { ?> selected <?php } ?>>RS</option>
                  <option value="RO" <?php if (@$estado == 'RO') { ?> selected <?php } ?>>RO</option>
                  <option value="RR" <?php if (@$estado == 'RR') { ?> selected <?php } ?>>RR</option>
                  <option value="SC" <?php if (@$estado == 'SC') { ?> selected <?php } ?>>SC</option>
                  <option value="SP" <?php if (@$estado == 'SP') { ?> selected <?php } ?>>SP</option>

                  <option value="SE" <?php if (@$estado == 'SE') { ?> selected <?php } ?>>SE</option>
                  <option value="TO" <?php if (@$estado == 'TO') { ?> selected <?php } ?>>TO</option>

                </select>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="checkout__input">
                <p>Cidade<span>*</span></p>
                <input type="text" value="<?php echo $cidade ?>" name="cidade" id="cidade">
              </div>
            </div>
            <br>



            <br>
            <div class="col-md-3 mb-3">
              <label for="zip">Cep</label>
              <input type="text" value="<?php echo $cep ?>" name="cep" id="cep">
              <div class="invalid-feedback">
                Digite um Cep válido.
              </div>
            </div>
          </div>
          <hr class="mb-4">


          <h4 class="mb-3">Pagamento</h4>


          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cc-flag">Bandeira</label>
              <input type="text" class="form-control" name="cc-flag" id="cc-flag" placeholder="" required>
              <div class="invalid-feedback">
                É necessário a bandeira do cartão.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-number">Numero do Cartão</label>
              <input type="text" class="form-control" name="cc-number" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Preencha o número do cartão.
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">Data Validade</label>
              <input type="text" class="form-control" name="cc-expiration" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Preencha a validade do cartão.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="cc-cvv">CVV</label>
              <input type="text" class="form-control" name="cc-cvv" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Preencha o código de segurança do cartão.
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <button class="btn-forms " type="submit">Finalizar Compra</button>
        </form>
      </div>
</div>
        <br>
      <?php
       //require_once("../rodape.php");
      ?>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../js/jquery-slim.min.js"><\/script>')
  </script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/holder.min.js"></script>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';

      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');

        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
</body>

</html>