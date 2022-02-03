<?php
    require_once("cabecalho.php");
?>

<section id="fale-conosco" class="institucional">
    <div class="container">
        <div class="box-menu">
            <h3>
                Podemos <br>Te Ajudar<br>
                em Algo?
            </h3>
            <a href="prazo-de-entrega.php" target="_blank">Prazo de Entrega</a>
            <a href="pagamentos.php" target="_blank">Formas de Pagamento</a>
            <a href="politica-de-entrega.php" target="_blank">Políticas de Entrega</a>
            <a href="faq.php" target="_blank">Dúvidas Frequentes</a>
            <a href="#" target="_blank">Trocas e Devoluções</a>
        </div>
        <div class="form-fale-conosco">
            <h3>Fale Conosco</h3>
            <form action="#">
                <label for="nome-fale-conosco">*Nome</label>
                <input type="text" id="nome-fale-conosco" name="nome-fale-conosco" placeholder="Nome Completo" required>
                <label for="email-fale-conosco">*Email</label>
                <input type="email" id="email-fale-conosco" name="email-fale-conosco" placeholder="Digite um e-mail válido" required>
                <label for="telefone-fale-conosco">*Telefone</label>
                <input type="phone" id="telefone-fale-conosco"  placeholder="11 9 8888-8888" name="telefone-fale-conosco" required>
                <label for="mensagem-fale-conosco">*Mensagem</label>
                <textarea name="mensagem-fale-conosco" id="mensagem-fale-conosco" placeholder="Digite aqui sua mensagem"required></textarea>
                <button>Enviar</button>
            </form>
        </div>
    </div>
</section>


<script type="text/javascript">
    $('#btn-enviar-email').click(function(event){
        event.preventDefault();
        $('#div-mensagem').addClass('text-info')
        $('#div-mensagem').removeClass('text-danger')
        $('#div-mensagem').removeClass('text-success')
        $('#div-mensagem').text('Enviando')
        $.ajax({
            url:"enviar.php",
            method:"post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(msg){
                if(msg.trim() === 'Enviado com Sucesso!'){
                    $('#div-mensagem').removeClass('text-info')
                    $('#div-mensagem').addClass('text-success')
                    $('#div-mensagem').text(msg);
                    $('#email').val('');
                    $('#nome').val('');
                    $('#telefone').val('');
                    $('#mensagem').val('');

                 }else if(msg.trim() === 'Preecha o Campo Nome'){
                    
                    $('#div-mensagem').addClass('text-danger')
                    $('#div-mensagem').text(msg);
                 

                 }else if(msg.trim() === 'Preecha o Campo Mensagem'){
                    
                    $('#div-mensagem').addClass('text-danger')
                    $('#div-mensagem').text(msg);
                 

                 }else if(msg.trim() === 'Preecha o Campo Email'){
                    
                    $('#div-mensagem').addClass('text-danger')
                    $('#div-mensagem').text(msg);
                 }

                 else{
                    $('#div-mensagem').addClass('text-danger')
                    $('#div-mensagem').text('Deu erro ao Enviar o Formulário! Provavelmente seu servidor de hospedagem não está com permissão de envio habilitada ou você está em um servidor local!');
                    //$('#div-mensagem').text(msg);

                 }
            }
        })
    })
</script>


<?php
    require_once("rodape.php");
?>