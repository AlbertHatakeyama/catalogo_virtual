<?php 
    include_once("config.class.php");
    include_once("class.php");
    
    global $nome_pg;
    $nome_pg = "galeria";
    
    //EDITA
    if(receberGET('id')){
        $id = receberGET('id');
        include("galeria-cad-view-edit.php");
    }
    
    //INSERE
    else if(receberGET('add')){
        include("galeria-cad-view-edit.php");
    }
    
    //VISUALIZA
    else{
        include("galeria-lista.php");
    }