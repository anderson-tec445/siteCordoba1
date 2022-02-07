<section id="contato">
    <div class="text-box">
        <h3>Mais conforto</h3>
        <h3>Mais qualidade</h3>
    </div>
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
                <button name="btn-enviar-email" id="btn-enviar-email" type="button" class="site-btn">Enviar</button>
           </div>
        </form>
    </div>
</section>


<script type="text/javascript">
    $('#btn-enviar-email').click(function(event){
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
                    window.location.reload(true);
                    }
                 else{
                    $('#div-mensagem').addClass('text-danger')
                    $('#div-mensagem').text(msg);
                   

                 }
            }
        })
    })
</script>
