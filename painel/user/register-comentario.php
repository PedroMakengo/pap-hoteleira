<!-- Component Head -->
<?php require 'components/component-head.php' ?>
<!-- Component Head -->

<?php 
  $data = new Model();
  $listHotel = $data->EXE_QUERY("SELECT * FROM tb_hotel");
?>

    <div class="dashboard-main-wrapper">
      <!-- Component Header -->
      <?php require 'components/component-header.php' ?> 
      <!-- Component Header -->

      <!-- Container -->
      <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content">
              <div class="ecommerce-widget bg-white p-5">
                <div class="row mb-4">
                  <div class="col-lg-6">
                    <h4>Adicionar um comentário</h4>
                  </div>
                  <div class="col-lg-12"><hr /></div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <form method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="">Nome do Hotel</label>
                            <input type="text" name="nome" disabled value="<?= $_SESSION['nome'] ?>" class="form-control form-control-lg">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="">Selecione Hotel</label>
                            <select name="hotel" id="" class="form-control">
                              <?php foreach($listHotel as $details):?>
                                <option value="<?= $details['id_hotel'] ?>">
                                  <?= $details['nome_hotel'] ?>
                                </option>
                              <?php endforeach; ?>
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
                            <input type="submit" class="btn btn-primary" name="register-quarto" value="Adicionar comentário" id="">
                          </div>
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


    
<?php

  if(isset($_POST['register-quarto'])):
    // Pegando os dados 
    $comentario = $_POST['descricao'];
    $hotel      = $_POST['hotel'];
    $nome       = $_SESSION['nome'];

    $parametros = [
      ":id" => $hotel,
      ":nome" => $nome,
      ":comentario" => $comentario
    ];

    $inserirQuarto = new Model();
    $inserirQuarto->EXE_NON_QUERY("INSERT INTO tb_comentarios 
      (
        id_hotel,
        nome,
        comentario, 
        data_registro_comentario 
      ) 
      VALUES 
      (
      :id, 
      :nome,
      :comentario,
      now()
      )", $parametros);

    if($inserirQuarto):

      //===================================================================================================================
      $today   =  Date('Y-m-d');
      $nome    = $_SESSION['nome'];
      $action  = "registrou";
      $textLog = "O usuário ". $nome. " ". $action . " fez um comentário ";
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
            window.location.href="comentario.php?id=comentario";
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