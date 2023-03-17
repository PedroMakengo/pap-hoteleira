<!-- =============================================== -->
<?php include "components/component-head.php" ?>
<!-- =============================================== -->

<!-- Listagem de usuários hospedes -->
<?php 
   $quartos = new Model();
   $listReservasQuartos= $quartos->EXE_QUERY("SELECT * FROM tb_reservas 
    INNER JOIN tb_quartos ON 
    tb_reservas.id_quarto=tb_quartos.id_quarto
    INNER JOIN tb_hospedes ON 
    tb_reservas.id_hospede=tb_hospedes.id_hospede");
?>
<!-- Listagem de usuários -->


<!-- Eliminar Usuário -->
<?php 
     if (isset($_GET['action']) && $_GET['action'] == 'delete'):
      $id = $_GET['id'];
      $parametros  =[
          ":id"=>$id
      ];
      $delete = new Model();
      $delete->EXE_NON_QUERY("DELETE FROM tb_hospedes WHERE id_hospede=:id", $parametros);
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
                window.location.href="usuarios.php?id=usuarios";
            }, 2000)
        </script>';
      else:
          echo "<script>window.alert('Operação falhou');</script>";
      endif;
  endif;
?>
<!-- Eliminar Usuário -->

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
                  <h4>Listagem de reservas de quartos</h4>
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
                          <th>Nome do Hospede</th>
                          <th>Mº Quarto</th>
                          <th>Comprovativo</th>
                          <th>Data Checkin</th>
                          <th>Data Checkout</th>
                          <th>Data Registro</th>
                          <th class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          if($listReservasQuartos):
                            foreach($listReservasQuartos as $details):
                            ?>
                              <tr>
                                <td><?= $details['id_reserva'] ?></td>
                                <td><?= $details['nome_hospede'] ?></td>
                                <td><?= $details['quarto'] ?></td>
                                <td><?= $details['comprovativo_reserva'] ?></td>
                                <td><?= $details['data_checkin_reserva'] ?></td>
                                <td><?= $details['data_checkout_reserva'] ?></td>
                                <td><?= $details['data_criacao_reserva'] ?></td>
                                <td class="text-center">
                                  <!-- Eliminar -->
                                  <a href="reservas.php?id=<?= $details['id_quarto'] ?>&action=delete" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash fs-xl opacity-60 me-2"></i>
                                  </a>
                                  <!-- Eliminar -->
                                </td>
                              </tr>
                            <?php 
                            endforeach;
                          else:  ?>
                            <tr>
                              <td colspan="12" class="text-center">Não existe usuário registrado</td>
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