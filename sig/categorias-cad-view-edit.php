<?php

    $nome_pg = "categorias";

    include_once("config.class.php");
    include_once("class.php");
    require_once("session.php");

    if(receberGET("id") or receberGET("add") == 1){
        $bt_topo[0]['link'] = "categorias";
        $bt_topo[0]['link_target'] = "";
        $bt_topo[0]['link_title'] = "Voltar para a listagem de categorias";
        $bt_topo[0]['texto'] = "&lt; Voltar";
        $bt_topo[0]['tamanho'] = "70px;";
    }else{
        $bt_topo[0]['link'] = "categorias?add=1";
        $bt_topo[0]['link_target'] = "";
        $bt_topo[0]['link_title'] = "Adicionar nova categoria";
        $bt_topo[0]['texto'] = "<span><i class='flaticon2-plus'></i></span>";
        $bt_topo[0]['tamanho'] = "";
    }

    
    //EDI��O
    if(receberGET("id")){
        $id = receberGET("id");
        $bt_nome = "OK";
        $titulo_pg = "Edi&ccedil;&atilde;o do categoria";
    }
    
    //CADASTRO
    else if(receberGET("add") == 1){
        $bt_nome = "Cadastrar";
        $titulo_pg = "Cadastro de nova categoria";
        $id_ajax = 0;
    }
    
    else{
        echo "<meta http-equiv='refresh' content='0; url=".urlsig()."/categorias'>";
        exit;
    }
    
    //SALVANDO
    if(receberPOST('submit')){ 

        $SalvarCategorias = new Categorias();
        if($id){
            $SalvarCategorias->setID($id);
        }
        $SalvarCategorias->setTitulo(receberPOST('titulo'));
        $SalvarCategorias->setSubtitulo(receberPOST('subtitulo'));
        $SalvarCategorias->setImagem($_FILES['imagem']);
        $oSalvarCategorias = $SalvarCategorias->salvarCategorias();
        
        $id = $oSalvarCategorias->getID();
        
        echo "<meta http-equiv='refresh' content='0; url=".urlsig()."/categorias?id=$id'>";
        exit;
    }

    //DELETANDO IMAGENS
    /*if(receberGET('delimg')){
        $Del = new Categorias();
        $Del->setID(receberGET('delimg'));
        $DeletaImagem = $Del->deletarImagem();
        
        echo "<meta http-equiv='refresh' content='0; url=categorias?id=$id'>";
        exit;
    }*/
    
    include_once("header.php");
    include_once("menu.php"); 
    include_once("topo.php");
    
    ?>

    <?php
    $Categorias = new Categorias();
    
    if(receberGET('id')){
        $oCategorias = $Categorias->carregarCategorias(" AND SHA1(categorias.id) = '$id'", "", "");
        if($oCategorias){
            $id_ajax = $oCategorias[0]->getID();
        }else{
            echo "<meta http-equiv='refresh' content='0; url=".urlsig()."/categorias'>";
            exit;
        }
    }
    ?>
    <div class="kt-grid__categorias kt-grid__categorias--fluid kt-grid kt-grid--hor">
        <div class="kt-content  kt-grid__categorias kt-grid__categorias--fluid" id="kt_content">
            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">
                <div class="row">
                    
                    <?php
                        if($erro == 1){
                    ?>
                    <div class="col-md-12">
                        <!--begin::Portlet-->
                        <div class="kt-portlet">
                            <div class="kt-portlet__body">
                                <div class="alert alert-terceiro" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                                    <div class="alert-text">
                                        <?=$erro_msg?>
                                    </div>
                                </div>                                                              
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>  
                    
                    <div class="col-md-8">
                        <!--begin::Portlet-->
                        <div class="kt-portlet">
                            
                            <div class="kt-portlet__body">
                                <div class="form-group2 form-row">
                                    <label class="col-3 col-form-label">Titulo</label>
                                    <?php
                                    if($oCategorias){
                                        $titulo = $oCategorias[0]->getTitulo();
                                    }else if($_POST){
                                        $titulo = receberPOST('titulo');
                                    }
                                    ?>
                                    <div class="col-9">
                                        <input class="form-control form-control2" type="text" value="<?=$titulo?>" id="titulo" name="titulo" maxlength="70" required="">
                                    </div>
                                </div>
                                <div class="form-group2 form-row">
                                    <label class="col-3 col-form-label">Subtitulo</label>
                                    <?php
                                    if($oCategorias){
                                        $subtitulo = $oCategorias[0]->getSubtitulo();
                                    }else if($_POST){
                                        $subtitulo = receberPOST('subtitulo');
                                    }
                                    ?>
                                    <div class="col-9">
                                        <input class="form-control form-control2" type="text" value="<?=$subtitulo?>" id="subtitulo" name="subtitulo" maxlength="70" required="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="col-md-4">
                        <!--begin::Portlet-->
                        <div class="kt-portlet">
                            <div class="kt-portlet__body">
                                <div class="form-group2 form-row pb-3">
                                    <label class="col-3 col-form-label">Imagem</label>
                                    <div class="col-6">
                                        <input type="file" name="imagem" class="form-control">
                                    </div>
                                    <div class="col-3 pt-2">
                                        <?php
                                        if($oCategorias){
                                            if($oCategorias[0]->getImagem() != ""){
                                                $imagem_ok = 1;
                                                echo "<a href='../categorias_imagens/{$oCategorias[0]->getImagem()}' target='_blank'>[Visualizar]</a>";
                                            }
                                        }

                                        if(!$imagem_ok){
                                            echo "&nbsp; Sem imagem";
                                        }
                                        ?>
                                    </div>
                                    <label class="col-3 col-form-label">&nbsp;</label>
                                    <div class="col-9" style='font-size:12px;'>
                                        Recomendação: 650 x 650px
                                    </div>
                                </div> 
                                
                            </div>
                        </div>
                        
                        
                    </div>
                
                    <div class="botao_flutuando" style="width:100px; padding:10px; z-index:100">
                        <button type="submit" name="submit" value="1" onclick="document.getElementById('form1').submit(); this.disabled=true;" class="btn btn-primary"><?=$bt_nome?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
    include("rodape.php");
    ?>
