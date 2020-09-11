<?php
    
    include("./models.php");
    include("./conexao.php");

    $conn = conexaoPg();

    $nome      = pg_escape_string( trim($_REQUEST['nome'])      );
    $email     = pg_escape_string( trim($_REQUEST['email'])     );
    $senha     = pg_escape_string( trim($_REQUEST['senha'])     );
    $sobrenome = pg_escape_string( trim($_REQUEST['sobrenome']) );
    $data      = pg_escape_string( trim($_REQUEST['data'])      );

    $rows = cadastroUsuario($conn, $nome, $email, $senha, $sobrenome, $data);

    if($rows == 1){
        session_start();
        $id = pegaIdEmail($conn, $email);
        $sobre_mim   = cadastroSobreUsuario($conn, $id, '', '', '', 0);
        $academico   = cadastroAcademicoUsuario($conn, $id, '', '', '', '', '', 0);
        $experiencia = cadastroExperienciaUsuario($conn, $id, '', '', '', 0);
        $_SESSION["login"]     = true;
        $_SESSION["id_login"]  = $id;
        $_SESSION["nome"]      = $nome;
        unset($conn);
        header("Location: ../feed.php");
    }else{
        header("Location: ../cadastro.html");
    }

?>