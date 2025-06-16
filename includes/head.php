<?php

//LOCAL
if ($_SERVER['REMOTE_ADDR'] == "127.0.0.1" or $_SERVER['REMOTE_ADDR'] == "::1") {
    $url = "http://localhost/catalogo_virtual/";
} 

//HOMOLOGAÇÃO 
else if (substr_count($_SERVER['REQUEST_URI'], "/") >= 1) { 
    $url = "https://www.catalogo_virtual/.com.br/prova/";
} 

// PRODUÇÃO
else {
    $url = "https://www.catalogo_virtual/.com.br/";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="language" content="pt-BR">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!--======= SEO ==========-->
        <title>Catálogo Virtual</title>
        <meta name="description" content="">
        <meta name="robots" content="all">
        <meta name="author" content="BMA Soluções Digitais">
        <meta name="keywords" content="">

        <meta property="og:type" content="page">
        <meta property="og:url" content="">
        <meta property="og:title" content="">
        <meta property="og:image" content="<?=$url?>/assets/imagens/logos/android-chrome-192x192.png">
        <meta property="og:description" content="">
        <meta property="article:author" content="BMA Soluções Digitais">

        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="">
        <meta name="twitter:title" content="">
        <meta name="twitter:creator" content="BMA Soluções Digitais">
        <meta name="twitter:description" content="">
        <link rel="canonical" href="">
        <!--======= FIM SEO ===========-->

        <!--======= ICON LOGO ==========-->
        <link rel="icon" href="assets/imagens/logos/favicon.ico">
        <link rel="icon" type="image/png" sizes="512x512" href="<?=$url?>assets/imagens/logos/android-chrome-512x512.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?=$url?>assets/imagens/logos/android-chrome-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?=$url?>assets/imagens/logos/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?=$url?>assets/imagens/logos/favicon-16x16.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?=$url?>assets/imagens/logos/apple-touch-icon.png">

        <!--======= Font da LP ==========-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

        <!--======= FOLHAS DE ESTILOS ==========-->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="<?=$url?>assets/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="<?=$url?>assets/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?=$url?>assets/glider/glider.min.css">
        <link rel="stylesheet" href="<?=$url?>assets/style.css">
    </head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <section>
        <nav id="navbar" class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a href="/#" class="navbar-brand" onclick="toggleSocialIcons(event)">
                    <img src="<?=$url?>assets/imagens/logos/logo_pequeno.png" alt="Logo" class="img-fluid">
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$url?>#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$url?>sobre_nos">Sobre Nós</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$url?>produto">Produtos</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link btn btn-primary" href="<?=$url?>login">Entrar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>