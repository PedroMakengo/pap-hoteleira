<!-- Component Head -->
<?php require 'components/component-head.php' ?> 
<!-- Component Head -->

<?php 
  $parametros = [":id" => $_SESSION['id']];
  $listMesasUser = new Model();
  $listMesasRestaurantes = $listMesasUser->EXE_QUERY("SELECT * FROM tb_mesas 
  INNER JOIN tb_restaurante 
  ON tb_mesas.id_restaurante=tb_restaurante.id_restaurante
  WHERE tb_restaurante.id_hotel=:id", $parametros);
?>

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
                    <h4>Dados referente ao <?= $_GET['idUser'] ?></h4>
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
                
                <div class="row">
                  <div class="col-lg-12 p-4">
                    <form method="POST" enctype="multipart/form-data">
                      
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php endif;?>
        </div>
      </div>
    </div>

    <?php 

      if(isset($_POST['register-restaurante'])):

      endif;
    
    ?>

    <!-- Component Header -->
    <?php require 'components/component-footer.php' ?> 
    <!-- Component Header -->