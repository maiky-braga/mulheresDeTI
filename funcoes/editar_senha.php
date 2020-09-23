<?php
    
    session_start();

    include("./models.php");
    include("./conexao.php");

    $conn = conexaoPg();

    $senha     = pg_escape_string( trim($_REQUEST['senha']) );
    $senha = md5($senha);
    $novasenha  = pg_escape_string( trim($_REQUEST['novasenha']) );
    $novasenha = md5($novasenha);

    $rows = updateSenhaPessoa($conn, $_SESSION["id_login"], $senha, $novasenha);
    unset($conn);

    if( $rows == 1 ){
        $_SESSION["senha_ok"] = true;
        header("Location: ../perfil.php");
    }else{
        $_SESSION["senha_ok"] = false;
        header("Location: ../perfil.php");
    }

?>