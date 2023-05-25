<style>
  .imageQuarto {
    width: 50px !important;
    height: 50px !important;

    position: relative;
    transform: translateY(-60%);
    right: -10%;
  }

  .contentMargin {
    position: relative;
    transform: translateY(-10%);
  }
</style>

<!-- Component Head -->
<?php require 'components/component-head.php' ?>
<!-- Component Head -->

<?php
  $listReservas = new Model();
  $listDetailsReservas = $listReservas->EXE_QUERY("SELECT * FROM tb_quartos
  INNER JOIN tb_hotel ON tb_quartos.id_hotel=tb_hotel.id_hotel");
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
              <h4>Lista de Quartos Disponíveis</h4>
            </div>
            <div class="col-lg-12"><hr /></div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <?php if($listDetailsReservas): ?>
                <div class="row">
                  <?php 
                    foreach($listDetailsReservas as $details):
                    ?>
                      <div class="col-lg-4">
                        <div class="card">

                          <?php if($details['foto_primeira_quarto'] == ""): ?>
                          <img class="card-img-top" style="height: 28vh" src="../../assets/__storage/default.jpg" alt="Card image cap">
                          <?php else: ?>
                          <img class="card-img-top" style="height: 28vh" src="../../assets/__storage/<?= $details['foto_primeira_quarto'] ?>" alt="Card image cap">
                          <img class="card-img-top imageQuarto" style="height: 28vh" src="../../assets/__storage/<?= $details['foto_segunda_quarto'] ?>" alt="Card image cap">
                          <?php endif; ?>


                          <div class="card-body contentMargin">
                            <h3 class="card-title">Quarto <?= $details['quarto'] ?></h3>
                            <span class="card-text">Hotel: <strong><?= $details['nome_hotel'] ?></strong></span><br>
                            <span class="card-text">Categória do Quarto: <strong><?= $details['tipo_quarto'] ?></strong></span><br>
                            <span class="card-text">Tipo do Quarto: <strong><?= $details['categoria_quarto'] ?></strong></span><br>

                            <span class="card-text">Preço do Quarto Por Noite: <strong><?= $details['preco_quarto'] . " kz" ?></strong></span><br>
                            <span class="card-text">Capacidade do Quarto: <strong><?= $details['capacidade_quarto'] ?></strong></span><br>
                            <span class="card-text">Estado do Quarto: <strong><?= $details['status_quarto'] ?></strong></span><br>
                            <a href="register-reserva.php?id=hotel&userId=<?= $details['id_quarto'] ?>" class="btn-sm col-lg-12 mt-2 btn btn-primary">Reservar</a>
                          </div>
                        </div>
                      </div>
                    <?php 
                    endforeach;
                    ?>
                </div>
                <?php else:  ?>
                <div class="bg-info text-center text-white p-3">Não existe nenhum registro</div>
                <?php endif;?>
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