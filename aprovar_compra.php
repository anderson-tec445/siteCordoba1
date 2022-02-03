<?php 
include_once("conexao.php");

$res = $pdo->query("SELECT * FROM vendas where id = '$id_venda'");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$id_usuario = $dados[0]['id_usuario'];
$pago = $dados[0]['pago'];




if($pago != 'Sim'){

$res = $pdo->query("SELECT * FROM usuarios where id = '$id_usuario'");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$cpf_usuario = $dados[0]['cpf'];
$email_usuario = $dados[0]['email'];



//$id_venda = 45;
//atualizar o status da venda
$pdo->query("UPDATE vendas SET pago = 'Sim' where id = '$id_venda' ");

//incrementar um cartão para o cliente
$res = $pdo->query("SELECT * FROM clientes where cpf = '$cpf_usuario'");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$cartao = $dados[0]['cartoes'];
$total_cartoes = $cartao + 1;
if($total_cartoes >= $total_cartoes_troca){
	$total_cartoes = 0;
	$data_cupom = date('Y-m-d', strtotime("+".$dias_uso_cupom." days"));
	$data_cupom_formatada = implode('/', array_reverse(explode('-', $data_cupom)));

	$pdo->query("INSERT INTO cupons (titulo, desconto, codigo, data) VALUES ('Cupom por Cartões', '$valor_cupom_cartao', '$cpf_usuario', '$data_cupom')");

	//ENVIAR EMAIL PARA O CLIENTE INFORMANDO DO SEU NOVO CUPOM DE BRINDE
$destinatario = $email_usuario;
$assunto = $nome_loja . ' - Novo Cupom de Desconto';
    $mensagem = utf8_decode('Parabéns, você ganhou um novo cupom de desconto no valor de '.$valor_cupom_cartao.' reais, poderá usar até o dia '.$data_cupom_formatada.' o seu código para uso do cupom é '.$cpf_usuario);
    $mensagem_sem_codific = 'Parabéns, você ganhou um novo cupom de desconto no valor de '.$valor_cupom_cartao.' reais, poderá usar até o dia '.$data_cupom_formatada.' o seu código para uso do cupom é '.$cpf_usuario;
    $cabecalhos = "From: ".$email;
    @mail($destinatario, $assunto, $mensagem, $cabecalhos);
    


    //informar do cupom na mensagem da ultima compra
   $pdo->query("INSERT mensagem SET id_venda = '$id_venda', texto = '$mensagem_sem_codific', usuario = 'Admin', data = curDate(), hora = curTime()");
		
}
$pdo->query("UPDATE clientes SET cartoes = '$total_cartoes' where cpf = '$cpf_usuario'");

//incrementar uma venda nos produtos
$res = $pdo->query("SELECT * FROM carrinho where id_venda = '$id_venda'");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
for ($i=0; $i < @count($dados); $i++) { 
     foreach ($dados[$i] as $key => $value) {
}
$id_produto = $dados[$i]['id_produto'];

$res2 = $pdo->query("SELECT * FROM produtos where id = '$id_produto'");
$dados2 = $res2->fetchAll(PDO::FETCH_ASSOC);
$vendas = $dados2[0]['vendas'];
$total_vendas = $vendas + 1;
$pdo->query("UPDATE produtos SET vendas = '$total_vendas' where id = '$id_produto'");
}



//ENVIAR EMAIL PARA O CLIENTE INFORMANDO DA COMPRA
$destinatario = $email_usuario;
$assunto = $nome_loja . ' - Compra Aprovada';
    $mensagem = utf8_decode('Sua compra foi aprovada, acesse o seu painel do cliente para poder acompanhar seu pedido');
    $cabecalhos = "From: ".$email;
    @mail($destinatario, $assunto, $mensagem, $cabecalhos);



}

 ?>