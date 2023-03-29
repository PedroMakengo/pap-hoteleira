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
          <h1>Recupere a sua senha</h1>
          <form method="POST" id="form">
            <div class="field-input">
              <label for="name">
                <input type="text" id="name" name="nome" placeholder="Insira seu nome" />
              </label>
            </div>
            <div class="field-input">
              <label for="email">
                <input type="email" id="email" name="email" placeholder="Insira seu e-mail" />
              </label>
            </div>
            <div class="field-input">
              <label for="tel">
                <input type="tel" id="tel" name="tel" placeholder="Insira seu nº telefone" />
              </label>
            </div>
            <div class="field-input">
              <label for="password">
                <input
                  type="password"
                  name="password"
                  id="password"
                  placeholder="Nova senha"
                />
              </label>
            </div>
            <div class="field-input">
              <label for="password">
                <input
                  type="password"
                  name="confirmedPassword"
                  id="password"
                  placeholder="Confirme a sua nova senha"
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
              <input type="submit" name="recuperar-senha" value="Recuperar senha" class="submit" />
            </div>
            <div class="count">
              <div class="forgot-password">
                <p>
                  Iniciar uma sesão <a href="login.php">Login</a>
                </p>
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
<?php include "source/controllers/Login.php" ?>
<!-- =============================================== -->

<?php 

  if(isset($_POST['recuperar-senha'])):
    $nome = $_POST['nome'];
    $tel  = $_POST['tel'];
    $email = $_POST['email'];

    // Parametros
    $parametros = [
      ":nome"  => $nome, 
      ":tel"   => $tel,
      ":email" => $email  
    ];

    $buscarUsuario = new Model();
    $newUserHospede = $buscarUsuario->EXE_QUERY("SELECT * FROM tb_hospedes WHERE 
     email_hospede=:email AND telefone_hospede=:tel AND nome_hospede=:nome
    ", $parametros);

    // Verificando se existe um hospede com estes dados
    if($newUserHospede):
      // Atualizar a senha
      if(md5(md5($_POST['password'])) === md5(md5($_POST['confirmedPassword']))) {
        $parametros = [
          ":nome"  => $nome, 
          ":tel"   => $tel,
          ":email" => $email,
          ":senha" => md5(md5($_POST['password']))
        ];
        $senhaAtualizado = new Model();
        $senhaAtualizado->EXE_NON_QUERY("UPDATE tb_hospedes SET
          senha_hospede=:senha
          WHERE nome_hospede=:nome AND telefone_hospede=:tel AND email_hospede=:email", $parametros);

          if($senhaAtualizado):
            echo '<script> 
              swal({
                title: "Senha atualizado!",
                text: "Está tudo funcional",
                icon: "success",
                button: "Fechar!",
              })
            </script>';
            echo '<script>
                  setTimeout(function() {
                      window.location.href="login.php";
                  }, 2000)
              </script>';
          endif;
      }else {
        echo '<script>
              swal({
                title: "Opps!",
                text: "As tuas senhas não são iguais"
                icon: "error",
                button: "Fechar!",
              })
            </script>';
      }
    else:
      // Para os hoteis 
      $newUserHotel = $buscarUsuario->EXE_QUERY("SELECT * FROM tb_hotel WHERE 
      nome_hotel=:nome AND email_hotel=:email AND tel_hotel=:tel", $parametros);

      if($newUserHotel):
        if(md5(md5($_POST['password'])) === md5(md5($_POST['confirmedPassword']))) {
          $parametros = [
            ":nome"  => $nome, 
            ":tel"   => $tel,
            ":email" => $email,
            ":senha" => md5(md5($_POST['password']))
          ];
          $senhaAtualizado = new Model();
          $senhaAtualizado->EXE_NON_QUERY("UPDATE tb_hotel SET
            senha_hotel=:senha
            WHERE nome_hotel=:nome AND telefone_hotel=:tel AND email_hotel=:email", $parametros);
  
            if($senhaAtualizado):
              echo '<script> 
                swal({
                  title: "Senha atualizado!",
                  text: "Está tudo funcional",
                  icon: "success",
                  button: "Fechar!",
                })
              </script>';
              echo '<script>
                    setTimeout(function() {
                        window.location.href="login.php";
                    }, 2000)
                </script>';
            endif;
        }else {
          echo '<script>
                swal({
                  title: "Opps!",
                  text: "As tuas senhas não são iguais"
                  icon: "error",
                  button: "Fechar!",
                })
              </script>';
        }
      endif;
    endif;
  endif;

?>