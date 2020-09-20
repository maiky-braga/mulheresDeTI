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
        echo("<script language='javascript' type='text/javascript'>
                window.alert('Nova senha salva com sucesso'); </script>");
        header("Location: ../perfil.php");
    }else{
        echo("<script language='javascript' type='text/javascript'>
                alert('Senha atual não confere. Não foi salvo.'); </script>");
        header("Location: ../perfil.php");
    }

?>