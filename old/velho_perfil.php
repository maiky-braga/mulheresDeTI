<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>PERFIL</title>
    <link rel="stylesheet" href="./css/modalBase.css">
</head>

<body>

<header class="o-header">
    <center>
        <h3>TECH LADIES - Perfil</h3>
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
            <image src="./imagens/icon.png" alt="TechLadiesRepository"></image>
        </figure>
        <hr>
        <br>
        <a href="feed.html">FEED</a>
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
    <section id="meu-perfil" class="mini-menu">
        <h3 style="text-align: center;">
            <a href="#sobre-mim">Sobre mim</a> | <a href="#academico">Acadêmico</a> | <a
                href="experiencia.html">Experiência</a>
        </h3>
    </section>
    <section id="sobre-mim">
        <?php
            include("./models.php");
            include("./conexao.php");
            $conn = conexaoPg();
            $resultado = pegaSobrePessoa($conn, $_SESSION["id_login"]);
            if( $resultado ){
                $cpf = $resultado['cpf'];
                $cidade = $resultado['cidade'];
                $uf  = $resultado['uf'];
                if($resultado['pcd'] == 1){
                    $pcd = "SIM";
                }else{
                    $pcd = "NAO";
                }
                echo( '<h2>Sobre mim</h2>');
                echo( "<p><b>CPF: </b><span>$cpf</span></p>");
                echo( "<p><b>Cidade: </b><span>$cidade</span></p>");
                echo( " <p><b>Estado: </b><span>$uf</span></p>");
                echo( " <p><b>PCD: </b><span>$pcd</span></p>");
            }else{
                $cpf    = "";
                $cidade = "";
                $uf     = "";
                $pcd    = "";
                echo( '<h2>Sobre mim</h2>');
                echo( "<p><b>CPF: </b><span></span></p>");
                echo( "<p><b>Cidade: </b><span></span></p>");
                echo( " <p><b>Estado: </b><span></span></p>");
                echo( " <p><b>PCD: </b><span></span></p>");
            }
            
        ?>

        <br>
        <!-- Modal teste -->
        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Editar</button>

        <div id="id01" class="modal">
        
        <form class="modal-content animate" style="width: 35%;" action="./editar_sobre.php" method="get">
            <center>
                <h2>Editar Informações: Sobre mim</h2>
            </center>
            <div class="container">
                <label for="cpf"><b>CPF</b></label>
                <input type="text" placeholder="Ex: 12345678900" name="cpf" value="<?php echo($cpf) ?>" required>

                <label for="cidade"><b>Cidade</b></label>
                <input type="text" placeholder="Ex: Vitória" value="<?php echo($cidade) ?>" name="cidade" required>

                <label for="uf"><b>UF</b></label>
                <input type="text" placeholder="Ex: ES" value="<?php echo($uf) ?>" name="uf" required>

                <label for="pcd"><b>PCD</b></label><br>
                <select class="pcd" id="pcd" name="pcd">
                    <?php
                        if( $resultado['pcd'] == 1 ){
                            echo ('<option selected value="1">SIM</option>');
                            echo ('<option value="2">NÃO</option>');
                        }else{
                            echo ('<option value="1">SIM</option>');
                            echo ('<option selected value="2">NÃO</option>');
                        }
                    ?>
                </select>
                
                <button type="submit">Salvar</button>
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Voltar</button>
            </div>
        </form>
        </div>
    </section>

    <section id="academico">
        <?php
            include("./models.php");
            include("./conexao.php");
            $conn = conexaoPg();
            $resultado = pegaAcademicoPessoa($conn, $_SESSION["id_login"]);
            if( $resultado ){
                $formacao = $resultado['formacao'];
                $grau = $resultado['grau'];
                $status  = $resultado['status'];
                $curso  = $resultado['curso'];
                $instituicao  = $resultado['instituicao'];
                $ead  = $resultado['ead'];
                $inicio  = $resultado['inicio'];
                $fim  = $resultado['fim'];
                if($resultado['ead'] == 1){
                    $ead = "SIM";
                }else{
                    $ead = "NÃO";
                }
                echo( '<h2>Acadêmico</h2>');
                echo( "<p><b>Formação: </b><span>$formacao</span></p>");
                echo( "<p><b>Grau: </b><span>$grau</span></p>");
                echo( " <p><b>Status: </b><span>$status</span></p>");
                echo( " <p><b>Curso: </b><span>$curso</span></p>");
                echo( "<p><b>Insituição: </b><span>$instituicao</span></p>");
                echo( "<p><b>EAD: </b><span>$ead</span></p>");
                echo( " <p><b>Início: </b><span>$inicio</span></p>");
                echo( " <p><b>Fim: </b><span>$fim</span></p>");
            }else{
                $formacao = '';
                $grau = '';
                $status  = '';
                $curso  = '';
                $instituicao  = '';
                $ead  = '';
                $inicio  = '';
                $fim  = '';
                echo( '<h2>Acadêmico</h2>');
                echo( "<p><b>Formação: </b><span></span></p>");
                echo( "<p><b>Grau: </b><span></span></p>");
                echo( " <p><b>Status: </b><span></span></p>");
                echo( " <p><b>Curso: </b><span></span></p>");
                echo( "<p><b>Insituição: </b><span></span></p>");
                echo( "<p><b>EAD: </b><span></span></p>");
                echo( " <p><b>Início: </b><span></span></p>");
                echo( " <p><b>Fim: </b><span></span></p>");
            }
        ?>

        <br>
        <!-- Modal teste -->
        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Editar</button>

        <div id="id01" class="modal">
        
        <form class="modal-content animate" style="width: 35%;" action="./editar_academico.php" method="get">
            <center>
                <h2>Editar Informações: Acadêmico</h2>
            </center>
            <div class="container">
                <label for="formacao"><b>Formação</b></label>
                <input type="text" placeholder="Ex: Superior" name="formacao" value="<?php echo($formacao) ?>" required>

                <label for="grau"><b>Grau</b></label>
                <input type="text" placeholder="Ex: Graduação" value="<?php echo($grau) ?>" name="grau" required>

                <label for="status"><b>Status</b></label>
                <input type="text" placeholder="Ex: Em andamento" value="<?php echo($status) ?>" name="status" required>

                <label for="curso"><b>Curso</b></label>
                <input type="text" placeholder="Ex: Bacharelado em Sistemas de Informação" value="<?php echo($curso) ?>" name="curso" required>

                <label for="instituicao"><b>Instituição</b></label>
                <input type="text" placeholder="Ex: Bacharelado em Sistemas de Informação" value="<?php echo($instituicao) ?>" name="instituicao" required>

                <label for="ead"><b>EAD</b></label><br>
                <select class="ead" id="ead" name="ead">
                    <?php
                        if( $resultado['ead'] == 1 ){
                            echo ('<option selected value="1">SIM</option>');
                            echo ('<option value="2">NÃO</option>');
                        }else{
                            echo ('<option value="1">SIM</option>');
                            echo ('<option selected value="2">NÃO</option>');
                        }
                    ?>
                </select>

                <label for="inicio"><b>Início</b></label>
                <input type="data" placeholder="Ex: 01/08/2016" value="<?php echo($inicio) ?>" name="inicio" required>

                <label for="fim"><b>Fim</b></label>
                <input type="data" placeholder="Ex: 31/12/2021" value="<?php echo($fim) ?>" name="fim" required>
               
                <button type="submit">Salvar</button>
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Voltar</button>
            </div>
        </form>
        </div>
    </section>

    <section id="experiencia" class="">
    <?php
            include("./models.php");
            include("./conexao.php");
            $conn = conexaoPg();
            $resultado = pegaExperienciaPessoa($conn, $_SESSION["id_login"]);
            if( $resultado ){
                $empresa = $resultado['empresa'];
                $cargo = $resultado['cargo'];
                $descricao  = $resultado['descricao'];
                $atual  = $resultado['atual'];
                $xp  = $resultado['xp'];
                $inicio_e  = $resultado['inicio'];
                $fim_e  = $resultado['fim'];
                
                if($resultado['atual'] == 1){
                    $ead = "SIM";
                }else{
                    $ead = "NÃO";
                }

                if($resultado['xp'] == 1){
                    $xp = "SIM";
                }else{
                    $xp = "NÃO";
                }
                echo( '<h2>Experiência</h2>');
                echo( "<p><b>Empresa: </b><span>$empresa</span></p>");
                echo( "<p><b>Cargo: </b><span>$cargo</span></p>");
                echo( " <p><b>Descrição: </b><span>$descricao</span></p>");
                echo( " <p><b>Atual: </b><span>$atual</span></p>");
                echo( " <p><b>Início: </b><span>$inicio_e</span></p>");
                echo( " <p><b>Fim: </b><span>$fim_e</span></p>");
            }else{
                $empresa = '';
                $cargo = '';
                $descricao  = '';
                $atual  = '';
                $xp  = '';
                $inicio_e  = '';
                $fim_e  = '';
                echo( '<h2>Experiência</h2>');
                echo( "<p><b>Empresa: </b><span></span></p>");
                echo( "<p><b>Cargo: </b><span></span></p>");
                echo( " <p><b>Descrição: </b><span></span></p>");
                echo( "<p><b>Atual: </b><span></span></p>");
                echo( " <p><b>Início: </b><span></span></p>");
                echo( " <p><b>Fim: </b><span></span></p>");
            }
        ?>

        <br>
        <!-- Modal teste -->
        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Editar</button>

        <div id="id01" class="modal">
        
        <form class="modal-content animate" style="width: 35%;" action="./editar_experiencia.php" method="get">
            <center>
                <h2>Editar Informações: Experiência</h2>
            </center>
            <div class="container">
                <label for="empresa"><b>Empresa</b></label>
                <input type="text" placeholder="Ex: ArcelorMittal" name="empresa" value="<?php echo($empresa) ?>" required>

                <label for="cargo"><b>Cargo</b></label>
                <input type="text" placeholder="Ex: Estágio de Analista Funcional" value="<?php echo($cargo) ?>" name="cargo" required>

                <label for="descricao"><b>Descrição</b></label>
                <input type="text" placeholder="Ex: Atendimento de incidentes SAP SD; Debug ABAP" value="<?php echo($descricao) ?>" name="descricao" required>

                <label for="inicio_e"><b>Início</b></label>
                <input type="data" placeholder="Ex: 01/01/2020" value="<?php echo($inicio_e) ?>" name="inicio_e" required>

                <label for="fim_e"><b>Fim</b></label>
                <input type="data" placeholder="Ex: 31/12/2020" value="<?php echo($fim_e) ?>" name="fim_e" required>

                <label for="atual"><b>Atual</b></label><br>
                <select class="atual" id="atual" name="atual">
                    <?php
                        if( $resultado['atual'] == 1 ){
                            echo ('<option selected value="1">SIM</option>');
                            echo ('<option value="2">NÃO</option>');
                        }else{
                            echo ('<option value="1">SIM</option>');
                            echo ('<option selected value="2">NÃO</option>');
                        }
                    ?>
                </select>
               
                <button type="submit">Salvar</button>
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Voltar</button>
            </div>
        </form>
        </div>
    </section>
</main>
<footer class="o-footer">
    <center>
        <a href="https://github.com/adudars/mulheresDeTI">
            <image src="./imagens/GitHub.png" alt="TechLadiesRepository"></image>
        </a>
    </center>
</footer>
</body>
</html>
