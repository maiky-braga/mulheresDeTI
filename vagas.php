<?php
    include("./funcoes/models.php");
    include("./funcoes/conexao.php");
    include("./funcoes/valida_pagina.php");
    validaHome();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/base.css">
    <title>Tech Ladies: Oportunidades</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body class="login">
<header class="o-header"></header>
<aside class="o-aside">
    <div class="apresentacao">
        <h3>OPORTUNIDADES</h3>
    </div>

</aside>

<aside class="o-aside">
    <div class="centro">
        <br><br><br><br><br><br><br><br>
        <h1>TECH LADIES</h1>
        <h5>Sua comunidade profissional</h5>
        <div class="centralizado">
            <form method="GET" action="./funcoes/postar.php">
                <br>
                <input type="button" class="botao" value="Minha conta">
                <br><br>
                <input type="button" class="botao" value="Fórum">
                <br><br>
                <input type="button" class="botao" value="Oportunidades">
                <br><br>
                <input type="button" class="botao" value="Eventos">
                <br><br>
            </form>
         

    </div>
</aside>

<main class="o-main" style="text-align: center;">
    <div class="centro">
        <br><br><br><br>
        <h3 style="font-size: 43px;">Encontre sua vaga!</h3>
        <p>É rápido e fácil.</p>
        <hr>
    </div>
    <form method="POST" action="./funcoes/login.php">
        <br>
        <input type="titulo" class="input_css" name="email" placeholder="Título da Vaga">
        <br><br>
        <input type="descricao" class="input_css" name="senha" placeholder="Descrição da vaga">

        <input type="submit" class="botao" value="Adicionar vaga">
        <br>
    </form>

    <br>
    <hr>
    
</main>
</body>

<footer class="o-footer">
    <center>
        <a href="https://github.com/ykiam-dyolf/mulheresDeTI" target="_blank">
            <image src="./imagens/GitHub.png" alt="TechLadiesRepository"/>
        </a>
    </center>
</footer>

</html>
