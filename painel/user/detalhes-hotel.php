<!-- Component Head -->
<?php require 'components/component-head.php' ?>
<!-- Component Head -->

<?php
  $parametros = [":id" => $_GET['userId']];
  $listHotel = new Model();
  $listDetailsHoteisQuartos = $listHotel->EXE_QUERY("SELECT * FROM tb_quartos WHERE id_hotel=:id", $parametros);


  $listDetailsRestaurante = $listHotel->EXE_QUERY("SELECT * FROM tb_restaurante WHERE id_hotel=:id", $parametros);
?> 

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
              <h3>Detalhes do Hotel <strong><?= $_GET['userHotel'] ?></strong> </h3>
            </div>
            <div class="col-lg-12"><hr /></div>

            <div class="col-lg-12">
              <div class="tab-outline">
                  <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" id="tab-outline-one" data-toggle="tab" href="#outline-one" role="tab" aria-controls="home" aria-selected="true">Quartos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-outline-two" data-toggle="tab" href="#outline-two" role="tab" aria-controls="profile" aria-selected="false">Restaurantes</a>
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
                                if($listDetailsHoteisQuartos):
                                  foreach($listDetailsHoteisQuartos as $details):
                                  ?>
                                    <tr>
                                      <td><?= $details['id_quarto'] ?></td>
                                      <td><?= $details['quarto'] ?></td>
                                      <td><?= $details['tipo_quarto'] ?></td>
                                      <td><?= $details['capacidade_quarto'] ?></td>
                                      <td><?= $details['preco_quarto'] . " kz" ?></td>
                                      <td><?= $details['status_quarto'] ?></td>
                                      <td><?= $details['data_criacao_quarto'] ?></td>
                                      <td class="text-center">
                                        <a title="Efetuar uma reserva" href="register-reserva.php?id=hotel&userId=<?= $details['id_quarto'] ?>" class="btn btn-primary btn-sm">
                                          <i class="fas fa-eye fs-xl opacity-60 me-2"></i>
                                        </a>
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
                        <!-- Tabela dos quartos reservados -->
                      </div>

                      <div class="tab-pane fade" id="outline-two" role="tabpanel" aria-labelledby="tab-outline-two">
                          <!-- Tabela das Mesas reservados -->
                          <div class="table-responsive bg-white p-2" >
                            <table class="table" id="tabela1" >
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nome de Restaurante</th>
                                  <th>Classificação</th>
                                  <th>Nº de Mesas</th>
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
                                        <td><?= $details['id_restaurante'] ?></td>
                                        <td><?= $details['nome_restaurante'] ?></td>
                                        <td><?= $details['classificacao_restaurante'] ?></td>
                                        <td><?= $details['num_mesas_restaurante'] ?></td>
                                        <td><?= $details['data_criacao_restaurante'] ?></td>
                                        <td class="text-center">
                                          <a title="Efetuar uma reserva" href="detalhes-restaurante.php?id=hotel&userId=<?= $details['id_restaurante'] ?>" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye fs-xl opacity-60 me-2"></i>
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
</div>

<!-- Component Footer -->
<?php require 'components/component-footer-reserva.php' ?>
<!-- Component Footer -->