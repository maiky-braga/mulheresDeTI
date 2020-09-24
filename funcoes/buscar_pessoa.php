<?php
    
    include("./models.php");
    include("./conexao.php");
    $conn = conexaoPg();

    $pessoa = pg_escape_string( trim($_REQUEST['pessoa']) );
    strtolower($pessoa);
    
    $rows = pegaPessoas_off($conn, $pessoa);
    
    unset($conn);
    
    if( $rows ){
        $pessoa_encontrada = $rows["id_pessoa"];
        session_start();
        $_SESSION["pessoa_encontrada"] = $pessoa_encontrada;
        header("Location: ../perfil_users.php");
    }else{
        header("Location: ../perfil_users.php");
    }

?>