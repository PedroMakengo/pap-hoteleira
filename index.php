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
          
        <div class="hamburger">
          <div class="line"></div>
          <div class="line"></div>
          <div class="line"></div>
         </div>

          <nav class='nav-bar'>
            <ul>
              <li><a href="/" class="active">Home</a></li>
              <li><a href="#about">Sobre Nos</a></li>
              <li><a href="#hotel">Hoteis</a></li>
              <li><a href="#rooms">Quartos</a></li>
              <li><a href="#restaurante">Restaurante</a></li>
            </ul>
            <div>
            <a href="login.php" class="button">Criar Conta</a>
            <a href="login.php" class="button">Iniciar Sessão</a>
          </div>
         </nav>
         
        </div>

        <div class="header-cols">
          <div class="header-cols-a">
            <h1>Encontre um hotel 5 estrelas -</h1>
          </div>
        </div>
      </header>
      <main id="main">

        <!-- Section Hotel -->
        <section id="hotel-img">
          <img src="./assets/images/Rectangle.png" alt="" />
        </section>

        <!-- Section Banner-->
        <section id="banner">
          <div class="banner-content">
            <div class="banner-flex">
              <i class="ph-coffee-light"></i>
              <h3>Melhores bebidas</h3>
            </div>
            <div class="banner-flex">
              <i class="ph-car-simple-light"></i>
              <h3>Parque de Estacionamento</h3>
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

        <!-- Section Services -->
        <section id="services">
          <div class="services-content">
          <div class="services-header">
            <h4>What we do</h4>
            <h2>Discover Our Services</h2>
            <p>
              Amet minim mollit non deserunt ullamco est sit aliqua dolor do
              amet sint. Velit officia consequat.
            </p>
          </div>
          <div class="services-cards">
            <div class="service-card">
              <i class="ph-airplane-light"></i>
              <h2 class="services-subtitle">Travel Plan</h2>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna
              </p>
            </div>

            <div class="service-card">
              <i class="ph-fork-knife-light"></i>
              <h2 class="services-subtitle">Catering Service</h2>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna
              </p>
            </div>

            <div class="service-card">
              <i class="ph-bed-light"></i>
              <h2 class="services-subtitle">Babysitting</h2>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna
              </p>
            </div>

            <div class="service-card">
              <i class="ph-coat-hanger-light"></i>
              <h2 class="services-subtitle">Laundry</h2>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna
              </p>
            </div>

            <div class="service-card">
              <i class="ph-airplane-light"></i>
              <h2 class="services-subtitle">Hire Driver</h2>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna
              </p>
            </div>

            <div class="service-card">
              <i class="ph-martini-light"></i>
              <h2 class="services-subtitle">Bar & Drink</h2>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna
              </p>
            </div>
          </div>
          </div>
        </section>

        <!-- Section About -->
        <section id="about">
          <div class="about-cols">
            <div class="about-col-a">
              <h2>About Us</h2>
              <p>
                Amet minim mollit non deserunt ullamco est sit aliqua dolor do
                amet sint. Velit officia consequatduis enim.
              </p>
              <p>
                Amet minim mollit non deserunt ullamco est sit aliqua dolor do
              </p>
              <button>Explore</button>
            </div>
            <div class="about-col-b">
              <img
                src="./assets/images/about-image.svg"
                alt="imagem de restaurante"
              />
            </div>
          </div>
        </section>

        <!-- Section Rooms -->
        <section id="rooms">
          <div class="rooms-header">
            <h4>Our Room</h4>
            <h2>A World of <span>Choice</span></h2>
            <p>
              Amet minim mollit non deserunt ullamco est sit aliqua dolor do
              amet sint. Velit officia consequat.
            </p>
          </div>

          <div class="rooms-grid">

            <div class="rooms-left">
              <div class="room">
                <img src="./assets/images/room01.png" alt="" />
                <h5>3 GUEST</h5>
                <p>Room with View</p>
              </div>

              <div class="room">
                <img src="./assets/images/room02.png" alt="" />
                <h5>3 GUEST</h5>
                <p>Room with View</p>
              </div>
            </div>
            <div class="rooms-middle">
           
            <div class="room">
              <img src="./assets/images/room03.png" alt="" />
              <h5>3 GUEST</h5>
              <p>Room with View</p>
            </div>

           </div>


            <div class="rooms-right">
              <div class="room">
                <img src="./assets/images/room04.png" alt="" />
                <h5>3 GUEST</h5>
                <p>Room with View</p>
              </div>

              <div class="room">
                <img src="./assets/images/room05.png" alt="" />
                <h5>3 GUEST</h5>
                <p>Room with View</p>
              </div>
            
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
