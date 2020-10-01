<?php
    session_start();

    include("./models.php");
    include("./conexao.php");

    $resposta = pg_escape_string( trim($_REQUEST['responder'])     );
    $idPergunta = pg_escape_string( trim($_REQUEST['vai'])     );

    $conn = conexaoPg();
    $rows = criarResposta($conn, $idPergunta, $resposta);

    
    unset($conn);

    if( $rows == 1 ){
        header("Location: ../forum.php");
    }else{
        header("Location: ../forum.php");
    }

?>