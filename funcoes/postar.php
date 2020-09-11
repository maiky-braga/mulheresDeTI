<?php
    session_start();

    include("./models.php");
    include("./conexao.php");

    $conn = conexaoPg();

    $descricao = pg_escape_string( trim($_REQUEST['descricao'])     );

    $rows = cadastroPostUsuario($conn, $_SESSION["id_login"], $descricao);

    $posts = pegaPosts($conn);
    
    unset($conn);

    if( $rows == 1 ){
        header("Location: ../feed.php");
    }else{
        header("Location: ../feed.php");
    }

?>