<!-- =============================================== -->
<?php include "components/component-head.php" ?>
<!-- =============================================== -->

<!-- Listagem de usuários hospedes -->
<?php 
   $restaurante = new Model();
   $listRestaurante = $restaurante->EXE_QUERY("SELECT * FROM tb_restaurante INNER JOIN tb_hotel ON 
    tb_restaurante.id_hotel=tb_hotel.id_hotel");
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
      $delete->EXE_NON_QUERY("DELETE FROM tb_restaurante WHERE id_restaurante=:id", $parametros);
      if($delete == true):
        //===================================================================================================================
        $today   =  Date('Y-m-d H:i:s');
        $nome    = $_SESSION['nome'];
        $action  = "eliminou";
        $textLog = "O usuário ". $nome. " ". $action . " um restaurante cujo o nome é ". $_GET['nomeRestaurante']. " em " . $today;
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
                  <h4>Listagem de restaurantes</h4>
                </div>
                <div class="col-lg-6 text-right">
                  <a href="../../public/relatorio.php?id=restaurante" class="btn btn-sm btn-info">Imprimir relatório</a>
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
                          <th>Nome do Hotel</th>
                          <th>Restaurante</th>
                          <th>Classificação</th>
                          <th>Número de Mesas</th>
                          <th class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 

                          if($listRestaurante):
                            foreach($listRestaurante as $details):
                            ?>
                              <tr>
                                <td><?= $details['id_restaurante'] ?></td>
                                <td><?= $details['nome_hotel'] ?></td>
                                <td><?= $details['nome_restaurante'] ?></td>
                                <td><?= $details['classificacao_restaurante'] ?></td>
                                <td><?= $details['num_mesas_restaurante'] ?></td>
                                <td class="text-center">
                                  <!-- Eliminar -->
                                  <a href="restaurantes.php?nomeRestaurante=<?= $details['nome_restaurante'] ?>&id=<?= $details['id_restaurante'] ?>&action=delete" class="btn btn-danger btn-sm">
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
        </div>
      </div>
      <!-- Container -->

    </div>

<!-- =============================================== -->
<?php include "components/component-footer.php" ?>
<!-- =============================================== -->