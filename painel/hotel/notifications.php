<!-- =============================================== -->
<?php include "components/component-head.php" ?>
<!-- =============================================== -->

<!-- Listagem de usuários hospedes -->
<?php 
   $parametros = [":id" => $_SESSION['id']];
   $logs = new Model();
   $listLogs = $logs->EXE_QUERY("SELECT * FROM tb_historico_reserva WHERE id_hotel=:id", $parametros);
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
      $delete->EXE_NON_QUERY("DELETE FROM tb_historico_reserva WHERE id_log=:id", $parametros);
      if($delete == true):
        // INSERT LOG ========================================================
        $today =  Date('Y-m-d H:i:s');
        $nome = $_SESSION['nome'];
        $action = "eliminou";
        $textLog = "O usuário ". $nome. " ". $action . " um log em" . $today;
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
        // ===================================================================
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
                window.location.href="notifications.php?id=notifications";
            }, 2000)
        </script>';
      else:
          echo "<script>window.alert('Operação falhou');</script>";
      endif;
  endif;
?>
<!-- Eliminar Usuário -->





<!-- Inserir assim que a data do checkout passar -->
<?php 
    $parametros = [":id" => $_SESSION['id']];
    $buscandoReservaQuarto = new Model();
    $quartoDesteHotel = $buscandoReservaQuarto->EXE_QUERY("SELECT * FROM tb_reservas 
    INNER JOIN tb_quartos 
    ON tb_reservas.id_quarto=tb_quartos.id_quarto
    INNER JOIN tb_hospedes 
    ON tb_reservas.id_hospede=tb_hospedes.id_hospede
    WHERE tb_quartos.id_hotel=:id", $parametros);

    if($quartoDesteHotel):
      // Inserir no historico a situação da reserva
      foreach($quartoDesteHotel as $details):
        $dataCheckout = $details['data_checkout_reserva'];
        $nomeHospede  = $details['nome_hospede'];
        $idReserva    = $details['id_reserva']; 
        $idQuarto     = $details['id_quarto'];
      endforeach;

      $date = Date("Y-m-d");

      $dataCheckoutSelected = new DateTime(date($dataCheckout));
      $dataAtualFormatada = new DateTime(date($date));
      $differenceDate = $dataAtualFormatada->diff($dataCheckoutSelected)->days;

      if($differenceDate === 3):
        // Faltam 3 dias para a tua reserva terminar...
        $parametros = [
          ":id"               =>  $_SESSION['id'],
          ":nome"             => $nomeHospede,
          ":idReserva"        => $idReserva
        ];  
        $buscandoReservaRecente = new Model();
        $buscando = $buscandoReservaRecente->EXE_QUERY("SELECT * FROM tb_historico_reserva WHERE
          id_hotel=:id AND usuario_historico=:nome AND id_reserva=:idReserva LIMIT 1", $parametros);
        if(count($buscando)):
          echo " Makengo ";
          //===================================================================================================================            $today   =  Date('Y-m-d');
          $id    = $_SESSION['id'];
          $action  = "prazo de hospedagem";
          $textLog = $nomeHospede. " ". $action . " termina em 3 dia ";
          $parametros = [
            ":id"     => $id, 
            ":nomeHospede" => $nomeHospede,
            ":actionLog"   => $action, 
            ":textLog"  => $textLog  
          ];
          $insertLog = new Model();
          $insertLog->EXE_NON_QUERY("INSERT INTO tb_historico_reserva 
          (id_hotel, usuario_historico, action_historico, historico, data_historico) 
          VALUES (:id, :nomeHospede,  :actionLog, :textLog, now()) ", $parametros);
          //===================================================================================================================
        endif;
      else:
        $parametros = [
          ":id"               =>  $_SESSION['id'],
          ":nome"             => $nomeHospede,
          ":idReserva"        => $idReserva,
          ":idQuarto"         => $idQuarto
        ];  
        $buscandoReservaRecente = new Model();
        $buscando = $buscandoReservaRecente->EXE_QUERY("SELECT * FROM tb_historico_reserva WHERE
          id_hotel=:id AND usuario_historico=:nome AND id_reserva=:idReserva AND id_quarto=:idQuarto", $parametros);

        // Atualizar o estado da reserva do usuário
        if(count($buscando)):
          //===================================================================================================================
          $today   =  Date('Y-m-d');
          $id    = $_SESSION['id'];
          $action  = "prazo terminado";
          $textLog = $nomeHospede. " Opps o teu ". $action . " ";
          $parametros = [
            ":id"     => $id, 
            ":nomeHospede" => $nomeHospede,
            ":actionLog"   => $action, 
            ":textLog"  => $textLog  
          ];
          $insertLog = new Model();
          $insertLog->EXE_NON_QUERY("INSERT INTO tb_historico_reserva 
          (id_hotel, usuario_historico, action_historico, historico, data_historico) 
          VALUES (:id, :nomeHospede,  :actionLog, :textLog, now()) ", $parametros);
          //===================================================================================================================
        else:
          echo "Testando" . count($buscando);
        endif;
      endif;
    endif;
  ?>
  <!--  -->




    <div class="dashboard-main-wrapper">
      <!-- =============================================== -->
      <?php //include "components/component-header.php" ?>
      <!-- =============================================== -->

      <!-- Container -->
      <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
          <div class="container-fluid dashboard-content">
            <div class="ecommerce-widget bg-white p-5">
              <div class="row mb-4">
                <div class="col-lg-6">
                  <h4>Notificações</h4>
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
                          <th>Usuário</th>
                          <th>Ocorrência</th>
                          <th>Histórico</th>
                          <th>Data</th>
                          <!-- <th class="text-center">Ações</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          if($listLogs):
                            foreach($listLogs as $details):
                            ?>
                              <tr>
                                <td><?= $details['id_historico'] ?></td>
                                <td><?= $details['usuario_historico'] ?></td>
                                <td><?= $details['action_historico'] ?></td>
                                <td><?= $details['historico'] ?></td>
                                <td><?= $details['data_historico'] ?></td>
                                <!-- <td class="text-center">
                                  <a href="notifications.php?id=<?= $details['id_historico'] ?>&action=delete" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash fs-xl opacity-60 me-2"></i>
                                  </a>
                                </td> -->
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