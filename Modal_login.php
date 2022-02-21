<?php
//@session_start();
include_once 'lib/face.php';
//lib\face.php
?>

<!-- JS -->
<script src="../js/login.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



<section id="modal_login">
    <div class="modal-card">
        <div class="modal-exit" onclick="toggleModalLogin()">
            <img src="img/icons/close.png" alt="Fechar tela de login">
        </div>
        <div class="logo">
            <img src="img/cordoba-logo.png" alt="Logo Cordoba">
        </div>
        <div class="modal-login-principal">
            <p>Use uma das opções</p>
            <div class="modal-social">
                <fb:login-button 
                scope="public_profile,email"
                onlogin="checkLoginState();">
                </fb:login-button>
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v13.0&appId=451774609941079&autoLogAppEvents=1" nonce="gEcVnlTk"></script>
                <!-- <a href="<?php echo $loginUrl; ?>"><img src="img/icons/logo-facebook.png" alt="Login com o Facebook"></a> -->
                <a href="#"><img src="img/icons/logo-google.png" alt="Login com o Google"></a>
            </div>
            <button class="btn-reg" onclick="toggleRegistro()">Registrar</button>
            <p>ou</p>
            <button class="btn-login" onclick="toggleLogin()">Entrar com E-mail e Senha</button>
        </div>
        <div class="modal-registro"> 
            <p>Se Cadastre e Fique por
            Dentro!!!</p>
            <div class="modal-form">
                <form method="post" action="sistema/cadastrar.php">
                    <div class="nome">
                        <label for="nome">*Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Nome Completo" required>
                    </div>
                    <div class="email">
                        <label for="email">*E-mail</label>
                        <input type="email" name="email" id="email" placeholder="Digite um e-mail válido" required>
                    </div>
                    <div class="telefone">
                        <label for="telefone">*Telefone</label>
                        <input type="text" name="telefone" id="telefone" placeholder="(21) 9999 - 9999" required>
                    </div>
                    <div class="telefone">
                        <label for="registro-cpf">*CPF</label>
                        <input type="text" name="cpf" id="registro-cpf" placeholder="Insira seu CPF" required>
                    </div>
                    <div class="telefone">
                        <label for="registro-senha">*Senha</label>
                        <input type="password" name="senha" id="registro-senha" placeholder="insira uma senha" required>
                    </div>
                    <div class="telefone">
                        <label for="registro-conf-senha">*Confirmar Senha</label>
                        <input type="password" name="confirmar-senha" id="registro-conf-senha" placeholder="Confirme a senha" required>
                    </div>
                    <small><div id="div-mensagem"></div></small>
                    <button name="btn-reg" id="btn-cadastrar" type="submit" class="site-btn btn-reg">Registrar</button>
                </form>
            </div>
        </div>

        <div class="modal-login">
            <p>Entrar em sua conta.</p>
            <div class="modal-form">
                <form method="post" action="sistema/autenticar.php" name="login">
                    <div class="nome">
                        <!-- <label for="registro-nome">*Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Nome Completo" required> -->
                        <label for="email_login">Email ou CPF</label>
                        <input type="text" name="email_login"  class="" id="email_login" aria-describedby="emailHelp" placeholder="Insira seu Email ou CPF">
                    </div>
                    <div class="email">
                        <!-- <label for="registro-email">*E-mail</label>
                        <input type="email" name="email" id="email" placeholder="Digite um e-mail válido" required> -->
                        <label for="senha_login">Senha</label>
                        <input type="password" name="senha_login" id="senha_login"  class="form-control" aria-describedby="emailHelp" placeholder="Senha">
                    </div>
                    <button name="btn-reg" id="btn-acessar" type="submit" class="site-btn btn-reg">Acessar</button>
                </form>
            </div>
        </div>
    </div>
</section>



<!-- <script type="text/javascript">
    $('#btn-cadastrar').click(function(event){
        event.preventDefault();
        
        $.ajax({
            url:"sistema/cadastrar.php",
            method:"post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(msg){
                if(msg.trim() === 'Cadastrado com Sucesso!'){
                    console.log($('form').value);
                    $('#div-mensagem').addClass('text-success')
                    $('#div-mensagem').text(msg);
                    $('.btn-fechar-cadastrar').click();
                    $('#nome').val(document.getElementById('nome').value);
                    $('#email').val(document.getElementById('email').value);
                    }
                 else{
                    $('#div-mensagem').addClass('text-danger')
                    $('#div-mensagem').text(msg);
                   

                 }
            }
        })
    })
</script> -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

  <script src="js/mascara.js"></script>

