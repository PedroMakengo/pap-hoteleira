<!-- Component Head -->
<?php require 'components/component-head.php' ?> 
<!-- Component Head -->

<!-- Buscando Dados de Hospedes que fizeram uma reserva -->
<?php
  $parametros = [":id" => $_SESSION['id']];
  $listHospedes = new Model();
  $listDetailsHospedes = $listHospedes->EXE_QUERY("SELECT * FROM tb_reservas INNER JOIN tb_quartos 
  ON tb_reservas.id_quarto=tb_quartos.id_quarto 
  INNER JOIN tb_hospedes ON tb_reservas.id_hospede=tb_hospedes.id_hospede
  WHERE tb_quartos.id_hotel=:id", $parametros);

?>

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
          <?php else: ?> 
          <div class="container-fluid dashboard-content">
            <div class="ecommerce-widget bg-white p-5">
              <div class="row mb-4">
                <div class="col-lg-6">
                  <h4>Listagem de Clientes</h4>
                </div>
                <div class="col-lg-6 text-right"></div>

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
                          <th>E-mail</th>
                          <th>Genero</th>
                          <th>Data de Registro</th>
                          <th class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          if($listDetailsHospedes):
                            foreach($listDetailsHospedes as $details):
                            ?>
                              <tr>
                                <td><?= $details['id_hospede'] ?></td>
                                <td><?= $details['nome_hospede'] ?></td>
                                <td><?= $details['email_hospede'] ?></td>
                                <td><?= $details['genero_hospedes'] == "M" ? "Masculino":"Feminino" ?></td>
                                <td><?= $details['data_criacao_reserva'] ?></td>
                                <td class="text-center">
                                  <!-- Eliminar -->
                                  <a href="restaurante.php?<?= $details['id_reserva'] ?>&action=delete" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye fs-xl opacity-60 me-2"></i>
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
                </div>
              </div>
            </div>
          </div>
          <?php endif; ?> 
        </div>
      </div>
    </div>

<!-- Component Head -->
<?php require 'components/component-footer.php' ?> 
<!-- Component Head -->