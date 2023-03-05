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
        <a class="d-xl-none d-lg-none" href="index.php">Dashboard</a>
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
              <a class="nav-link <?= $_GET['id'] == 'home' ? 'active': '' ?>" href="index.php?id=home"
                ><i class="fa fa-fw fa-user-circle"></i>Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $_GET['id'] == 'hoteis' ? 'active': '' ?>" href="hoteis.php?id=hoteis"
                ><i class="fa fa-fw fa-user-circle"></i>Hotéis
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $_GET['id'] == 'restaurantes' ? 'active': '' ?>" href="restaurantes.php?id=restaurantes"
                ><i class="fa fa-fw fa-user-circle"></i>Restaurantes
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $_GET['id'] == 'usuarios' ? 'active': '' ?>" href="usuarios.php?id=usuarios"
                ><i class="fa fa-fw fa-user-circle"></i>Usuários
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $_GET['id'] == 'reservas' ? 'active': '' ?>" href="reservas.php?id=reservas"
                ><i class="fa fa-fw fa-user-circle"></i>Reservas
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $_GET['id'] == 'graficos' ? 'active': '' ?>" href="graficos.php?id=graficos"
                ><i class="fa fa-fw fa-user-circle"></i>Gráficos
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?logout=true"
                ><i class="fa fa-fw fa-user-circle"></i>Terminar Sessão
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <!-- Header -->