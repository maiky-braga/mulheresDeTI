<?php

    function validaHome(){
        session_start();
        if( !(isset( $_SESSION["login"] ) && $_SESSION["login"]) ){
            header("Location: ../");
        }
    }

    function validaLogado(){
        session_start();
        if( isset( $_SESSION["login"] ) && $_SESSION["login"] ){
            header("Location: ../feed.php");
        }
    }
?>