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
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/modalBase.css">
    <title>Tech Ladies: Fórum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body class="login">
<header class="o-header"></header>
<aside class="o-aside">
    <div class="apresentacao">
        <h3>FÓRUM</h3>
    </div>
    <?php
        include("./estrutura/barra_esquerda.php");
    ?>

</aside>

<main class="o-main">
    <div class="container-fluid">
        <div class="jumbotron">
            <h1 class="display-4">Fórum</h1>
            <p class="lead">Retire aqui as suas dúvidas com a comunidade</p>
            <hr class="my-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" >
                Faça uma pergunta
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Faça uma pergunta pública</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./funcoes/perguntarForum.php" method="POST">
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="titulo">
                            <small id="titulosmall" class="form-text text-muted">Título da pergunta</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Corpo da pergunta</label>
                            <textarea class="form-control" id="corpo" name="corpo" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <input type="text" class="form-control" id="tags" name="tags" aria-describedby="tags">
                            <small id="tagsmall" class="form-text text-muted">Digite tags da pergunta separadas por espaço</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>

    </div>
    
        <section id="postagens">
        
            <?php
            $conn = conexaoPg();
            $perguntas = pegaPerguntas($conn);
            if( $perguntas ){
                foreach( $perguntas as $value ){
                    $titulo = $value['titulo'];
                    $corpo = $value['corpo'];
                    $tags = $value['tags'];
                    $id = $value['id'];
                    echo("<div class='container-fluid'>
                        <div class='card mt-3' style='background: #f5f4f2;border: 1px solid #333;'>
                            <h5 class='card-header'>$id|$tags</h5>
                            <div class='card-body'>
                                <h5 class='card-title'>$titulo</h5>
                                <p class='card-text'>$corpo</p>
                            </div>
                            <div class='card-footer text-muted'>
                                <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal2' style='background-color: #FFCC66';>
                                Responder
                                </button>
                            </div>
                        </div>
                            <div class='modal fade' id='exampleModal2' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'>Responder</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                    <div class='form-group'>
                                        <label for='exampleFormControlTextarea3'>Ajude a comunidade com sua resposta</label>
                                        <textarea class='form-control' id='responder' name='responder' rows='5'></textarea>
                                    </div>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar sem enviar</button>
                                        <button type='button' class='btn btn-primary' style='background-color: #FFCC66;'>Enviar resposta</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        ");
                    echo("<br>");
                }
            }
            
            unset($conn);
            ?>
            

            
            
        </section>
    </div>
</main>



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



    
</body>

<footer class="o-footer">
    <center>
        <a href="https://github.com/ykiam-dyolf/mulheresDeTI" target="_blank">
            <image src="./imagens/GitHub.png" alt="TechLadiesRepository"/>
        </a>
    </center>
</footer>

</html>