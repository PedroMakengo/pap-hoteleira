<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/global.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />
    <script defer src="https://unpkg.com/phosphor-icons"></script>
    <script defer src="./assets/js/scrollreveal.js"></script>
    <script defer src="./assets/js/main.js"></script>

    <title>Sistema de Gestão Hoteleira</title>
  </head>
  <body>
    <div id="container">
      <header id="header">
        <div class="header-top">
          <div class="logo">
            <a href="">
              <img src="./assets/images/logo.svg" alt="" />
            </a>
          </div>
          <nav>
            <ul class="menu">
              <li><a href="/" class="active">Home</a></li>
              <li><a href="#sobre">Sobre Nos</a></li>
              <li><a href="#quartos">Quartos</a></li>
              <li><a href="#restaurante">Restaurante</a></li>
              <li><a href="#contactos">Contacto</a></li>
            </ul>
          </nav>
          <a href="login.html" class="button">Iniciar Sessão</a>
        </div>
        <div class="header-cols">
          <div class="header-cols-a">
            <h1>Open the door for a spacious living -</h1>
          </div>
          <div class="headercols-b"></div>
        </div>
      </header>
      <main id="main">
        <section id="hotel-img">
          <img src="./assets/images/Rectangle.png" alt="" />
        </section>
        <!-- Section Banner-->
        <section id="banner">
          <div class="banner-content">
            <div class="banner-flex">
              <i class="ph-coffee-light"></i>
              <h3>Welcome drink</h3>
            </div>
            <div class="banner-flex">
              <i class="ph-car-simple-light"></i>
              <h3>Car Rental</h3>
            </div>
            <div class="banner-flex">
              <i class="ph-bank-light"></i>

              <h3>Resort & Spa</h3>
            </div>
            <div class="banner-flex">
              <i class="ph-wifi-high-light"></i>
              <h3>Free WIFI</h3>
            </div>
          </div>
        </section>
        <!-- Section Why-->
        <section id="why">
          <div class="why-header">
            <h2>Why You Shoud <span>Stay Here ?</span></h2>
            <p>
              Amet minim mollit non deserunt ullamco est sit aliqua dolor do
              amet sint. Velit officia consequat.
            </p>
          </div>
          <div class="why-cols">
            <div class="why-cols-a">
              <div class="why-cols-a-content">
                <i class="ph-number-one-bold"></i>
                <h3>Provide the best Choice of Room</h3>
                <p>
                  Amet minim mollit non deserunt ullamco est sit aliqua dolor do
                  amet sint. Velit officia consequat.
                </p>
              </div>

              <div class="why-cols-a-content">
                <i class="ph-number-two-bold"></i>
                <h3>Low price with Best Quality</h3>
                <p>
                  Amet minim mollit non deserunt ullamco est sit aliqua dolor do
                  amet sint. Velit officia consequat.
                </p>
              </div>

              <div class="why-cols-a-content">
                <i class="ph-number-three-bold"></i>
                <h3>Restaurant Service</h3>
                <p>
                  PAmet minim mollit non deserunt ullamco est sit aliqua dolor
                  do amet sint. Velit officia consequat.
                </p>
              </div>
            </div>
            <div class="why-cols-b">
              <img src="./assets/images/img03.svg" alt="" />
              <img
                src="./assets/images/img04.svg"
                class="absolute-image"
                alt=""
              />
            </div>
          </div>
        </section>
      </main>
      <footer id="footer">
        <div class="footer-content">
          <div class="link-footer">
            <h4 class="footer-content-title">Quick Link</h4>
            <nav class="footer-nav">
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Serviços</a></li>
                <li><a href="#">Sobre Nos</a></li>
                <li><a href="">Quartos</a></li>
                <li><a href="">Contacto</a></li>
              </ul>
            </nav>
          </div>

          <div class="reservations-footer">
            <h4 class="footer-content-title">Reservations</h4>
            <ul id="resevation-ul">
              <li>Tel:244 925 545</li>
              <li>Skype:breakdance</li>
              <li>reservations@breadance.com</li>
            </ul>
          </div>
          <div class="newsletter">
            <h4 class="footer-content-title">Newsletter</h4>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Molestias
            </p>
            <form action="" class="form-newletter">
              <input type="email" placeholder="Enter email" />
              <input type="submit" value="Subcribe" />
            </form>
          </div>
        </div>

        <div class="social-media">
          <ul class="social-media-links">
            <li>
              <a href=""><i class="ph-facebook-logo-light"></i></a>
            </li>
            <li>
              <a href=""><i class="ph-whatsapp-logo-light"></i></a>
            </li>
            <li>
              <a href=""><i class="ph-instagram-logo-light"></i></a>
            </li>
          </ul>
        </div>
      </footer>
    </div>
  </body>
</html>
