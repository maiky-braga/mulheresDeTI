<?php
    include("./funcoes/models.php");
    include("./funcoes/conexao.php");
    include("./funcoes/valida_pagina.php");
    validaHome();

    $conn = conexaoPg();

    $id_user = $_GET['id_user'];
    
    $infos = pegaInfosPessoa($conn, $id_user);
    $sobre = pegaSobrePessoa($conn, $id_user);
    $academico = pegaAcademicoPessoa($conn, $id_user);
    $experiencia = pegaExperienciaPessoa($conn, $id_user);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/modalBase.css">
    <title>Tech Ladies: Perfil User</title>
</head>



<body class="login">
<header class="o-header"></header>
<aside class="o-aside">
	<div class="apresentacao">
	    <h3>PERFIL</h3>
    </div>
    <?php
        include("./estrutura/barra_esquerda.php");
    ?>

</aside>

<main class="o-main">
    <a href="feed.php" style="text-decoration: none; color:#e79b02; background-color:#fff; border:7px solid #fff;">Voltar</a>
    <section id='infos'>
        <?php
            if ( $infos ){
                $nome = $infos['nome'];
                $sobrenome = $infos['sobrenome'];
                $email = $infos['email'];
                $destino = $infos['destino_foto_pessoa'];
                echo("<center>");
                echo("<image src='$destino' style='width:120px; background: none; border-radius: 50%;'/></button>");
                echo("<h2>$nome $sobrenome</h2>");
                echo("</center>");
                echo("<p><b>E-mail:</b><span>$email</span></p>");
            }
        
            if ( $sobre ){
                $cidade = $sobre['cidade'];
                $uf = $sobre['uf'];
                echo("<p><b>Cidade: </b>$cidade<span></span></p>");
                echo( "<p><b>UF: </b>$uf<span></span></p>");       
            } 
        ?>
        
    </section>
    <hr style='width: 75%'>
    <section id='academico'>
        <?php
        echo( '<h2>Acadêmico</h2>');
        if ( $academico ){
            foreach( $academico as $value ){
                $formacao = $value['formacao'];
                $grau = $value['grau'];
                $status = $value['status'];
                $curso = $value['curso'];
                $instituicao = $value['instituicao'];
                $ead = $value['ead'];
                $academico_inicio = $value['inicio'];
                $academico_fim = $value['fim'];

                if($value['ead'] == 1){
                    $ead = "SIM";
                }else{
                    $ead = "NÃO";
                }

                echo( "<p><b>Formação: </b><span>$formacao</span></p>");
                echo( "<p><b>Grau: </b><span>$grau</span></p>");
                echo( " <p><b>Status: </b><span>$status</span></p>");
                echo( " <p><b>Curso: </b><span>$curso</span></p>");
                echo( "<p><b>Insituição: </b><span>$instituicao</span></p>");
                echo( "<p><b>EAD: </b><span>$ead</span></p>");
                echo( " <p><b>Início: </b><span>$academico_inicio</span></p>");
                echo( " <p><b>Fim: </b><span>$academico_fim</span></p>");
            }     
        } 
        ?>
    </section>
    <hr style='width: 75%'>
    <section id='experiencia'>
        <?php
        echo( '<h2>Experiência</h2>');
        if ( $experiencia ){
            foreach( $experiencia as $val ){
                $empresa = $val['empresa'];
                $cargo = $val['cargo'];
                $descricao = $val['descricao'];
                $atual = $val['atual'];
                $experiencia_inicio = $val['inicio'];
                $experiencia_fim = $val['fim'];
                
                if($val['atual'] == 1){
                    $atual = "SIM";
                }else{
                    $atual = "NÃO";
                }

                echo( "<p><b>Empresa: </b><span>$empresa</span></p>");
                echo( "<p><b>Cargo: </b><span>$cargo</span></p>");
                echo( " <p><b>Descrição: </b><span>$descricao</span></p>");
                echo( " <p><b>Atual: </b><span>$atual</span></p>");
                echo( " <p><b>Início: </b><span>$experiencia_inicio</span></p>");
                echo( " <p><b>Fim: </b><span>$experiencia_fim</span></p>");
                echo( '<br>');
            }     
        }
        unset($conn);
        ?>
    </section>
</main>

<footer class="o-footer">
    <center>
        <a href="https://github.com/ykiam-dyolf/mulheresDeTI" target="_blank">
            <image src="./imagens/GitHub.png" alt="TechLadiesRepository"></image>
        </a>
    </center>
</footer>

<script language="javascript" type="text/javascript" src="./js/perfil.js"></script>

</body>
</html>
