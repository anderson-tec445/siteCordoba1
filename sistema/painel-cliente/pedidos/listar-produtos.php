
<?php 

require_once("../../../conexao.php"); 

$id_venda = $_POST['idvenda'];

echo '
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Produto</th>
      <th scope="col">Valor</th>
      
    </tr>
  </thead>
  <tbody>
';

$res = $pdo->query("SELECT * from carrinho where id_venda = '$id_venda' ");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
for ($i=0; $i < count($dados); $i++) { 
 foreach ($dados[$i] as $key => $value) {
 }

 $id_produto = $dados[$i]['id_produto'];	

$res2 = $pdo->query("SELECT * from produtos where id = '$id_produto' ");
$dados2 = $res2->fetchAll(PDO::FETCH_ASSOC);
$nome_produto = $dados2[0]['nome'];
$valor = $dados2[0]['valor'];

$valor = number_format( $valor , 2, ',', '.');
                          

echo ' <tr>
<td>'.$nome_produto.'</td>
<td>R$ '.$valor.'</td>
</tr>
';




}

echo ' 

</table>  

';


?>


