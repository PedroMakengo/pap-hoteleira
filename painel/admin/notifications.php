<!-- =============================================== -->
<?php include "components/component-head.php" ?>
<!-- =============================================== -->

<!-- Listagem de usuários hospedes -->
<?php 
   $logs = new Model();
   $listLogs = $logs->EXE_QUERY("SELECT * FROM tb_logs");
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
      $delete->EXE_NON_QUERY("DELETE FROM tb_logs WHERE id_log=:id", $parametros);
      if($delete == true):
        // INSERT LOG ========================================================
        $today =  Date('Y-m-d');
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
                  <h4>Listagem de todas as ocorrências no sistema</h4>
                </div>
                <div class="col-lg-6 text-right">
                  <a href="../../public/relatorio.php?id=ocorrencia" class="btn btn-sm btn-info">Imprimir relatório</a>
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
                          <th>Acção</th>
                          <th>Ocorrência</th>
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
                                <td><?= $details['id_log'] ?></td>
                                <td><?= $details['user_log'] ?></td>
                                <td><?= $details['action_log'] ?></td>
                                <td><?= $details['text_log'] ?></td>
                                <td><?= $details['data_log'] ?></td>
                                <td class="text-center">
                                  <!-- Eliminar -->
                                  <a href="notifications.php?id=<?= $details['id_log'] ?>&action=delete" class="btn btn-danger btn-sm">
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