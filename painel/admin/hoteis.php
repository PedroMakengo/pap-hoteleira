<!-- =============================================== -->
<?php include "components/component-head.php" ?>
<!-- =============================================== -->

<!-- Listagem de Hotel -->
<?php 
   $hoteis = new Model();
   $listUserHoteis = $hoteis->EXE_QUERY("SELECT * FROM tb_hotel");
?>
<!-- Listagem de Hotel -->

<!-- Eliminar Hotel -->
<?php 
     if (isset($_GET['action']) && $_GET['action'] == 'delete'):
      $id = $_GET['id'];
      $parametros  =[
          ":id"=>$id
      ];
      $delete = new Model();
      $delete->EXE_NON_QUERY("DELETE FROM tb_hotel WHERE id_hotel=:id", $parametros);
      if($delete == true):
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
                window.location.href="hoteis.php?id=hoteis";
            }, 2000)
        </script>';
      else:
          echo "<script>window.alert('Operação falhou');</script>";
      endif;
  endif;
?>
<!-- Eliminar Hotel -->

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
                  <h4>Listagem de hotéis</h4>
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
                          <th>Nome</th>
                          <th>E-mail</th>
                          <th>Nif</th>
                          <th>Status</th>
                          <th class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          if($listUserHoteis):
                            foreach($listUserHoteis as $hotel):
                            ?>
                              <tr>
                                <td><?= $hotel['id_hotel'] ?></td>
                                <td><?= $hotel['nome_hotel'] ?></td>
                                <td><?= $hotel['email_hotel'] ?></td>
                                <td><?= $hotel['nif_hotel'] === "" ? "Por Preencher": $hotel['nif_hotel'] ?></td>
                                <td><?= $hotel['status_hotel'] ?></td>
                                <td class="text-center">
                                  <button class="btn btn-sm btn-info">Activar</button>
                                  <a href="detailhe-hoteis.php?id=hoteis&userId=<?= $hotel['id_hotel'] ?>&hotel=<?= $hotel['nome_hotel'] ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye fs-xl opacity-60 me-2"></i>
                                  </a>
                                  <!-- Eliminar -->
                                  <a href="hoteis.php?<?= $hotel['id_hotel'] ?>&action=delete" class="btn btn-danger btn-sm">
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