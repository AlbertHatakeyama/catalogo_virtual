<?php
    include_once("./sig/config.class.php");
    include_once("./sig/class.php");
    include("./includes/head.php");
?>
<section class="banner_parallax d-flex align-items-center justify-content-center">
    <article class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12 col-sm-12">
                <div class="text-lg-start text-md-center text-sm-center p-4">
                    <h1>
                        Estilo que Inspira <br> Nova Coleção 2025
                    </h1>
                    <p>
                        Renove seu guarda-roupa com peças modernas, confortáveis e com personalidade. Explore agora nosso catálogo virtual e encontre seu próximo look favorito!
                    </p>
                </div>
            </div>
        </div>
    </article>
</section>
<section class="quem_somos p-4" id="sobre_nos">
    <article class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="apresentacao text-start">
                    <h1>Sobre Nós </h1>
                    <hr class="mt-0">
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-12 col-sm-12">
                <div class="text-center my-4">
                    <img src="./assets/imagens/logos/logo_pequeno.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="separador-z my-2"></div>
            <div class="col-lg-6 col-md-6 col-12 col-sm-12 d-flex align-items-center justify-content-center">
                <div class="apresentacao my-4">
                    <h2>Paulistana Summer</h2>
                    <p>
                        Somos apaixonados por moda e acreditamos que estilo é uma forma de expressão. Nosso catálogo foi criado para oferecer uma experiência visual simples, prática e inspiradora, apresentando peças cuidadosamente selecionadas com foco em conforto, autenticidade e beleza.
                    </p>
                    <br>
                    <h3 class="text-md-start text-sm-center">Nossa Missão</h3>
                    <p class="fala_questao">
                        <i class="fa-solid fa-quote-left"></i>
                          Produtividade com liberdade. 
                        <i class="fa-solid fa-quote-right"></i>
                    </p>
                </div>
            </div>
        </div>
    </article>
</section>
<!--PRODUTOS-->
<section class="produtos p-4" id="produtos">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="apresentacao text-start">
                    <h1>Produtos</h1>
                    <hr class="mt-0">
                </div>
            </div>
        </div>
    </div>
    <div class="div-produtos">
        <div class="container-produtos">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="my-4 px-4">
                        <h2>Conheça Nossa Coleção</h2>
                        <p class="text-start">
                            Aqui você encontra roupas e acessórios pensados para o dia a dia, eventos especiais ou aquele momento de puro conforto. Escolha entre blusas, calças, tênis, mochilas e muito mais. Tudo com qualidade e estilo para todos os gostos.
                        </p>
                    </div>
                </div>
                <?php            
                    $Categorias = new Categorias();
                    $oCategoria = $Categorias->carregarCategorias("", "categorias.titulo ASC");
                    if($oCategoria){
                        foreach($oCategoria as $res_categoria){
                        
                        $categorias_titulo    = $res_categoria->getTitulo();
                        $categorias_subtitulo = $res_categoria->getSubtitulo(); 
                        $categorias_imagem    = $res_categoria->getImagem();
                        $categorias_url       = $res_categoria->getUrl();
                ?>
                <div class="col-lg-4 col-md-6 col-12 col-sm-12">
                    <div class="card-produtos mb-4">
                        <div class="animacao animate-slide-in-top" data-animation-type="top" data-animation-delay="0.<?= rand(0, 4) ?>s">
                            <a href="categorias/<?=$categorias_url?>" class="text-decoration-none" style="position: relative;bottom: 30%;">
                                <div class="px-3 my-4" style="background-image: url('categorias_imagens/<?=$categorias_imagem?>'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 200px; position: relative;" alt="imagem de fundo da categoria"></div>
                                <h5 class="pt-3 mb-0 text-center fw-bold text-white">
                                <?=$categorias_titulo?>
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
            ?>
            </div>
        </div>
    </div>
</section>
<section class="galeria p-4" id="galeria" >
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="galeria text-start">
                        <h1>Galeria</h1>
                        <hr class="mt-0">
                    </div>
                    <p>
                        Confira fotos reais dos nossos produtos em diferentes estilos e combinações. Inspire-se com looks modernos, versáteis e cheios de personalidade.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class=" my-4">
                    <img src="assets/imagens/galeria/imagem1.jpg" alt="imagem1" class="img-fluid bord-img animacao animate-slide-in-left" data-animation-type="left" data-animation-delay="0.<?= rand(0, 4) ?>s">
                </div>
                <div class=" my-4">
                    <img src="assets/imagens/galeria/imagem4.jpg" alt="imagem4" class="img-fluid bord-img animacao animate-slide-in-left" data-animation-type="left" data-animation-delay="0.<?= rand(0, 4) ?>s">
                </div>
                <div class=" my-4">
                    <img src="assets/imagens/galeria/imagem7.jpg" alt="imagem7" class="img-fluid bord-img animacao animate-slide-in-left" data-animation-type="left" data-animation-delay="0.<?= rand(0, 4) ?>s">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class=" my-4">
                    <img src="assets/imagens/galeria/imagem6.jpg" alt="imagem6" class=" img-fluid bord-img animacao animate-slide-in-left" data-animation-type="left" data-animation-delay="0.<?= rand(0, 4) ?>s">
                </div>
                <div class=" my-4">
                    <img src="assets/imagens/galeria/imagem2.jpg" alt="imagem2" class=" img-fluid bord-img animacao animate-slide-in-left" data-animation-type="left" data-animation-delay="0.<?= rand(0, 4) ?>s">
                </div>
                <div class=" my-4">
                    <img src="assets/imagens/galeria/imagem8.jpg" alt="imagem8" class=" img-fluid bord-img animacao animate-slide-in-left" data-animation-type="left" data-animation-delay="0.<?= rand(0, 4) ?>s">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class=" my-4">
                    <img src="assets/imagens/galeria/imagem3.jpg" alt="imagem3" class="img-fluid bord-img animacao animate-slide-in-left" data-animation-type="left" data-animation-delay="0.<?= rand(0, 4) ?>s">
                </div>
                <div class=" my-4">
                    <img src="assets/imagens/galeria/imagem5.jpg" alt="imagem5" class=" img-fluid bord-img animacao animate-slide-in-left" data-animation-type="left" data-animation-delay="0.<?= rand(0, 4) ?>s">
                </div>
                <div class=" my-4">
                    <img src="assets/imagens/galeria/imagem9.jpg" alt="imagem9" class="img-fluid bord-img animacao animate-slide-in-left" data-animation-type="left" data-animation-delay="0.<?= rand(0, 4) ?>s">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="text-center my-4">
                <a href="obrigado-whatsapp" target="_blank" class="btn btn-success text-decoration-none text-white">
                    <i class="fab fa-whatsapp mx-2"></i>Chamar no whatsapp
                </a>
            </div>
        </div>
    </div>
</section>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.522891835705!2d-46.61225392458919!3d-23.585573062482325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5be650476023%3A0x2c33390e6e3805b1!2sMuseu%20do%20Ipiranga!5e0!3m2!1spt-BR!2sbr!4v1736445839997!5m2!1spt-BR!2sbr" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<?php
    include("./includes/footer.php");
?>