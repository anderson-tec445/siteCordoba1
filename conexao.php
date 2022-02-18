<?php
require_once("config.php");

date_default_timezone_set('America/Sao_Paulo');

		$envPath = 'env.ini';
        $env = parse_ini_file($envPath);
		$database = $env['database'];
		$host = $env['host'];
		$username = $env['username'];
		$password = $env['password'];
		


try {
	$pdo = new PDO("mysql:dbname=$database;host=$host;charset=utf8", "$username", "$password");

	//CONEXAO MYSQLI PARA O BACKUP
	$conn = mysqli_connect(
		$host,
		$username,
		$password,
		$database
	);

} catch (Exception $e) {
	echo "Erro ao conectar com o banco de dados! " . $e;
}

?>