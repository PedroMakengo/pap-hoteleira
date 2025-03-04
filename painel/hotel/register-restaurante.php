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
                    <h4>Adicionar um novo restaurante</h4>
                  </div>
                  <div class="col-lg-12"><hr /></div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <form method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="">Foto do Restaurante:</label>
                            <input type="file" name="foto" class="form-control form-control-lg">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="">Nome do Restaurante:</label>
                            <input type="text" placeholder="ex: Afonso Kiala" name="nome" class="form-control form-control-lg">
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label for="">Classificação:</label>
                            <input type="number" placeholder="ex: Muito Bom" name="classificacao" class="form-control form-control-lg">
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label for="">Nº Total de Mesas:</label>
                            <input type="text" placeholder="ex: 43" name="num_mesas" class="form-control form-control-lg">
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="">Descrição:</label>
                           <textarea name="descricao"  placeholder="Insira a descrição" class="form-control form-control-lg"></textarea>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="register-restaurante" value="Registrar Restaurante" id="">
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

      if(isset($_POST['register-restaurante'])):

        $nome          = $_POST['nome'];
        $num_mesas     = $_POST['num_mesas'];
        $classificacao = $_POST['classificacao'];
        $descricao     = $_POST['descricao'];

        $target        = "../../assets/__storage/" . basename($_FILES['foto']['name']);
        $foto          = $_FILES['foto']['name'];

        $parametros = [
          ":id"        => $_SESSION['id'],
          ":nome"      => $nome,
          ":foto"      => $foto,
          ":descricao" => $descricao,
          ":classif"   => $classificacao,
          ":num_mesas" => $num_mesas
        ];

        $inserirRestaurante = new Model();
        $inserirRestaurante->EXE_NON_QUERY("INSERT INTO tb_restaurante 
        (id_hotel, nome_restaurante, foto, descricao_restaurante, classificacao_restaurante, 
        num_mesas_restaurante, data_criacao_restaurante, data_atualizacao__restaurante) 
        VALUES (:id, :nome, :foto, :descricao, :classif, :num_mesas, now(), now())", $parametros);

        if($inserirRestaurante):

          //===================================================================================================================
          $today   =  Date('Y-m-d');
          $nome    = $_SESSION['nome'];
          $action  = "registrou";
          $textLog = "O usuário ". $nome. " ". $action . " um restaurante cujo o nome é ". $_POST['nome'];
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
                window.location.href="restaurante.php?id=restaurante";
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