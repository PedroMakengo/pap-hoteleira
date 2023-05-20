<!-- Component Head -->
<?php require 'components/component-head.php' ?> 
<!-- Component Head -->

<!-- Buscando Dados de Hospedes que fizeram uma reserva -->
<!-- Listagem de usuários hospedes -->
<?php 
   $parametros = [":id" => $_SESSION['id']];
   $logs = new Model();
   $listLogs = $logs->EXE_QUERY("SELECT * FROM tb_comentarios
    INNER JOIN tb_hotel ON 
    tb_comentarios.id_hotel=tb_hotel.id_hotel
    WHERE tb_hotel.id_hotel=:id", $parametros);
?>
<!-- Listagem de usuários -->

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
                          <th>Hotel</th>
                          <th>Comentario</th>
                          <th>Data</th>
                          <th class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          if($listLogs):
                            foreach($listLogs as $details):
                            ?>
                              <tr>
                                <td><?= $details['id_comentario'] ?></td>
                                <td><?= $details['nome_hotel'] ?></td>
                                <td><?= $details['comentario'] ?></td>
                                <td><?= $details['data_registro_comentario'] ?></td>
                                <td class="text-center">
                                  <a href="comentario.php?id=<?= $details['id_comentario'] ?>&action=delete" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash fs-xl opacity-60 me-2"></i>
                                  </a>
                                 
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
          <?php endif; ?> 
        </div>
      </div>
    </div>

<!-- Component Head -->
<?php require 'components/component-footer.php' ?> 
<!-- Component Head -->