<!-- Component Head -->
<?php require 'components/component-head.php' ?> 
<!-- Component Head -->


<!-- Funcional Count -->
<?php 
  $parametros = [":id" => $_SESSION['id']];
  $count = new Model();

  $quartosCount = $count->EXE_QUERY("SELECT * FROM tb_quartos 
  WHERE id_hotel=:id", $parametros);

  $reservasCountQuarto = $count->EXE_QUERY("SELECT * FROM tb_reservas
    INNER JOIN tb_quartos ON tb_reservas.id_quarto=tb_quartos.id_quarto WHERE
    tb_quartos.id_hotel=:id", $parametros);

  $reservasCountMesas = $count->EXE_QUERY("SELECT * FROM tb_mesa_reservas
    INNER JOIN tb_restaurante ON 
    tb_mesa_reservas.id_restaurante=tb_restaurante.id_restaurante
    INNER JOIN tb_hotel ON 
    tb_restaurante.id_hotel=tb_hotel.id_hotel 
    WHERE tb_hotel.id_hotel=:id", $parametros);

  $restaurantesCount = $count->EXE_QUERY("SELECT * FROM tb_restaurante WHERE id_hotel=:id", $parametros);

  $totalHospedesCount = $count->EXE_QUERY("SELECT DISTINCT 
  * FROM  tb_hospedes 
  INNER JOIN tb_reservas ON 
  tb_hospedes.id_hospede=tb_reservas.id_hospede 
  INNER JOIN tb_quartos ON 
  tb_reservas.id_quarto=tb_quartos.id_quarto 
  WHERE tb_quartos.id_quarto=:id
  GROUP BY tb_reservas.id_hospede
  ", $parametros);
?>
<!-- Count -->

<div class="dashboard-main-wrapper">
  <!-- Component Header -->
  <?php 
    require 'components/component-header.php';
  ?>
  <!-- Component Header -->

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
      <!-- Container -->
      <div class="container-fluid dashboard-content">
        <div class="ecommerce-widget">
          <div class="row">

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
              <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                  <h5 class="text-muted">Quartos</h5>
                  <div class="metric-value d-inline-block">
                    <h1 class="mb-1"><?= count($quartosCount) ?></h1>
                  </div>
                  <div
                    class="metric-label d-inline-block float-right text-success font-weight-bold"
                  >
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
              <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                  <h5 class="text-muted">Total de Restaurante</h5>
                  <div class="metric-value d-inline-block">
                    <h1 class="mb-1"><?= count($restaurantesCount) ?></h1>
                  </div>
                  <div
                    class="metric-label d-inline-block float-right text-success font-weight-bold"
                  >
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
              <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                  <h5 class="text-muted">Reservas de Quarto</h5>
                  <div class="metric-value d-inline-block">
                    <h1 class="mb-1"><?= count($reservasCountQuarto) ?></h1>
                  </div>
                  <div
                    class="metric-label d-inline-block float-right text-success font-weight-bold"
                  >
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
              <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                  <h5 class="text-muted">Reserva Mesas</h5>
                  <div class="metric-value d-inline-block">
                    <h1 class="mb-1"><?= count($reservasCountMesas) ?></h1>
                  </div>
                  <div
                    class="metric-label d-inline-block float-right text-success font-weight-bold"
                  >
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
              <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                  <h5 class="text-muted">Total de Hospedes</h5>
                  <div class="metric-value d-inline-block">
                    <h1 class="mb-1"><?= count($totalHospedesCount) ?></h1>
                  </div>
                  <div
                    class="metric-label d-inline-block float-right text-success font-weight-bold"
                  >
                  </div>
                </div>
              </div>
            </div>

           

          </div>

          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="mb-0">Registro Mensal de Reservas de Quartos</h5>
                </div>
                <div class="card-body">
                  <div class="charts mt-2">
                    <canvas id="mychart" ></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="mb-0">Registro Mensal de Reservas de Mesas</h5>
                </div>
                <div class="card-body">
                   <div class="charts mt-2">
                    <canvas id="mesas" ></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endif;?>
     </div>
  </div>
</div>


<!-- Component Footer -->
<?php require 'components/component-footer-index.php' ?> 
<!-- Component Footer -->