<!-- =============================================== -->
<?php include "components/component-head.php" ?>
<!-- =============================================== -->

    <div class="dashboard-main-wrapper">
      <!-- =============================================== -->
      <?php include "components/component-header.php" ?>
      <!-- =============================================== -->
     
      <!-- Container -->
      <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
          <div class="container-fluid dashboard-content">
            <div class="ecommerce-widget bg-white p-5">
              <div class="row mb-4">
                <div class="col-lg-6">
                  <h4>Formulário de registro de um hotel</h4>
                </div>
                <div class="col-lg-12"><hr /></div>
              </div>
              <div class="row">
                <form method="POST" class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label for="">Nome Hotel:</label>
                        <input
                          type="text"
                          id="name"
                          name="nome"
                          pattern="[A-Za-z\s]+"
                          required
                          placeholder="Insira seu nome"
                          class="form-control form-control-lg"
                        />
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="">NIF:</label>
                        <input
                          type="text"
                          class="form-control form-control-lg"
                          id="bi" 
                          required 
                          name="nif" 
                          placeholder="digite o seu nif"
                          maxlength="16"
                          minlength="16"
                        />
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input
                          class="form-control form-control-lg"
                          type="email"
                          id="email"
                          name="email"
                          required
                          placeholder="Insira seu email"
                          pattern="^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
                        />
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="endereco">Endereço:</label>
                        <input
                          type="text"
                          class="form-control form-control-lg"
                          id="endereco"
                          name="endereco"
                          required
                          placeholder="Insira o seu endereço"
                        />
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="cidade">Cidade:</label>
                        <input
                          type="text"
                          class="form-control form-control-lg"
                          id="cidade"
                          name="cidade"
                          required
                          placeholder="ex: Luanda"
                        />
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="password">Senha:</label>
                        <input
                          class="form-control form-control-lg"
                          type="password"
                          id="password"
                          name="senha"
                          required
                          placeholder="Insira sua senha"
                        />
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="password">Confirmar senha:</label>
                        <input
                          class="form-control form-control-lg"
                          type="password"
                          id="password"
                          name="confirmarSenha"
                          required
                          placeholder="Confirme a sua senha"
                        />
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="iban">Iban:</label>
                        <input
                          class="form-control form-control-lg"
                          type="text"
                          id="iban"
                          name="iban"
                          required
                          placeholder="Iban"
                          maxlength="26"
                          minlength="26"
                        />
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3">
                      <input
                        type="submit"
                        value="Registrar"
                        class="form-control form-control-lg btn-primary"
                        name="accountHotel" value="Cadastrar" class="submit"
                      />
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Container -->

    </div>

<!-- =============================================== -->
<?php include "components/component-footer.php" ?>
<!-- =============================================== -->

<?php include "../../source/controllers/CriarUserHotel.php" ?>
