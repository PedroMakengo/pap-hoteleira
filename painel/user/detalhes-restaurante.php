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
  $parametros = [":id" => $_GET['userId']];
  $listHotelMesas = new Model();
  $listDetailsHoteis = $listHotelMesas->EXE_QUERY("SELECT * FROM tb_mesas
    INNER JOIN tb_restaurante ON 
    tb_mesas.id_restaurante=tb_restaurante.id_restaurante 
    INNER JOIN tb_hotel ON 
    tb_restaurante.id_hotel=tb_hotel.id_hotel
    WHERE tb_restaurante.id_restaurante=:id", $parametros);

  foreach($listDetailsHoteis as $details):
    $nomeRestaurente = $details['nome_restaurante'];
  endforeach;

  // Buscando todos os cardápios relacionados a um determinado Restaurante
  $buscandoCardapioRestaurante = new Model();
  $buscandoCardapio = $buscandoCardapioRestaurante->EXE_QUERY("SELECT * FROM tb_cardapios 
    INNER JOIN tb_restaurante ON 
    tb_cardapios.id_restaurante=tb_restaurante.id_restaurante
    WHERE tb_restaurante.id_restaurante=:id", $parametros);
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
              <h3>Detalhes do Restaurante</h3>
            </div>
            <div class="col-lg-12"><hr /></div>

            <div class="col-lg-12 mb-5">
              <div class="row">
                <div class="col-lg-12">
                  <h4>Cardápio</h4>
                    <div class="" style="background: #fafafa">
                     <?php if($buscandoCardapio): ?>
                      <div id="owl-carousel" class="owl-carousel owl-theme content-items-card">
                      <?php foreach($buscandoCardapio as $details):?>
                        <div class="item-card">
                          <div class="row">
                              <div class="col-lg-4">
                                <img src="../../assets/__storage/<?= $details['foto_um'] ?>" class="col-lg-12 photoRestaurante" alt="">
                              </div>
                              <div class="col-lg-4">
                                <img src="../../assets/__storage/<?= $details['foto_dois'] ?>" class="col-lg-12 photoRestaurante" alt="">
                              </div>
                              <div class="col-lg-4">
                                <img src="../../assets/__storage/<?= $details['foto_tres'] ?>" class="col-lg-12 photoRestaurante" alt="">
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php endforeach;?>
                      </div>
                      <?php else:?>
                      <p class="p-3 text-center bg-info text-white">Não existe nenhum dados</p>
                      <?php endif;?>
                  </div>
                </div>
              </div>
            </div>
            <!-- Cardápio -->


            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-12">
                  <h4>Mesas</h4>
                  <div class="table-responsive bg-white p-2">
                    <table class="table" id="tabela">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nome Restaurante</th>
                          <th>Hotel</th>
                          <th>Mesa</th>
                          <th>Tipo Mesa</th>
                          <th>Preço</th>
                          <th>Data de Registro</th>
                          <th class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          if($listDetailsHoteis):
                            foreach($listDetailsHoteis as $details):
                            ?>
                              <tr>
                                <td><?= $details['id_mesa'] ?></td>
                                <td><?= $details['nome_restaurante'] ?></td>
                                <td><?= $details['nome_hotel'] ?></td>
                                <td><?= $details['nome_mesa'] ?></td>
                                <td><?= $details['tipo_mesa'] ?></td>
                                <td><?= $details['preco_mesa'] ?></td>
                                <td><?= $details['data_criacao_mesa'] ?></td>
                                <td class="text-center">
                                  <!-- Eliminar -->
                                  <a href="register-reserva-mesa.php?id=<?= $details['id_mesa'] ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye fs-xl opacity-60 me-2"></i>
                                  </a>
                                  <!-- Eliminar -->
                                </td>
                              </tr>
                            <?php 
                            endforeach;
                          else:  ?>
                            <tr>
                              <td colspan="12" class="text-center">Não existe nenhum registro</td>
                            </tr>
                          <?php 
                          endif;
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- Cardápio -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Component Footer -->
<?php require 'components/component-footer-reserva.php' ?>
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
        items: 1,
      },
    },
  })
</script>