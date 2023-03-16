<!-- Component Head -->
<?php require 'components/component-head.php' ?>
<!-- Component Head -->

<?php
  $parametros = [":id" => $_SESSION['id']];
  $listReservas = new Model();
  $listDetailsReservas = $listReservas->EXE_QUERY("SELECT * FROM tb_reservas 
    INNER JOIN tb_hospedes ON tb_reservas.id_hospede=tb_hospedes.id_hospede 
    INNER JOIN tb_quartos ON tb_reservas.id_quarto=tb_quartos.id_quarto
    WHERE tb_reservas.id_hospede=:id", $parametros);
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
              <h4>Lista de Reservas de Quarto</h4>
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
                      <th>Quarto</th>
                      <th>Tipo de Quarto</th>
                      <th>Capacidade Quarto</th>
                      <th>Preço do Quarto</th>
                      <th>Status</th>
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
                            <td><?= $details['quarto'] ?></td>
                            <td><?= $details['tipo_quarto'] ?></td>
                            <td><?= $details['capacidade_quarto'] ?></td>
                            <td><?= $details['preco_quarto'] . " kz" ?></td>
                            <td><?= $details['status_quarto'] ?></td>
                            <td><?= $details['data_criacao_quarto'] ?></td>
                            <td class="text-center">
                              <a href="#" class="btn btn-primary btn-sm">
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