<?php

include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);


//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "INSERT INTO usuarios (nome, sobrenome, email, senha, created) VALUES ('$nome', '$sobrenome', '$email', '$senha', NOW())";

$resultado_usuario = mysqli_query($conn, $result_usuario);

if (mysqli_insert_id($conn)){
	header("Location: index.html");
}else{
	header("Location: index.html");
}

?>
