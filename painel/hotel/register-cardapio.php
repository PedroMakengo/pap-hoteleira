<!-- Component Head -->
<?php require 'components/component-head.php' ?> 
<!-- Component Head -->

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
                    <h4>Adicionar um novo quarto</h4>
                  </div>
                  <div class="col-lg-12"><hr /></div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <form method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-lg-8">
                          <div class="form-group">
                            <label for="">Nome do Hotel</label>
                            <input type="text" name="hotel" disabled value="<?= $_SESSION['nome'] ?>" class="form-control form-control-lg">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="">Restaurante</label>
                            <select name="restaurante" class="form-control">
                              <option value="">Selecione um restaurante</option>
                              <?php 
                                $parametros = [":id" => $_SESSION['id']];
                                $buscandoRestaurantes = new Model();
                                $buscando = $buscandoRestaurantes->EXE_QUERY("SELECT * FROM tb_restaurante
                                  WHERE id_hotel=:id", $parametros);
                                foreach($buscando as $details):?>
                                  <option value="<?= $details['id_restaurante'] ?>">
                                    <?= $details['nome_restaurante'] ?>
                                 </option>
                              <?php endforeach; ?> 
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="">Foto Prato de Comida</label>
                            <input type="file" name="foto" class="form-control form-control-lg">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="">Nome do Prato</label>
                            <input type="text" name="prato" class="form-control form-control-lg">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="">Bebida</label>
                            <input type="text" name="bebida" class="form-control form-control-lg">
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label for="">Preço Comida</label>
                            <input type="number" name="precoComida" class="form-control form-control-lg">
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label for="">Preço Bebida</label>
                            <input type="number" name="precoBebida" class="form-control form-control-lg">
                          </div>
                        </div>

                        <div class="col-lg-4">
                          <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="register-cardapio" value="Registrar Quarto" id="">
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

  if(isset($_POST['register-cardapio'])):
    // Pegando os dados 
    $comida       = $_POST['prato'];
    $bebida       = $_POST['bebida'];
    $restaurante  = $_POST['restaurante'];
    $precoComida  = $_POST['precoComida'];
    $precoBebida  = $_POST['precoBebida'];

    // Pegando a foto
    $target        = "../../assets/__storage/" . basename($_FILES['foto']['name']);
    $foto          = $_FILES['foto']['name'];

    $parametros = [
      ":id"         => $restaurante,
      ":prato"      => $comida,
      ":bebida"     => $bebida,
      ":pComida"    => $precoComida,
      ":pBebida"    => $precoBebida,
      ":foto"       => $foto
    ];

    $inserirQuarto = new Model();
    $inserirQuarto->EXE_NON_QUERY("INSERT INTO tb_cardapio 
      (
        id_restaurante, comida, bebida, preco_comida, preco_bebida, foto_comida, data_registro_cardapio
      ) 
      VALUES 
      (:id, :prato, :bebida, :pComida, :pBebida, :foto, now())", $parametros);

    if($inserirQuarto):

      //===================================================================================================================
      $today   =  Date('Y-m-d');
      $nome    = $_SESSION['nome'];
      $action  = "registrou";
      $textLog = "O usuário ". $nome. " ". $action . " um cardapio cujo o prato é ". $_POST['prato'];
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
              text: "Dados inseridos com sucesso",
              icon: "success",
              button: "Fechar!",
            })
          </script>';
      echo '<script>
        setTimeout(function() {
            window.location.href="cardapio.php?id=cardapio";
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