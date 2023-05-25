<!-- Component Head -->
<?php require 'components/component-head.php' ?>
<!-- Component Head -->


<?php 
  $parametros = [":id" => $_GET['id']];
  $data = new Model();
  $meusComentarios = $data->EXE_QUERY("SELECT * FROM tb_comentarios
  INNER JOIN tb_hotel ON 
  tb_comentarios.id_hotel=tb_hotel.id_hotel
   WHERE id_comentario=:id", $parametros);
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
                    <h4>Editar comentário</h4>
                  </div>
                  <div class="col-lg-12"><hr /></div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <form method="POST" enctype="multipart/form-data">
                     

                      <div class="row">
                      <?php foreach($meusComentarios as $details):?>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="">Nome do Hotel</label>
                            <input type="text" name="nome" disabled value="<?= $_SESSION['nome'] ?>" class="form-control form-control-lg">
                          </div>
                        </div>
                        <div class="col-lg-8">
                          <div class="form-group">
                            <label for="">Hotel</label>
                            <input type="text" name="nome" disabled value="<?= $details['nome_hotel'] ?>" class="form-control form-control-lg">
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="">Descrição</label>
                            <input type="text" name="comentario" value="<?= $details['comentario'] ?>" class="form-control form-control-lg" />
                          </div>
                        </div>
                        <?php endforeach; ?>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="editar-comentario" value="Editar comentário" id="">
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

  if(isset($_POST['editar-comentario'])):
    // Pegando os dados 
    $comentario = $_POST['comentario'];

    $parametros = [
      ":id" => $_GET['id'],
      ":comentario" => $comentario
    ];

    $atualizarComentario = new Model();
    $atualizarComentario->EXE_NON_QUERY("UPDATE tb_comentarios SET comentario=:comentario
    WHERE id_comentario=:id", $parametros);

    if($atualizarComentario):

      //===================================================================================================================
      $today   =  Date('Y-m-d');
      $nome    = $_SESSION['nome'];
      $action  = "editou";
      $textLog = "O usuário ". $nome. " ". $action . " comentário ";
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
              title: "Dados atualizados!",
              text: "Dados atualizados com sucesso",
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