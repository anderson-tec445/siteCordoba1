<?php
//@session_start();
include_once 'lib/face.php';
//lib\face.php
?>

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
                <form method="post">
                    <div class="nome">
                        <label for="registro-nome">*Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Nome Completo" required>
                    </div>
                    <div class="email">
                        <label for="registro-email">*E-mail</label>
                        <input type="email" name="email" id="email" placeholder="Digite um e-mail válido" required>
                    </div>
                    <div class="telefone">
                        <label for="registro-telefone">*Telefone</label>
                        <input type="text" name="telefone" id="telefone" placeholder="(21) 9999 - 9999" required>
                    </div>
                </form>
            </div>
            <button name="btn-reg" id="btn-reg" type="button" class="site-btn btn-reg">Registrar</button>
        </div>

        <div class="modal-login">
            <p>Entrar em sua conta.</p>
            <div class="modal-form">
                <form method="post">
                    <div class="nome">
                        <label for="registro-nome">*Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Nome Completo" required>
                    </div>
                    <div class="email">
                        <label for="registro-email">*E-mail</label>
                        <input type="email" name="email" id="email" placeholder="Digite um e-mail válido" required>
                    </div>
                </form>
            </div>
            <button name="btn-reg" id="btn-reg" type="button" class="site-btn btn-reg">Registrar</button>
        </div>
    </div>
</section>



<script type="text/javascript">
    $('#btn-reg').click(function(event){
        event.preventDefault();
        
        $.ajax({
            url:"sistema/cadastrar.php",
            method:"post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(msg){
                if(msg.trim() === 'Cadastrado com Sucesso!'){
                    
                    $('#div-mensagem').addClass('text-success')
                    $('#div-mensagem').text(msg);
                    $('#btn-fechar-cadastrar').click();
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
</script>
