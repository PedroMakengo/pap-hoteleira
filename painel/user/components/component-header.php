<!-- Header -->
<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
      <a class="navbar-brand logo" href="index.php?id=home">
        <img src="../../assets/images/logo.png" />
        Sistema de Gestão Hoteleiro
      </a>
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
              style="color: #000 !important"
              aria-expanded="false"
              >
              <span><?= $_SESSION['nome'] ?></span>
              <img
                src="../../assets/__storage/<?= $_SESSION['foto'] ?>"
                alt=""
                class="user-avatar-md rounded-circle"
            /></a>
            <div
              class="dropdown-menu dropdown-menu-right nav-user-dropdown"
              aria-labelledby="navbarDropdownMenuLink2"
            >
              <div class="nav-user-info">
                <h5 class="mb-0 text-white nav-user-name"><?= $_SESSION['nome'] ?></h5>
              </div>
              <a class="dropdown-item" href="?logout=true"
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
              <a class="nav-link <?= $_GET['id'] == 'home' ? 'active': '' ?>" href="index.php?id=home"
                ><i class="fa fa-fw fa-home"></i>Minhas Reservas
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $_GET['id'] == 'hotel' ? 'active': '' ?>" href="hotel.php?id=hotel"
                ><i class="fa fa-fw fa-file"></i>Hotéis
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $_GET['id'] == 'restaurante' ? 'active': '' ?>" href="restaurante.php?id=restaurante"
                ><i class="fa fa-fw fa-utensils"></i>Restaurantes
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $_GET['id'] == 'quartos' ? 'active': '' ?>" href="quartos.php?id=quartos"
                ><i class="fa fa-fw fa-file"></i>Quartos Disponíveis
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $_GET['id'] == 'perfil' ? 'active': '' ?>" href="perfil.php?id=perfil"
                ><i class="fa fa-fw fa-user"></i>Meu Perfil
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $_GET['id'] == 'notifications' ? 'active': '' ?>" href="notifications.php?id=notifications"
                ><i class="fa fa-fw fa-bell"></i>Notificações
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="?logout=true"
                ><i class="fa fa-fw fa-power-off"></i>Terminar Sessão
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>