<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/base.css">
    <title>FEED</title>
</head>

<body>


<header class="o-header">
    <center>
        <h3>TECH LADIES - Feed</h3>
    </center>

</header>

<aside class="o-aside">
    <div class="navbar">
        <h2> oi,
            <?php
                if( isset($_SESSION["login"]) && $_SESSION["login"] ){
                    echo($_SESSION["nome"]);
                }
            ?>
        </h2>
        <figure>
            <image src="./imagens/icon.png" alt="TechLadiesRepository"/>
        </figure>
        <hr>
        <br>
        <a href="perfil.php">PERFIL</a>
        <br>
        <br>
        <a href="vagas.html">VAGAS</a>
        <br>
        <br>
        <a href="eventos.html">EVENTOS</a>
        <br>
        <br>
        <a href="forum.html">FÓRUM</a>
        <br>
        <hr>
        <br>
        <a href="login.html">LOGOUT</a>
    </div>

</aside>

<main class="o-main">
</main>
<footer class="o-footer">
    <center>
        <a href="https://github.com/adudars/mulheresDeTI">
            <image src="./imagens/GitHub.png" alt="TechLadiesRepository"/>
        </a>
    </center>
</footer>
</body>
</html>