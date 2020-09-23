<?php
    
    session_start();

    include("./models.php");
    include("./conexao.php");

    $conn = conexaoPg();

    $empresa      = pg_escape_string( trim($_REQUEST['empresa']) );
    $cargo        = pg_escape_string( trim($_REQUEST['cargo']) );
    $descricao    = pg_escape_string( trim($_REQUEST['descricao']) );
    $atual        = pg_escape_string( trim($_REQUEST['atual']) );
    $inicio_e     = pg_escape_string( trim($_REQUEST['inicio_e']) );
    $fim_e        = pg_escape_string( trim($_REQUEST['fim_e']) );
    

    $rows = cadastroExperienciaUsuario($conn, $_SESSION["id_login"], $empresa, $cargo, $descricao, $atual, $inicio_e, $fim_e );
    
    unset($conn);

    if( $rows == 1 ){
        header("Location: ../perfil.php");
    }else{
        header("Location: ../perfil.php");
    }

?>