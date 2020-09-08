<?php

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

echo "Nome: $nome <br>";
echo "E-mail: $email <br>";

?>