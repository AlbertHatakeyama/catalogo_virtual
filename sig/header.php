<!DOCTYPE html>
<html lang="pt-br">
    <head>
        
        <meta charset="UTF-8"/>

        <title><?=nomeempresa()?> - Painel de controle</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <script src="<?=urlsig()?>/ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
                active: function () {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <!--end::Fonts -->

        <link href="<?=urlsig()?>/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?=urlsig()?>/assets/vendors/global/vendors.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?=urlsig()?>/assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?=urlsig()?>/assets/css/demo3/estilo.css" rel="stylesheet" type="text/css">
        <link href="<?=urlsig()?>/assets/css/demo3/sortable.css" rel="stylesheet">
        <link href="<?=urlsig()?>/assets/logo/favicon-32x32.png" rel="shortcut icon" />
        
        <script type="text/JavaScript">
        function question( str_question ) {
                if ( confirm( str_question ) )
                        return true;
                else
                        return false;
        }
        </script>
        
        <script src="<?=urlsig()?>/assets/js/demo3/jquery.min.js"></script> 
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js" type="text/javascript"></script>
        <?php /* <script src="<?=urlsig()?>/assets/js/demo3/maskedinput.js" type="text/javascript"></script> */ ?>
        
        <script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
        
        <script type="text/javascript">
            function MM_jumpMenu(targ,selObj,restore){ //v3.0
                eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
                if (restore) selObj.selectedIndex=0;
            }
        </script>
        
    </head>
    
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed"  >


        <!-- begin:: Page -->

        <!-- begin:: Header Mobile -->
        <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
            <div class="kt-header-mobile__logo">
            </div>
            <div class="kt-header-mobile__toolbar">
                <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
                <?php /* <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button> */ ?>
                <?php /* <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button> */ ?>
            </div>
        </div>
        
        
        <div class="kt-grid kt-grid--hor kt-grid--root">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">