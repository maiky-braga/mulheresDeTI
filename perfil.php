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
    <title>Tech Ladies: Perfil</title>
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
    <section id="mini-menu">
        <?php
            $conn = conexaoPg();
            $infos = pegaInfosPessoa($conn, $_SESSION["id_login"]);
            if( $infos ){
                $nome = $infos['nome'];
                $sobrenome = $infos['sobrenome'];
                $email  = $infos['email'];
                
                echo( '<h2>Eu</h2>');
                echo( "<p><b>Nome: </b><span>$nome</span></p>");
                echo( "<p><b>Sobrenome: </b><span>$sobrenome</span></p>");
                echo( " <p><b>E-mail: </b><span>$email</span></p>");
            }
            unset($conn);
        ?>
        <!-- Botão Modal Eu -->
        <button onclick="document.getElementById('id00').style.display='block'" style="width:auto;">Editar</button>
        <!-- Modal Eu -->
        <div id="id00" class="modal">
            <form class="modal-content animate" style="width: 35%;" action="./funcoes/editar_infos.php" method="get">
                <center>
                    <h2>Editar Informações: Eu</h2>
                </center>
                <div class="container">
                    <label for="nome"><b>Nome</b></label>
                    <input type="text" value="<?php echo($nome) ?>" name="nome" required>

                    <label for="sobrenome"><b>Sobrenome</b></label>
                    <input type="text" value="<?php echo($sobrenome) ?>" name="sobrenome" required>

                    <label for="email"><b>E-mail</b></label>
                    <input type="text" value="<?php echo($email) ?>" name="email" required>
                   
                    <button type="submit">Salvar</button>
                </div>
                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id00').style.display='none'" class="cancelbtn">Voltar</button>
                </div>
            </form>
        </div>
            
        <!-- Botão Modal Eu - SENHA -->
        <button onclick="document.getElementById('id04').style.display='block'" style="width:auto; background-color:#e79b02;">Mudar senha</button>
        <!-- Modal Eu Senha -->
        <div id="id04" class="modal">
            <form name="form_senha" class="modal-content animate" style="width: 35%;" action="./funcoes/editar_senha.php" method="get">
                <center>
                    <h2>Editar Informações: Senha</h2>
                </center>
                <div class="container">
                    <label for="senha"><b>Senha atual</b></label>
                    <input type="password" name="senha" required>

                    <label for="novasenha"><b>Nova senha</b></label>
                    <input type="password" name="novasenha" required>

                    <label for="novasenhaverifica"><b>Confirma senha</b></label>
                    <input type="password" name="novasenhaverifica" required>

                    <script language="javascript" type="text/javascript">
                        function validar() {
                            var novasenhaverifica = form_senha.novasenhaverifica.value;
                            var novasenha = form_senha.novasenha.value;

                            if (novasenha != novasenhaverifica){
                                alert('Senhas não conferem!');
                                form_senha.novasenhaverifica.focus();
                            }
                        }
                    </script>

                <button type="submit" onclick="return validar()">Salvar</button>
                </div>
                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Voltar</button>
                </div>
            </form>
        </div>
    </section>
    <hr style="width: 75%">

    <!-- Sobre mim -->
    <section id="sobre-mim">
        <?php

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

            unset($conn);
        ?>
        <br>
        <!-- Botão Modal Sobre mim -->
        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Editar</button>
        <!-- Modal Sobre mim -->
        <div id="id01" class="modal">
            <form class="modal-content animate" style="width: 35%;" action="./funcoes/editar_sobre.php" method="get">
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
    <hr style="width: 75%">

    <!-- ACADÊMICO -->
    <section id="academico">
        <?php
            $conn = conexaoPg();
            $academico = pegaAcademicoPessoa($conn, $_SESSION["id_login"]);
            if( $academico ){
                $formacao = $academico['formacao'];
                $grau = $academico['grau'];
                $status  = $academico['status'];
                $curso  = $academico['curso'];
                $instituicao  = $academico['instituicao'];
                $ead  = $academico['ead'];
                $inicio  = $academico['inicio'];
                $fim  = $academico['fim'];
                if($academico['ead'] == 1){
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
            unset($conn);
        ?>
        <br>
        <!-- Botão: Modal Acadêmico -->
        <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Editar</button>
        <!-- Modal Acadêmico -->
        <div id="id02" class="modal">
            <form class="modal-content animate" style="width: 35%;" action="./funcoes/editar_academico.php" method="get">
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
                    <input type="text" placeholder="Ex: IFES" value="<?php echo($instituicao) ?>" name="instituicao" required>

                    <label for="ead"><b>EAD</b></label><br>
                    <select class="ead" id="ead" name="ead">
                        <?php
                            if( $academico['ead'] == 1 ){
                                echo ('<option selected value="1">SIM</option>');
                                echo ('<option value="2">NÃO</option>');
                            }else{
                                echo ('<option value="1">SIM</option>');
                                echo ('<option selected value="2">NÃO</option>');
                            }
                        ?>
                    </select>

                    <label for="inicio"><b>Início</b></label>
                    <input type="date" placeholder="Ex: 01/08/2016" value="<?php echo($inicio) ?>" name="inicio" required>

                    <label for="fim"><b>Fim</b></label>
                    <input type="date" placeholder="Ex: 31/12/2021" value="<?php echo($fim) ?>" name="fim" required>
                
                    <button type="submit">Salvar</button>
                </div>
                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Voltar</button>
                </div>
            </form>
        </div>
    </section>

    <hr style="width: 75%">
    
    <!-- EXPERIÊNCIA -->
    <section id="experiencia">
        <?php
            $conn = conexaoPg();
            $experiencia = pegaExperienciaPessoa($conn, $_SESSION["id_login"]);
            if( $experiencia ){
                $empresa = $experiencia['empresa'];
                $cargo = $experiencia['cargo'];
                $descricao  = $experiencia['descricao'];
                $atual  = $experiencia['atual'];
                $inicio_e  = $experiencia['inicio'];
                $fim_e  = $experiencia['fim'];
                
                if($experiencia['atual'] == 1){
                    $atual = "SIM";
                }else{
                    $atual = "NÃO";
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
            unset($conn);
        ?>
        <br>
        <!-- Botão Modal Experiência -->
        <button onclick="document.getElementById('id03').style.display='block'" style="width:auto;">Editar</button>
        <!-- Modal Experiência -->
        <div id="id03" class="modal">
        
            <form class="modal-content animate" style="width: 35%;" action="./funcoes/editar_experiencia.php" method="get">
                <center>
                    <h2>Editar Informações: Experiência</h2>
                </center>
                <div class="container">
                    <label for="empresa"><b>Empresa</b></label>
                    <input type="text" placeholder="Ex: ArcelorMittal" name="empresa" value="<?php echo($empresa) ?>" required>

                    <label for="cargo"><b>Cargo</b></label>
                    <input type="text" placeholder="Ex: Estágio de Analista Funcional" value="<?php echo($cargo) ?>" name="cargo" required>

                    <label for="descricao"><b>Descrição</b></label>
                    <input type="text" placeholder="Ex: Atendimento de incidentes SAP SD e Debug ABAP (Máx: 255)" value="<?php echo($descricao) ?>" name="descricao" required>

                    <label for="inicio_e"><b>Início</b></label>
                    <input type="date" placeholder="Ex: 01/01/2020" value="<?php echo($inicio_e) ?>" name="inicio_e" required>

                    <label for="fim_e"><b>Fim</b></label>
                    <input type="date" placeholder="Ex: 31/12/2020" value="<?php echo($fim_e) ?>" name="fim_e" required>

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
                    <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Voltar</button>
                </div>
            </form>
        </div>
    </section>
</main>
</body>

<footer class="o-footer">
    <center>
        <a href="https://github.com/ykiam-dyolf/mulheresDeTI" target="_blank">
            <image src="./imagens/GitHub.png" alt="TechLadiesRepository"></image>
        </a>
    </center>
</footer>

</html>
