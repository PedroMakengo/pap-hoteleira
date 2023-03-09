
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


$listDetailsReservasMesas = $listReservas->EXE_QUERY("SELECT * FROM 
  tb_mesa_reservas INNER JOIN tb_restaurante 
  ON tb_mesa_reservas.id_restaurante=tb_restaurante.id_restaurante
  INNER JOIN tb_hospedes ON tb_mesa_reservas.id_hospede=tb_hospedes.id_hospede 
  INNER JOIN tb_mesas ON tb_mesa_reservas.id_mesa=tb_mesas.id_mesa
  WHERE tb_restaurante.id_hotel=:id", $parametros)
?> 
<!-- Component Reservas -->


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
                      <!-- <a
                        href="register-quarto.html"
                        class="btn btn-primary btn-small"
                        >Nova Reserva</a
                      > -->
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
                                <div class="table-responsive bg-white p-2">
                                  <table class="table" id="tabela">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Nome do Hospede</th>
                                        <th>Quarto</th>
                                        <th>Data Checkin</th>
                                        <th>Data Checkout</th>
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
                                              <td><?= $details['tipo_quarto'] ?></td>
                                              <td><?= $details['data_checkin_reserva'] ?></td>
                                              <td><?= $details['data_checkout_reserva'] ?></td>
                                              <td><?= $details['comprovativo_reserva'] ?></td>
                                              <td><?= $details['data_criacao_reserva'] ?></td>
                                              <td class="text-center">
                                                <a href="#" class="btn btn-primary btn-sm">
                                                  <i class="fas fa-edit fs-xl opacity-60 me-2"></i>
                                                </a>
                                                <!-- Eliminar -->
                                                <a href="restaurante.php?<?= $details['id_reserva'] ?>&action=delete" class="btn btn-danger btn-sm">
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
                                <!-- Tabela dos quartos reservados -->
                              </div>

                              <div class="tab-pane fade" id="outline-two" role="tabpanel" aria-labelledby="tab-outline-two">
                                  <!-- Tabela das Mesas reservados -->
                                  <div class="table-responsive bg-white p-2">
                                    <table class="table" id="tabela1">
                                      <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>Nome do Cliente</th>
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
                                                <td><?= $details['comprovativo_mesa_reserva'] ?></td>
                                                <td><?= $details['data_criacao_mesa_reserva'] ?></td>
                                                <td class="text-center">
                                                  <a href="#" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit fs-xl opacity-60 me-2"></i>
                                                  </a>
                                                  <!-- Eliminar -->
                                                  <a href="reservas.php?<?= $details['id_reserva_mesa'] ?>&action=delete" class="btn btn-danger btn-sm">
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