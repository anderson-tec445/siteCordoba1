<?php
$pag = "pedidos";
require_once("../../conexao.php");
@session_start();
//verificar se o usuário está autenticado
if (@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'Admin') {
    echo "<script language='javascript'> window.location='../index.php' </script>";
}


$agora = date('Y-m-d');
?>

<div class="titulo">
    <h3>Pedidos</h3>
    <!-- <a type="button" class="botao-add" href="index.php?pag=<?php echo $pag ?>&funcao=novo"><i class="fas fa-plus"></i></a> -->
</div>



<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="selectAll" id="selectAll">
                        </th>
                        <th>Pedido</th>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Tamanho</th>
                        <th>Valor</th>
                        <th>Quantidade</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                    <?php

                    $query = $pdo->query("SELECT * FROM produtos order by id desc ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    for ($i = 0; $i < count($res); $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }

                        $nome = $res[$i]['nome'];
                        $valor = $res[$i]['valor'];
                        $estoque = $res[$i]['estoque'];
                        $sub_cat = $res[$i]['sub_categoria'];
                        $imagem = $res[$i]['imagem'];
                        $ativo = $res[$i]['ativo'];
                        $promocao = $res[$i]['promocao'];

                        $id = $res[$i]['id'];

                        $valor = number_format($valor, 2, ',', '.');


                        //recuperar o nome da categoria
                        $query2 = $pdo->query("SELECT * from sub_categorias where id = '$sub_cat' ");
                        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                        $nome_cat = $res2[0]['nome'];

                        $classe = "";
                        if ($ativo == "Sim") {
                            $classe = "text-success";
                        } else {
                            $classe = "text-secondary";
                        }


                    ?>


                        <tr>
                            <td>
                                <input type="checkbox" name="select<?php echo $id ?>" id="select<?php echo $id ?>">
                            </td>
                            <td>nº pedido</td>
                            <td>
                                <img src="../../img/produtos/<?php echo $imagem ?>" width="50">
                            </td>
                            <td>
                                <a href="index.php?pag=<?php echo $pag ?>&funcao=carac&id=<?php echo $id ?>" class="text-info">
                                    <?php echo $nome ?>
                                </a>

                            </td>
                            <td><?php echo $nome_cat ?></td>
                            <td>R$ <?php echo $valor ?></td>
                            <td><?php echo $estoque ?></td>
                            <td>
                                <select name="" id="">
                                    <option value="">
                                        <i class='fas fa-square <?php echo $classe ?>'></i>
                                        <span>Entregue</span>
                                    </option>
                                    <option value="">
                                        <i class='fas fa-square <?php echo $classe ?>'></i>
                                        <span>Separando</span>
                                    </option>
                                    <option value="">
                                        <i class='fas fa-square <?php echo $classe ?>'></i>
                                        <span>Em Transporte</span>
                                    </option>
                                    <option value="">
                                        <i class='fas fa-square <?php echo $classe ?>'></i>
                                        <span>Aguardando Pagamento</span>
                                    </option>
                                    <option value="">
                                        <i class='fas fa-square <?php echo $classe ?>'></i>
                                        <span>Cancelado</span>
                                    </option>
                                    <option value="">
                                        <i class='fas fa-square <?php echo $classe ?>'></i>
                                        <span>Devolvendo</span>
                                    </option>
                                </select>

                            </td>
                            <!-- ações -->
                            <td>
                                <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>
                                <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>
                                <a href="index.php?pag=<?php echo $pag ?>&funcao=imagens&id=<?php echo $id ?>" class='text-info mr-1' title='Inserir Imagens'><i class='fas fa-images'></i></a>


                                <a href="index.php?pag=<?php echo $pag ?>&funcao=promocao&id=<?php echo $id ?>" class=' mr-1' title='Adicionar Promoção'>
                                    <?php if ($promocao == 'Sim') {
                                        echo "<i class='fas fa-coins text-success'></i>";
                                    } else {
                                        echo "<i class='fas fa-coins text-danger'></i>";
                                    } ?>


                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="botao">
                <a href="#" class="btn-forms">Imprimir NFs</a>
                <a href="#" class="btn-forms">Imprimir Etiquecas</a>
            </div>
        </div>
    </div>
</div>