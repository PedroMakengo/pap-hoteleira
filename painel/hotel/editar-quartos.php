<!-- Component Head -->
<?php require 'components/component-head.php' ?> 
<!-- Component Head -->

<!-- Buscar dados dos quartos -->
<?php
  $parametros = [":id" => $_GET['userId']];
  $listQuartos = new Model();
  $listDetailsQuartos = $listQuartos->EXE_QUERY("SELECT * FROM tb_quartos
   WHERE id_quarto=:id", $parametros);

   foreach($listDetailsQuartos as $details):
    $fotoOne = $details['foto_primeira_quarto'];
    $fotoTwo = $details['foto_segunda_quarto'];
   endforeach;
?> 
<!-- Buscar dados dos quartos -->

    <div class="dashboard-main-wrapper">
      <!-- Component Header -->
      <?php require 'components/component-header.php' ?> 
      <!-- Component Header -->

      <!-- Container -->
      <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <?php if($userAuthVerify == true):?>
            <div class="container-fluid dashboard-content">
              <div class="ecommerce-widget">
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                      <div class="card-header">
                        <h5 class="mb-0">Usuário inativo</h5>
                      </div>
                      <div class="card-body">
                        <p>É necessário aguardar pela ativação deste perfil por parte do administrador gerar do sistema
                          afim de poder usufruir das melhores funcionalidades que temos para si.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php else:?>
            <div class="container-fluid dashboard-content">
              <div class="ecommerce-widget bg-white p-5">
                <div class="row mb-4">
                  <div class="col-lg-6">
                    <h4>Editar Quarto</h4>
                  </div>
                  <div class="col-lg-12"><hr /></div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <form method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <?php
                          $parametros = [":id" => $_GET['userId']];
                          $buscarListagemQuartos = new Model();
                          $buscarQuartos = $buscarListagemQuartos->EXE_QUERY("SELECT * FROM tb_quartos
                          WHERE id_quarto=:id", $parametros);
                          foreach($buscarQuartos as $details):
                        ?>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label for="">Nome do Hotel</label>
                              <input type="text" name="hotel" disabled value="<?= $_SESSION['nome'] ?>" class="form-control form-control-lg">
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label for="">Primeira Foto</label>
                              <input type="file" name="foto" class="form-control form-control-lg">
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label for="">Segunda Foto</label>
                              <input type="file" name="foto1" class="form-control form-control-lg">
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label for="">Tipo de Quarto</label>
                              <select name="tipo" class="form-control required form-control-lg">
                                <option value="">Selecione o tipo de quarto</option>
                                <option value="Vip">Vip</option>
                                <option value="Normal">Normal</option>
                                <option value="Medio">Medio</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="form-group">
                              <label for="">Nº do Quarto</label>
                              <input type="text" value="<?= $details['quarto'] ?>" name="quarto" class="form-control form-control-lg">
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="form-group">
                              <label for="">Capacidade</label>
                              <input type="text"  value="<?= $details['capacidade_quarto'] ?>" name="capacidade" class="form-control form-control-lg">
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label for="">Preço </label>
                              <input type="number" value="<?= $details['preco_quarto'] ?>" name="preco" class="form-control form-control-lg">
                          </div>
                        </div>

                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="">Estado do Quarto</label>
                            <select name="estado" required class="form-control form-control-lg">
                              <option value="">Selecione o estado do quarto</option>
                              <option value="Disponível">Disponível</option>
                              <option value="Indisponível">Indisponível</option>
                              <option value="Manutenção">Manutenção</option>
                            </select>
                          </div>
                        </div>
                      
                        <div class="col-lg-8">
                          <div class="form-group">
                            <label for="">Descrição</label>
                            <input type="text" name="descricao" value="<?= $details['descricao_quarto'] ?>" class="form-control form-control-lg">
                          </div>
                        </div>
                        <?php endforeach; ?> 
                        <div class="col-lg-4">
                          <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="register-quarto" value="Atualizar Quarto" id="">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php endif;?>
        </div>
      </div>
    </div>
<?php

  if(isset($_POST['register-quarto'])):
    // Pegando os dados 
    $tipo       = $_POST['tipo'];
    $quarto     = $_POST['quarto'];
    $preco      = $_POST['preco'];
    $capacidade = $_POST['capacidade'];
    $hotel      = $_SESSION['id'];
    $descricao  = $_POST['descricao'];

    $estado = $_POST['estado'];

    if(empty($_FILES['foto1']['name']) AND empty($_FILES['foto']['name'])) {
      $foto = $fotoOne;
      $foto1 = $fotoTwo;
    }else {
     // Pegando a foto
     $target        = "../../assets/__storage/" . basename($_FILES['foto']['name']);
     $foto          = $_FILES['foto']['name'];
 
     $target1        = "../../assets/__storage/" . basename($_FILES['foto1']['name']);
     $foto1          = $_FILES['foto1']['name'];
    }

    $parametros = [
      ":quarto"       => $quarto,
      ":tipo"          => $tipo,
      ":capacidade"    => $capacidade,
      ":preco"         => $preco,
      ":descricao"     => $descricao,
      ":foto"          => $foto,
      ":foto1"         => $foto1,
      ":statusQuarto"  => $estado,
      ":id"            => $_GET['userId']
    ];

    $inserirQuarto = new Model();
    $inserirQuarto->EXE_NON_QUERY("UPDATE tb_quartos SET  
      quarto=:quarto,
      tipo_quarto=:tipo,
      capacidade_quarto=:capacidade,
      preco_quarto=:preco,
      descricao_quarto=:descricao, 
      foto_primeira_quarto=:foto, 
      foto_segunda_quarto=:foto1,
      status_quarto=:statusQuarto
      where id_quarto=:id", $parametros);

    if($inserirQuarto):
      if(!empty($_FILES['foto1']['name']) AND !empty($_FILES['foto']['name'])) {
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)):
          $sms = "Uploaded feito com sucesso";
        else:
            $sms = "Não foi possível fazer o upload";
        endif;
        if (move_uploaded_file($_FILES['foto1']['tmp_name'], $target1)):
          $sms = "Uploaded feito com sucesso";
        else:
            $sms = "Não foi possível fazer o upload";
        endif;
      }
      echo '<script> 
            swal({
              title: "Dados atualizados!",
              text: "Dados inseridos com sucesso",
              icon: "success",
              button: "Fechar!",
            })
          </script>';
      echo '<script>
        setTimeout(function() {
            window.location.href="quartos.php?id=quartos";
        }, 2000)
      </script>';

    else:
      echo "Não foi possível";
    endif;
  endif;
  ?>

  <!-- Component Header -->
  <?php require 'components/component-footer.php' ?> 
  <!-- Component Header -->