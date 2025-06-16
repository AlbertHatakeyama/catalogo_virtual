<?php
include_once("../../sig/config.class.php");
include_once("../../sig/class.php");
include("../../header.php");

//CLASSES
$Categorias = new Categorias();
$Galeria    = new Galeria();

//URL
$url_completa = $_SERVER['REQUEST_URI'];
$url_array    = explode("/", $url_completa);
$url_array    = array_filter($url_array);
$url          = end($url_array);

//REGISTRO DA CATEGORIA ESCOLHIDA
$oCategoria = $Categorias->carregarCategorias(" AND categorias.url = '$url'");
if(!$oCategoria){
  echo "<meta http-equiv='refresh' content='0;".urlsite()."'>";
  exit;
}

//CAMPOS
$categorias_id        = $oCategoria[0]->getID();
$categorias_titulo    = $oCategoria[0]->getTitulo();
$categorias_subtitulo = $oCategoria[0]->getSubtitulo();

?>

    <main>

      

      <section class="banner-fotos d-flex align-items-center justify-content-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
              <div class="banner_categorias">
                <h2><?=$categorias_titulo?></h2>
                <hr>
                <p><?=$categorias_subtitulo?></p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--SEÇÃO GALERIA-->
      <section class="galeria p-4" id="galeria" >
        <div class="container">
            <div class="row">
              <?php
              //CONTAGEM DE IMAGENS
              $oGaleriaContagem = $Galeria->contarGaleria(" AND galeria.id_categoria = '$categorias_id'");
              if($oGaleriaContagem > 0){

                //DIVIDINDO POR 3
                $galeria_qtd_dividido = $oGaleriaContagem / 3;
                $galeria_qtd_dividido = ceil($galeria_qtd_dividido);
              ?>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                  <?php
                    $galeria_contagem = 0;
                    $limit_de = 0;
                    $oGaleria_col1 = $Galeria->carregarGaleria(" AND galeria.id_categoria = '$categorias_id'", "galeria.id DESC", "$limit_de , $galeria_qtd_dividido");
                    if($oGaleria_col1){
                      foreach($oGaleria_col1 as $res_galeria){
                        $galeria_imagem = $res_galeria->getImagem();
                        $galeria_contagem++;
                        
                        echo "
                        <div class='my-4'>
                          <img src='../../galeria/".$galeria_imagem."' alt='imagem de projeto em acrílico' loading='lazy' class='img-fluid bord-img animacao animate-slide-in-left' data-animation-type='left' data-animation-delay='0.".rand(0, 4)."s'>
                        </div>";
                      }
                    }
                  ?>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                  <?php
                  $limit_de = $limit_de + $galeria_contagem;
                  $oGaleria_col2 = $Galeria->carregarGaleria(" AND galeria.id_categoria = '$categorias_id'", "galeria.id DESC", "$limit_de , $galeria_qtd_dividido");
                  if($oGaleria_col2){
                    foreach($oGaleria_col2 as $res_galeria){
                      $galeria_imagem = $res_galeria->getImagem();

                      echo "
                      <div class='my-4'>
                        <img src='../../galeria/".$galeria_imagem."' alt='imagem de projeto em acrílico' loading='lazy' class='img-fluid bord-img animacao animate-slide-in-left' data-animation-type='left' data-animation-delay='0.".rand(0, 4)."s'>
                      </div>";
                    }
                  }
                  ?>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                  <?php
                  $limit_de = $limit_de + $galeria_contagem;
                  $oGaleria_col3 = $Galeria->carregarGaleria(" AND galeria.id_categoria = '$categorias_id'", "galeria.id DESC", "$limit_de , $galeria_qtd_dividido");
                  if($oGaleria_col3){
                    foreach($oGaleria_col3 as $res_galeria){
                      $galeria_imagem = $res_galeria->getImagem();

                      echo "
                      <div class='my-4'>
                        <img src='../../galeria/".$galeria_imagem."' alt='imagem de projeto em acrílico' loading='lazy' class='img-fluid bord-img animacao animate-slide-in-left' data-animation-type='left' data-animation-delay='0.".rand(0, 4)."s'>
                      </div>";
                    }
                  }
                  ?>
                </div>
                <?php
              }
              else{
                echo "<div class='col-12 text-center'>Não há imagens para esta categoria</div>";
              }
                ?>
            </div>
            <div class="col-12">
                <div class="text-center my-4">
                    <a href="<?=urlsite()?>/obrigado-whatsapp" target="_blank" class="btn btn-lg btn-success text-decoration-none text-white">
                        <i class="fab fa-whatsapp mx-2"></i>Chamar no whatsapp
                    </a>
                </div>
            </div>
        </div>
    </section>

      <?php
        include("../../contato.php");
      ?>

    </main>


    <?php
      include("../../footer.php");
    ?>