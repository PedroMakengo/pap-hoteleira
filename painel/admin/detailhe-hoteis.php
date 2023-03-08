<!-- =============================================== -->
<?php include "components/component-head.php" ?>
<!-- =============================================== -->

<!-- Listagem de Hotel -->
<?php 
   $parametros = [":id" => $_GET['userId']];
   $restaurante = new Model();
   $listRestauranteAndHotel = $restaurante->EXE_QUERY("SELECT * FROM tb_restaurante INNER JOIN tb_hotel ON
   tb_restaurante.id_hotel=tb_hotel.id_hotel WHERE tb_restaurante.id_hotel=:id", $parametros);
?>
<!-- Listagem de Hotel -->

<!-- Eliminar Hotel -->
<?php 
     if (isset($_GET['action']) && $_GET['action'] == 'delete'):
      $id = $_GET['id'];
      $parametros  =[
          ":id"=>$id
      ];
      $delete = new Model();
      $delete->EXE_NON_QUERY("DELETE FROM tb_hotel WHERE id_hotel=:id", $parametros);
      if($delete == true):
        echo '<script> 
                swal({
                  title: "Dados eliminados!",
                  text: "Dados eliminados com sucesso",
                  icon: "success",
                  button: "Fechar!",
                })
              </script>';
        echo '<script>
            setTimeout(function() {
                window.location.href="hoteis.php?id=hoteis";
            }, 2000)
        </script>';
      else:
          echo "<script>window.alert('Operação falhou');</script>";
      endif;
  endif;
?>
<!-- Eliminar Hotel -->

    <div class="dashboard-main-wrapper">

    <!-- =============================================== -->
    <?php include "components/component-header.php" ?>
    <!-- =============================================== -->

      <!-- Container -->
      <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
          <div class="container-fluid dashboard-content">
            <div class="ecommerce-widget bg-white p-5">
              <div class="row mb-4">
                <div class="col-lg-6">
                  <h4 class="">Dados referente à <strong><?= $_GET['hotel'] ?></strong></h4>
                </div>
                <div class="col-lg-12"><hr /></div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="table-responsive p-2 border bg-white">
                    <h4 class="pl-3">Listagem de Restaurantes</h4>
                     <table class="table" id="tabela">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nome Restaurante</th>
                          <th>Classificação</th>
                          <th>Número de Mesas</th>
                          <th>Data de Registro</th>
                          <th class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          if($listRestauranteAndHotel):
                            foreach($listRestauranteAndHotel as $hotel):
                            ?>
                              <tr>
                                <td><?= $hotel['id_restaurante'] ?></td>
                                <td><?= $hotel['nome_restaurante'] ?></td>
                                <td><?= $hotel['classificacao_restaurante'] ?></td>
                                <td><?= $hotel['num_mesas_restaurante'] ?></td>
                                <td><?= $hotel['data_criacao_restaurante'] ?></td>
                                <td class="text-center">
                                  <!-- Eliminar -->
                                  <a href="detailhe-hoteis.php?<?= $hotel['id_restaurante'] ?>&action=delete" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash fs-xl opacity-60 me-2"></i>
                                  </a>
                                  <!-- Eliminar -->
                                </td>
                              </tr>
                            <?php 
                            endforeach;
                          else:  ?>
                            <tr>
                              <td>Não existe nenhum registro</td>
                            </tr>
                          <?php 
                          endif;
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="row mt-4">
                <div class="col-lg-12">
                  <div class="table-responsive p-2 border bg-white">
                    <h4 class="pl-3">Listagem de Quartos</h4>
                     <table class="table" id="tabela1">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nome Restaurante</th>
                          <th>Classificação</th>
                          <th>Número de Mesas</th>
                          <th>Data de Registro</th>
                          <th class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          if($listRestauranteAndHotel):
                            foreach($listRestauranteAndHotel as $hotel):
                            ?>
                              <tr>
                                <td><?= $hotel['id_restaurante'] ?></td>
                                <td><?= $hotel['nome_restaurante'] ?></td>
                                <td><?= $hotel['classificacao_restaurante'] ?></td>
                                <td><?= $hotel['num_mesas_restaurante'] ?></td>
                                <td><?= $hotel['data_criacao_restaurante'] ?></td>
                                <td class="text-center">
                                  <!-- Eliminar -->
                                  <a href="detailhe-hoteis.php?<?= $hotel['id_restaurante'] ?>&action=delete" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash fs-xl opacity-60 me-2"></i>
                                  </a>
                                  <!-- Eliminar -->
                                </td>
                              </tr>
                            <?php 
                            endforeach;
                          else:  ?>
                            <tr>
                              <td>Não existe nenhum registro</td>
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
      <!-- Container -->
    </div>

<!-- =============================================== -->
<?php include "components/component-footer.php" ?>
<!-- =============================================== -->