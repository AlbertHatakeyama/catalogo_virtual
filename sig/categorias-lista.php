<?php 
    
    include_once("config.class.php");
    include_once("class.php");
    require_once("session.php");

    //RECEBENDO
    if(receberGET('pg')){
        $pg = receberGET('pg');
    }else if(receberPOST('pg')){
        $pg = receberPOST('pg');
    }else{
        $pg = 1;
    }
    if((receberPOST('busca'))){
        $busca = trim(addslashes(receberPOST('busca')));
    }
    if((receberPOST('busca_status'))){
        $busca_status = trim(addslashes(receberPOST('busca_status')));
    }else{
        $busca_status = "todos";
    }
    
    //ORDENA��O
    $ordenacao = "categorias.id DESC";
    if(receberGET("ord")){
        $ord = receberGET("ord");
        $ordenacao = "categorias.{$ord} ASC";
    }
    
    //TRATANDO A BUSCA
    $where = "";
    if($busca){
        $where .= " AND categorias.titulo LIKE '%$busca%' OR categorias.id = '$busca'";
    }
    
    //QUANTIDADE TOTAL DE PROJETOS
    $categorias1 = new Categorias();
    $total_categorias1 = $categorias1->contarCategorias();
    
    $qtd_por_pagina = 50;
    $num_paginas = ceil($total_categorias1/$qtd_por_pagina);
    $limit_pagina = ($pg*$qtd_por_pagina) - $qtd_por_pagina;
    
    //TRAZENDO OS PROJETOS
    $categorias = new Categorias();
    $oCategorias = $categorias->carregarCategorias($where, $ordenacao, "$limit_pagina, $qtd_por_pagina");
    
    if($oCategorias){
        $total_categorias = count($oCategorias);
    }
    else{
        $total_categorias = 0;
    }

    //FUN��ES DIVERSAS
    $Funcoes = new Funcoes();
    
    $titulo_pg = "Categorias";
    
    //DELETANDO ITEM
    if(receberGET('del')){
        $Galeria = new Galeria();
        $GaleriaQtd = $Galeria->contarGaleria(" AND SHA1(galeria.id_categoria) = '".receberGET('del')."'");
        if($GaleriaQtd > 0){
            echo "
            <script>
            alert('Não é possível deletar essa categoria pois há imagens apontadas para ela, delete as imagens primeiro');
            </script>
            ";
        }
        else{
            $deleteItem = new Categorias();
            $deleteItem->setID(receberGET('del'));
            $oDeleteItem = $deleteItem->deletarCategorias();
        }
            
        echo "<meta http-equiv='refresh' content='0; url=categorias'>";
        exit;
    }
    
    //BOT�ES NO TOPO
    $bt_topo[0]['link'] = "categorias?add=1";
    $bt_topo[0]['link_target'] = "";
    $bt_topo[0]['link_title'] = "Adicionar novo Categorias";
    $bt_topo[0]['texto'] = "<span><i class='flaticon2-plus'></i></span>";
    $bt_topo[0]['tamanho'] = "";
    
    include_once("header.php");
    include_once("menu.php");
    include_once("topo.php");
?>
  
    <div class="kt-grid__categorias kt-grid__categorias--fluid kt-grid kt-grid--hor">
        <div class="kt-content  kt-grid__categorias kt-grid__categorias--fluid" id="kt_content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                        <form name="form_leads" id="form_leads" action="" method="post">
                            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">Filtrar:</h3>
                                    &nbsp;&nbsp;
                                    <div class="kt-input-icon kt-input-icon--left">
                                        <input type="text" name="busca" id="busca" value="<?=$busca?>" class="form-control" style="width:200px; margin-right:3px;">
                                        <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                            <span><i class="la la-search"></i></span>
                                        </span>
                                    </div>
                                    &nbsp;
                                    <button type="submit" class="btn btn-brand">Buscar</button>
                                </div>
                                <div class="kt-portlet__head-label">
                                    Mostrando <?=$total_categorias?>/<?=$total_categorias1?> categorias(s)
                                </div>
                            </div>
                        </form>

                        <?php
                        if($oDeleteItem){
                            if($oDeleteItem->getDeleteOK() == "0"){
                            ?>
                            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                <div class="kt-portlet__head-label">
                                    <p class="kt-portlet__head-title" style="color:#ff6666;">Impossível deletar este categorias</p>
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

                        <div class="kt-portlet__body kt-portlet__body--fit">
                            <table class="table">
                                <thead class="thead-dark">
                                  <tr>
                                    <th>#</th>
                                    <th style="width:28%;">Titulo</th>
                                    <th>Subtitulo</th>
                                    <th>Imagem</th>
                                    <th>Qtd de imagens galeria</th>
                                    <th style="width:40px">&nbsp;</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    if($oCategorias){
                                        $i=1;
                                        foreach ($oCategorias as $res){
                                            
                                            if($res->getImagem() == ""){
                                                $mostra_imagem = "[Sem imagem]";
                                            }else{
                                                $mostra_imagem = "<a href='".urlsite()."/categorias_imagens/".$res->getImagem()."' target='_blank' class='a_link'>[Visualizar]</a>";
                                            }

                                            $Galeria = new Galeria();
                                            $GaleriaQtd = $Galeria->contarGaleria(" AND galeria.id_categoria = '".$res->getID()."'");
                                            ?>
                                            <tr data-href="?id=<?=sha1($res->getID())?>" class="th_click">
                                                <th><?=$i?></th>
                                                <th><?=$res->getTitulo()?></th>
                                                <th><?=$res->getSubtitulo()?></th>
                                                <td><?=$mostra_imagem?></td>
                                                <td><?=$GaleriaQtd?></td>
                                                <td>
                                                    <?php /* <a href="?id=<?=sha1($res->getID())?>" title="Visualizar informa��es do categorias"><span><i class="flaticon2-search-1"></i></span></a>&nbsp; */ ?>
                                                    <a href="?del=<?=sha1($res->getID())?>" title="Deletar categorias" onClick="return question('Deseja realmente deletar esse categorias? \nEsta alteração não poderá ser desfeita');" class="a_link"><span><i class="flaticon2-close-cross"></i></span></a>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                       }
                                  
                                    }else{
                                        echo "<tr><td colspan='100' style='text-align:center;'>N&atilde;o h&aacute; dados para exibir</td></tr>"; 
                                    }
                                  ?>
                                </tbody>
                            </table>
                            <?php
                                if($oCategorias){
                                    $Paginacao = new Paginacao($keywords, $pg, $num_paginas);
                                    echo $Paginacao->carregarPaginacao();
                                }
                            ?>

                            <!--begin: Datatable -->
                            <?php /*<div class="kt-datatable" id="kt_datatable_latest_orders"></div> */?>
                            <!--end: Datatable -->
                        </div>
                    </div>	
                </div>	
            </div>
        </div>
    </div>				
                    
<?php
    include("rodape.php");
?>