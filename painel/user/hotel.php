<!-- Component Head -->
<?php require 'components/component-head.php' ?>
<!-- Component Head -->

<?php
  $listHotel = new Model();
  $listDetailsHoteis = $listHotel->EXE_QUERY("SELECT * FROM tb_hotel");
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
              <h3>Listagem dos Hoteis</h3>
            </div>
            <div class="col-lg-12"><hr /></div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <?php 
                  if($listDetailsHoteis): ?>
                  <div class="row">
                    <?php 
                      foreach($listDetailsHoteis as $details):
                      ?>
                        <div class="col-lg-4">
                          <div class="card">
                            <?php if($details['foto_hotel'] == ""): ?>
                            <img class="card-img-top" style="height: 28vh" src="../../assets/__storage/default.jpg" alt="Card image cap">
                            <?php else: ?>
                            <img class="card-img-top" style="height: 28vh" src="../../assets/__storage/<?= $details['foto_hotel'] ?>" alt="Card image cap">
                            <?php endif; ?>
                            <div class="card-body">
                              <h3 class="card-title"><?= $details['nome_hotel'] ?></h3>
                              <p class="card-text">
                                <?= $details['descricao_hotel'] == "" ? "Em atualização": $details['descricao_hotel']   ?>
                              </p>
                              <small>Endereço:
                                <?= $details['endereco_hotel'] == "" ? "Por definir":$details['endereco_hotel']?>
                              </small>
                              <a href="detalhes-hotel.php?id=hotel&userId=<?= $details['id_hotel'] ?>&userHotel=<?= $details['nome_hotel'] ?>" class="btn-sm col-lg-12 mt-2 btn btn-primary">Mais detalhes</a>
                            </div>
                          </div>
                        </div>
                      <?php 
                      endforeach;
                      ?>
                  </div>
                  <?php else:  ?>
                  <div>Não existe nenhum registro</div>
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