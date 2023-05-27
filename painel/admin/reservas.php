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
    tb_reservas.id_hospede=tb_hospedes.id_hospede
    INNER JOIN tb_hotel ON 
    tb_quartos.id_hotel=tb_hotel.id_hotel
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
      $delete->EXE_NON_QUERY("DELETE FROM tb_reservas WHERE id_reserva=:id", $parametros);
      if($delete == true):
        //===================================================================================================================
        $today   =  Date('Y-m-d H:i:s');
        $nome    = $_SESSION['nome'];
        $action  = "eliminou";
        $textLog = "O usuário ". $nome. " ". $action . " uma reserva de quarto cujo o nome é ". $_GET['nomeQuarto'];
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
                <div class="col-lg-6 text-right">
                  <a href="../../public/relatorio.php?id=reservas-quarto" target="_blank" class="btn btn-sm btn-info">Imprimir relatório</a>
                </div>
                <div class="col-lg-12"><hr /></div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="table-responsive bg-white p-2">
                    <table class="table" id="tabela" style="width: 2220px !important">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nome do Hospede</th>
                          <th>Hotel</th>
                          <th>Quarto</th>
                          <th>Data Checkin</th>
                          <th>Data Checkout</th>
                          <th>Hora Checkin</th>
                          <th>Hora Checkout</th>
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
                                <td><?= $details['nome_hotel'] ?></td>
                                <td><?= $details['quarto'] ?></td>
                                <td><?= $details['data_checkin_reserva'] === "0000-00-00" ? "*": $details['data_checkin_reserva'] ?></td>
                                <td><?= $details['data_checkout_reserva'] === "0000-00-00"? "*": $details['data_checkout_reserva'] ?></td>
                                <td><?= $details['hora_checkin'] === "00:00:00"? "*": $details['hora_checkin'] ?></td>
                                <td><?= $details['hora_checkout'] === "00:00:00"? "*": $details['hora_checkout'] ?></td>
                                <td><?= $details['data_criacao_reserva'] ?></td>
                                <td class="text-center">
                                  <!-- Eliminar -->
                                  <a href="reservas.php?nomeQuarto=<?= $details['quarto'] ?>id=<?= $details['id_quarto'] ?>&action=delete" class="btn btn-danger btn-sm">
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