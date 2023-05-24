<!-- Component Head -->
<?php require 'components/component-head.php' ?> 
<!-- Component Head -->

<!-- Component Buscando daddos de todos quartos -->
<?php
  $parametros = [":id" => $_SESSION['id']];
  $listQuartos = new Model();
  $listDetailsQuartos = $listQuartos->EXE_QUERY("SELECT * FROM tb_mesas 
  INNER JOIN tb_restaurante ON 
  tb_mesas.id_restaurante=tb_restaurante.id_restaurante 
  WHERE tb_restaurante.id_hotel=:id", $parametros);
?> 
<!-- Component -->

<!-- Eliminar Quartos -->
<?php 
    if (isset($_GET['action']) && $_GET['action'] == 'delete'):
    $id = $_GET['id'];
    $parametros  =[
        ":id"=>$id
    ];
    $delete = new Model();
    $delete->EXE_NON_QUERY("DELETE FROM tb_mesas WHERE id_mesa=:id", $parametros);
    if($delete == true):

      //===================================================================================================================
      $today   =  Date('Y-m-d H:i:s');
      $nome    = $_SESSION['nome'];
      $action  = "eliminou";
      $textLog = "O usuário ". $nome. " ". $action . " um quarto cujo o nome é ". $_GET['nomeMesa'];
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
              window.location.href="mesas-restaurante.php?id=mesas";
          }, 1000)
      </script>';
    else:
        echo "<script>window.alert('Operação falhou');</script>";
    endif;
endif;
?>
<!-- Eliminar Quartos -->


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
                    <h4>Listagem de Mesas</h4>
                  </div>
                  <div class="col-lg-6 text-right">
                    <a href="../../public/relatorio.php?id=minhas-mesas" target="_blank" class="btn btn-sm btn-info">Imprimir relatório</a>
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
                            <th>Mesa</th>
                            <th>Tipo</th>
                            <th>Preço da Mesa</th>
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
                                  <td><?= $details['id_mesa'] ?></td>
                                  <td><?= $details['nome_mesa'] ?></td>
                                  <td><?= $details['tipo_mesa'] ?></td>
                                  <td><?= $details['preco_mesa'] . " kz" ?></td>
                                  <td><?= $details['status_mesa'] ?></td>
                                  <td><?= $details['data_criacao_mesa'] ?></td>
                                  <td class="text-center">
                                    <a href="editar-mesas.php?nome=<?= $details['nome_mesa'] ?>&id=mesas&idUser=<?= $details['id_mesa'] ?>&action=delete" class="btn btn-primary btn-sm">
                                      <i class="fas fa-edit fs-xl opacity-60 me-2"></i>
                                    </a>
                                    <a href="mesas-restaurante.php?nomeMesa=<?= $details['nome_mesa'] ?>&id=<?= $details['id_mesa'] ?>&action=delete" class="btn btn-danger btn-sm">
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
