<?php
    
    session_start();

    include("./models.php");
    include("./conexao.php");

    $conn = conexaoPg();
    
    $id = $_SESSION["id_login"];

    $rows = deleteSobrePessoa( $conn, $id );

    if( $rows == 1 ){
        $rows2 = pegaSobrePessoa( $conn, $id );
        if( $rows2 == 0){
            $sobre_mim   = cadastroSobreUsuario($conn, $id, '', '', '', 0);
        }
        unset($conn);
        header("Location: ../perfil.php");
    }else{
        header("Location: ../perfil.php");
    }

?>