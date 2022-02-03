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
                <a href="#"><img src="img/icons/logo-facebook.png" alt="Login com o Facebook"></a>
                <a href="#"><img src="img/icons/logo-google.png" alt="Login com o Google"></a>
            </div>
            <button class="btn-reg" onclick="toggleRegistro()">Registrar-me</button>
            <p>ou</p>
            <button class="btn-login" onclick="toggleLogin()">Entrar com Email e Senha</button>
        </div>
        <div class="modal-registro"> 
            <p>Se Cadastre e Fique por
            Dentro!!!</p>
            <div class="modal-form">
                <form action="#">
                    <div class="nome">
                        <label for="registro-nome">*Nome</label>
                        <input type="text" name="nome" id="registro-nome" placeholder="Nome Completo" required>
                    </div>
                    <div class="email">
                        <label for="registro-email">*E-mail</label>
                        <input type="email" name="email" id="registro-email" placeholder="Digite um e-mail válido" required>
                    </div>
                </form>
            </div>
            <button class="btn-reg">Registrar-me</button>
        </div>

        <div class="modal-login">
            <p>Entrar em sua conta.</p>
            <div class="modal-form">
                <form action="#">
                    <div class="nome">
                        <label for="registro-nome">*Nome</label>
                        <input type="text" name="nome" id="registro-nome" placeholder="Nome Completo" required>
                    </div>
                    <div class="email">
                        <label for="registro-email">*E-mail</label>
                        <input type="email" name="email" id="registro-email" placeholder="Digite um e-mail válido" required>
                    </div>
                </form>
            </div>
            <button class="btn-reg">Entrar</button>
        </div>
    </div>
</section>