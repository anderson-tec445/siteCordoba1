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
                <button name="btn-enviar-email" id="btn-enviar-email" type="button" class="site-btn">Enviar</button>
           </div>
        </form>
    </div>
</section>



<script type="text/javascript">
    $('#btn-enviar-email').click(function(event){
        alert('Cadastrado com Sucesso!')
    })
</script>