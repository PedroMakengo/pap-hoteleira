<!-- Component Head -->
<?php require 'components/component-head.php' ?> 
<!-- Component Head -->

    <div class="dashboard-main-wrapper">
     <!-- Component Head -->
     <?php require 'components/component-header.php' ?> 
     <!-- Component Head -->

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
                  <h4>Por definir</h4>
                </div>
                <div class="col-lg-6 text-right"></div>
                <div class="col-lg-12"><hr /></div>
              </div>
            </div>
          </div>
          <?php endif;?>
        </div>
      </div>
    </div>

<!-- Component Head -->
<?php require 'components/component-footer.php' ?> 
<!-- Component Head -->