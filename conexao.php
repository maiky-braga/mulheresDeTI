<?php
	$servidor = "lallah.db.elephantsql.com";
	$porta = 5432;
	$bancoDeDados = "hgnnytxy";
	$usuario = "hgnnytxy";
	$senha = "Qa2eG2kuHLLq5dw6lgnuWT28sWieBbai";

	$conexao = pg_connect("host=$servidor port=$porta dbname=$bancoDeDados user=$usuario password=$senha");

	if(!$conexao) {
		die("Não foi possível se conectar ao banco de dados.");
	}
?>