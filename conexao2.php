<?php

    $dbname="techladies";
    $dbuser="admin";
    $dbpassword="jaPs4c50vBfg";

    try{
        $conn=new PDO('mysql:host=localhost;dbname='.$dbname,$dbuser,$dbpassword); #1
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); #2
    }catch(PDOException $error){
        return '<h3>Erro de conexão:</h3><p>'.$error->getMessage().'</p>';
    }


?>

