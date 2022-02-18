<?php
require_once("../conexao.php");
require_once("../cabecalho.php");
?>
<!doctype html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    
    <title>API 3.0 da Cielo e PHP</title>
    
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="../css/form-validation.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style-site.css">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
      <img src="../img/cielo.png" width="200"></a>
 
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Seu carrinho</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Nome do Produto</h6>
                <small class="text-muted">Descrição breve</small>
              </div>
              <span class="text-muted">R$</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Segundo produto</h6>
                <small class="text-muted">Descrição breve</small>
              </div>
              <span class="text-muted">R$</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
             
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Código promocional</h6>
                <small>CÓDIGO DE EXEMPLO</small>
              </div>
              <span class="text-success">-R$</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total</span>
              <strong>R$</strong>
            </li>
          </ul>

          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Cupom de desconto">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Endereço (Entrega)</h4>
          <form class="needs-validation" novalidate action="efetuar-pagamento.php" method="POST">
			<input type="hidden" name="total" id="total" value="20">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Primeiro nome</label>
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Preencha o campo de nome corretamente.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Sobrenome</label>
                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Preencha o campo de sobrenome corretamente.
                </div>
              </div>
            </div>

           

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" name="email" id="email" placeholder="email@exemplo.com">
              <div class="invalid-feedback">
                Por favor, preencha com um e-mail válido.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Endereco</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="Endereço" required>
              <div class="invalid-feedback">
                Preencha o Endereço corretamente.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Endereco 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" name="address2" id="address2" placeholder="Complemento">
            </div>

            <div class="row">

			  
              <div class="col-md-4 mb-3">
                <label for="state">Estado</label>
                <select class="custom-select d-block w-100" name="state" id="state" required>
                  <option value="">Selecionar...</option>
                  <option>SP</option>
                </select>
                <div class="invalid-feedback">
                  Selecione o Estado.
                </div>
              </div>
			  
			  
			<div class="col-md-5 mb-3">
                <label for="city">Cidade</label>
                <select class="custom-select d-block w-100" name="city" id="city" required>
                  <option value="">Selecionar...</option>
                  <option>Campinas</option>
                </select>
                <div class="invalid-feedback">
                  Selecione a cidade.
                </div>
              </div>
			  
			  
			  
              <div class="col-md-3 mb-3">
                <label for="zip">Cep</label>
                <input type="text" class="form-control" id="zip" id="zip" placeholder="" required>
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
</div>
        <br>
      <?php
      require_once("../rodape.php");
      ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../js/jquery-slim.min.js"><\/script>')</script>
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
