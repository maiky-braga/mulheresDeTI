<?php
    
    session_start();

    include("./models.php");
    include("./conexao.php");

    $conn = conexaoPg();

    $formacao      = pg_escape_string( trim($_REQUEST['formacao']) );
    $grau          = pg_escape_string( trim($_REQUEST['grau']) );
    $status        = pg_escape_string( trim($_REQUEST['status']) );
    $curso         = pg_escape_string( trim($_REQUEST['curso']) );
    $instituicao   = pg_escape_string( trim($_REQUEST['instituicao']) );
    $ead           = pg_escape_string( trim($_REQUEST['ead']) );
    $inicio        = pg_escape_string( trim($_REQUEST['inicio']) );
    $fim           = pg_escape_string( trim($_REQUEST['fim']) );
    
    $rows = cadastroAcademicoUsuario( $conn, $_SESSION["id_login"], $formacao, $grau, $status, $curso, $instituicao, $ead, $inicio, $fim );
    
    unset($conn);

    if( $rows == 1 ){
        header("Location: ../perfil.php");
    }else{
        header("Location: ../perfil.php");
    }

?>