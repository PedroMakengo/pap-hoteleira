<head>
  <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="../../assets/css/owl.theme.default.min.css">

  <style>
    .photoRestaurante {
      height: 30vh;
      object-fit: cover;
    }

    
    .content-restaurante {
      background-color: #fafafa !important;
      width: 90%;
      margin: 0 auto;
    }

    .content-restaurante ul {
      list-style: none;
      margin: 1rem 0;
      padding: 0;

      display: flex;
      flex-direction: column;
    }

    .content-restaurante ul li {
      display: flex;
      justify-content: space-between;
    }

    .owl-nav {
      display: none;
    }

    .owl-dots button { 
      background: none !important;
      border: 0 !important;
    }
  </style>
</head>

<!-- Component Head -->
<?php require 'components/component-head.php' ?>
<!-- Component Head -->

<?php
  $listRestaurantes = new Model();
  $listRestaurantesDetalhes = $listRestaurantes->EXE_QUERY("SELECT * FROM tb_restaurante 
  INNER JOIN tb_hotel ON tb_restaurante.id_hotel=tb_hotel.id_hotel");
?> 

<div class="dashboard-main-wrapper">
  
<!-- Component Head -->
<?php require 'components/component-header.php' ?>
<!-- Component Head -->

  <!-- Container -->
  <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
      <div class="container-fluid dashboard-content">
        <div class="ecommerce-widget bg-white p-5">
          <div class="row mb-4">
            <div class="col-lg-6">
              <h4>Lista de Restaurantes</h4>
            </div>
            <div class="col-lg-12"><hr /></div>
          </div>

          <div class="row">
            <div class="" style="overflow-x: hidden">
               <div id="owl-carousel" class="owl-carousel owl-theme content-items-card">
                  <?php 
                    if($listRestaurantesDetalhes):
                      foreach($listRestaurantesDetalhes as $details):
                  ?>
                    <div class="item-card">
                      <img src="../../assets/__storage/<?= $details['foto'] ?>" class="col-lg-12 photoRestaurante" alt="">
                      <div class="p-2 content-restaurante">
                        <ul>
                          <li><span>ID:</span> <strong><?= $details['id_restaurante'] ?></strong></li>
                          <li><span>Hotel:</span> <strong><?= $details['nome_hotel'] ?></strong></li>
                          <li><span>Restaurante:</span> <strong><?= $details['nome_restaurante'] ?></strong></li>
                          <li><span>Classificação:</span> <strong><?= $details['classificacao_restaurante'] ?></strong></li>
                          <li><span>Nº de Mesas:</span> <strong><?= $details['num_mesas_restaurante'] ?></strong></li>
                          <li><span>Data de Criação:</span> <strong><?= $details['data_criacao_restaurante'] ?></strong></li>
                        </ul>
                        <span class="text-center ">
                          <a href="detalhes-restaurante.php?id=restaurante&userId=<?= $details['id_restaurante'] ?>" class="btn btn-primary btn-sm col-lg-12 p-3">
                            Mais Informações
                          </a>
                        </span>
                      </div>
                    </div>
                  <?php endforeach;?>
                <?php endif;?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Component Footer -->
<?php require 'components/component-footer.php' ?>
<!-- Component Footer -->

<script src="../../assets/js/owl.carousel.min.js"></script>
<script>
  $('.owl-carousel').owlCarousel({
    rtl: false,
    loop: true,
    margin: 5,
    nav: true,
    autoplay: true,
    smartSpeed: 2e3,
    animateOut: 'fadeOut',
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 3,
      },
    },
  })
</script>