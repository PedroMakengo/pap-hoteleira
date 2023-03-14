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
  </head>
  <body>
    <div class="container">
      <section id="content-left">
        <div class="form-content">
          <h1>Criar Conta</h1>
          <form method="POST" id="form">
            <div class="field-input">
              <label for="name">
                Nome do Usuário
                <input type="text" name="nome" id="name" required placeholder="Insira seu nome" />
              </label>
            </div>
            <div class="field-input">
              <label for="email">
                Email
                <input type="email" name="email" id="email" required placeholder="Insira seu email" />
              </label>
            </div>
            <div class="field-input">
              <label for="password">
                Senha
                <input
                  type="password"
                  id="password"
                  name="senha"
                  required
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
              <input type="submit" name="criarconta" value="Criar conta" class="submit" />
            </div>
            <div class="count">
              <div class="forgot-password">
                <p>Tens uma conta ? <a href="login.php">Login</a></p>
              </div>
            </div>
          </form>
        </div>
      </section>
      <section id="content-right"></section>
    </div>
  </body>
</html>

<!-- =============================================== -->
<?php include "source/controllers/CriarUserHospede.php" ?>
<!-- =============================================== -->