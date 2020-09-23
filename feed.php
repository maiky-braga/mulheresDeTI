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
    <link rel="stylesheet" href="./css/modalBase.css">
    <title>Tech Ladies: Feed</title>
</head>

<body class="login">
<header class="o-header"></header>
<aside class="o-aside">
    <div class="apresentacao">
        <h3>FEED</h3>
    </div>
    <?php
        include("./estrutura/barra_esquerda.php");
    ?>

</aside>

<main class="o-main">
    <section id="post">
        <form action="./funcoes/postar.php" method="GET">
            <div class="container">
                <label for="descricao"></label>
                <input type="text" placeholder="O que você tem a compartilhar?" name="descricao" style="height:150px; width:100%; border-radius:4px; background: #f5f4f2;">
                <br>
                <button type="submit" style="width:auto; border-radius: 6px;">Postar</button>
            </div>
        </form>
        <hr>
    </div>
    </form> 
    </section>
    
    <section id="postagens">
        <?php
        $conn = conexaoPg();
        $posts = pegaPosts($conn);
        if( $posts ){
            foreach( $posts as $value ){
                $id_user = $value['id_pessoa'];
                $nome = $value['nome'];
                $desc = $value['desc'];
                $data = $value['data'];
                echo("<div style='background: #f5f4f2; border-radius: 4px; border: 1px solid #333; padding: 10px;'>");
                echo("<a href='perfil_user.php?id_user=$id_user' style='text-decoration: none; color:#e79b02;'><b>$nome</b></a>");
                echo(" | $data </b> <br><br> $desc </div>");
                echo("<br>");
            }
        }
        
        unset($conn);
        ?>
    </section>
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