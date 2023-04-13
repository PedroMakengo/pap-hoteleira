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
                  <h4>Formulário de registro de um usuário (Hospede)</h4>
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

<?php
  if(isset($_POST['adicionarUsuario'])):
    $target       = "../../assets/__storage/" . basename($_FILES['foto']['name']);
    $foto         = $_FILES['foto']['name'];

    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5(md5("123"));
    $genero         = $_POST['genero'];
    $bi             = $_POST['bi'];
    $cidade         = $_POST['cidade'];
    $endereco       = $_POST['endereco'];
    $telefone       = $_POST['telefone'];
    $dataNascimento = $_POST['datanascimento'];

    $parametros = [
      ":nome"         => $nome,
      ":email"        => $email,
      ":senha"        => $senha, 
      ":foto"         => $foto, 
      ":genero"       => $genero,
      ":endereco"     => $endereco,
      ":cidade"       => $cidade,
      ":bi"           => $bi,
      ":tel"          => $telefone,
      ":datanasc"     => $dataNascimento
    ];

    $inserirUsuario = new Model();
    $inserirUsuario->EXE_NON_QUERY("INSERT INTO tb_hospedes
    (
      nome_hospede,
      email_hospede,
      senha_hospede,
      foto_hospedes,
      genero_hospedes,
      endereco_hospede,
      cidade_hospede,
      bi_hospede,
      telefone_hospede,
      data_nascimento_hospede,
      data_criacao_hospede,
      data_atualizacao_hospede
    ) 
    VALUES 
    (:nome, :email, :senha, :foto, :genero, :endereco, :cidade, :bi, :tel, :datanasc, now(), now())", $parametros);

    if($inserirUsuario):

      //===================================================================================================================
      $today   =  Date('Y-m-d');
      $nome    = $_SESSION['nome'];
      $action  = "registrou";
      $textLog = "O usuário ". $nome. " ". $action . " um hospede cujo o nome é ". $_POST['nome']. " em " . $today;
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
      //===================================================================================================================

      if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)):
        $sms = "Uploaded feito com sucesso";
      else:
        $sms = "Não foi possível fazer o upload";
      endif;
      echo '<script> 
          swal({
            title: "Dados inseridos!",
            text: "Perfil atualizado com sucesso, termine a sessão",
            icon: "success",
            button: "Fechar!",
          })
        </script>';
      echo '<script>
            setTimeout(function() {
                window.location.href="usuarios.php?id=usuarios";
            }, 2000)
        </script>';
    endif;
  endif;

?>

