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
                $emails = pegaEmails( $conn );
                
                if( $infos ){
                    $nome = $infos['nome'];
                    $sobrenome = $infos['sobrenome'];
                    $email  = $infos['email'];
                    $email_ref  = $infos['email'];
                    $old_pass = $infos['senha'];
                    
                    echo( '<h2>Eu</h2>');
                    echo( "<p><b>Nome: </b><span>$nome</span></p>");
                    echo( "<p><b>Sobrenome: </b><span>$sobrenome</span></p>");
                    echo( " <p><b>E-mail: </b><span>$email</span></p>");
                }

                if( $emails ){
                    $lista_emails = "";
                    foreach($emails as $e){
                        $es = $e['email'];
                        if($lista_emails == ""){
                            $lista_emails = $es . "|";
                        }else{
                            $lista_emails = $lista_emails . $es . "|";
                        }
                    }
                }
                unset($conn);
            ?>

            <!-- Botão Modal Eu -->
            <button onclick="document.getElementById('id_info_edit').style.display='block'" style="width:auto; background-color: #9ea956;">Editar</button>
            <!-- Modal Eu -->
            <div id="id_info_edit" class="modal">
                <form name='form_info' class="modal-content animate" style="width: 35%;" action="./funcoes/editar_infos.php" method="get">
                    <center>
                        <h2>Editar Informações: Eu</h2>
                    </center>
                    <div class="container">
                        <label for="nome"><b>Nome</b></label><br>
                        <input type="text" value="<?php echo($nome); ?>" name="nome" required>
                        <br>
                        <label for="sobrenome"><b>Sobrenome</b></label><br>
                        <input type="text" value="<?php echo($sobrenome); ?>" name="sobrenome" required>
                        <br>
                        <label for="email"><b>E-mail</b></label><br>
                        <input type="text" value="<?php echo($email); ?>" name="email" required>
                        <br>                 
                        <input type="hidden" value="<?php echo($lista_emails); ?>" name="lista_emails">
                        <input type="hidden" value="<?php echo($email_ref); ?>" name="email_ref">
                        <button type="submit"  style="background-color:#e79b02;" onclick="return validar_email()">Salvar</button>
                    </div>
                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id_info_edit').style.display='none'" class="cancelbtn">Voltar</button>
                    </div>
                </form>
            </div>
            
            <!-- Botão Modal Eu - SENHA -->
            <button onclick="document.getElementById('id_pass_edit').style.display='block'" style="width:auto;  background-color:#be2914;">Mudar senha</button>
            <!-- Modal Eu Senha -->
            <div id="id_pass_edit" class="modal">
                <form name="form_senha" class="modal-content animate" style="width: 35%;" action="./funcoes/editar_senha.php" method="get">
                    <center>
                        <h2>Editar Informações: Senha</h2>
                    </center>
                    <div class="container">
                        <label for="senha"><b>Senha atual</b></label>
                        <br>
                        <input type="password" name="senha" required>
                        <br>
                        <label for="novasenha"><b>Nova senha</b></label>
                        <br>
                        <input type="password" name="novasenha" required>
                        <br>
                        <label for="novasenhaverifica"><b>Confirma senha</b></label>
                        <br>
                        <input type="password" name="novasenhaverifica" required>
                        <input type="hidden" value="<?php echo($old_pass); ?>" name="old_pass">
                        <br>
                        <button type="submit"  style="background-color:#e79b02;" onclick="return validar()">Salvar</button>
                    </div>
                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id_pass_edit').style.display='none'" class="cancelbtn">Voltar</button>
                    </div>
                </form>
            </div>
        </section>
        <hr style="width: 75%">

        <?php
            if( isset($_SESSION["senha_ok"]) && $_SESSION["senha_ok"] == true ){
                echo("<script language='javascript' type='text/javascript'>
                alert('Nova senha salva com sucesso'); </script>");
                $_SESSION["senha_ok"] = null;
            }else if( isset($_SESSION["senha_ok"]) && $_SESSION["senha_ok"] == false ){
                echo("<script language='javascript' type='text/javascript'>
                alert('Nova senha não foi salva, pois senha atual inserida não confere.'); </script>");
                $_SESSION["senha_ok"] = null;
            }
        ?>

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
            <button onclick="document.getElementById('id_sobre_edit').style.display='block'" style="width:auto; background-color: #9ea956;">Editar</button>
            <!-- Modal Sobre mim -->
            <div id="id_sobre_edit" class="modal">
                <form class="modal-content animate" style="width: 35%;" action="./funcoes/editar_sobre.php" method="get">
                    <center>
                        <h2>Editar Informações: Sobre mim</h2>
                    </center>
                    <div class="container">
                        <label for="cpf"><b>CPF</b></label><br>
                        <input type="text" placeholder="Ex: 12345678900" name="cpf" value="<?php echo($cpf) ?>" min="11" max="11" required><br>

                        <label for="cidade"><b>Cidade</b></label><br>
                        <input type="text" placeholder="Ex: Vitória" value="<?php echo($cidade) ?>" name="cidade" min="2" max="2" required><br>

                        <label for="uf"><b>UF</b></label><br>
                        <input type="text" placeholder="Ex: ES" value="<?php echo($uf) ?>" name="uf" required><br>

                        <label for="pcd"><b>PCD</b></label><br>
                        <select class="pcd" id="pcd" name="pcd">
                            <?php
                                if( $resultado['pcd'] == 1 ){
                                    echo ('<option selected value="1">SIM</option>');
                                    echo ('<option value="0">NÃO</option>');
                                }else{
                                    echo ('<option value="1">SIM</option>');
                                    echo ('<option selected value="0">NÃO</option>');
                                }
                            ?>
                        </select>
                        <button type="submit"  style="background-color:#e79b02;">Salvar</button>
                    </div>
                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id_sobre_edit').style.display='none'" class="cancelbtn">Voltar</button>
                    </div>
                </form>
            </div>
            
            <!-- Botão Sobre mim - Deletar -->
            <button onclick="document.getElementById('id_sobre_del').style.display='block'" style="width:auto; background-color:#be2914" class="centro">Deletar</button>
            <!-- Modal Sobre mim - Deletar -->
            <div id="id_sobre_del" class="modal">
                <form class="modal-content animate" style="width: 35%;" action="./funcoes/apagar_sobre.php" method="get">
                    <center>
                        <h2>Deletar Informações: Sobre</h2>
                    </center>
                    <div class="container">
                    <label for="cpf"><b>CPF</b></label><br>
                        <input type="text" value="<?php echo($cpf) ?>" disabled><br>

                        <label for="cidade"><b>Cidade</b></label><br>
                        <input type="text" value="<?php echo($cidade) ?>" disabled><br>

                        <label for="uf"><b>UF</b></label><br>
                        <input type="text" value="<?php echo($uf) ?>" disabled><br>

                        <label for="pcd"><b>PCD</b></label><br>
                        <select disabled>
                            <?php
                                if( $resultado['pcd'] == 1 ){
                                    echo ('<option selected value="1">SIM</option>');
                                    echo ('<option value="0">NÃO</option>');
                                }else{
                                    echo ('<option value="1">SIM</option>');
                                    echo ('<option selected value="0">NÃO</option>');
                                }
                            ?>
                        </select>
                        <button type="submit" style="background-color:#e79b02;">Desejo mesmo deletar!</button>
                    </div>
                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id_sobre_del').style.display='none'" class="cancelbtn">Voltar</button>
                    </div>
                </form>
            </div>
        </section>
        <hr style="width: 75%">


        <!-- ACADÊMICO -->
        <section id="academico">
            <!-- Botão Acadêmico - ADD -->
            <button onclick="document.getElementById('id_acad_add').style.display='block'" style="width:auto; background-color:#e79b02;" class="centro">Adicionar novo acadêmico</button>
            <br>
            <!-- Modal Acadêmico -->
            <div id="id_acad_add" class="modal">
                <form class="modal-content animate" style="width: 35%;" action="./funcoes/adicionar_academico.php" method="get">
                    <center>
                        <h2>Adicionar Informações: Acadêmico</h2>
                    </center>
                    <div class="container">
                        <label for="formacao"><b>Formação</b></label><br>
                        <input type="text" placeholder="Ex: Superior" name="formacao" required><br>

                        <label for="grau"><b>Grau</b></label><br>
                        <input type="text" placeholder="Ex: Graduação" name="grau" required><br>

                        <label for="status"><b>Status</b></label><br>
                        <input type="text" placeholder="Ex: Em andamento" name="status" required><br>

                        <label for="curso"><b>Curso</b></label><br>
                        <input type="text" placeholder="Ex: Bacharelado em Sistemas de Informação" name="curso" required><br>

                        <label for="instituicao"><b>Instituição</b></label><br>
                        <input type="text" placeholder="Ex: IFES" name="instituicao" required><br>

                        <label for="ead"><b>EAD</b></label><br>
                        <select class="ead" id="ead" name="ead">
                            <?php
                                if( $academico['ead'] == 1 ){
                                    echo ('<option selected value="1">SIM</option>');
                                    echo ('<option value="0">NÃO</option>');
                                }else{
                                    echo ('<option value="1">SIM</option>');
                                    echo ('<option selected value="0">NÃO</option>');
                                }
                            ?>
                        </select><br>

                        <label for="inicio"><b>Início</b></label><br>
                        <input type="date" placeholder="Ex: 01/08/2016" name="inicio" required><br>

                        <label for="fim"><b>Fim</b></label><br>
                        <input type="date" placeholder="Ex: 31/12/2021" name="fim" required>
                    
                        <button type="submit"  style="background-color:#e79b02;">Salvar</button>
                    </div>
                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id_acad_add').style.display='none'" class="cancelbtn">Voltar</button>
                    </div>
                </form>
            </div>
            
            <?php
                $conn = conexaoPg();
                $academico = pegaAcademicoPessoa($conn, $_SESSION["id_login"]);
                
                if( $academico ){
                    $count = 0;
                    foreach ($academico as $val){
                        $formacao = $val['formacao'];
                        $grau = $val['grau'];
                        $status  = $val['status'];
                        $curso  = $val['curso'];
                        $instituicao  = $val['instituicao'];
                        $ead  = $val['ead'];
                        $inicio  = $val['inicio'];
                        $fim  = $val['fim'];
                        $id_academico = $val['id_academico_pessoa'];
                        
                        if($val['ead'] == 1){
                            $ead = "SIM";
                        }else{
                            $ead = "NÃO";
                        }

                        echo( '<h2>Acadêmico</h2>');
                        echo( "<p><b>Formação: </b><span>$formacao</span></p>" );
                        echo( "<p><b>Grau: </b><span>$grau</span></p>" );
                        echo( " <p><b>Status: </b><span>$status</span></p>" );
                        echo( " <p><b>Curso: </b><span>$curso</span></p>" );
                        echo( "<p><b>Insituição: </b><span>$instituicao</span></p>" );
                        echo( "<p><b>EAD: </b><span>$ead</span></p>" );
                        echo( " <p><b>Início: </b><span>$inicio</span></p>" );
                        echo( " <p><b>Fim: </b><span>$fim</span></p>" );


                        //Botao e modal: EDITAR
                        echo( "<br><!-- Botão: Modal Acadêmico --><button onclick=document.getElementById('id_acad_edit$count').style.display='block' style='width:auto; background-color: #9ea956;'>Editar</button>" );
                        echo( "<div id='id_acad_edit$count' class='modal'>" );
                        echo( "<form class='modal-content animate' style='width: 35%;' action='./funcoes/editar_academico.php' method='get'>" );
                        echo( "<center><h2>Editar Informações: Acadêmico</h2></center>" );
                        echo( "<div class='container'>" );
                        echo( "<label for='formacao'><b>Formação</b></label><br><input type='text' placeholder='Ex: Superior' name='formacao' value='$formacao' required><br>" );
                        echo( "<label for='grau'><b>Grau</b></label><br><input type='text' placeholder='Ex: Graduação' value='$grau' name='grau' required><br>" );
                        echo( "<label for='status'><b>Status</b></label><br><input type='text' placeholder='Ex: Em andamento' value='$status' name='status' required><br>" );
                        echo( "<label for='curso'><b>Curso</b></label><br><input type='text' placeholder='Ex: Bacharelado em Sistemas de Informação' value='$curso' name='curso' required><br>" );
                        echo( "<label for='instituicao'><b>Instituição</b></label><br><input type='text' placeholder='Ex: IFES' value='$instituicao' name='instituicao' required><br>" );
                        echo( "<label for='ead'><b>EAD</b></label><br><br><select class='ead' id='ead' name='ead'><br>" );
                                    
                        if( $val['ead'] == 1 ){
                            echo( "<option selected value='1'>SIM</option>" );
                            echo( "<option value='2'>NÃO</option>" );
                        }else{
                            echo( "<option value='1'>SIM</option>" );
                            echo( "<option selected value='2'>NÃO</option>" );
                        }
                                    
                        echo( "</select><br>" );
                        echo( "<label for='inicio'><b>Início</b></label><br><input type='date' placeholder='Ex: 01/08/2016' value='$inicio' name='inicio' required><br>" );
                        echo( "<label for='fim'><b>Fim</b></label><br><input type='date' placeholder='Ex: 31/12/2021' value='$fim' name='fim' required>" );
                        echo( "<input type='hidden' name='id_academico' value='$id_academico'>" );
                        echo( "<button type='submit' style='background-color:#e79b02;'>Salvar</button></div>" );
                        echo( "<div class='container' style='background-color:#f1f1f1'><button type='button' onclick=document.getElementById('id_acad_edit$count').style.display='none' class='cancelbtn'>Voltar</button></div>" );
                        echo( "</form></div>" );


                        //Botão e modal: deletar
                        echo("<!-- Botão: Modal Acadêmico --> <button onclick=document.getElementById('id_acad_del$count').style.display='block' style='width:auto; background-color:#be2914'>Deletar</button>");
                        echo( "<div id='id_acad_del$count' class='modal'>" );
                        echo( "<form name='form_acad_del' class='modal-content animate' style='width: 35%;' action='./funcoes/apagar_academico.php' method='get'>" );
                        echo( "<center><h2>Deletar Informações: Acadêmico</h2></center>" );
                        echo( "<div class='container'>" );
                        echo( "<label for='formacao'><b>Formação</b></label><br><input type='text' value='$formacao' disabled><br>" );
                        echo( "<label for='grau'><b>Grau</b></label><br><input type='text' value='$grau' disabled><br>" );
                        echo( "<label for='status'><b>Status</b></label><br><input type='text' value='$status' disabled><br>" );
                        echo( "<label for='curso'><b>Curso</b></label><br><input type='text' value='$curso' disabled><br>" );
                        echo( "<label for='instituicao'><b>Instituição</b></label><br><input type='text' value='$instituicao' disabled><br>" );
                        echo( "<label for='ead'><b>EAD</b></label><br><select disabled><br>" );
                                    
                        if( $val['ead'] == 1 ){
                            echo( "<option selected value='1'>SIM</option>" );
                            echo( "<option value='2'>NÃO</option>" );
                        }else{
                            echo( "<option value='1'>SIM</option>" );
                            echo( "<option selected value='2'>NÃO</option>" );
                        }
                                    
                        echo( "</select><br>" );
                        echo( "<label for='inicio'><b>Início</b></label><br><input type='date' value='$inicio' disabled><br>" );
                        echo( "<label for='fim'><b>Fim</b></label><br><input type='date' value='$fim' disabled>" );
                        echo( "<input type='hidden' name='id_academico' value='$id_academico'>" );
                        echo( "<button type='submit' style='background-color:#e79b02;'>Desejo mesmo deletar!</button></div>" );
                        echo( "<div class='container' style='background-color:#f1f1f1'><button type='button' onclick=document.getElementById('id_acad_del$count').style.display='none' class='cancelbtn'>Voltar</button></div>" );
                        echo( "</form></div>" );

                        $count += 1;
                    }
                }else{
                    $formacao = '';
                    $grau = '';
                    $status = '';
                    $curso  = '';
                    $instituicao = '';
                    $ead  = 'NÃO';
                    $inicio = '';
                    $fim  = '';

                    echo( '<h2>Acadêmico</h2>');
                    echo( "<p><b>Formação: </b><span>$formacao</span></p>" );
                    echo( "<p><b>Grau: </b><span>$grau</span></p>" );
                    echo( " <p><b>Status: </b><span>$status</span></p>" );
                    echo( " <p><b>Curso: </b><span>$curso</span></p>" );
                    echo( "<p><b>Insituição: </b><span>$instituicao</span></p>" );
                    echo( "<p><b>EAD: </b><span>$ead</span></p>" );
                    echo( " <p><b>Início: </b><span>$inicio</span></p>" );
                    echo( " <p><b>Fim: </b><span>$fim</span></p>" );
                }
                unset($conn);
            ?>
        </section>

        <hr style="width: 75%">
        
        <!-- EXPERIÊNCIA -->
        <section id="experiencia">
            <?php
                $conn = conexaoPg();
                $experiencia = pegaExperienciaPessoa($conn, $_SESSION["id_login"]);

                if( $experiencia ){
                    $count = 0;
                    foreach ($experiencia as $value){
                        $empresa = $value['empresa'];
                        $cargo = $value['cargo'];
                        $descricao  = $value['descricao'];
                        $atual  = $value['atual'];
                        $inicio_e  = $value['inicio'];
                        $fim_e  = $value['fim'];
                        $id_xp = $value['id_experiencia_pessoa'];
                        
                        if( $value['atual'] == 1 ){
                            $atual = "SIM";
                        }else{
                            $atual = "NÃO";
                        }


                        if($count == 0){
                        
                            echo( "<!-- Botão Experiencia - ADD -->" );
                            echo( "<button onclick=document.getElementById('id_xp_add').style.display='block' style='width:auto; background-color:#e79b02;' class='centro'>Adicionar nova experiência</button>" );
                            echo( "<br>" );
                            echo( "<!-- Modal Experiência - ADD-->" );
                            echo( "<div id='id_xp_add' class='modal'>" );
                            echo( "<form name='form_xp_add' class='modal-content animate' style='width: 35%;' action='./funcoes/adicionar_experiencia.php' method='get'>" );
                            echo( "<center><h2>Adicionar Informações: Experiência</h2></center>" );
                            echo( "<div class='container'>" );
                            echo( "<label for='empresa'><b>Empresa</b></label><br>" );
                            echo( "<input type='text' placeholder='Ex: ArcelorMittal' name='empresa' required><br>" );

                            echo( "<label for='cargo'><b>Cargo</b></label><br>" );
                            echo( "<input type='text' placeholder='Ex: Estágio de Analista Funcional' name='cargo' required><br>" );

                            echo( "<label for='descricao'><b>Descrição</b></label><br>" );
                            echo( "<input type='text' placeholder='Ex: Atendimento de incidentes SAP SD e Debug ABAP (Máx: 255)' name='descricao' required><br>" );

                            echo( "<label for='inicio_e'><b>Início</b></label><br>" );
                            echo( "<input type='date' placeholder='Ex: 01/01/2020' name='inicio_e' required><br>" );

                            echo( "<label for='fim_e'><b>Fim</b></label><br>" );
                            echo( "<input type='date' placeholder='Ex: 31/12/2020' name='fim_e' id='fim_e' required><br>" );

                            echo( "<label for='atual'><b>Atual</b></label><br>" );
                            echo( "<select class='atual' id='atual' name='atual' onchange='func_atual();'>" );

                            if( $value['atual'] == 1 ){
                                echo ('<option selected value="1">SIM</option>');
                                echo ('<option value="0">NÃO</option>');
                            }else{
                                echo ('<option value="1">SIM</option>');
                                echo ('<option selected value="0">NÃO</option>');
                            }

                            echo( "</select>" );
                            echo( "<button type='submit' style='background-color:#e79b02;'>Salvar</button></div>" );
                            echo( "<div class='container' style='background-color:#f1f1f1;'>" );
                            echo( "<button type='button' onclick=document.getElementById('id_xp_add').style.display='none' class='cancelbtn'>Voltar</button>" );
                            echo( "</div></form></div>" );
                        }


                        echo( '<h2>Experiência</h2>' );
                        echo( "<p><b>Empresa: </b><span>$empresa</span></p>" );
                        echo( "<p><b>Cargo: </b><span>$cargo</span></p>" );
                        echo( " <p><b>Descrição: </b><span>$descricao</span></p>" );
                        echo( " <p><b>Atual: </b><span>$atual</span></p>" );
                        echo( " <p><b>Início: </b><span>$inicio_e</span></p>" );
                        echo( " <p><b>Fim: </b><span>$fim_e</span></p>" );


                        //Botao e modal: EDITAR
                        echo( "<br> <!-- Botão Modal Experiência --> <button onclick=document.getElementById('id_xp_edit$count').style.display='block'  style='width:auto; background-color: #9ea956;'>Editar</button>" );                  
                        echo( "<div id='id_xp_edit$count' class='modal'>" );
                        echo( "<form name='form_xp$count' id='form_xp_edit$count' class='modal-content animate' style='width: 35%;' action='./funcoes/editar_experiencia.php' method='get'>" );
                        echo( "<center><h2>Editar Informações: Experiência</h2></center>" );
                        echo( "<div class='container'>" );
                        echo( "<label for='empresa'><b>Empresa</b></label><br><input type='text' placeholder='Ex: ArcelorMittal' name='empresa' value='$empresa' required><br>" );
                        echo( "<label for='cargo'><b>Cargo</b></label><br><input type='text' placeholder='Ex: Estágio de Analista Funcional' value='$cargo' name='cargo' required><br>" );
                        echo( "<label for='descricao'><b>Descrição</b></label><br><input type='text' placeholder='Ex: Atendimento de incidentes SAP SD e Debug ABAP (Máx: 255)' value='$descricao' name='descricao' required><br>" );
                        echo( "<label for='inicio_e'><b>Início</b></label><br><input type='date' placeholder='Ex: 01/01/2019' value='$inicio_e' name='inicio_e' required><br>" );
                        echo( "<label for='fim_e'><b>Fim</b></label><br><input type='date' placeholder='Ex: 31/08/2020' value='$fim_e' name='fim_e' id='fim_e$count' required><br>" );
                        echo( "<label for='atual'>" );
                        echo( "<b>Atual</b></label><br><select class='atual' id='atualedit$count' name='atual' onchange='func_atual_edit($count);'>" );

                        if( $value['atual'] == 1 ){
                            echo( "<option selected value='1'>SIM</option>" );
                            echo( "<option value='2'>NÃO</option>" );
                        }else{
                            echo( "<option value='1'>SIM</option>" );
                            echo( "<option selected value='2'>NÃO</option>" );
                        }

                        echo( "</select>" );
                        echo( "<input type='hidden' name='id_xp' value='$id_xp'>" );
                        echo( "<input type='hidden' name='count' value='$count' id='$count'>" );
                        echo( "<button type='submit' style='background-color:#e79b02;'>Salvar</button></div>" );
                        echo( "<div class='container' style='background-color:#f1f1f1'><button type='button' onclick=document.getElementById('id_xp_edit$count').style.display='none' class='cancelbtn'>Voltar</button></div>" );
                        echo( "</form></div>" );


                        //Botão e modal: deletar
                        echo( "<!-- Botão Modal Experiência --> <button onclick=document.getElementById('id_xp_del$count').style.display='block'  style='width:auto; background-color:#be2914'>Deletar</button>" );                  
                        echo( "<div id='id_xp_del$count' class='modal'>" );
                        echo( "<form name='form_xp_del' class='modal-content animate' style='width: 35%;' action='./funcoes/apagar_experiencia.php' method='get'>" );
                        echo( "<center><h2>Deletar Informações: Experiência</h2></center>" );
                        echo( "<div class='container'>" );
                        echo( "<label for='empresa'><b>Empresa</b></label><br><input type='text' value='$empresa' disabled><br>" );
                        echo( "<label for='cargo'><b>Cargo</b></label><br><input type='text' value='$cargo' disabled><br>" );
                        echo( "<label for='descricao'><b>Descrição</b></label><br><input type='text' value='$descricao' disabled><br>" );
                        echo( "<label for='inicio_e'><b>Início</b></label><br><input type='date' value='$inicio_e' disabled><br>" );
                        echo( "<label for='fim_e'><b>Fim</b></label><br><input type='date' value='$fim_e' disabled><br>" );
                        echo( "<label for='atual'>" );
                        echo( "<b>Atual</b></label><br><select disabled>" );

                        if( $value['atual'] == 1 ){
                            echo( "<option selected value='1'>SIM</option>" );
                            echo( "<option value='2'>NÃO</option>" );
                        }else{
                            echo( "<option value='1'>SIM</option>" );
                            echo( "<option selected value='2'>NÃO</option>" );
                        }

                        echo( "</select>");
                        echo( "<input type='hidden' name='id_xp' value='$id_xp'>" );
                        echo( "<button type='submit' style='background-color:#e79b02;'>Desejo mesmo deletar!</button></div>" );
                        echo( "<div class='container' style='background-color:#f1f1f1'><button type='button' onclick=document.getElementById('id_xp_del$count').style.display='none' class='cancelbtn'>Voltar</button></div>" );
                        echo( "</form></div>" );

                        $count += 1;
                    }
                }else{
                    $empresa = '';
                    $cargo = '';
                    $descricao = '';
                    $atual = 'NÃO';
                    $inicio_e = '';
                    $fim_e = '';

                    echo( "<!-- Botão Experiencia - ADD -->" );
                    echo( "<button onclick=document.getElementById('id_xp_add').style.display='block' style='width:auto; background-color:#e79b02;' class='centro'>Adicionar nova experiência</button>" );
                    echo( "<br>" );
                    echo( "<!-- Modal Experiência - ADD-->" );
                    echo( "<div id='id_xp_add' class='modal'>" );
                    echo( "<form name='form_xp_add' class='modal-content animate' style='width: 35%;' action='./funcoes/adicionar_experiencia.php' method='get'>" );
                    echo( "<center><h2>Adicionar Informações: Experiência</h2></center>" );
                    echo( "<div class='container'>" );
                    echo( "<label for='empresa'><b>Empresa</b></label><br>" );
                    echo( "<input type='text' placeholder='Ex: ArcelorMittal' name='empresa' required><br>" );

                    echo( "<label for='cargo'><b>Cargo</b></label><br>" );
                    echo( "<input type='text' placeholder='Ex: Estágio de Analista Funcional' name='cargo' required><br>" );

                    echo( "<label for='descricao'><b>Descrição</b></label><br>" );
                    echo( "<input type='text' placeholder='Ex: Atendimento de incidentes SAP SD e Debug ABAP (Máx: 255)' name='descricao' required><br>" );

                    echo( "<label for='inicio_e'><b>Início</b></label><br>" );
                    echo( "<input type='date' placeholder='Ex: 01/01/2020' name='inicio_e' required><br>" );

                    echo( "<label for='fim_e'><b>Fim</b></label><br>" );
                    echo( "<input type='date' placeholder='Ex: 31/12/2020' name='fim_e' id='fim_e' required><br>" );

                    echo( "<label for='atual'><b>Atual</b></label><br>" );
                    echo( "<select class='atual' id='atual' name='atual' onchange='func_atual();'>" );

                    if( $value['atual'] == 1 ){
                        echo ('<option selected value="1">SIM</option>');
                        echo ('<option value="0">NÃO</option>');
                    }else{
                        echo ('<option value="1">SIM</option>');
                        echo ('<option selected value="0">NÃO</option>');
                    }

                    echo( "</select>" );
                    echo( "<button type='submit' style='background-color:#e79b02;'>Salvar</button></div>" );
                    echo( "<div class='container' style='background-color:#f1f1f1;'>" );
                    echo( "<button type='button' onclick=document.getElementById('id_xp_add').style.display='none' class='cancelbtn'>Voltar</button>" );
                    echo( "</div></form></div>" );

                    echo( '<h2>Experiência</h2>' );
                    echo( "<p><b>Empresa: </b><span>$empresa</span></p>" );
                    echo( "<p><b>Cargo: </b><span>$cargo</span></p>" );
                    echo( " <p><b>Descrição: </b><span>$descricao</span></p>" );
                    echo( " <p><b>Atual: </b><span>$atual</span></p>" );
                    echo( " <p><b>Início: </b><span>$inicio_e</span></p>" );
                    echo( " <p><b>Fim: </b><span>$fim_e</span></p>" );
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
