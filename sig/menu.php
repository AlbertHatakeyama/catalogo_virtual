
<button class="kt-aside-close" id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu  kt-aside-menu--dropdown" data-ktmenu-vertical="1" data-ktmenu-dropdown="1" data-ktmenu-scroll="0">		
            <div align="center" style="border-bottom: 1px solid #6a9b76; background-color: #000; padding-top:20px; padding-bottom: 5px;">
                <h5 class="avatar_nome">
                    <?=$sessao_nome?><br>
                </h5>
            </div>
            
            <ul class="kt-menu__nav">                   
                
            <?php
                    if($nome_pg == "categorias"){
                        $active_categorias = "kt-menu__item--active";
                    }
                ?>
                <!-- PC -->
                <li class="kt-menu__item <?=$active_categorias?> d-none d-sm-block" aria-haspopup="true">
                    <a href="categorias" class="kt-menu__link icone_menu">
                        <i class="fa fa-align-left"></i>
                        <span class="kt-menu__link-text">Categorias</span>
                    </a>
                </li>
                <!-- MOBILE -->
                <li class="kt-menu__item <?=$active_categorias?>  d-block d-sm-none" aria-haspopup="true">
                    <a href="categorias" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-text">Categorias</span>
                    </a>
                </li>
                
                

                <?php
                    if($nome_pg == "galeria"){
                        $active_galeria = "kt-menu__item--active";
                    }
                ?>
                <!-- PC -->
                <li class="kt-menu__item <?=$active_galeria?> d-none d-sm-block" aria-haspopup="true">
                    <a href="galeria" class="kt-menu__link icone_menu">
                        <i class="fa fa-images"></i>
                        <span class="kt-menu__link-text">Galeria</span>
                    </a>
                </li>
                <!-- MOBILE -->
                <li class="kt-menu__item <?=$active_galeria?>  d-block d-sm-none" aria-haspopup="true">
                    <a href="galeria" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-text">Galeria</span>
                    </a>
                </li>
                
                
                
                
                
                <?php
                    if($nome_pg == "usuarios"){
                        $active_usuarios = "kt-menu__item--active";
                    }
                    $usuarios_nome = "Usuários";
                    $usuarios_link = "usuarios";
                ?>
                <!-- PC -->
                <li class="kt-menu__item <?=$active_usuarios?> d-none d-sm-block" aria-haspopup="true">
                    <a href="<?=$usuarios_link?>" class="kt-menu__link icone_menu">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="kt-menu__link-text"><?=$usuarios_nome?></span>
                    </a>
                </li>
                <!-- MOBILE -->
                <li class="kt-menu__item <?=$active_usuarios?>  d-block d-sm-none" aria-haspopup="true">
                    <a href="<?=$usuarios_link?>" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-text"><?=$usuarios_nome?></span>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</div>

<!--<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="padding-top:80px;">-->
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="padding-top:0;">
