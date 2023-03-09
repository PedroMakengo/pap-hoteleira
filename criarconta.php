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
    <title>Criar Conta</title>
  </head>
  <body>
    <div class="container">
      <section id="content-left">
        <div class="form-content">
          <h1>Criar Conta</h1>
          <form action="" id="form">
            <div class="field-input">
              <label for="name">
                Nome do Usuário
                <input type="text" id="name" placeholder="Insira seu nome" />
              </label>
            </div>
            <div class="field-input">
              <label for="email">
                Email
                <input type="email" id="email" placeholder="Insira seu email" />
              </label>
            </div>
            <div class="field-input">
              <label for="password">
                Senha
                <input
                  type="password"
                  id="password"
                  placeholder="Insira sua senha"
                />
              </label>
            </div>

            <div class="field-input">
              <label for="password">
                Confirme sua senha
                <input
                  type="password"
                  id="password"
                  placeholder="confirme sua senha"
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
              <input type="submit" name="" value="Entrar" class="submit" />
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
