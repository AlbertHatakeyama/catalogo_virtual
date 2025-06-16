        
            <?php
            //SCRIPT PARA FAZER RODAR O BOTÃO DIRETO NA LINHA <th>
            ?>
            <script>
                $(function(){     
                    $('tr[data-href]').click(function(){         
                        document.location = $(this).data('href');     
                    }); 
                    $('tr[data-href] .a_link').click(function(e){
                        e.stopPropagation(); 
                    });
                }); 
            </script>
            
            <script>
                //INCLUI A SETA AO LADO DO BOTÃO, AVISANDO AO USUÁRIO QUE ELE PRECISA CLICAR PARA SALVAR AS ALTERAÇÕES
                $('.avisar_seta').click(function(){
                    $('.seta_flutuante').fadeIn("slow");
                    $('.avistar_btn').removeClass("btn-primary");
                    $('.avistar_btn').addClass("btn-success");
                });
            </script>


            <script type='text/javascript' src='<?=urlsig()?>/assets/js/demo3/jquery-latest.min.js'></script>
            <script type='text/javascript' src='<?=urlsig()?>/assets/js/demo3/jquery.mask.min.js'></script>
            <script type="text/javascript" src="<?=urlsig()?>/assets/js/demo3/input_masks.js"></script> 

            <link rel="stylesheet" href="<?=urlsig()?>/assets/css/demo3/jquery-ui.css">
            <script src="<?=urlsig()?>/assets/js/demo3/jquery-ui.js"></script>
            <script>
                $(".data").datepicker({
                    dateFormat: 'dd/mm/yy',
                    dayNames: ['Domingo','Segunda','Ter&ccedil;a','Quarta','Quinta','Sexta','S&aacute;bado'],
                    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','S&aacute;b','Dom'],
                    monthNames: ['Janeiro','Fevereiro','Mar&ccedilo','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                    nextText: 'Pr&oacute;ximo',
                    prevText: 'Anterior'
                });


            </script>


            <div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
                <div class="col" style="color:#222;">
                    <a href="https://www.bmasolucoesdigitais.com.br" target="_blank">Desenvolvido por BMA Solu&ccedil;&atilde;es Digitais</a> &nbsp; | &nbsp; <a href="logout">Sair</a>
                </div>    
            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->

<!-- begin::Scrolltop -->
<?php /*
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div> */ ?>


<script type="text/javascript">
    jQuery.noConflict();
</script>



<?php
//DEFINE AS CORES DAS LINHAS NAS PÁGINAS DE LISTAGEM DE REGISTROS COMO POR EXEMPLO leads-lista.php
?>
<script>
document.addEventListener("DOMContentLoaded", () => {           
    const rows = document.querySelectorAll("tr[data-href]");

    rows.forEach(row => {
        row.addEventListener("mouseover", () =>{
            row.setAttribute("style", "background-color:#F5F8FC;");
        });
        row.addEventListener("mouseout", () =>{
            row.setAttribute("style", "background-color:#FFFFFF;");
        });
        row.addEventListener("click", () =>{
            //window.location.href = row.dataset.href;
        });
    });
});
</script>





<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {"colors": {"state": {"brand": "#2c77f4", "light": "#ffffff", "dark": "#282a3c", "primary": "#5867dd", "success": "#34bfa3", "info": "#36a3f7", "warning": "#ffb822", "danger": "#fd3995"}, "base": {"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"], "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]}}};
</script>
<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->


<script src="assets/vendors/global/vendors.bundle.js" type="text/javascript"></script>
<script src="assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>


</body>
</html>