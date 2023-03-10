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
    <title>Sistema de Gestão Hoteleira</title>
    <link rel="stylesheet" href="./assets/css/global.css" />
    <link rel="stylesheet" href="./assets/css/cadastro.css" />
  </head>
 
  <body>
    <div class="container">
      <section class="content-left">
        <div class="form-content">
          <h1>Cadastro de Hotel</h1>
          <form action="">
            <div class="form-flex">
              <div class="form-flex-left">
                <div class="field-input">
                  <label for="name">
                    Nome
                    <input
                      type="text"
                      id="name"
                      placeholder="Insira seu nome"
                    />
                  </label>
                </div>

                <div class="field-input">
                  <label for="email">
                    Email
                    <input
                      type="email"
                      id="email"
                      placeholder="Insira seu email"
                    />
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
                  <label for="status">
                    Status
                    <input
                      type="text"
                      id="status"
                      placeholder="confirme sua senha"
                    />
                  </label>
                </div>
              </div>

              <div class="form-flex-right">
                <div class="field-input">
                  <label for="nif">
                    NIF
                    <input
                      type="text"
                      id="nif"
                      placeholder="digite o seu nif"
                    />
                  </label>
                </div>

                <div class="field-input">
                  <label for="enreco">
                    Endereço
                    <input
                      type="text"
                      id="endereco"
                      placeholder="confirme sua senha"
                    />
                  </label>
                </div>


                <div class="field-input">
                  <label for="cidade">
                    Cidade
                    <input
                      type="text"
                      id="cidade"
                      placeholder="confirme sua senha"
                    />
                  </label>
                </div>
                
                <div class="field-input">
                  <label for="file">
                    Foto
                    <input class="file"
                      type="file"
                      id="file"
                      placeholder="confirme sua senha"
                    />
                  </label>
                </div>
              </div>
             
            </div>
           
            <div class="field-input">
              <label for="area"> Descrição
              <textarea name="" id="area" resize='none'></textarea>
            </label>
            </div>
            <div class="field-input">
              <input type="submit" name="" value="Cadastrar" class="submit" />
            </div>
          </form>
        </div>
      </section>
      <section class="content-right"></section>
    </div>
  </body>
</html>
