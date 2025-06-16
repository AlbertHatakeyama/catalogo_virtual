<?php 
    
    include_once("config.class.php");
    include_once("class.php");
    require_once("session.php");
    
    //DELETANDO PLANO
    if(receberGET('del')){
        $deleteItem = new Galeria();
        $deleteItem->setID(receberGET('del'));
        $oDeleteItem = $deleteItem->deletarGaleria();
    }

    //RECEBENDO
    if(receberGET('pg')){
        $pg = receberGET('pg');
    }else if(receberPOST('pg')){
        $pg = receberPOST('pg');
    }else{
        $pg = 1;
    }
    if((receberPOST('busca_id_categoria'))){
        $busca_id_categoria = trim(addslashes(receberPOST('busca_id_categoria')));
    }
    
    //ORDENA��O
    $ordenacao = "galeria.id DESC";
    if(receberGET("ord")){
        $ord = receberGET("ord");
        $ordenacao = "galeria.{$ord} ASC";
    }
    
    //TRATANDO A BUSCA
    $where = "";
    if($busca_id_categoria){
        $where .= " AND galeria.id_categoria = '$busca_id_categoria'";
    }
    
    //QUANTIDADE TOTAL DE PROJETOS
    $galeria1 = new Galeria();
    $total_galeria1 = $galeria1->contarGaleria();
    
    $qtd_por_pagina = 50;
    $num_paginas = ceil($total_galeria1/$qtd_por_pagina);
    $limit_pagina = ($pg*$qtd_por_pagina) - $qtd_por_pagina;
    
    //TRAZENDO OS PROJETOS
    $galeria = new Galeria();
    $oGaleria = $galeria->carregarGaleria($where, $ordenacao, "$limit_pagina, $qtd_por_pagina");
    
    if($oGaleria){
        $total_galeria = count($oGaleria);
    }
    else{
        $total_galeria = 0;
    }

    //FUN��ES DIVERSAS
    $Funcoes = new Funcoes();
    
    $titulo_pg = "Galeria";
    
    //DELETANDO ITEM
    if(receberGET('del')){
        $ImagemDel = new Galeria();
        $ImagemDel->setID($id); 
        $DeletaImagem = $ImagemDel->deletarGaleria();
        
        echo "<meta http-equiv='refresh' content='0; url=galeria'>";
        exit;
    }
    
    //ADICIONANDO IMAGEM
    if(receberPOST('submit')){ 

        $SalvarGaleria = new Galeria();
        if($id){
            $SalvarGaleria->setID($id);
        }
        $SalvarGaleria->setImagem($_FILES['imagem']);
        $SalvarGaleria->setIDCategoria(receberPOST('id_categoria'));
        $oSalvarGaleria = $SalvarGaleria->salvarGaleria();
        
        $id = $oSalvarGaleria->getID();
        
        echo "<meta http-equiv='refresh' content='0; url=".urlsig()."/galeria'>";
        exit;
    }

    
    //BOT�ES NO TOPO
    $bt_topo[0]['link'] = "galeria?add=1";
    $bt_topo[0]['link_target'] = "";
    $bt_topo[0]['link_title'] = "Adicionar novo Galeria";
    $bt_topo[0]['texto'] = "<span><i class='flaticon2-plus'></i></span>";
    $bt_topo[0]['tamanho'] = "";
    
    include_once("header.php");
    include_once("menu.php");
    include_once("topo.php");
?>
  
    <div class="col-md-4 pt-3 pl-4">
        <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">
            <!--begin::Portlet-->
            <div class="kt-portlet pb-0 ">
                <div class="kt-portlet__body">
                    
                    <div class="form-group2 form-row pb-3">
                        <label class="col-3 col-form-label">Categoria</label>
                        <div class="col-6">
                            <select name="id_categoria" id="id_categoria" class="form-control" required>
                                <option value=''>Selecione</option>
                                <?php
                                    $Categorias = new Categorias();
                                    $oCategoria = $Categorias->carregarCategorias("", "categorias.titulo ASC");
                                    if($oCategoria){
                                        foreach($oCategoria as $categoria){
                                            ?>
                                            <option value='<?=$categoria->getID()?>'><?=$categoria->getTitulo()?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group2 form-row pb-3">
                        <label class="col-3 col-form-label">Imagem</label>
                        <div class="col-6">
                            <input type="file" name="imagem" class="form-control">
                        </div>
                        <div class="col-3 pt-2">
                            <?php
                            if($oGaleria){
                                if($oGaleria[0]->getImagem() != ""){
                                    $imagem_ok = 1;
                                    echo "<a href='../galeria_imagens/{$oGaleria[0]->getImagem()}' target='_blank'>[Visualizar]</a>";
                                }
                            }
                            ?>
                        </div>
                        <label class="col-3 col-form-label">&nbsp;</label>
                        <div class="col-9" style='font-size:12px;'>
                            Recomendação: 650 x 650px e até 1MB
                        </div>
                    </div> 

                    <div class="form-group2 form-row pb-3">
                        <button type="submit" name="submit" value="1" onclick="document.getElementById('form1').submit(); this.disabled=true;" class="btn btn-primary">Enviar</button>
                    </div>

                </div>
            </div>
            
        </form>
    </div>

    <div class="kt-grid__galeria kt-grid__galeria--fluid kt-grid kt-grid--hor ">
        <div class="kt-content  kt-grid__galeria kt-grid__galeria--fluid pt-0" id="kt_content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                        <form name="form_leads" id="form_leads" action="" method="post">
                            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">Filtrar:</h3>
                                    &nbsp;&nbsp;
                                    <select name="busca_id_categoria" id="busca_id_categoria" class="form-control" >
                                        <option value=''>Todas as categorias</option>
                                        <?php
                                            $Categorias = new Categorias();
                                            $oCategoria = $Categorias->carregarCategorias("", "categorias.titulo ASC");
                                            if($oCategoria){
                                                foreach($oCategoria as $categoria){

                                                    if(receberPOST("busca_id_categoria") == $categoria->getID()){
                                                        $busca_id_categoria_selected = "selected";
                                                    }else{
                                                        $busca_id_categoria_selected = "";
                                                    }
                                                    ?>
                                                    <option value='<?=$categoria->getID()?>' <?=$busca_id_categoria_selected?>><?=$categoria->getTitulo()?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                    &nbsp;
                                    <button type="submit" class="btn btn-brand">Buscar</button>
                                </div>
                                <div class="kt-portlet__head-label">
                                    Mostrando <?=$total_galeria?>/<?=$total_galeria1?> galeria(s)
                                </div>
                            </div>
                        </form>

                        <?php
                        if($oDeleteItem){
                            if($oDeleteItem->getDeleteOK() == "0"){
                            ?>
                            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                <div class="kt-portlet__head-label">
                                    <p class="kt-portlet__head-title" style="color:#ff6666;">Impossível deletar este galeria</p>
                                </div>
                            </div>
                            <?php
                            }
                            if($oDeleteItem->getDeleteOK() == "1"){
                            ?>
                            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                <div class="kt-portlet__head-label">
                                    <p class="kt-portlet__head-title" style="color:#3E6E34;">Item deletado com sucesso</p>
                                </div>
                            </div>
                            <?php
                            }
                        }
                        ?>

                        <div class="kt-portlet__body kt-portlet__body--fit p-4">
                            <div class="row">
                                <?php
                                if($oGaleria){
                                    $i=1;
                                    foreach ($oGaleria as $res){
                                        
                                        //OBTEM A CATEGORIA DA IMAGEM
                                        $Categorias = new Categorias();
                                        $oCategoria = $Categorias->carregarCategorias(" AND categorias.id = '".$res->getIDCategoria()."'");
                                        if($oCategoria){
                                            $id_categoria = $oCategoria[0]->getTitulo();
                                        }

                                        echo "<div style='position:relative; width:300px;'>";
                                        echo "<img src='../galeria/".$res->getImagem()."' class='img-fluid' style='height: 200px;'>";
                                        echo "<br>";
                                        ?>
                                        <a href="?del=<?=sha1($res->getID())?>" title="Deletar imagem" onClick="return question('Deseja realmente deletar essa imagem? \nEsta alteração não poderá ser desfeita');" class="a_link"><span><i class="flaticon2-close-cross" style='color:red;'></i></span></a> &nbsp;
                                        <?php
                                        echo "Categoria: ".$id_categoria;
                                        echo "</div>";

                                        $i++;
                                    }
                                
                                }else{
                                    echo "<tr><td colspan='100' style='text-align:center;'>N&atilde;o h&aacute; dados para exibir</td></tr>"; 
                                }
                                ?>

                                <!--begin: Datatable -->
                                <?php /*<div class="kt-datatable" id="kt_datatable_latest_orders"></div> */?>
                                <!--end: Datatable -->
                            </div>
                            <br><br>
                            <?php
                                    if($oGaleria){
                                        $Paginacao = new Paginacao($keywords, $pg, $num_paginas);
                                        echo $Paginacao->carregarPaginacao();
                                    }
                                ?>
                        </div>
                    </div>	
                </div>	
            </div>
        </div>
    </div>				
                    
<?php
    include("rodape.php");
?>