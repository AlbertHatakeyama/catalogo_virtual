<?php 
    include_once("config.class.php");
    include_once("class.php");
    
    global $nome_pg;
    $nome_pg = "categorias";
    
    //EDITA
    if(receberGET('id')){
        $id = receberGET('id');
        include("categorias-cad-view-edit.php");
    }
    
    //INSERE
    else if(receberGET('add')){
        include("categorias-cad-view-edit.php");
    }
    
    //VISUALIZA
    else{
        include("categorias-lista.php");
    }