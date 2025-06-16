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
    
    
    //TRATANDO A BUSCA
    $where = "";
    if($busca){
        $where .= " AND (usuarios.nome LIKE '%$busca%' OR usuarios.email LIKE '%$busca%')";
    }
    /*if($busca_status != "todos"){
        $where .= " AND usuarios.status = '$busca_status'";
    }*/
    $where .= " AND usuarios.status = 1";
    
    
    //CLASSES
    $usuario1 = new Usuarios();
    $total_usuarios1 = $usuario1->contarUsuarios($where);
    
    $qtd_por_pagina = 50;
    $num_paginas = ceil($total_usuarios1/$qtd_por_pagina);
    $limit_pagina = ($pg*$qtd_por_pagina) - $qtd_por_pagina;
    
    $usuario = new Usuarios();
    $oUsuario = $usuario->carregarUsuarios($where, "usuarios.nome ASC", "$limit_pagina, $qtd_por_pagina");
    $total_usuarios = count($oUsuario);

  
    $titulo_pg = "Usuarios";
    
    $bt_topo[0]['link'] = "usuarios?add=1";
    $bt_topo[0]['link_target'] = "";
    $bt_topo[0]['link_title'] = "Adicionar novo Usuario";
    $bt_topo[0]['texto'] = "<span><i class='flaticon2-plus'></i></span>";
    $bt_topo[0]['tamanho'] = "";
    
    
    
    include_once("header.php");
    include_once("menu.php");
    include_once("topo.php");

?>
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
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
                                    <button type="submit" class="btn btn-brand">Buscar</button>
                                </div>
                                <div class="kt-portlet__head-label d-none d-lg-table-cell pt-4">
                                    Mostrando <?=$total_usuarios?>/<?=$total_usuarios1?> usuario(s)
                                </div>
                            </div>
                        </form>

                        <?php
                        if($oDeleteUsuario){
                            if($oDeleteUsuario->getDeleteOK() == "0"){
                            ?>
                            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                <div class="kt-portlet__head-label">
                                    <p class="kt-portlet__head-title" style="color:#ff6666;">Impossível deletar este usuario</p>
                                </div>
                            </div>
                            <?php
                            }
                            if($oDeleteUsuario->getDeleteOK() == "1"){
                            ?>
                            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                <div class="kt-portlet__head-label">
                                    <p class="kt-portlet__head-title" style="color:#3E6E34;">Usuario deletado com sucesso</p>
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
                                    <th>Nome</th>
                                    <th class="d-none d-lg-table-cell">E-mail</th>
                                    <th>Situação</th>
                                    <th style="width:10%">Desde</th>
                                    <th style="width:8%">&nbsp;</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if($oUsuario){
                                        $i=1;
                                        foreach ($oUsuario as $res){
                                  ?>
                                  <tr data-href="?id=<?=sha1($res->getIDUsuario())?>" class="th_click">
                                    <td><?=$res->getNome()?></td>
                                    <td class="d-none d-lg-table-cell"><?=$res->getEmail()?></td>
                                    <td><?=$res->getStatus(1)?></td>
                                    <td><?=$res->getData(1)?></td>
                                    <td>

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
                                if($oUsuario){
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