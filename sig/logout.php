<?php
	session_start();
	
        if($_SERVER['REMOTE_ADDR'] == "127.0.0.1" or $_SERVER['REMOTE_ADDR'] == "::1"){
            $caminho = "http://localhost/catalogo_virtual/sig/login";
        }
        elseif(substr_count($_SERVER["REQUEST_URI"], "/prova") > 0){
            $caminho = "https://www.catalogo_virtual.com.br/prova";
        }
        else{
            $caminho = "https://catalogo_virtual.com.br/sig/login";
        }
        
	require "config.class.php";
	
	$_SESSION['sessao_catalogo_virtual'] = array();
	unset($_SESSION['sessao_catalogo_virtual']);
	header("Location: ".$caminho);