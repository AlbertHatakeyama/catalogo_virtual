<?php
    $Funcoes = new Funcoes();

?>
    <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
        <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
        <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper" style="padding-top:15px;">
            <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-tab">
                <div class="titulo_pg"><strong><?=$titulo_pg?></strong></div>
            </div>
        </div>

        <div class="kt-header__topbar">

            <?php
            //BOTÕES DE ADICIONAR, VOLTAR, ETC.
            //SÃO SETADOS PELAS PÁGINAS
            if($bt_topo){
                foreach($bt_topo as $res){
                    echo "<div class='kt-header__topbar-item'>
                            <span class='kt-header__topbar-icon' style='width:".$res['tamanho']."; '>
                                <a href='".$res['link']."' target='".$res['link_target']."' title='".$res['link_title']."' ".$res['link_atributo_add'].">
                                    <span class='kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bolder' style='width:".$res['tamanho']."; '>".$res['texto']."</span>
                                </a>
                            </span>
                          </div>";
                }
            }
            ?>  
        </div>
    </div>