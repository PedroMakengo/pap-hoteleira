<!-- =============================================== -->
<?php include "components/component-head.php" ?>
<!-- =============================================== -->

<?php
  $parametros = [":id" => $_SESSION['id']];
  $listDataPerfilAdmin = new Model();
  $listUserPerfil = $listDataPerfilAdmin->EXE_QUERY("SELECT * FROM tb_hotel
   WHERE id_hotel=:id", $parametros);

   foreach($listUserPerfil as $details):
    $fotoPerfil = $details['foto_hotel'];
    $senhaBancoDados = $details['senha_hotel'];
   endforeach;
?> 

<!-- ELIMINAR CONTA USUÁRIO -->
<?php 
  if (isset($_GET['action']) && $_GET['action'] == 'delete'):
    $id = $_GET['userId'];
    $parametros  =[
        ":id"=>$id
    ];
    $delete = new Model();
    $delete->EXE_NON_QUERY("DELETE FROM tb_hotel WHERE id_hotel=:id", $parametros);
    if($delete == true):
      echo '<script> 
              swal({
                title: "Hotel eliminado!",
                text: "Dados eliminados com sucesso",
                icon: "success",
                button: "Fechar!",
              })
            </script>';
      echo '<script>
          setTimeout(function() {
              window.location.href="?logout=true";
          }, 1000)
      </script>';
    else:
        echo "<script>window.alert('Operação falhou');</script>";
    endif;
  endif;
?>
<!-- ELIMINAR CONTA USUÁRIO -->


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
                <div class="col-lg-6 text-right">
                   <a
                      href="perfil.php?id=perfil&userId=<?= $_SESSION['id'] ?>&action=delete"
                      class="btn btn-danger btn-sm">Eliminar Conta</a
                    >
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
                            value="<?= $details['nome_hotel'] ?>"
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
                            value="<?= $details['email_hotel'] ?>"
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
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Foto:</label>
                          <input
                            type="file"
                            name="foto"
                            class="form-control form-control-lg"
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">NIF:</label>
                          <input
                            type="text"
                            name="nif"
                            class="form-control form-control-lg"
                            value="<?= $details['nif_hotel'] ?>"
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Endereço:</label>
                          <input
                            type="text"
                            name="endereco"
                            class="form-control form-control-lg"
                            value="<?= $details['endereco_hotel'] ?>"
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Cidade:</label>
                          <input
                            type="text"
                            name="cidade"
                            class="form-control form-control-lg"
                            value="<?= $details['cidade_hotel'] ?>"
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Classificação:</label>
                          <input
                            type="text"
                            name="classificacao"
                            class="form-control form-control-lg"
                            value="<?= $details['classificacao_hotel'] ?>"
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Nº de Quartos:</label>
                          <input
                            type="text"
                            name="num_quartos"
                            class="form-control form-control-lg"
                            value="<?= $details['num_quartos_hotel'] ?>"
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Serviços:</label>
                          <input
                            type="text"
                            name="servicos"
                            class="form-control form-control-lg"
                            value="<?= $details['servicos_hotel'] ?>"
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Telefone:</label>
                          <input
                            type="tel"
                            name="tel"
                            class="form-control form-control-lg"
                            value="<?= $details['telefone_hotel'] ?>"
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">URL Site:</label>
                          <input
                            type="tel"
                            name="urlSite"
                            class="form-control form-control-lg"
                            value="<?= $details['site_hotel'] ?>"
                          />
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="">Descrição:</label>
                          <input
                            type="text"
                            name="descricao"
                            class="form-control form-control-lg"
                            value="<?= $details['descricao_hotel'] ?>"
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

    $nome          = $_POST['nome'];
    $email         = $_POST['email'];
    $tel           = $_POST['tel'];
    $urlSite       = $_POST['urlSite'];
    $nif           = $_POST['nif'];
    $endereco      = $_POST['endereco'];
    $cidade        = $_POST['cidade'];
    $classificacao = $_POST['classificacao'];
    $num_quartos   = $_POST['num_quartos'];
    $servicos      = $_POST['servicos'];
    $descricao     = $_POST['descricao'];

    if(empty(md5(md5($_POST['senha'])))) {
      $senha = $senhaBancoDados;
    }else {
      $senha         = md5(md5($_POST['senha']));
    }

    if(empty($_FILES['foto']['name'])) {
      $foto = $fotoPerfil;
    }else {
      $target       = "../../assets/__storage/" . basename($_FILES['foto']['name']);
      $foto         = $_FILES['foto']['name'];
    }

    $parametros = [
      ":id"         => $_SESSION['id'],
      ":nome"       => $nome,
      ":email"      => $email,
      ":senha"      => $senha,
      ":foto"       => $foto,
      ":tel"        => $tel, 
      ":urlSite"    => $urlSite,
      ":nif"        => $nif,
      ":cidade"     => $cidade,
      ":endereco"   => $endereco,
      ":classificacao"=> $classificacao,
      ":num_quartos"=> $num_quartos,
      ":servicos"   => $servicos,
      ":descricao"  => $descricao
    ];

    $atualizarPerfilAdmin = new Model();
    $atualizarPerfilAdmin->EXE_NON_QUERY("UPDATE tb_hotel SET
    nome_hotel=:nome,
    email_hotel=:email,
    senha_hotel=:senha,
    foto_hotel=:foto,
    nif_hotel=:nif,
    endereco_hotel=:endereco, 
    cidade_hotel=:cidade,
    descricao_hotel=:descricao,
    classificacao_hotel=:classificacao,
    num_quartos_hotel=:num_quartos,
    servicos_hotel=:servicos,
    telefone_hotel=:tel,
    site_hotel=:urlSite
    WHERE id_hotel=:id", $parametros);

    if($atualizarPerfilAdmin):
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
    // echo '<script>
    //       setTimeout(function() {
    //           window.location.href="perfil.php?id=perfil";
    //       }, 2000)
    //   </script>';
    endif;

  endif;

?> 
