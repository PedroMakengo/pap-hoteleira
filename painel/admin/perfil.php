<!-- =============================================== -->
<?php include "components/component-head.php" ?>
<!-- =============================================== -->

<?php
  $parametros = [":id" => $_SESSION['id']];
  $listDataPerfilAdmin = new Model();
  $listUserPerfil = $listDataPerfilAdmin->EXE_QUERY("SELECT * FROM tb_admin
   WHERE id_admin=:id", $parametros);

   foreach($listUserPerfil as $details):
      $fotoBancoDados = $details['foto'];
      $senhaBancoDados = $details['senha'];
   endforeach;
?> 


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
                  <h4>Editar o meu perfil</h4>
                </div>
                <div class="col-lg-12"><hr /></div>
              </div>
              <div class="row">
                <form method="POST" enctype="multipart/form-data" class="col-lg-12">
                  <div class="row">
                     <?php foreach($listUserPerfil as $details): ?>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Nome:</label>
                          <input
                            type="text"
                            name="nome"
                            class="form-control form-control-lg"
                            value="<?= $details['nome'] ?>"
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">E-mail:</label>
                          <input
                            type="text"
                            name="email"
                            class="form-control form-control-lg"
                            value="<?= $details['email'] ?>"
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Palavra Passe:</label>
                          <input
                            type="password"
                            name="senha"
                            class="form-control form-control-lg"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="">Foto:</label>
                          <input
                            type="file"
                            name="foto"
                            class="form-control form-control-lg"
                          />
                        </div>
                      </div>
                      <?php endforeach; ?>
                  </div>

                  <div class="row">
                    <div class="col-lg-2">
                      <input
                        type="submit"
                        value="Atualizar"
                        name="atualizarPerfil"
                        class="form-control form-control-lg btn-primary"
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


<?php 

  if(isset($_POST['atualizarPerfil'])):


    if(empty($_FILES['foto']['name'])):
      $foto = $fotoBancoDados;
    else:
      $target       = "../../assets/__storage/" . basename($_FILES['foto']['name']);
      $foto         = $_FILES['foto']['name'];
    endif;

    $nome = $_POST['nome'];
    $email = $_POST['email'];

    if(empty($_POST['senha'])):
      $senha = $senhaBancoDados;
    else:
      $senha = md5(md5($_POST['senha']));
    endif;


    $parametros = [
      ":id"         => $_SESSION['id'],
      ":nome"       => $nome,
      ":email"      => $email,
      ":senha"      => $senha,
      ":foto"       => $foto
    ];

    $atualizarPerfilAdmin = new Model();
    $atualizarPerfilAdmin->EXE_NON_QUERY("UPDATE tb_admin SET
    nome=:nome,
    email=:email,
    senha=:senha,
    foto=:foto
    WHERE id_admin=:id", $parametros);

    if($atualizarPerfilAdmin):

      //===================================================================================================================
      $today   =  Date('Y-m-d');
      $nome    = $_SESSION['nome'];
      $action  = "atualizou";
      $textLog = "O usuário ". $nome. " ". $action . " o seu perfil";
      $parametros = [
        ":nome"     => $nome, 
        ":actionLog"   => $action, 
        ":textLog"  => $textLog,
        ":dataLog"     => $today       
      ];
      $insertLog = new Model();
      $insertLog->EXE_NON_QUERY("INSERT INTO tb_logs 
      (user_log, action_log, text_log, data_log) 
      VALUES (:nome, :actionLog, :textLog, :dataLog) ", $parametros);
      //==================================================================================================================


      if(!empty($_FILES['foto']['name'])) {
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)):
          $sms = "Uploaded feito com sucesso";
        else:
          $sms = "Não foi possível fazer o upload";
        endif;
      }
      echo '<script> 
              swal({
                title: "Dados atualizados!",
                text: "Perfil atualizado com sucesso, termine a sessão",
                icon: "success",
                button: "Fechar!",
              })
            </script>';
      echo '<script>
            setTimeout(function() {
                window.location.href="perfil.php?id=perfil";
            }, 2000)
        </script>';
    endif;

  endif;

?> 
