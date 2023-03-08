
<!-- Component Head -->
<?php require 'components/component-head.php' ?> 
<!-- Component Head -->


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
                      <h4>Listagem de reservas</h4>
                    </div>
                    <div class="col-lg-6 text-right">
                      <a
                        href="register-quarto.html"
                        class="btn btn-primary btn-small"
                        >Nova Reserva</a
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
                              <th>Foto de capa</th>
                              <th>Título</th>
                              <th>Lidos</th>
                              <th class="text-center">Ações</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td><a href="#">Baixar agora</a></td>
                              <td>25</td>
                              <td>200kz</td>
                              <td class="text-center">
                                <a
                                  href="detalhe-fronteira.html"
                                  class="btn btn-primary btn-sm add-plus"
                                >
                                  <i class="bx bx-plus fs-xl opacity-60 me-2"></i>
                                </a>
                                <!-- Eliminar -->
                                <a href="#" class="btn btn-danger btn-sm add-plus">
                                  <i class="bx bx-trash fs-xl opacity-60 me-2"></i>
                                </a>
                                <!-- Eliminar -->
                              </td>
                            </tr>
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