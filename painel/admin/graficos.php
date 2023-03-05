<!-- =============================================== -->
<?php include "components/component-head.php" ?>
<!-- =============================================== -->

    <div class="dashboard-main-wrapper">
      <!-- =============================================== -->
      <?php include "components/component-header.php" ?>
      <!-- =============================================== -->

      <!-- Container -->
      <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
          <div class="container-fluid dashboard-content">
            <div class="ecommerce-widget">
              <div class="row">
                <div class="col-lg-12 mt-2">
                  <div class="card p-4">
                    <div class="rounded borda-top">
                      <h4 class="title">
                        Gráfico Mensal de registro de usuário
                      </h4>
                      <hr />
                      <div class="charts mt-2">
                        <canvas id="mychart" style="height: 250px"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 mt-2">
                  <div class="card p-4">
                    <div class="rounded borda-top">
                      <h4 class="title">Gráfico Mensal de Hotéis</h4>
                      <hr />
                      <div class="charts mt-2">
                        <canvas id="saida" style="height: 250px"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mt-2">
                  <div class="card p-4">
                    <div class="rounded borda-top">
                      <h4 class="title">Usuário por Género</h4>
                      <hr />
                      <div class="charts mt-2">
                        <canvas id="genero" style="height: 250px"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- fronteira -->
                <div class="col-lg-6 mt-2">
                  <div class="card p-4">
                    <div class="rounded borda-top">
                      <h4 class="title">Gráfico de Reservas</h4>
                      <hr />
                      <div class="charts mt-2">
                        <canvas id="fronteira" style="height: 250px"></canvas>
                      </div>
                    </div>
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
<?php include "components/component-footer-grafico.php" ?>
<!-- =============================================== -->