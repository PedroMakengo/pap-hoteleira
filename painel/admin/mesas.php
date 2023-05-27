<!-- =============================================== -->
<?php include "components/component-head.php" ?>
<!-- =============================================== -->

<!-- Listagem de usuários hospedes -->
<?php 
   $mesas = new Model();
   $listMesasReservas= $mesas->EXE_QUERY("SELECT * FROM tb_mesas");
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
      $delete->EXE_NON_QUERY("DELETE FROM tb_mesas WHERE id_mesa=:id", $parametros);
      if($delete == true):

        //===================================================================================================================
        $today   =  Date('Y-m-d H:i:s');
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
                window.location.href="usuarios.php?id=usuarios";
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
                  <h4>Listagem de Mesas</h4>
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
                          <th>Cliente</th>
                          <th>Hotel</th>
                          <th>Mesa</th>
                          <th>Comprovativo</th>
                          <th>Status da Mesa</th>
                          <th>Data de Registro</th>
                          <th class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          if($listMesasReservas):
                            foreach($listMesasReservas as $details):
                            ?>
                              <tr>
                                <td><?= $details['id_mesa'] ?></td>
                                <td><?= $details['nome_mesa'] ?></td>
                                <td><?= $details['tipo_mesa'] ?></td>
                                <td><?= $details['preco_mesa'] . " kz" ?></td>
                                <td><?= $details['status_mesa'] ?></td>
                                <td><?= $details['descricao_mesa'] ?></td>
                                <td><?= $details['data_criacao_mesa'] ?></td>
                                <td class="text-center">
                                  <a href="mesas-restaurante.php?id=<?= $details['id_mesa'] ?>&action=delete" class="btn btn-danger btn-sm">
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