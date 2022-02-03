<?php 
$pag = "clientes";
require_once("../../conexao.php"); 
@session_start();
    //verificar se o usuário está autenticado
if(@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'Admin'){
    echo "<script language='javascript'> window.location='../index.php' </script>";
    
}


?>



<!-- DataTales Example -->
<div class="titulo">
    <h3>Clientes</h3>

    <!-- Precisa corrigir o link -->
    <a type="button" class="botao-add" href="index.php?pag=<?php echo $pag ?>&funcao=novo"><i class="fas fa-plus"></i></a>

</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Endereço</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                 <?php 

                 $query = $pdo->query("SELECT * FROM clientes order by id desc ");
                 $res = $query->fetchAll(PDO::FETCH_ASSOC);

                 for ($i=0; $i < count($res); $i++) { 
                  foreach ($res[$i] as $key => $value) {
                  }

                  $nome = $res[$i]['nome'];
                  $cpf = $res[$i]['cpf'];
                  $telefone = $res[$i]['telefone'];
                  $email = $res[$i]['email'];
                  $cartoes = $res[$i]['cartoes'];
                  $rua = $res[$i]['rua'];
                  $numero = $res[$i]['numero'];
                  $bairro = $res[$i]['bairro'];
                  $cidade = $res[$i]['cidade'];
                  $estado = $res[$i]['estado'];


                  $id = $res[$i]['id'];

                  if($cartoes == ""){
                    $cartoes = 0;
                  }

                  ?>


                  <tr>
                    <td><?php echo $nome ?></td>
                    <td><?php echo $cpf ?></td>
                    <td><?php echo $telefone ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $endereco . ", " . $numero . " - " . $bairro . " - " . $cidade . " - " . $estado ?></td>
                    <td>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>
                    </td>



                </tr>
            <?php } ?>





        </tbody>
    </table>
</div>
</div>
</div>









<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').dataTable({
            "ordering": false
        })

    });
</script>



