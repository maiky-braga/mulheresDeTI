<?php
    
    session_start();

    include("./models.php");
    include("./conexao.php");
    $conn = conexaoPg();

    $rows = deleteAcademicoPessoa( $conn, $_SESSION["id_login"] );

    if( $rows == 1 ){
        header("Location: ./perfil.php");
    }else{
        header("Location: ./perfil.php");
    }

?>