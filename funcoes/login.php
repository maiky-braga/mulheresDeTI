<?php
    include("./models.php");
    include("./conexao.php");
    
    $conn = conexaoPg();

    $email     = pg_escape_string( trim($_REQUEST['email'])     );
    $senha     = pg_escape_string( trim($_REQUEST['senha'])     );
    $senha = md5($senha);
    
    $rows = verificaUsuario($conn, $email, $senha);

    if($rows == 1){
        session_start();
        $id = pegaIdEmail( $conn, $email );
        $nome = pegaNome( $conn, $email );
        $infos = pegaInfosPessoa( $conn, $id );
        $sobre_mim = pegaSobrePessoa( $conn, $id );
        $academico = pegaAcademicoPessoa( $conn, $id );
        $experiencia = pegaExperienciaPessoa( $conn, $id );
        $_SESSION["login"]     = true;
        $_SESSION["id_login"]  = $id;
        $_SESSION["nome"]      = $nome;
        unset($conn);
        header("Location: ../feed.php");
    }else{
        header("Location: ../login.html");
    }
?>