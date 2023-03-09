<!-- Component Head -->
<?php require 'components/component-head.php' ?> 
<!-- Component Head -->

<!-- Component Head -->
<?php
  $parametros = [":id" => $_SESSION['id']];
  $listQuartos = new Model();
  $listDetailsQuartos = $listQuartos->EXE_QUERY("SELECT * FROM tb_quartos WHERE id_hotel=:id", $parametros);
?> 
<!-- Component Head -->


    <div class="dashboard-main-wrapper">
    <!-- Component Head -->
    <?php require 'components/component-header.php' ?> 
    <!-- Component Head -->

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
                    <h4>Listagem de Quartos</h4>
                  </div>
                  <div class="col-lg-6 text-right">
                    <a
                      href="register-quarto.php?id=quartos"
                      class="btn btn-primary btn-small"
                      >Novo Quarto</a
                    >
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
                            if($listDetailsQuartos):
                              foreach($listDetailsQuartos as $details):
                              ?>
                                <tr>
                                  <td><?= $details['id_quarto'] ?></td>
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
                                    <a href="quartos.php?<?= $details['id_quarto'] ?>&action=delete" class="btn btn-danger btn-sm">
                                      <i class="fas fa-trash fs-xl opacity-60 me-2"></i>
                                    </a>
                                    <!-- Eliminar -->
                                  </td>
                                </tr>
                              <?php 
                              endforeach;
                            else:  ?>
                              <tr>
                                <td>Não existe usuário registrado</td>
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
          <?php endif;?>
        </div>
      </div>
    </div>

<!-- Component Footer -->
<?php require 'components/component-footer.php' ?> 
<!-- Component Footer -->
