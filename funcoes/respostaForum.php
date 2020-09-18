<?php
    session_start();

    include("./models.php");
    include("./conexao.php");

    $conn = conexaoPg();
    $perguntas = pegaPerguntas($conn);

    echo $perguntas;

    // echo $_REQUEST['titulo'];
    // echo $_REQUEST['corpo'];
    // echo $_REQUEST['tags'];

    // $pergunta = createPerguntaForum($conn);
    // $resposta = createRespostaForum($conn);


    // $titulo = pg_escape_string( trim($_REQUEST['titulo'])     );
    // $corpo = pg_escape_string( trim($_REQUEST['corpo'])     );
    // $tags = pg_escape_string( trim($_REQUEST['tags'])     );

    // $rows = criarPergunta($conn, $titulo, $corpo, $tags);

    // $posts = pegaPosts($conn);
    
    unset($conn);

    if( $perguntas == 1 ){
        header("Location: ../forum.php");
    }else{
        header("Location: ../forum.php");
    }

?>