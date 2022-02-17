<?php
require_once("../cabecalho.php");
require_once("../conexao.php");


if(@$_SESSION['id_usuario'] == null){
    echo "<script language='javascript'> window.location='sistema' </script>";

}

$id_venda = @$_GET['id_venda'];
$id_usuario = @$_SESSION['id_usuario'];
$nome_usuario = @$_SESSION['nome_usuario'];
//$cpf_usuario = @$_SESSION['cpf_usuario'];
$email_usuario = @$_SESSION['email_usuario'];
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




    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Product name</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Second product</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Third item</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
              </div>
              <span class="text-success">-$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li>
          </ul>

          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate action="efetuar-pagamento.php" method="POST">
			<input type="hidden" name="total" id="total" value="20">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

           

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" name="address2" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="row">

			  
			  
              <div class="col-lg-2">
                                <div class="checkout__input">
                                    <p>Estado<span>*</span></p>
                                    <select name="estado" id="estado">
       <option value="AC" <?php if(@$estado == 'AC'){ ?> selected <?php } ?> >AC</option>
        <option value="AL" <?php if(@$estado == 'AL'){ ?> selected <?php } ?>>AL</option>

         <option value="AP" <?php if(@$estado == 'AP'){ ?> selected <?php } ?>>AP</option>

         <option value="AM" <?php if(@$estado == 'AM'){ ?> selected <?php } ?>>AM</option>


         <option value="BA" <?php if(@$estado == 'BA'){ ?> selected <?php } ?>>BA</option>
         <option value="CE" <?php if(@$estado == 'CE'){ ?> selected <?php } ?>>CE</option>
         <option value="DF" <?php if(@$estado == 'DF'){ ?> selected <?php } ?>>DF</option>
         <option value="ES" <?php if(@$estado == 'ES'){ ?> selected <?php } ?>>ES</option>
         <option value="GO" <?php if(@$estado == 'GO'){ ?> selected <?php } ?>>GO</option>
         <option value="MA" <?php if(@$estado == 'MA'){ ?> selected <?php } ?>>MA</option>
         <option value="MT" <?php if(@$estado == 'MT'){ ?> selected <?php } ?>>MT</option>
         <option value="MS" <?php if(@$estado == 'MS'){ ?> selected <?php } ?>>MS</option>
         <option value="MG" <?php if(@$estado == 'MG'){ ?> selected <?php } ?>>MG</option>
         <option value="PA" <?php if(@$estado == 'PA'){ ?> selected <?php } ?>>PA</option>



         <option value="PB" <?php if(@$estado == 'PB'){ ?> selected <?php } ?>>PB</option>
         <option value="PR" <?php if(@$estado == 'PR'){ ?> selected <?php } ?>>PR</option>
         <option value="PE" <?php if(@$estado == 'PE'){ ?> selected <?php } ?>>PE</option>
         <option value="PI" <?php if(@$estado == 'PI'){ ?> selected <?php } ?>>PI</option>
         <option value="RJ" <?php if(@$estado == 'RJ'){ ?> selected <?php } ?>>RJ</option>
         <option value="RN" <?php if(@$estado == 'RN'){ ?> selected <?php } ?>>RN</option>
         <option value="RS" <?php if(@$estado == 'RS'){ ?> selected <?php } ?>>RS</option>
         <option value="RO" <?php if(@$estado == 'RO'){ ?> selected <?php } ?>>RO</option>
         <option value="RR" <?php if(@$estado == 'RR'){ ?> selected <?php } ?>>RR</option>
         <option value="SC" <?php if(@$estado == 'SC'){ ?> selected <?php } ?>>SC</option>
         <option value="SP" <?php if(@$estado == 'SP'){ ?> selected <?php } ?>>SP</option>

         <option value="SE" <?php if(@$estado == 'SE'){ ?> selected <?php } ?>>SE</option>
         <option value="TO" <?php if(@$estado == 'TO'){ ?> selected <?php } ?>>TO</option>

                                    </select>
                                </div>
                            </div>

                            
			  
			  
			  
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
            <hr class="mb-4">
           

            <h4 class="mb-3">Payment</h4>


            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-flag">Flag</label>
                <input type="text" class="form-control" name="cc-flag" id="cc-flag" placeholder="" required>
                <div class="invalid-feedback">
                  Flag is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" name="cc-number" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" name="cc-expiration" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-cvv">CVV</label>
                <input type="text" class="form-control" name="cc-cvv" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>

      <?php
        require_once("../rodape.php");
      ?>

     

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
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
