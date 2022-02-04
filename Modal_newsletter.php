<section id="modal_news" class="">
    <div class="modal-card"> 
        <div class="modal-exit" onclick="toggleModalNews()">
            <img src="img/icons/close.png" alt="Fechar tela de login">
        </div>
        <div class="logo">
            <img src="img/cordoba-logo.png" alt="Logo Cordoba">
        </div>
        <div class="modal-news-registro"> 
            <h3>Muito mais que estilo. Viva a <br>liberdade ao movimento!</h3>
            <p>Se Cadastre e Fique por
            Dentro!!!</p>

            <div class="contato">
        <div class="contato-text">
            <h3>Newsletter</h3>
            <p><strong>Inscreva-se agora para ficar por dentro de todos os descontos e novidade da
                    Cordoba</strong></p>
        </div>
        <form method="post">
           <div class="form">
            
                <div> 
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="Seu Nome">
                </div>

                <div>
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email" placeholder="Seu Email">
                </div>
                <!--<small><div id="div-mensagem"></div></small> -->
                <button name="btn-reg" id="btn-reg" type="button" class="site-btn">Registrar me</button>
           </div>
        </form>
    </div>
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
