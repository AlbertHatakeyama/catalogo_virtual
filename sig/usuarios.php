<?php 
    include_once("config.class.php");
    include_once("class.php");
    
    global $nome_pg;
    $nome_pg = "usuarios";
    
    //EDITA
    if(receberGET('id')){
        $id = receberGET('id');
        include("usuarios-cad-view-edit.php");
    }
    
    //INSERE
    else if(receberGET('add')){
        include("usuarios-cad-view-edit.php");
    }
    
    //VISUALIZA
    else{
        include("usuarios-lista.php");
    }