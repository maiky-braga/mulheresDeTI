<?php
    
    session_start();

    include("./models.php");
    include("./conexao.php");
    $conn = conexaoPg();

    $cpf     = pg_escape_string( trim($_REQUEST['cpf']) );
    $cidade  = pg_escape_string( trim($_REQUEST['cidade']) );
    $uf      = pg_escape_string( trim($_REQUEST['uf']) );
    $pcd     = pg_escape_string( trim($_REQUEST['pcd']) );

    $rows = updateSobrePessoa($conn, $_SESSION["id_login"], $cpf, $cidade, $uf, $pcd);

    unset($conn);

    if( $rows == 1 ){
        header("Location: ../perfil.php");
    }else{
        header("Location: ../perfil.php");
    }

?>