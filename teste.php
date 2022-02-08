<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once('cabecalho.php');

require_once("conexao.php");

// Produto
$query = $pdo->query("SELECT * FROM produtos where id = '34' ");
$produto = $query->fetchAll(PDO::FETCH_ASSOC);

$produto_id = $produto[0]['id'];

print_r($produto);
echo '<hr>';


// Aqui tem que entrar o ID do produto
// junção produto + caracteristica
$query2 = $pdo->query("SELECT * from carac_prod where id_prod = '$produto_id' ");
$carac_produto = $query2->fetchAll(PDO::FETCH_ASSOC);

for ($i=0; $i < count($carac_produto); $i++) { 
    foreach ($carac_produto[$i] as $key => $value) {
    }

    $id_carac = $carac_produto[$i]['id_carac'];
    $id_carac_prod = $carac_produto[$i]['id'];
    $query3 = $pdo->query("SELECT * from carac where id = '$id_carac' ");
    $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
    $nome_carac = $res3[0]['nome'];
    if($nome_carac == 'Cor'){
        @$tem_cor = 'Sim';
    }

};

$id_Carac_Produto = $carac_produto[0]['id_carac'];
$id_Carac = $carac_produto[0]['id'];

print_r($carac_produto);
echo '<hr>';

print_r($res3);
echo '<hr>';

// Propriedade do produto (cores, tamanhos) + resultado da junção produto + caracteristica
$query4 = $pdo->query("SELECT * from carac_itens where id_carac_prod = '$id_Carac'");
$query4 = $pdo->query("SELECT * from carac_itens where id_carac_prod = '27'");
$carac_itens = $query4->fetchAll(PDO::FETCH_ASSOC);

print_r($carac_itens);
echo '<hr>';

echo '
<div class="tamanho">
                        <p>Selecione o Tamanho</p>
                        <div class="tamanhos">
<form>' . '<br>';
for($iCarItens = 0; $iCarItens < count($carac_itens); $iCarItens++){
    
    foreach($carac_itens[$iCarItens] as $key => $value){

        if($key == 'nome'){
            $valorpequeno = strtolower($value);
            echo "
            <input type='checkbox'class='input-tamanho-produto' name='tamanho-$valorpequeno' id='tamanho-$valorpequeno' value='$valorpequeno'>
            <label for='tamanho-$valorpequeno'></label>";
        }

    }
};
echo '</form> </div>
</div>'  . '<br>';

require_once("newsletter.php");
require_once("rodape.php");
