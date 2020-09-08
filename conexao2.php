<?php

$servidor = "127.0.0.1";
$usuario = "admin";
$senha="jaPs4c50vBfg";
$dbname="techladies";
$port="8080";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname,$port);


if (mysqli_connect_errno()) {
   echo "Falha na conexão com o servido MySQL:  " . mysqli_connect_error();
} else {
   echo 'Conexão Ok!';
}

?>

