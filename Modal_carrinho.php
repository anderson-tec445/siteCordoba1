<section id="modal_carrinho" class="">
    <div class="header-carrinho">
        <img src="img/icons/close.png" alt="Fechar Janela do Carrinho" onclick="toggleCarrinho()">
        <h6>CARRINHO</h6>
    </div>
    <div class="carrinho-content">

            <!-- Essa parte precisa ser colocado em um if, se o carrinho estiver 
            vazio ele vai aparecer, se tiver produto no carrinho ele não deve 
            aparecer  -->
        <div class="carrinho-vazio">
            <h3>Não existem produtos no carrinho</h3>
            <button class="btn-forms">Ir para compras</button>
        </div>

        <!-- carrinho-card = cada produto -->
        <div class="carrinho-card">
            <div class="info-produto">
                <div class="nome-produto">
                    <p>
                        Cueca Super Conforto de Polyester e Lã de Ovelha.
                    </p>
                </div>

                <div class="detalhe-produto">
                    <table>
                        <thead>
                            <tr>
                                <th>tamanho</th>
                                <th>Valor</th>
                                <th>Quantidade</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p>P</p>
                                </td>
                                <td>
                                    <div class="preco">
                                        <p>R$49,90</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1" id="produto-quantidade">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="preco">
                                        <p>R$49,90</p>
                                    </div>
                                </td>
                                <td>
                                    <a href="#"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>                   
                </div>
            </div>
            <div class="img-produto">
                <img src="img/produtos/item-1.png" alt="">
            </div>
        </div><!-- fim do card produto -->

        <div class="total-compra">
            <h3>Total</h3>
            <h3>R$ 55,00</h3>
        </div>
    </div>
    <div class="frete-carrinho">
        <p><?php echo $texto_destaque ?></p>
        <input type="text" name="calcular-frete" placeholder="Insira o CEP">
        <button>Calcular Frete</button>
    </div>
    
    <div class="menu-carrinho">
        <a href="#">Continuar Comprando</a>
        <a href="#">Finalizar Compra</a>
    </div>
</section>