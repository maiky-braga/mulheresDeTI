<?php
    
    session_start();

    include("./models.php");
    include("./conexao.php");

    $conn = conexaoPg();

    $id_xp  = pg_escape_string( trim($_REQUEST['id_xp']));
    $id = $_SESSION["id_login"];

    $rows = deleteExperienciaPessoa( $conn, $id_xp );

    if( $rows == 1 ){
        $rows2 = pegaExperienciaPessoa( $conn, $id );
        if( $rows2 == 0){
            $experiencia = cadastroExperienciaUsuario($conn, $id, '', '', '', 0,0,0);
        }
        unset($conn);
        header("Location: ../perfil.php");
    }else{
        header("Location: ../perfil.php");
    }

?>