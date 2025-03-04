
<!-- Component Head -->
<?php require 'components/component-head.php' ?> 
<!-- Component Head -->

<!-- Buscando Dados de Reservas -->
<?php
  $parametros = [":id" => $_SESSION['id']];
  $listReservas = new Model();
  $listDetailsReservasQuartos = $listReservas->EXE_QUERY("SELECT * FROM tb_reservas INNER JOIN tb_quartos 
  ON tb_reservas.id_quarto=tb_quartos.id_quarto 
  INNER JOIN tb_hospedes ON tb_reservas.id_hospede=tb_hospedes.id_hospede
  WHERE tb_quartos.id_hotel=:id", $parametros);


// Analisando
$listDetailsReservasMesas = $listReservas->EXE_QUERY("SELECT * FROM 
  tb_mesa_reservas INNER JOIN tb_restaurante 
  ON tb_mesa_reservas.id_restaurante=tb_restaurante.id_restaurante
  INNER JOIN tb_hospedes ON tb_mesa_reservas.id_hospede=tb_hospedes.id_hospede 
  INNER JOIN tb_mesas ON tb_mesa_reservas.id_mesa=tb_mesas.id_mesa
  WHERE tb_restaurante.id_hotel=:id", $parametros)
?> 
<!-- Component Reservas -->

<!-- Eliminar Quartos -->
<?php 
  if (isset($_GET['action']) && $_GET['action'] == 'deleteQuarto'):
    $id = $_GET['id'];
    $parametros  =[
        ":id"=>$id
    ];
    $delete = new Model();
    $delete->EXE_NON_QUERY("DELETE FROM tb_reservas WHERE id_reserva=:id", $parametros);
    if($delete == true):
      // RESERVA QUARTO
      //===================================================================================================================
      $today   =  Date('Y-m-d');
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
              window.location.href="reservas.php?id=reservas";
          }, 1000)
      </script>';
    else:
        echo "<script>window.alert('Operação falhou');</script>";
    endif;
  endif;

  if (isset($_GET['action']) && $_GET['action'] == 'deleteMesa'):
    $id = $_GET['id'];
    $parametros  =[
        ":id"=>$id
    ];
    $delete = new Model();
    $delete->EXE_NON_QUERY("DELETE FROM tb_mesa_reservas WHERE id_reserva_mesa=:id", $parametros);
    if($delete == true):
      // RESERVA QUARTO
      //===================================================================================================================
      $today   =  Date('Y-m-d');
      $nome    = $_SESSION['nome'];
      $action  = "eliminou";
      $textLog = "O usuário ". $nome. " ". $action . " uma reserva de mesa cujo o nome é ". $_GET['nomeMesa'];
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
              window.location.href="reservas.php?id=reservas";
          }, 1000)
      </script>';
    else:
        echo "<script>window.alert('Operação falhou');</script>";
    endif;
  endif;
?>
<!-- Eliminar Quartos -->


    <div class="dashboard-main-wrapper">
      <!-- Component Header -->
      <?php require 'components/component-header.php' ?> 
      <!-- Component Header -->

      <!-- Container -->
      <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <?php if($userAuthVerify == true):?>
              <div class="container-fluid dashboard-content">
                <div class="ecommerce-widget">
                  <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="card">
                        <div class="card-header">
                          <h5 class="mb-0">Usuário inativo</h5>
                        </div>
                        <div class="card-body">
                          <p>É necessário aguardar pela ativação deste perfil por parte do administrador gerar do sistema
                            afim de poder usufruir das melhores funcionalidades que temos para si.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php else:?>
              <div class="container-fluid dashboard-content">
                <div class="ecommerce-widget bg-white p-5">
                  <div class="row mb-4">
                    <div class="col-lg-6">
                      <h4>Listagem de reservas</h4>
                    </div>
                    <div class="col-lg-6 text-right">
                      <a href="../../public/relatorio.php?id=minhas-reservas" target="_blank" class="btn btn-sm btn-info">Imprimir Reserva Quartos</a>
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
                                <!-- Tabela dos quartos reservados -->
                                <div class="table-responsive bg-white p-2" style="overflow-x: auto">
                                  <table class="table" id="tabela" style="width: 1400px !important">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Nome do Hospede</th>
                                        <th>Nº Quarto</th>
                                        <th>Estado</th>
                                        <th>Data Checkin</th>
                                        <th>Data Checkout</th>

                                        <th>Hora de Checkin</th>
                                        <th>Hora de Checkout</th>

                                        <th>Total de Horas</th>
                                        <th>Total de Dias</th>

                                        <th>Comprovativo</th>
                                        <th>Data de Registro</th>
                                        <th class="text-center">Ações</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                        if($listDetailsReservasQuartos):
                                          foreach($listDetailsReservasQuartos as $details):
                                          ?>
                                            <tr>
                                              <td><?= $details['id_reserva'] ?></td>
                                              <td><?= $details['nome_hospede'] ?></td>
                                              <td><?= $details['quarto'] ?></td>
                                              <td><?= $details['status_quarto_reserva'] ?></td>
                                              <td><?= $details['data_checkin_reserva'] === "0000-00-00" ? "*":  $details['data_checkin_reserva'] ?></td>
                                              <td><?= $details['data_checkout_reserva'] === "0000-00-00"? "*":  $details['data_checkout_reserva']?></td>
                                              <td><?= $details['hora_checkin']  === "00:00:00" ? "*": $details['hora_checkin'] ?></td>
                                              <td><?= $details['hora_checkout'] === "00:00:00" ? "*": $details['hora_checkout'] ?></td>
                                              <td><?= $details['total_horas'] === 0 ? "*":  $details['total_horas'] ?></td>
                                              <td><?= $details['total_noites'] === 0 ? "*": $details['total_noites']?></td>
                                              <td>
                                                <object data="../../assets/__storage/<?= $details['comprovativo_reserva'] ?>" type="application/x-pdf" title="Comprovativo">
                                                  <a href="../../assets/__storage/<?= $details['comprovativo_reserva'] ?>" class="text-dark" target="_blank">
                                                    <p>
                                                      Comprovativo
                                                    </p>
                                                  </a>
                                                </object>
                                              </td>
                                              <td><?= $details['data_criacao_reserva'] ?></td>
                                              <td class="text-center">
                                                <!-- Fazer -->
                                                <?php if($details['status_quarto_reserva'] == 'Por verificar'): ?>
                                                <form method="POST">
                                                  <button class="btn btn-success btn-sm" title="Validar reserva quarto" name="<?= $aprovarReserva = 'aprovarReserva' . $details['id_reserva'] ?>">
                                                    <i class="fas fas fa-check opacity-60 me-2"></i>
                                                  </button>

                                                  <?php 
                                                    if(isset($_POST[$aprovarReserva])):
                                                      $parametros = [
                                                        ":id_reserva"     => $details["id_reserva"],
                                                        ":statusReserva"  => "Reservado"
                                                      ];
                                                      $imovelAtualizar = new Model();
                                                      $imovelAtualizar->EXE_NON_QUERY("UPDATE tb_reservas SET status_quarto_reserva=:statusReserva
                                                      WHERE id_reserva=:id_reserva", $parametros);

                                                      if($imovelAtualizar):

                                                        // Informar ao hotel quando o usuário faz uma reserva
                                                        //===================================================================================================================
                                                        $today   =  Date('Y-m-d');
                                                        $id      = $_SESSION['id'];
                                                        $action  = "confirmado";
                                                        $textLog = $details['nome_hospede']. " a sua reserva foi ". $action . " com sucesso no quarto " . $details['quarto'];

                                                        $parametros = [
                                                          ":id"          => $id, 
                                                          ":nomeHospede" => $details['nome_hospede'],
                                                          ":actionLog"   => $action, 
                                                          ":textLog"     => $textLog,
                                                          ":idReserva"   => $details['id_reserva'],
                                                          ":idQuarto"    => $details['id_quarto']
                                                        ];

                                                        $insertLog = new Model();
                                                        $insertLog->EXE_NON_QUERY("INSERT INTO tb_historico_reserva 
                                                        (id_hotel, usuario_historico, action_historico, historico, data_historico, id_reserva, id_quarto) 
                                                        VALUES (:id, :nomeHospede,  :actionLog, :textLog, now(), :idReserva, :idQuarto)", $parametros);
                                                      //===================================================================================================================

                                                        echo '<script> 
                                                              swal({
                                                                title: "Reserva Validado!",
                                                                text: "Reservado do Quarto Validado com sucesso",
                                                                icon: "success",
                                                                button: "Fechar!",
                                                              })
                                                            </script>';
                                                        echo '<script>
                                                          setTimeout(function() {
                                                              window.location.href="reservas.php?id=reservas";
                                                          }, 2000)
                                                        </script>';
                                                      endif;
                                                    endif;
                                                  ?>
                                                </form>
                                                <?php else:?>
                                                <button class="btn btn-info btn-sm" disabled title="Validar reserva quarto">
                                                  <i class="fas fas fa-check opacity-60 me-2"></i>
                                                </button>
                                                <?php endif;?>
                                                <!-- Fazer -->
                                                
                                                <!-- Eliminar -->
                                                <a href="reservas.php?nomeQuarto=<?= $details['tipo_quarto'] ?>&id=<?= $details['id_reserva'] ?>&action=deleteQuarto" class="btn btn-danger btn-sm">
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
                                <!-- Tabela dos quartos reservados -->
                              </div>

                              <div class="tab-pane fade" id="outline-two" role="tabpanel" aria-labelledby="tab-outline-two">
                                  <!-- Tabela das Mesas reservados -->
                                  <div class="table-responsive bg-white p-2" >
                                    <table class="table" id="tabela1" >
                                      <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>Cliente</th>
                                          <th>Restaurante</th>
                                          <th>Mesa</th>
                                          <th>Preço</th>
                                          <th>Comprovativo</th>
                                          <th>Data de Registro</th>
                                          <th class="text-center">Ações</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php 
                                          if($listDetailsReservasMesas):
                                            foreach($listDetailsReservasMesas as $details):
                                            ?>
                                              <tr>
                                                <td><?= $details['id_reserva_mesa'] ?></td>
                                                <td><?= $details['nome_hospede'] ?></td>
                                                <td><?= $details['nome_restaurante'] ?></td>
                                                <td><?= $details['nome_mesa'] ?></td>
                                                <td><?= $details['preco_mesa'] ?></td>
                                                <td>
                                                  <object data="../../assets/__storage/<?= $details['comprovativo_mesa_reserva'] ?>" type="application/x-pdf" title="Comprovativo">
                                                    <a href="../../assets/__storage/<?= $details['comprovativo_mesa_reserva'] ?>" class="text-dark" target="_blank">
                                                      <p>
                                                        Comprovativo
                                                      </p>
                                                    </a>
                                                  </object>
                                                </td>
                                                <td><?= $details['data_criacao_mesa_reserva'] ?></td>
                                                <td class="text-center">
                                                  <!-- Eliminar -->
                                                  <a href="reservas.php?nomeMesa=<?= $details['nome_mesa'] ?>&id=<?= $details['id_reserva_mesa'] ?>&action=deleteMesa" class="btn btn-danger btn-sm">
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
                                  <!-- Tabela das Mesas reservados -->
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif;?>
        </div>
      </div>
    </div>

<!-- Component Header -->
<?php require 'components/component-footer.php' ?> 
<!-- Component Header -->