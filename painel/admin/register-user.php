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
               <div class="col-lg-12">
               <form method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" class="form-control" name="foto">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="">Nome Completo</label>
                        <input type="text" class="form-control" name="nome">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="email" class="form-control" name="email">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="">Senha</label>
                        <input type="text" value="Definido por padrão" disabled class="form-control" name="senha">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <label for="">Genero</label>
                        <select name="genero" class="form-control">
                          <option value="M">Masculino</option>
                          <option value="F">Feminino</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <label for="">Cidade</label>
                        <input type="text" class="form-control" name="cidade">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="">Endereço</label>
                        <input type="text" class="form-control" name="endereco">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="">BI</label>
                        <input type="text" class="form-control" name="bi">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="">Telefone</label>
                        <input type="text" class="form-control" name="telefone">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="">Data de Nascimento</label>
                        <input type="date" class="form-control" name="datanascimento">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-lg-3">
                      <input type="submit" value="Adicionar usuário" class="form-control btn-primary" name="adicionarUsuario"> 
                    </div>
                  </div>
                </form>
               </div>
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

