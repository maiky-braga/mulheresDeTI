<?php
    include("./funcoes/models.php");
    include("./funcoes/conexao.php");

    $conn = conexaoPg();

    $pessoas = buscaPessoas_off($conn);
    $nomesobrenome = "";

    if( $pessoas ){
        $lista_pessoas = "";
        foreach($pessoas as $person){
            $p = $person['nome_todo'];
            if($lista_pessoas == ""){
                $lista_pessoas = $p . "|";
            }else{
                $lista_pessoas = $lista_pessoas . $p . "|";
            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/base.css">
    <title>Tech Ladies: Encontre sua colega</title>
</head>



<body>
    <?php
        include("./estrutura/barra_direita.php");
    ?>

    <main class="o-main">
        <?php
            session_start();
            if( (isset($_SESSION["pessoa_encontrada"] ) && $_SESSION["pessoa_encontrada"]) ){
        
                $infos = pegaInfosPessoa($conn, $_SESSION["pessoa_encontrada"]);
                $sobre = pegaSobrePessoa($conn, $_SESSION["pessoa_encontrada"]);
                $academico = pegaAcademicoPessoa($conn, $_SESSION["pessoa_encontrada"]);
                $experiencia = pegaExperienciaPessoa($conn, $_SESSION["pessoa_encontrada"]);

                echo( "<a href='perfil_users.php' style='text-decoration: none; color:#e79b02; background-color:#fff; border:7px solid #fff;'>Voltar</a>" );
                echo("<section id='infos'>");;
                if ( $infos ){
                    $nome = $infos['nome'];
                    $sobrenome = $infos['sobrenome'];
                    $email = $infos['email'];
                    $destino = $infos['destino_foto_pessoa'];
                    echo("<center>");
                    echo("<image src='$destino' style='width:120px; background: none; border-radius: 50%;'/></button>");
                    echo("<h2>$nome $sobrenome</h2>");
                    echo("</center>");
                    echo("<p><b>E-mail:</b><span>$email</span></p>");
                }
            
                if ( $sobre ){
                    $cidade = $sobre['cidade'];
                    $uf = $sobre['uf'];
                    echo("<p><b>Cidade: </b>$cidade<span></span></p>");
                    echo( "<p><b>UF: </b>$uf<span></span></p>");       
                }
                echo("</section>");
                echo("<hr style='width: 75%'>");


                echo("<section id='academico'>");
                echo( '<h2>Acadêmico</h2>');
                if ( $academico ){
                    foreach( $academico as $value ){
                        $formacao = $value['formacao'];
                        $grau = $value['grau'];
                        $status = $value['status'];
                        $curso = $value['curso'];
                        $instituicao = $value['instituicao'];
                        $ead = $value['ead'];
                        $academico_inicio = $value['inicio'];
                        $academico_fim = $value['fim'];

                        if($value['ead'] == 1){
                            $ead = "SIM";
                        }else{
                            $ead = "NÃO";
                        }

                        echo( "<p><b>Formação: </b><span>$formacao</span></p>");
                        echo( "<p><b>Grau: </b><span>$grau</span></p>");
                        echo( " <p><b>Status: </b><span>$status</span></p>");
                        echo( " <p><b>Curso: </b><span>$curso</span></p>");
                        echo( "<p><b>Insituição: </b><span>$instituicao</span></p>");
                        echo( "<p><b>EAD: </b><span>$ead</span></p>");
                        echo( " <p><b>Início: </b><span>$academico_inicio</span></p>");
                        echo( " <p><b>Fim: </b><span>$academico_fim</span></p>");
                        echo( "<br>" );
                    }     
                } 

                echo("</section>");
                echo("<hr style='width: 75%'>");



                echo("<section id='experiencia'>");
                echo( '<h2>Experiência</h2>');
                if ( $experiencia ){
                    foreach( $experiencia as $val ){
                        $empresa = $val['empresa'];
                        $cargo = $val['cargo'];
                        $descricao = $val['descricao'];
                        $atual = $val['atual'];
                        $experiencia_inicio = $val['inicio'];
                        $experiencia_fim = $val['fim'];
                        
                        if($val['atual'] == 1){
                            $atual = "SIM";
                        }else{
                            $atual = "NÃO";
                        }

                        echo( "<p><b>Empresa: </b><span>$empresa</span></p>");
                        echo( "<p><b>Cargo: </b><span>$cargo</span></p>");
                        echo( " <p><b>Descrição: </b><span>$descricao</span></p>");
                        echo( " <p><b>Atual: </b><span>$atual</span></p>");
                        echo( " <p><b>Início: </b><span>$experiencia_inicio</span></p>");
                        echo( " <p><b>Fim: </b><span>$experiencia_fim</span></p>");
                        echo( "<br>" );
                    }     
                }
                echo("</section>");
    
                unset($conn);
                session_destroy();
            }else{
                echo( "<div class='centro' style='text-align: center;'>" );
                echo( "<br><br><br><br><br><br><br>" );
                echo( "<h3 style='font-size: 33px;'>ENCONTRE COLEGAS AQUI</h3>" );
                echo( "<p>É rápido e fácil.</p><hr>" );
                echo( "<form name='form_busca_pessoa' method='GET' action='./funcoes/buscar_pessoa.php'" );
                echo( "<br><br>" );
                echo( "<input type='text' class='input_css' name='pessoa' placeholder='Ex: Laila Arruda' id='pessoa'>" );
                echo( "<br><br>" );
                echo( "<input type='hidden' id='lista_pessoas' value='<?php echo($lista_pessoas); ?>'>" );
                echo( "<input type='submit' class='botao' value='Pesquisar' onclick='return procura_pessoa()'>" );
                echo( "</form>" );
                echo( "</div>" );
                echo( "<br><br><br><br><br><br><br><br><br><br><br><br><br>" );
            }
        ?>
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
