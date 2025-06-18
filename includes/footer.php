<!--====== SECTION FINAL - FOOTER =======-->
    <section class="footer p-4">
        <footer class="container">
            <div class="px-3">
                <div class="row align-items-center justify-content-center justify-content-md-between mb-4">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <ul class="list-unstyled contatenos p-0">
                            <div class="text-start">
                                <h1><b>Informações</b></h1>
                            </div>
                            <li class="mb-2">
                                Aluno: Albert Hatakeyama Nabarrete
                            </li>
                            <li class="mb-2">
                                Curso: Análise e Desenvolvimento de Sistemas (5078695)
                            </li>
                            <li class="mb-2">
                                Minha escolha: Catálogo de Roupa
                            </li>
                            <li class="mb-2">
                                <a href="mailto:ahnbarrete@gmail.com" class="text-decoration-none text-white">
                                    E-mail: ahnbarrete@gmail.com
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="text-center my-4">
                            <img src="assets/imagens/logos/logo-ahn.jpeg" alt="" class="img-fluid bord-img">
                        </div>
                    </div>
                </div>
            </div>

            <!------ Final ------->
            <div class="px-3">
                <div class="row border-top d-flex align-items-center justify-content-center p-0">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <!-- Link para abrir a modal de política de privacidade -->
                        <a href="javascript:void(0);" onclick="abrirModalPolitica()" class=" py-3 px-3 fw500 underline lgpd-bma-bt-saibamais">
                            Política de privacidade
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <p class="m-0 text-center py-3 px-3 ">
                            <span >© Todos os direitos reservados | <?php echo date('Y'); ?></span>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </section>
    
    <?php 
        if($config->whatsapp != "https://wa.me/5511978844375?text=Quero%20saber%20mais%20sobre%20os%20servi%C3%A7osa"){
    ?>
        <!--====== BOTÃO FLUTUANTE WHATSAPP =======-->
        <a id="whatsApp" href="obrigado-whatsapp" target="_black">
            <i class="fa-brands fa-whatsapp fa-shake"></i>
        </a>
    <?php } ?>
<!-- Modal para exibir a política de privacidade -->
<div id="modalPolitica" >
    <div>
        <?php include("./includes/politica_de_privacidade.php"); ?>
    </div>
</div>
    <!--====== CARREGAMENTO DE SCRIPTS =======-->
    <!-- script jquery -->

    <script src="<?=$url?>assets/bootstrap/jquery-3.2.1.slim.min.js"></script>



    <!-- script popper -->

    <script src="<?=$url?>assets/bootstrap/popper.min.js"></script>



    <!-- script bootstrap -->

    <script src="<?=$url?>assets/bootstrap/bootstrap.min.js"></script>



    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->

    <script src="<?=$url?>assets/bootstrap/holder.min.js"></script>



    <!-- script lottiefiles (ANIMACOES) -->

    <script src="<?=$url?>assets/lottiefiles/lottie-player.js"></script>



    <!-- script Glider -->

    <script src="<?=$url?>assets/glider/glider.min.js"></script>



    <!-- script principal -->

    <script src="<?=$url?>assets/index.js"></script>

    <!-- Swiper JS -->
     
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</body>

</html>