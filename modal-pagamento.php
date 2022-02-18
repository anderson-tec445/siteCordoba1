<div class="modal fade" id="modal-pgto" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">


                <?php 

                 $query = $pdo->query("SELECT * FROM vendas where id = '" . $id_venda . "' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    $vlr_venda = $res[0]['total'];
                    $vlr_venda = number_format($vlr_venda, 2, ',', '.');

                 ?>
                
                           
                <h5 class="modal-title"><small>Compra de Produtos - Total: R$ <?php echo $vlr_venda ?></small></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

               <div class="row">
                      <div class="col-md-4 col-sm-12 mb-1">

                          <a title="Pagar com o Pagseguro" target="_blank" href="pagamentos/pagseguro/checkout.php?codigo=<?php echo $id_venda; ?>"><img src="img/pagamentos/pagseguro.png" width="200"></a>
                          <span class="text-muted"><i><small><br>Cartão Crédito/Débito ou Boleto <br>
                          Boleto pode demorar até 24 Horas.</small></i></span>

                      </div>

                      <div class="col-md-4 col-sm-12 mb-1">
                        <a title="Paypal - Acesso Imediato ao Curso" href="pagamentos/cielo/efetuar-pagamento.php?id=<?php echo $id_venda; ?>" target="_blank"><img src="img/pagamentos/cielo.png" width="200"></a> 
                          <span class="text-muted"><i><small><br>Cartão de Crédito <br>
                          Aprovação Automatica.</small></i></span>
                      </div>
                     

                      <div class="col-md-4 col-sm-12 mb-1">

                      <a title="Paypal - Acesso Imediato ao Curso" href="pagamentos/cielo/checkout.php?id=<?php echo $id_venda; ?>" target="_blank"><img src="img/pagamentos/pix1.png" width="200"></a> 

                         
                       </div>

                     </div>


                      <div class="row mt-4">
                       <div class="col-md-12">
                       

                        <a href="img/pagamentos/contas-grande.png" title="Clique para Ampliar" target="_blank">
                        
                        <p align="center" class="text-danger"><i><small>Clique para Ampliar</small></i></p> </a>

                        <small> Se já efetuou o pagamento <a title="Ir para o Painel" href="painel-cliente/index.php?pag=pedidos" class="text-success" target="_blank">Clique aqui</a> </small>

                       </div>
                     </div>


            </div>
           
        </div>
    </div>
</div>



<?php 

if (@$_GET["id_venda"] != null) {
    
    echo "<script>$('#modal-pgto').modal('show');</script>";
}

 ?>