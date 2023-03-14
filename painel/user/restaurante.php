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
            <div class="col-lg-12">
              <div class="table-responsive bg-white p-2">
                <table class="table" id="tabela">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Hotel</th>
                      <th>Nome do Restaurante</th>
                      <th>Classificação</th>
                      <th>Nº Mesas</th>
                      <th>Data de Registro</th>
                      <th class="text-center">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      if($listRestaurantesDetalhes):
                        foreach($listRestaurantesDetalhes as $details):
                        ?>
                          <tr>
                            <td><?= $details['id_restaurante'] ?></td>
                            <td><?= $details['nome_hotel'] ?></td>
                            <td><?= $details['nome_restaurante'] ?></td>
                            <td><?= $details['classificacao_restaurante'] ?></td>
                            <td><?= $details['num_mesas_restaurante'] ?></td>
                            <td><?= $details['data_criacao_restaurante'] ?></td>
                            <td class="text-center">
                              <a href="detalhes-restaurante.php?id=restaurante&userId=<?= $details['id_restaurante'] ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye fs-xl opacity-60 me-2"></i>
                              </a>
                            </td>
                          </tr>
                        <?php 
                        endforeach;
                      else:  ?>
                        <tr>
                          <td colspan="12" class="text-center">Não existe registro</td>
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
      </div>
    </div>
  </div>
</div>

<!-- Component Footer -->
<?php require 'components/component-footer.php' ?>
<!-- Component Footer -->