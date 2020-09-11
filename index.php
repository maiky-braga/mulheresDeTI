<?php
    include("./funcoes/valida_pagina.php");
    validaLogado();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/base.css">
    <title>Tech Ladies: Feed</title>
</head>

<header>
</header>

<body class="index">
    <main class="o-main" style="text-align: center;">
        <div class="centro">
            <br><br><br>
            <h1>TECH LADIES</h1>
            <h2>Bem vinda à sua comunidade profissional</h2>
        
            <div class="centralizado" id="divBusca" >
                <input type="text" id="txtBusca" placeholder="Encontre pessoas, eventos e mais" disabled/>
                <img src="imagens/lupa.png" id="btnBusca" alt="Buscar"/>
            </div>
            <br>
            <br>
            <hr>
            <br>
            <p>Conecte-se com suas colegas de<br>
                trabalho e faculdade, faça novas<br>
                amizades, participe de eventos e<br>
                fóruns, encontre sua vaga perfeita.<br>
            </p>
            <br><br><br> 
            <button class="botao" onclick="window.location.href = 'login.html'">Comece já</button>
            <br><br><br>    
            <p>
                <b><a href="cadastro.html" target="_blank"><img src="imagens/mala.png"> Anuncie uma vaga </a></b>
                <b><a href="cadastro.html" target="_blank"><img src="imagens/lupao.png"> Empregos e estágios </a></b>
                <b><a href="cadastro.html" target="_blank"><img src="imagens/cal.png"> Encontre eventos </a></b>
                <b><a href="cadastro.html" target="_blank"><img src="imagens/adPe.png">Conecte-se a colegas </a></b>
            </p>
        </div>
    </main>

</body>

<footer class="o-footer" style="background: #FFCC66;">
    <center>
        <a href="https://github.com/ykiam-dyolf/mulheresDeTI" target="_blank">
            <image src="./imagens/GitHub.png" alt="TechLadiesRepository"/>
        </a>
    </center>
</footer>

</html>