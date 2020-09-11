<?php
	
	function conexaoPg(){

		$servidor = "lallah.db.elephantsql.com";
		$porta = 5432;
		$bancoDeDados = "hgnnytxy";
		$usuario = "hgnnytxy";
		$senha = "Qa2eG2kuHLLq5dw6lgnuWT28sWieBbai";

		$conn = pg_connect("host=$servidor port=$porta dbname=$bancoDeDados user=$usuario password=$senha");

		if(!$conn) {
			die("Não foi possível se conectar ao banco de dados.");
		}

		return $conn;
		
	}

	function conexaoMysql(){

		$servidor = "127.0.0.1";
		$usuario = "admin";
		$senha="jaPs4c50vBfg";
		$dbname="techladies";
		$port="3306";

		if (mysqli_connect_errno()) {
			echo "Falha na conexão com o servido MySQL:  " . mysqli_connect_error();
		} else {
			echo 'Conexão Ok!';
		}

		$conn = mysqli_connect($servidor, $usuario, $senha, $dbname,$port);

		return $conn;
		
	}

	
?>