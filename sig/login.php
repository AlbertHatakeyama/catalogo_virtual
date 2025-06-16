<?php
session_start();

include_once("config.class.php");
include_once("class.php");

$Funcoes = new Funcoes();

if(receberPOST('submit')) {
    
    $Usuarios = new Usuarios();
    $oUsuarios = $Usuarios->loginUsuario(receberPOST('usuario'), receberPOST('senha'));

    if($oUsuarios->getIDUsuario()) {
        $_SESSION['sessao_catalogo_virtual'] = array(
            "sessao_id_usuario" => $oUsuarios->getIDUsuario(),
            "sessao_nome"       => $oUsuarios->getNome(),
            "sessao_email"      => $oUsuarios->getEmail(),
        );

        header("Location:" . urlsig() . "");
        exit;
    }

    if ($oUsuarios->getLoginErro()) {
        $style_erro = "background-color:#ffeeee; border-color:#ff0000;";
    }
}
?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="<?=urlsig()?>/assets/logo/favicon-32x32.png" rel="shortcut icon" />
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Website Font style -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
        <link href='<?=urlsig()?>/assets/css/demo3/login.css' rel='stylesheet' type='text/css'>

        <title><?=nomeempresa()?></title>

    </head>
    <body>
        <div class="container">
            <div class="row main">
                <div class="main-login main-center">
                    <form name="form1" class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" style="padding:0 3px;"></i></span>
                                    <input type="text" name="usuario" class="form-control input_user" value="<?=receberPOST('usuario')?>" placeholder="Usu&aacute;rio" required="" style="<?=$style_erro?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" name="senha" class="form-control input_pass" value="<?=receberPOST('senha')?>" placeholder="Senha" required="" style="<?=$style_erro?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <input type="submit" name="submit" value="Acessar" class="btn btn-primary btn-lg btn-block login-button">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    </body>
</html>