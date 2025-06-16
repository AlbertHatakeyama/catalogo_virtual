<?php
    session_start(); 
    
    if(isset($_SESSION['sessao_catalogo_virtual'])){
        $sessao_id_usuario  = $_SESSION['sessao_catalogo_virtual']['sessao_id_usuario'];
        $sessao_nome        = $_SESSION['sessao_catalogo_virtual']['sessao_nome'];
        $sessao_email       = $_SESSION['sessao_catalogo_virtual']['sessao_email'];
    }
    else{
        echo "<meta http-equiv='refresh' content='0; url=".urlsig()."/logout'>";
        exit;
    }