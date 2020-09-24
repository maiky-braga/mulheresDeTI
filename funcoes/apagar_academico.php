<?php
    
    session_start();

    include("./models.php");
    include("./conexao.php");

    $conn = conexaoPg();

    $id_acad  = pg_escape_string( trim($_REQUEST['id_academico']));
    $id = $_SESSION["id_login"];

    $rows = deleteAcademicoPessoa( $conn, $id_acad );

    if( $rows == 1 ){
        $rows2 = pegaAcademicoPessoa( $conn, $id );
        if( $rows2 == 0){
            $academico = cadastroAcademicoUsuario($conn, $id, '', '', '', '', '', 0,0,0);
        }
        unset($conn);
        header("Location: ../perfil.php");
    }else{
        header("Location: ../perfil.php");
    }

?>