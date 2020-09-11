<div class="centro">
        <button style="width:auto; background: none; border-radius: 50%; border: none;"> <image src="./imagens/icon.png" alt="TechLadiesRepository" style="width:auto; background: none; border-radius: 50%;"/> </button>
        <h3> oi,
            <?php
                if( isset($_SESSION["login"]) && $_SESSION["login"] ){
                    echo($_SESSION["nome"]);
                }
            ?>
        </h3>
        <hr>
        <a href="feed.php" class="botao">FEED</a>
        <br>
        <br>
        <a href="perfil.php" class="botao">PERFIL</a>
        <br>
        <br>
        <a href="vagas.php" class="botao">VAGAS</a>
        <br>
        <br>
        <a href="eventos.php" class="botao">EVENTOS</a>
        <br>
        <br>
        <a href="forum.php" class="botao">FÓRUM</a>
        <br>
        <hr>
        <br>
        <a href="./funcoes/deslogar.php" class="botao">LOGOUT</a>
    </div>