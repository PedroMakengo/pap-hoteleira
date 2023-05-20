<!-- =============================================== -->
<?php include "components/component-head.php" ?>
<!-- =============================================== -->

<!-- Listagem de usuários hospedes -->
<?php 
   $parametros = [":nome" => $_SESSION['nome']];
   $logs = new Model();
   $listLogs = $logs->EXE_QUERY("SELECT * FROM tb_comentarios
    INNER JOIN tb_hotel ON 
    tb_comentarios.id_hotel=tb_hotel.id_hotel
    WHERE nome=:nome", $parametros);
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
      $delete->EXE_NON_QUERY("DELETE FROM tb_comentarios WHERE id_comentario=:id", $parametros);
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
                window.location.href="comentario.php?id=comentario";
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
                  <h4>Meus Comentários</h4>
                </div>
                <div class="col-lg-6 text-right">
                   <a
                      href="register-comentario.php?id=comentario"
                      class="btn btn-primary btn-sm"
                      >Novo Comentário</a
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
        </div>
      </div>
      <!-- Container -->

    </div>

<!-- =============================================== -->
<?php include "components/component-footer.php" ?>
<!-- =============================================== -->