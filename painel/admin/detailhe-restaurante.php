<!-- =============================================== -->
<?php include "components/component-head.php" ?>
<!-- =============================================== -->

<!-- Listagem de Mesas do Restaurante -->
<?php 
   $parametros = [":id" => $_GET['userId']];
   $mesas = new Model();
   $listMesasRestaurantes = $mesas->EXE_QUERY("SELECT * FROM tb_mesas INNER JOIN 
   tb_restaurante ON tb_mesas.id_restaurante=tb_restaurante.id_restaurante WHERE tb_mesas.id_restaurante=:id
   ", $parametros);
?>
<!-- Listagem de Restaurante e Quartos -->

<!-- Eliminar Restaurante -->
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
<!-- Eliminar Restaurante -->

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
                  <h4 class="">Dados referente à <strong><?= $_GET['restaurante'] ?></strong></h4>
                </div>
                <div class="col-lg-12"><hr /></div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="table-responsive p-2 border bg-white">
                    <h4 class="pl-3">Listagem de Mesas</h4>
                     <table class="table" id="tabela">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nome da Mesa</th>
                          <th>Tipo de Mesa</th>
                          <th>Preço</th>
                          <th>Data de Registro</th>
                          <th class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          if($listMesasRestaurantes):
                            foreach($listMesasRestaurantes as $hotel):
                            ?>
                              <tr>
                                <td><?= $hotel['id_mesa'] ?></td>
                                <td><?= $hotel['nome_mesa'] ?></td>
                                <td><?= $hotel['tipo_mesa'] ?></td>
                                <td><?= $hotel['preco_mesa'] ?></td>
                                <td><?= $hotel['data_criacao_mesa'] ?></td>
                                <td class="text-center">
                                  <!-- Eliminar -->
                                  <a href="detailhe-hoteis.php?id=<?= $hotel['id_mesa'] ?>&action=delete" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash fs-xl opacity-60 me-2"></i>
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
        </div>
      </div>
      <!-- Container -->
    </div>

<!-- =============================================== -->
<?php include "components/component-footer.php" ?>
<!-- =============================================== -->