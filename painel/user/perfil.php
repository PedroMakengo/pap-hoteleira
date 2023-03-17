<!-- Component Head -->
<?php require 'components/component-head.php' ?>
<!-- Component Head -->

<?php
  $parametros = [":id" => $_SESSION['id']];
  $listDataUserPerfil = new Model();
  $listUserPerfil = $listDataUserPerfil->EXE_QUERY("SELECT * FROM tb_hospedes
   WHERE id_hospede=:id", $parametros);
?> 

<div class="dashboard-main-wrapper">
  
<!-- Component Head -->
<?php require 'components/component-header.php' ?>
<!-- Component Head -->

  <!-- Container -->
  <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
      <div class="container-fluid dashboard-content">
        <div class="ecommerce-widget bg-white p-5">
          <div class="row mb-4">
            <div class="col-lg-6">
              <h3>Atualizar meu perfil</h3>
            </div>
            <div class="col-lg-12"><hr /></div>

            <div class="col-lg-12">
              <form method="POST" enctype="multipart/form-data">
                <?php foreach($listUserPerfil as $details): ?>
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
                      <input type="text" value="<?= $details['nome_hospede'] ?>" class="form-control" name="nome">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">E-mail</label>
                      <input type="email" value="<?= $details['email_hospede'] ?>" class="form-control" name="email">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">Senha</label>
                      <input type="password" required class="form-control" name="senha">
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
                      <input type="text" value="<?= $details['cidade_hospede'] ?>" class="form-control" name="cidade">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">Endereço</label>
                      <input type="text" value="<?= $details['endereco_hospede'] ?>"  class="form-control" name="endereco">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">BI</label>
                      <input type="text" value="<?= $details['bi_hospede'] ?>"  class="form-control" name="bi">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">Telefone</label>
                      <input type="text" value="<?= $details['telefone_hospede'] ?>"  class="form-control" name="telefone">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">Data de Nascimento</label>
                      <input type="date" value="<?= $details['data_nascimento_hospede'] ?>"  class="form-control" name="datanascimento">
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>

                <div class="row">
                 <div class="col-lg-3">
                    <input type="submit" value="Atualizar Perfil" class="form-control btn-primary" name="atualizarPerfil"> 
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Component Footer -->
<?php require 'components/component-footer.php' ?>
<!-- Component Footer -->

<?php 

  if(isset($_POST['atualizarPerfil'])):

    $target       = "../../assets/__storage/" . basename($_FILES['foto']['name']);
    $foto         = $_FILES['foto']['name'];

    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5(md5($_POST['senha']));
    $genero         = $_POST['genero'];
    $bi             = $_POST['bi'];
    $cidade       = $_POST['cidade'];
    $endereco       = $_POST['endereco'];
    $telefone       = $_POST['telefone'];
    $dataNascimento = $_POST['datanascimento'];


    $parametros = [
      ":id"          => $_SESSION['id'],
      ":nome"        => $nome,
      ":email"       => $email,
      ":senha"       => $senha,
      ":tel"         => $telefone,
      ":bi"          => $bi,
      ":cidade"      => $cidade,
      ":foto"        => $foto,
      ":genero"      => $genero,
      ":endereco"    => $endereco,
      ":datanas"     => $dataNascimento
    ];

    $atualizarPerfilHospede = new Model();
    $atualizarPerfilHospede->EXE_NON_QUERY("UPDATE tb_hospedes SET
    nome_hospede=:nome,
    email_hospede=:email,
    senha_hospede=:senha,
    telefone_hospede=:tel,
    bi_hospede=:bi,
    genero_hospedes=:genero,
    cidade_hospede=:cidade,
    foto_hospedes=:foto,
    endereco_hospede=:endereco,
    data_nascimento_hospede=:datanas
    WHERE id_hospede=:id", $parametros);

    if($atualizarPerfilHospede):
      if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)):
        $sms = "Uploaded feito com sucesso";
      else:
        $sms = "Não foi possível fazer o upload";
      endif;
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