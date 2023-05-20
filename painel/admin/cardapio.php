<!-- Component Head -->
<?php require 'components/component-head.php' ?> 
<!-- Component Head -->

<!-- Component Buscando daddos de todos quartos -->
<?php
  $listQuartos = new Model();
  $listDetailsQuartos = $listQuartos->EXE_QUERY("SELECT * FROM tb_cardapios 
  INNER JOIN tb_restaurante ON 
  tb_cardapios.id_restaurante=tb_restaurante.id_restaurante");
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
    $delete->EXE_NON_QUERY("DELETE FROM tb_cardapios WHERE id_cardapio=:id", $parametros);
    if($delete == true):

      //===================================================================================================================
      $today   =  Date('Y-m-d H:i:s');
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
              window.location.href="cardapio.php?id=cardapio";
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
                            <th>Cardápio 1</th>
                            <th>Cardápio 2</th>
                            <th>Cardápio 3</th>
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
                                  <td>
                                    <object data="../../assets/__storage/<?= $details['foto_um'] ?>" type="application/x-pdf" title="Comprovativo">
                                      <a href="../../assets/__storage/<?= $details['foto_um'] ?>" class="text-dark" target="_blank">
                                        <p>
                                          Cardápio 1
                                        </p>
                                      </a>
                                    </object>
                                  </td>
                                  <td>
                                    <object data="../../assets/__storage/<?= $details['foto_dois'] ?>" type="application/x-pdf" title="Comprovativo">
                                      <a href="../../assets/__storage/<?= $details['foto_dois'] ?>" class="text-dark" target="_blank">
                                        <p>
                                         Cardápio 2
                                        </p>
                                      </a>
                                    </object>
                                  </td>
                                  <td>
                                    <object data="../../assets/__storage/<?= $details['foto_tres'] ?>" type="application/x-pdf" title="Comprovativo">
                                      <a href="../../assets/__storage/<?= $details['foto_tres'] ?>" class="text-dark" target="_blank">
                                        <p>
                                          Cardápio 3
                                        </p>
                                      </a>
                                    </object>
                                  </td>
                                  <td><?= $details['data_registro_cardapio'] ?></td>
                                  <td class="text-center">
                                    <a href="cardapio.php?nomeCardapio=<?= $details['foto_um'] ?>&id=<?= $details['id_cardapio'] ?>&action=delete" class="btn btn-danger btn-sm">
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
