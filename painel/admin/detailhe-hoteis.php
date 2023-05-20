<!-- =============================================== -->
<?php include "components/component-head.php" ?>
<!-- =============================================== -->

<!-- Listagem de Restaurante e Quartos -->
<?php 
   $parametros = [":id" => $_GET['userId']];
   $restaurante = new Model();
   $listRestauranteAndHotel = $restaurante->EXE_QUERY("SELECT * FROM tb_restaurante INNER JOIN tb_hotel ON
   tb_restaurante.id_hotel=tb_hotel.id_hotel WHERE tb_restaurante.id_hotel=:id", $parametros);


  $listQuartosAndHotel = $restaurante->EXE_QUERY("SELECT * FROM tb_quartos INNER JOIN tb_hotel ON 
  tb_quartos.id_hotel=tb_hotel.id_hotel WHERE tb_quartos.id_hotel=:id
  ", $parametros);
?>
<!-- Listagem de Restaurante e Quartos -->

<!-- Eliminar Restaurante -->
<?php 
    if (isset($_GET['action']) && $_GET['action'] == 'deleteRestaurante'):
    $id = $_GET['id'];
    $parametros  =[
        ":id"=>$id
    ];
    $delete = new Model();
    $delete->EXE_NON_QUERY("DELETE FROM tb_restaurante WHERE id_restaurante=:id", $parametros);
    if($delete == true):
      //===================================================================================================================
      $today   =  Date('Y-m-d H:i:s');
      $nome    = $_SESSION['nome'];
      $action  = "eliminou";
      $textLog = "O usuário ". $nome. " ". $action . " um restaurante cujo o nome é ". $_GET['nomeRestaurante']. " em " . $today;
      $parametros = [
        ":nome"     => $nome, 
        ":actionLog"   => $action, 
        ":textLog"  => $textLog,
        ":dataLog"     => $today       
      ];
      $insertLog = new Model();
      $insertLog->EXE_NON_QUERY("INSERT INTO tb_logs 
      (user_log, action_log, text_log, data_log) 
      VALUES (:nome, :actionLog, :textLog, :dataLog) ", $parametros);
      //===================================================================================================================
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

    if (isset($_GET['action']) && $_GET['action'] == 'deleteQuarto'):
      $id = $_GET['id'];
      $parametros  =[
          ":id"=>$id
      ];
      $delete = new Model();
      $delete->EXE_NON_QUERY("DELETE FROM tb_quartos WHERE id_quarto=:id", $parametros);
      if($delete == true):

         //===================================================================================================================
        $today   =  Date('Y-m-d H:i:s');
        $nome    = $_SESSION['nome'];
        $action  = "eliminou";
        $textLog = "O usuário ". $nome. " ". $action . " um quarto cujo o nome é ". $_GET['nomeQuarto']. " em " . $today;
        $parametros = [
          ":nome"     => $nome, 
          ":actionLog"   => $action, 
          ":textLog"  => $textLog,
          ":dataLog"     => $today       
        ];
        $insertLog = new Model();
        $insertLog->EXE_NON_QUERY("INSERT INTO tb_logs 
        (user_log, action_log, text_log, data_log) 
        VALUES (:nome, :actionLog, :textLog, :dataLog) ", $parametros);
        //===================================================================================================================
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
<!-- Eliminar Restaurante -->

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
                                  <a href="detailhe-restaurante.php?id=hoteis&userId=<?= $hotel['id_restaurante'] ?>&restaurante=<?= $hotel['nome_restaurante'] ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye fs-xl opacity-60 me-2"></i>
                                  </a>
                                  <a href="detailhe-hoteis.php?nomeRestaurante=<?= $hotel['nome_restaurante'] ?>&id=<?= $hotel['id_restaurante'] ?>&action=deleteRestaurante" class="btn btn-danger btn-sm">
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
                          <th>Tipo de Quarto</th>
                          <th>Capacidade</th>
                          <th>Preço</th>
                          <th>Status do Quarto</th>
                          <th class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          if($listQuartosAndHotel):
                            foreach($listQuartosAndHotel as $hotel):
                            ?>
                              <tr>
                                <td><?= $hotel['id_quarto'] ?></td>
                                <td><?= $hotel['tipo_quarto'] ?></td>
                                <td><?= $hotel['capacidade_quarto'] ?></td>
                                <td><?= $hotel['preco_quarto'] ?></td>
                                <td><?= $hotel['status_quarto'] ?></td>
                                <td class="text-center">
                                  <!-- Eliminar -->
                                  <a href="detailhe-hoteis.php?nomeQuarto=<?= $hotel['nome_quarto'] ?>&id=<?= $hotel['id_quarto'] ?>&action=deleteQuarto" class="btn btn-danger btn-sm">
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