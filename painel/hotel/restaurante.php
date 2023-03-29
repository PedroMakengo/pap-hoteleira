<!-- Component Head -->
<?php require 'components/component-head.php' ?> 
<!-- Component Head -->

<!-- Buscando Dados de Restaurantes -->
<?php
  $parametros = [":id" => $_SESSION['id']];
  $listRestaurante = new Model();
  $listDetailsRestaurante = $listRestaurante->EXE_QUERY("SELECT * FROM 
  tb_restaurante WHERE id_hotel=:id", $parametros);
?> 
<!-- Component Head -->

<!-- Eliminar Quartos -->
<?php 
  if (isset($_GET['action']) && $_GET['action'] == 'delete'):
    $id = $_GET['id'];
    $parametros  =[
        ":id"=>$id
    ];
    $delete = new Model();
    $delete->EXE_NON_QUERY("DELETE FROM tb_restaurante WHERE id_restaurante=:id", $parametros);
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
              window.location.href="restaurante.php?id=restaurante";
          }, 1000)
      </script>';
    else:
        echo "<script>window.alert('Operação falhou');</script>";
    endif;
  endif;
?>
<!-- Eliminar Quartos -->


    <div class="dashboard-main-wrapper">
      <!-- Component Header -->
      <?php require 'components/component-header.php' ?> 
      <!-- Component Header -->

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
                    <h4>Listagem de restaurante</h4>
                  </div>
                  <div class="col-lg-6 text-right">
                  <a href="../../public/relatorio.php?id=hoteis" target="_blank" class="btn btn-sm btn-info">Imprimir relatório</a>
                    <a
                      href="register-restaurante.php?id=restaurante"
                      class="btn btn-primary btn-sm"
                      >Novo Restaurante</a
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
                            <th>Nome do Restaurante</th>
                            <th>Classificação</th>
                            <th>Número de Mesas</th>
                            <th>Data de Registro</th>
                            <th class="text-center">Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            if($listDetailsRestaurante):
                              foreach($listDetailsRestaurante as $details):
                              ?>
                                <tr>
                                  <td><?= $details['id_restaurante'] ?></td>
                                  <td><?= $details['nome_restaurante'] ?></td>
                                  <td><?= $details['classificacao_restaurante'] ?></td>
                                  <td><?= $details['num_mesas_restaurante'] ?></td>
                                  <td><?= $details['data_criacao_restaurante'] ?></td>
                                  <td class="text-center">
                                    <a href="register-mesa-restaurante.php?id=restaurante&idUser=<?= $details['id_restaurante'] ?>&nome=<?= $details['nome_restaurante'] ?>" class="btn btn-info btn-sm">
                                      <i class="fas fa-eye fs-xl opacity-60 me-2"></i>
                                    </a>
                                    <a href="#" class="btn btn-primary btn-sm">
                                      <i class="fas fa-edit fs-xl opacity-60 me-2"></i>
                                    </a>
                                    <!-- Eliminar -->
                                    <a href="restaurante.php?id=<?= $details['id_restaurante'] ?>&action=delete" class="btn btn-danger btn-sm">
                                      <i class="fas fa-trash fs-xl opacity-60 me-2"></i>
                                    </a>
                                    <!-- Eliminar -->
                                  </td>
                                </tr>
                              <?php 
                              endforeach;
                            else:  ?>
                              <tr>
                                <td colspan="12">Não existe nenhum registro</td>
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

    <!-- Component Header -->
    <?php require 'components/component-footer.php' ?> 
    <!-- Component Header -->