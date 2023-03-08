<!DOCTYPE html>
<html lang="pt-PT">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="../../assets/vendor/bootstrap/css/bootstrap.min.css"
    />
    <link
      href="../../assets/vendor/fonts/circular-std/style.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../assets/libs/css/style.css" />
    <link
      rel="stylesheet"
      href="../../assets/vendor/fonts/fontawesome/css/fontawesome-all.css"
    />

    <link
      rel="stylesheet"
      href="../../assets/vendor/fonts/flag-icon-css/flag-icon.min.css"
    />

    <link rel="stylesheet" href="../../assets/css/dashboard.css" />
    <title>Sistema de Gestão Hoteleira</title>
  </head>

  <body>
    <div class="dashboard-main-wrapper">
      <!-- Header -->
      <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
          <a class="navbar-brand logo" href="/">Sistema de Gestão Hoteleiro</a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
              <li class="nav-item dropdown nav-user">
                <a
                  class="nav-link nav-user-img"
                  href="#"
                  id="navbarDropdownMenuLink2"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  ><img
                    src="../../assets/avatar.jpg"
                    alt=""
                    class="user-avatar-md rounded-circle"
                /></a>
                <div
                  class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                  aria-labelledby="navbarDropdownMenuLink2"
                >
                  <div class="nav-user-info">
                    <h5 class="mb-0 text-white nav-user-name">Afonso Kiala</h5>
                  </div>
                  <a class="dropdown-item" href="#"
                    ><i class="fas fa-user mr-2"></i>Perfil</a
                  >
                  <a class="dropdown-item" href="#"
                    ><i class="fas fa-power-off mr-2"></i>Terminar Sessão</a
                  >
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>

      <!-- Sidebar -->
      <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="index.html">Dashboard</a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav flex-column">
                <li class="nav-divider">Menu</li>
                <li class="nav-item">
                  <a class="nav-link" href="index.html"
                    ><i class="fa fa-fw fa-user-circle"></i>Home
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="quartos.html"
                    ><i class="fa fa-fw fa-user-circle"></i>Quartos
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="reservas.html"
                    ><i class="fa fa-fw fa-user-circle"></i>Reservas
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="clientes.html"
                    ><i class="fa fa-fw fa-user-circle"></i>Clientes
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="graficos.html"
                    ><i class="fa fa-fw fa-user-circle"></i>Gráficos
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/login.html"
                    ><i class="fa fa-fw fa-user-circle"></i>Terminar Sessão
                  </a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>

      <!-- Container -->
      <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
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
        </div>
      </div>
    </div>

    <script src="../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../../assets/libs/js/main-js.js"></script>
    <script src="../../assets/libs/js/dashboard-ecommerce.js"></script>
    <script src="../../assets/js/template/Chart.min.js"></script>

    <script>
      $(function () {
        var lineChart = document.getElementById('mychart').getContext('2d')
        var myLineChart = new Chart(lineChart, {
          type: 'bar',
          data: {
            labels: [
              'Jan',
              'Feb',
              'Mar',
              'Apr',
              'May',
              'Jun',
              'Jul',
              'Aug',
              'Sep',
              'Oct',
              'Nov',
              'Dec',
            ],
            datasets: [
              {
                label: 'Gráfico Geral de Saída',
                borderColor: '#704828',
                pointBorderColor: '#704828',
                pointBackgroundColor: '#704828',
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: '#704828',
                fill: true,
                borderWidth: 2,
                data: [10, 20, 10, 10, 20, 50, 20, 10, 10, 10, 20, 50],
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
              position: 'bottom',
              labels: {
                padding: 10,
                fontColor: '#1f6feb',
              },
            },
            tooltips: {
              bodySpacing: 4,
              mode: 'nearest',
              intersect: 0,
              position: 'nearest',
              xPadding: 10,
              yPadding: 10,
              caretPadding: 10,
            },
            layout: {
              padding: { left: 15, right: 15, top: 15, bottom: 15 },
            },
          },
        })
      })
    </script>
  </body>
</html>
