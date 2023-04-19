<!-- Component Head -->
<?php require 'components/component-head.php' ?> 
<!-- Component Head -->

<!-- Component Buscando daddos de todos quartos -->
<?php
  $listQuartos = new Model();
  $listDetailsQuartos = $listQuartos->EXE_QUERY("SELECT * FROM tb_cardapio 
  INNER JOIN tb_restaurante ON 
  tb_cardapio.id_restaurante=tb_restaurante.id_restaurante");
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
    $delete->EXE_NON_QUERY("DELETE FROM tb_cardapio WHERE id_cardapio=:id", $parametros);
    if($delete == true):

      //===================================================================================================================
      $today   =  Date('Y-m-d');
      $nome    = $_SESSION['nome'];
      $action  = "eliminou";
      $textLog = "O usuário ". $nome. " ". $action . " um cardapio cujo o nome é ". $_GET['nomeCardapio'];
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
        <div class="container-fluid dashboard-content">
              <div class="ecommerce-widget bg-white p-5">
                <div class="row mb-4">
                  <div class="col-lg-6">
                    <h4>Listagem de Cardapio</h4>
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
                            <th>Restaurante</th>
                            <th>Comida</th>
                            <th>Bebida</th>
                            <th>Preço Comida</th>
                            <th>Preço Bebida</th>
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
                                  <td><?= $details['id_cardapio'] ?></td>
                                  <td><?= $details['nome_restaurante'] ?></td>
                                  <td><?= $details['comida'] ?></td>
                                  <td><?= $details['bebida'] ?></td>
                                  <td><?= $details['preco_comida'] ?></td>
                                  <td><?= $details['preco_bebida'] ?></td>
                                  <td><?= $details['data_registro_cardapio'] ?></td>
                                  <td class="text-center">
                                    <a href="cardapio.php?nomeCardapio=<?= $details['comida'] ?>&id=<?= $details['id_cardapio'] ?>&action=delete" class="btn btn-danger btn-sm">
                                      <i class="fas fa-trash fs-xl opacity-60 me-2"></i>
                                    </a>
                                    <!-- Eliminar -->
                                  </td>
                                </tr>
                              <?php 
                              endforeach;
                            else:  ?>
                              <tr>
                                <td colspan="12">Não existe registro</td>
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
    </div>

<!-- Component Footer -->
<?php require 'components/component-footer.php' ?> 
<!-- Component Footer -->
