<?php

session_start();
include("./conexao.php");

$nome = pg_escape_string(trim($_POST['nome']));
$email = pg_escape_string(trim($_POST['email']));
$senha = pg_escape_string(trim($_POST['senha']));
$sobrenome = pg_escape_string(trim($_POST['sobrenome']));
$usuario = pg_escape_string(trim($_POST['usuario']));

$sql = "select count(*) as total from pessoa where email = '$email'";
$result = pg_query($conexao, $sql);
$row = pg_fetch_assoc($result);

if($row['total'] == 1) {
	//$_SESSION['usuario_existe'] = true;
	header('Location: cadastro.php');
	exit;
}

$sql = "INSERT INTO pessoa (nome, usuario, senha, email, sobrenome) VALUES ('$nome', '$usuario', '$senha', '$email','$sobrenome')";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: cadastro.php');
exit;

    // include_once('conexão.php');

    // //TESTE
    // $query = 'select * from pessoa';
    // $result = pg_query($query) or die ('Consulta falhou');
    // echo $result;
    // echo "<table>\n";
    // while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    //     echo "\t<tr>\n";
    //     foreach ($line as $col_value) {
    //         echo "\t\t<td>$col_value</td>\n";
    //     }
    //     echo "\t</tr>\n";
    // }
    // echo "</table>\n";

    // /*CADASTRO*/
    // $nm = $POST["nome"]
    // $snm = $POST["sobrenome"]
    // $eml = $POST["email"]
    // $snh = $POST["senha"]

    // pg_query("$insert into pessoa(nome,sobrenome,email,senha) value('$nm','$snm','$eml','$snh')");

?>