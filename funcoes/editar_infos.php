<?php
    
    session_start();

    include("./models.php");
    include("./conexao.php");
    $conn = conexaoPg();

    $nome       = pg_escape_string( trim($_REQUEST['nome']) );
    $sobrenome  = pg_escape_string( trim($_REQUEST['sobrenome']) );
    $email      = pg_escape_string( trim($_REQUEST['email']) );

    $rows = updateInfosPessoa($conn, $_SESSION["id_login"], $nome, $sobrenome);
    $rows2 = updateInfosEmailPessoa($conn, $_SESSION["id_login"], $email);
    unset($conn);

    if( $rows == 1 or $rows2 == 1 ){
        if( $rows2 == 1 ){
            $_SESSION["email_ok"] = true;    
        }else{
            $_SESSION["email_ok"] = false;
        }
        header("Location: ../perfil.php");
    }else{
        if( $rows2 == 1 ){
            $_SESSION["email_ok"] = true;    
        }else{
            $_SESSION["email_ok"] = false;
        }
        header("Location: ../perfil.php");
    }

?>