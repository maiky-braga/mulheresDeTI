<?php
    
    session_start();

    include("./models.php");
    include("./conexao.php");

    $conn = conexaoPg();

    if($_FILES){
        if($_FILES['foto']){
            $path = $_FILES['foto']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);

            $destino_salvar = "../imagens/upload/";
            $destino_salvar = $destino_salvar . $_SESSION['id_login'] . "." . $ext;

            $destino_buscar = "./imagens/upload/";
            $destino_buscar = $destino_buscar . $_SESSION['id_login'] . "." . $ext;

            if(move_uploaded_file( $_FILES['foto']['tmp_name'], $destino_salvar) != 0){
                $rows = updateFotoPessoa($conn, $_SESSION["id_login"], $_FILES['foto']['tmp_name'], $destino_buscar);
                unset($conn);

                if( $rows == 1 ){
                    header("Location: ../perfil.php");
                }else{
                    header("Location: ../perfil.php");
                }
            };
            
        }

    }
    header("Location: ../perfil.php");
?>