<div class="centro">

    <?php
        $conn = conexaoPg();
        $info_foto = pegaInfosPessoa($conn, $_SESSION["id_login"]);
        if( $info_foto ){
            $foto = $info_foto['foto_pessoa'];
            $destino = $info_foto['destino_foto_pessoa'];
        }

        unset($conn);
    ?>

    <!-- Botão Modal Foto perfil -->
    <button onclick="document.getElementById('id05').style.display='block'" style="width:auto; background: none; border-radius: 50%; border: none;"><image src="<?php echo($destino); ?>" style="width:120px; height: 120px; background: none; border-radius: 50%;"/></button>
    
    <!-- Modal Eu Senha -->
    <div id="id05" class="modal">
        <form class="modal-content animate" style="width: 35%;" action="./funcoes/editar_fotoperfil.php" method="post" enctype="multipart/form-data">
            <center>
                <h2>Trocar Foto</h2>
            </center>
            <div class="container">
                <label for="foto"><b>Foto</b></label>
                <input type="file" name="foto" required>
                
                <button type="submit">Salvar</button>
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id05').style.display='none'" class="cancelbtn">Voltar</button>
            </div>
        </form>
    </div>
    <!-- <button style="width:auto; background: none; border-radius: 50%; border: none;"> <image src="./imagens/icon.png" alt="TechLadiesRepository" style="width:auto; background: none; border-radius: 50%;"/> </button> -->
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