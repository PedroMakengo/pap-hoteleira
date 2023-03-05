<!-- =============================================== -->
<?php include "components/component-head.php" ?>
<!-- =============================================== -->
  
<div class="dashboard-main-wrapper">

  <!-- ====================== -->
  <?php include "components/component-header.php" ?>
  <!-- ====================== -->

  <!-- Container -->
  <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
      <div class="container-fluid dashboard-content">
        <div class="ecommerce-widget">
          <div class="row">
            <!-- ============================================================== -->
            <!-- sales  -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
              <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                  <h5 class="text-muted">Hoteis</h5>
                  <div class="metric-value d-inline-block">
                    <h1 class="mb-1">0</h1>
                  </div>
                  <div
                    class="metric-label d-inline-block float-right text-success font-weight-bold"
                  >
                  </div>
                </div>
              </div>
            </div>
            <!-- ============================================================== -->
            <!-- end sales  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- new customer  -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
              <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                  <h5 class="text-muted">Restaurantes</h5>
                  <div class="metric-value d-inline-block">
                    <h1 class="mb-1">0</h1>
                  </div>
                  <div
                    class="metric-label d-inline-block float-right text-success font-weight-bold"
                  >
                  </div>
                </div>
              </div>
            </div>
            <!-- ============================================================== -->
            <!-- end new customer  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- visitor  -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
              <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                  <h5 class="text-muted">Usuários</h5>
                  <div class="metric-value d-inline-block">
                    <h1 class="mb-1">0</h1>
                  </div>
                  <div
                    class="metric-label d-inline-block float-right text-success font-weight-bold"
                  >
                  </div>
                </div>
              </div>
            </div>
            <!-- ============================================================== -->
            <!-- end visitor  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- total orders  -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
              <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                  <h5 class="text-muted">Reservas</h5>
                  <div class="metric-value d-inline-block">
                    <h1 class="mb-1">0</h1>
                  </div>
                  <div
                    class="metric-label d-inline-block float-right text-danger font-weight-bold"
                  >
                  </div>
                </div>
              </div>
            </div>
            <!-- ============================================================== -->
            <!-- end total orders  -->
            <!-- ============================================================== -->
          </div>

          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="mb-0">Registro Mensal de Usuários</h5>
                </div>
                <div class="card-body">
                  <div class="charts mt-2">
                    <canvas id="mychart" style="height: 350px"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
   
<!-- =============================================== -->
<?php include "components/component-footer-index.php" ?>
<!-- =============================================== -->