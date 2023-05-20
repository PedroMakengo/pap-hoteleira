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
                            <label for="">Categoria de Quarto</label>
                            <select name="tipo" required class="form-control form-control-lg">
                              <option value="">Selecione a categoria do quarto</option>
                              <option value="Vip">Vip</option>
                              <option value="Normal">Normal</option>
                              <option value="Medio">Medio</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="">Tipo de Quarto</label>
                            <select name="categoria" required class="form-control form-control-lg">
                              <option value="">Selecione o tipo de quarto</option>
                              <option value="Casal">Casal</option>
                              <option value="Solteiro">Solteiro</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label for="">Ref. do Quarto</label>
                            <input type="text" name="quarto" class="form-control form-control-lg">
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label for="">Capacidade</label>
                            <input type="text" name="capacidade" class="form-control form-control-lg">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="">Preço </label>
                            <input type="number" name="preco" class="form-control form-control-lg">
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
                       
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="">Descrição</label>
                           <textarea name="descricao" id="" class="form-control form-control-lg"></textarea>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="register-quarto" value="Registrar Quarto" id="">
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

    $categoria  = $_POST['categoria'];

    // Pegando a foto
    $target        = "../../assets/__storage/" . basename($_FILES['foto']['name']);
    $foto          = $_FILES['foto']['name'];

    $target1        = "../../assets/__storage/" . basename($_FILES['foto1']['name']);
    $foto1          = $_FILES['foto1']['name'];

    $parametros = [
      ":quarto"     => $quarto,
      ":tipo"       => $tipo,
      ":capacidade" => $capacidade,
      ":preco"      => $preco,
      ":descricao"  => $descricao,
      ":foto"       => $foto,
      ":foto1"      => $foto1,
      ":statusQ"    => $_POST['estado'],
      ":id"         => $hotel,
      ":categoria"  => $categoria
    ];

    $inserirQuarto = new Model();
    $inserirQuarto->EXE_NON_QUERY("INSERT INTO tb_quartos 
      (
        quarto, 
        tipo_quarto,
        capacidade_quarto,
        preco_quarto,
        descricao_quarto,
        foto_primeira_quarto, 
        foto_segunda_quarto,
        status_quarto,
        data_criacao_quarto,
        data_atualizacao_quarto,
        id_hotel,
        categoria_quarto
      ) 
      VALUES 
      (
      :quarto, 
      :tipo, 
      :capacidade, 
      :preco, 
      :descricao,
      :foto,
      :foto1,
      :statusQ,
      now(),
      now(),
      :id,
      :categoria
      )", $parametros);

    if($inserirQuarto):

      //===================================================================================================================
      $today   =  Date('Y-m-d');
      $nome    = $_SESSION['nome'];
      $action  = "registrou";
      $textLog = "O usuário ". $nome. " ". $action . " um quarto cujo o nome é ". $_POST['quarto'];
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
      if (move_uploaded_file($_FILES['foto1']['tmp_name'], $target1)):
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