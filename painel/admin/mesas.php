<!-- =============================================== -->
<?php include "components/component-head.php" ?>
<!-- =============================================== -->

<!-- Listagem de usuários hospedes -->
<?php 
   $mesas = new Model();
   $listMesasReservas= $mesas->EXE_QUERY("SELECT * FROM tb_mesa_reservas 
    INNER JOIN tb_mesas ON 
    tb_mesa_reservas.id_mesa=tb_mesas.id_mesa 
    INNER JOIN tb_restaurante ON 
    tb_mesas.id_restaurante=tb_restaurante.id_restaurante 
    INNER JOIN tb_hotel ON 
    tb_restaurante.id_hotel=tb_hotel.id_hotel
    INNER JOIN tb_hospedes ON 
    tb_mesa_reservas.id_hospede=tb_hospedes.id_hospede
   ");
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
                  <h4>Listagem de Mesas</h4>
                </div>
                <div class="col-lg-6 text-right">
                  <a href="#" class="btn btn-sm btn-info">Imprimir relatório</a>
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
                          <th>Cliente</th>
                          <th>Hotel</th>
                          <th>Mesa</th>
                          <th>Comprovativo</th>
                          <th>Status da Mesa</th>
                          <th>Data de Registro</th>
                          <th class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          if($listMesasReservas):
                            foreach($listMesasReservas as $details):
                            ?>
                              <tr>
                                <td><?= $details['id_reserva_mesa'] ?></td>
                                <td><?= $details['nome_hospede'] ?></td>
                                <td><?= $details['nome_hotel'] ?></td>
                                <td><?= $details['nome_mesa'] ?></td>
                                <td><?= $details['comprovativo_mesa_reserva'] ?></td>
                                <td><?= $details['status_mesa_reserva'] ?></td>
                                <td><?= $details['data_criacao_mesa_reserva'] ?></td>
                                <td class="text-center">
                                  <!-- Eliminar -->
                                  <a href="mesas.php?id=<?= $details['id_reserva_mesa'] ?>&action=delete" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash fs-xl opacity-60 me-2"></i>
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
      <!-- Container -->

    </div>

<!-- =============================================== -->
<?php include "components/component-footer.php" ?>
<!-- =============================================== -->