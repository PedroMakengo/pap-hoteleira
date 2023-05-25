<!-- Component Head -->
<?php require 'components/component-head.php' ?>
<!-- Component Head -->

<?php
  $parametros = [":id" => $_SESSION['id']];
  $listReservas = new Model();
  $listDetailsReservas = $listReservas->EXE_QUERY("SELECT * FROM tb_reservas 
    INNER JOIN tb_hospedes ON tb_reservas.id_hospede=tb_hospedes.id_hospede 
    INNER JOIN tb_quartos ON tb_reservas.id_quarto=tb_quartos.id_quarto 
    INNER JOIN tb_hotel ON tb_quartos.id_hotel=tb_hotel.id_hotel
    WHERE tb_reservas.id_hospede=:id", $parametros);


  $listDetailsRestaurante = $listReservas->EXE_QUERY("SELECT * FROM tb_mesa_reservas
    INNER JOIN tb_mesas ON 
    tb_mesa_reservas.id_mesa=tb_mesas.id_mesa 
    INNER JOIN tb_restaurante ON 
    tb_mesas.id_restaurante=tb_restaurante.id_restaurante
    WHERE tb_mesa_reservas.id_hospede=:id
  ", $parametros);
?> 

<!-- Eliminar Hotel -->
<?php 
  if (isset($_GET['action']) && $_GET['action'] == 'delete'):
    $id = $_GET['id'];
    $parametros  =[
        ":id"=>$id
    ];
    $delete = new Model();
    $delete->EXE_NON_QUERY("DELETE FROM tb_reservas WHERE id_reserva=:id", $parametros);
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
              window.location.href="index.php?id=home";
          }, 2000)
      </script>';
    else:
        echo "<script>window.alert('Operação falhou');</script>";
    endif;
  endif;

  if (isset($_GET['action']) && $_GET['action'] == 'deleteReservaMesa'):
    $id = $_GET['id'];
    $parametros  =[
        ":id"=>$id
    ];
    $delete = new Model();
    $delete->EXE_NON_QUERY("DELETE FROM tb_mesa_reservas WHERE id_reserva_mesa=:id", $parametros);
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
              window.location.href="index.php?id=home";
          }, 2000)
      </script>';
    else:
        echo "<script>window.alert('Operação falhou');</script>";
    endif;
  endif;


  // 
?>
<!-- Eliminar Hotel -->

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
              <h4>Minha lista de Reservas</h4>
            </div>
            <div class="col-lg-12"><hr /></div>
          </div>

          <div class="row">
            <div class="col-lg-12">

            <div class="tab-outline">
              <ul class="nav nav-tabs" id="myTab2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active show" id="tab-outline-one" data-toggle="tab" href="#outline-one" role="tab" aria-controls="home" aria-selected="true">Quartos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-outline-two" data-toggle="tab" href="#outline-two" role="tab" aria-controls="profile" aria-selected="false">Mesas</a>
                </li>
              </ul>

              <div class="tab-content" id="myTabContent2">
                <div class="tab-pane fade active show" id="outline-one" role="tabpanel" aria-labelledby="tab-outline-one">
                  <!-- Tabela Reserva Quarto  -->
                  <div class="table-responsive bg-white p-2">
                    <table class="table" id="tabela" style="width: 1400px !important">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Hotel</th>
                          <th>Quarto</th>
                          <th>Tipo de Quarto</th>
                          <th>Q. de Hospedes</th>
                          <th>Preço do Quarto Dias</th>
                          <th>Preço do Quarto Horas</th>
                          <th>Status</th>
                          <th>Total de Horas</th>
                          <th>Total de Dias</th>
                          <th>Data de Registro</th>
                          <th class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          if($listDetailsReservas):
                            foreach($listDetailsReservas as $details):
                            ?>
                              <tr>
                                <td><?= $details['id_reserva'] ?></td>
                                <td><?= $details['nome_hotel'] ?></td>
                                <td><?= $details['quarto'] ?></td>
                                <td><?= $details['tipo_quarto'] ?></td>
                                <td>
                                  <?= $details['num_hospedes_reserva'] ?>
                                </td>
                                <td><?= $details['precoTotalDias']. "kz" ?></td>
                                <td><?= $details['precoTotalHoras']. "kz" ?></td>
                                <td><?= $details['status_quarto_reserva'] ?></td>
                                <td><?= $details['total_horas'] ?></td>
                                <td><?= $details['total_noites'] ?></td>
                                <td><?= $details['data_criacao_reserva'] ?></td>
                                <td class="text-center">
                                  <a href="editar-reserva-quarto.php?id=home&idUser=<?= $details['id_reserva'] ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit fs-xl opacity-60 me-2"></i>
                                  </a>
                                  <!-- Eliminar -->
                                  <a href="index.php?id=<?= $details['id_reserva'] ?>&action=delete" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash fs-xl opacity-60 me-2"></i>
                                  </a>
                                  <!-- Eliminar -->
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
                  <!-- Tabela Reserva Quarto  -->
                </div>

                <div class="tab-pane fade" id="outline-two" role="tabpanel" aria-labelledby="tab-outline-two">
                    <!-- Tabela das Mesas reservados -->
                    <div class="table-responsive bg-white p-2" >
                      <table class="table" id="tabela1" >
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Mesa</th>
                            <th>Restaurante</th>
                            <th>Data de Checkin</th>
                            <th>Status Mesa</th>
                            <th>Data de Registro</th>
                            <th class="text-center">Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            if($listDetailsRestaurante):
                              foreach($listDetailsRestaurante as $details):
                              ?>
                                <tr>
                                  <td><?= $details['id_reserva_mesa'] ?></td>
                                  <td><?= $details['nome_mesa'] ?></td>
                                  <td><?= $details['nome_restaurante'] ?></td>
                                  <td><?= $details['data_checkin_mesa_reserva'] ?></td>
                                  <td><?= $details['status_mesa_reserva'] ?></td>
                                  <td><?= $details['data_criacao_mesa_reserva'] ?></td>
                                  <td class="text-center">
                                    <a href="index.php?id=<?= $details['id_reserva_mesa'] ?>&action=deleteReservaMesa" class="btn btn-danger btn-sm">
                                      <i class="fas fa-trash fs-xl opacity-60 me-2"></i>
                                    </a>
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
                    <!-- Tabela das Mesas reservados -->
                </div>
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