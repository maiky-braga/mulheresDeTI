
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/modalBase.css">
</head>
<br> <!-- Botão Modal Experiência --> <button onclick="document.getElementById('id_xp3').style.display='block'" style="width:auto;">Editar</button>
<?php
    include("./funcoes/conexao.php");
    include("./funcoes/models.php");


    function getmodal($id_exp, $empresa, $cargo, $descricao, $atual, $inicio_e, $fim_e){
        // printf('<button onclick="document.getElementById("meu%d").style.display="block" " style="width:auto;">Editar</button>', $id_exp);
        echo("");                  
        echo("<div id='id_xp$id_exp' class='modal'>");
        echo("<form name='form_xp' class='modal-content animate' style='width: 35%;' action='./funcoes/editar_experiencia.php' method='get'>");
        echo("<input type='hidden' name='id_exp' value='$id_exp'>");
        echo("<center><h2>Editar Informações: Experiência</h2></center>");
        echo("<div class='container'>");
        echo("<label for='empresa'><b>Empresa</b></label><input type='text' placeholder='Ex: ArcelorMittal' name='empresa' value='$empresa' required>");
        echo("<label for='cargo'><b>Cargo</b></label><input type='text' placeholder='Ex: Estágio de Analista Funcional' value='$cargo' name='cargo' required>");
        echo("<label for='descricao'><b>Descrição</b></label><input type='text' placeholder='Ex: Atendimento de incidentes SAP SD e Debug ABAP (Máx: 255)' value='$descricao' name='descricao' required>");
        echo("<label for='inicio_e'><b>Início</b></label><input type='date' placeholder='Ex: 01/01/2019' value='$inicio_e' name='inicio_e' required>");
        echo("<label for='fim_e'><b>Fim</b></label><input type='date' placeholder='Ex: 31/08/2020' value='$fim_e' name='fim_e' id='fim_e' required>");
        echo("<label for='atual'><b>Atual</b></label><br><select class='atual' id='atual' name='atual' onchange='atual();'>");

        if( $atual == 1 ){
            echo("<option selected value='1'>SIM</option>");
            echo("<option value='2'>NÃO</option>");
        }else{
            echo("<option value='1'>SIM</option>");
            echo("<option selected value='2'>NÃO</option>");
        }
        
        echo("</select>");
        echo("<button type='submit'>Salvar</button></div>");
        echo("<div class='container' style='background-color:#f1f1f1'><button type='button' onclick='document.getElementById('id_xp$id_exp').style.display='none'' class='cancelbtn'>Voltar</button></div>");
        echo("</form></div>");
    }

    getmodal(3, "Ifood",'Gerente','Ordenar',0,'2020-01-19','2020-08-26');

?>

