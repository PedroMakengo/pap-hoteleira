<?php
  require 'source/model/Config.php';
  require 'source/model/Model.php';
 session_start();
?>

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
    <link rel="stylesheet" href="./assets/css/loginCount.css" />

    <title>Sistema de Gestão Hoteleira</title>
    <script src="./assets/js/template/sweetalert.min.js"></script>

    <style>
      .form-content a {
        display: flex;
        align-items: center;
        justify-content: center;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <section id="content-left">
        <div class="form-content">
          <a href="index.php">
            <img src="assets/images/logo.png" />
          </a>
          <h1>Entrar no sistema</h1>
          <form method="POST" id="form">
            <div class="field-input">
              <label for="name">
                Nome
                <input type="text" id="name" name="nome" pattern="[A-Za-z\s]+"  placeholder="Insira seu nome" />
              </label>
            </div>
            
            <div class="field-input">
              <label for="password">
                Palavra-Passe
                <input
                  type="password"
                  name="password"
                  id="password"
                  placeholder="Insira sua senha"
                />
              </label>
            </div>
            <!--
            <div class="field-input check">
              <input type="checkbox" id="chk" name="" />
              <label for="chk" class="switch">
              
              <span class="slider"></span>
              </label>
              <p>Rember-me</p>
            </div>
            -->
            <div class="field-input">
              <input type="submit" name="login" value="Entrar" class="submit" />
            </div>
            <div class="count">
              <div class="forgot-password">
                <p>
                  Tens uma conta ? <a href="criarconta.php">Criar Conta</a>
                </p>
              </div>
              <a href="recuperar-senha.php">Recuperar Senha</a>
            </div>
          </form>
        </div>
      </section>
      <section id="content-right"></section>
    </div>
  </body>
</html>

<!-- =============================================== -->
<?php include "source/controllers/Login.php" ?>
<!-- =============================================== -->