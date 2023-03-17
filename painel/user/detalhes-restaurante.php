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
            <div class="col-lg-12">
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
      </div>
    </div>
  </div>
</div>

<!-- Component Footer -->
<?php require 'components/component-footer.php' ?>
<!-- Component Footer -->