<section id="modal_carrinho" class="">
    <div class="header-carrinho">
        <img src="img/icons/close.png" alt="Fechar Janela do Carrinho" onclick="toggleCarrinho()">
        <h6>CARRINHO</h6>
    </div>
    <div class="carrinho-content">
        <?php
        if (@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'Cliente') {
            echo "
                    <div class='carrinho-vazio'>
                        <h3>
                            Você precisa fazer Login para adicionar produtos  ao carrinho!! 
                        </h3>
                        <button class='btn-forms'><a class='btn-forms' href='sistema'>Login</a></button>
                    </div>";
        } else {

            echo "<div id='listar-carrinho'></div>";
        }
        ?>

        <!-- carrinho-card = cada produto -->
        <h5 class="texto-quantidade">Carrinho: <span id="total_itens" class="ml-1"> </span> Produto(s)</h5>
        <input type="hidden" id="txtquantidade">

        <div class="total-compra">
            <h3>Total</h3>
            <h3 id="valor_total">R$ </h3>
        </div>

    </div>
    <div class="frete-carrinho">
        <p><?php echo $texto_destaque ?></p>
        <input type="text" name="calcular-frete" placeholder="Insira o CEP">
        <button>Calcular Frete</button>
    </div>

    <div class="menu-carrinho">
        <a href="produtos.php">Continuar Comprando</a>
        <a href="cielo/index.php">Finalizar Compra</a>
    </div>

    
</section>







<!--AJAX PARA INSERÇÃO DOS DADOS VINDO DE UMA FUNÇÃO -->
<script>
    function carrinhoModal(idproduto, combo) {
        event.preventDefault();
        console.log(idproduto,combo);
        $.ajax({
            url: "carrinho/inserir-carrinho.php",
            method: "post",
            data: {
                idproduto,
                combo
            },
            dataType: "text",
            success: function(mensagem) {
                $('#mensagem').removeClass()
                if (mensagem == 'Cadastrado com Sucesso!!') {
                    atualizarCarrinho();
                    toggleCarrinho();
                    $("#modalCarrinho").modal("show");
                    $('#mensagem').text(mensagem);
                } else {
                    $("#modalCarrinho").modal("show");
                    $('#mensagem').text(mensagem);
                }
            },
        })
    }
</script>






<!--AJAX PARA LISTAR OS DADOS -->
<script type="text/javascript">
    $(document).ready(function() {
        atualizarCarrinho();
    })
</script>

<script>
    function atualizarCarrinho() {
        $.ajax({
            url: "carrinho/listar-carrinho.php",
            method: "post",
            data: $('#frm').serialize(),
            dataType: "html",
            success: function(result) {
                $('#listar-carrinho').html(result)
            },
        })
    }
</script>

<script>
    function deletarCarrinho(id) {
        event.preventDefault();
        $.ajax({
            url: "carrinho/excluir-carrinho.php",
            method: "post",
            data: {
                id
            },
            dataType: "text",
            success: function(mensagem) {

                $('#mensagem').removeClass()

                if (mensagem == 'Excluido com Sucesso!!') {
                    atualizarCarrinho();
                } else {

                }
                $('#mensagem').text(mensagem)
            },
        })
    }
</script>



<script type="text/javascript">
    function editarCarrinho(id) {
        var quantidade = document.getElementById('txtquantidade').value;
        event.preventDefault();
        $.ajax({
            url: "carrinho/editar-carrinho.php",
            method: "post",
            data: {
                id,
                quantidade
            },
            dataType: "text",
            success: function(mensagem) {

                $('#mensagem').removeClass()

                if (mensagem == 'Editado com Sucesso!!') {
                    atualizarCarrinho();
                    //$("#modal-carrinho").modal("show");

                } else {

                }
                $('#mensagem').text(mensagem)
            },
        })
    }
</script>






<script type="text/javascript">
    function addCarac(id, id_carrinho) {

        event.preventDefault();

        $.ajax({

            url: "carrinho/carac-produtos.php",
            method: "post",
            data: {
                id,
                id_carrinho
            },
            dataType: "text",
            success: function(mensagem) {
                $('#mensagem-caract').removeClass()
                $("#modal-caract").modal("show");
                $('#listar-caract').html(mensagem)
            },
        })
    }
</script>

<script type="text/javascript">
    function finalizarPedido() {
        event.preventDefault();
        $.ajax({
            url: "carrinho/verificar-carac.php",
            method: "post",
            data: {},
            dataType: "text",
            success: function(mensagem){
                if(mensagem.trim() === 'Selecione as Características dos Produtos!'){
                $('#mensagem').addClass('text-danger');
                $('#mensagem').text(mensagem);
                }else{
                window.location="checkout.php";
                //$('#mensagem').text(mensagem);
                }
            },  
        })     
    }
</script>
