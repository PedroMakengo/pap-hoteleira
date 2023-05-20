<!-- Component Head -->
<?php require 'components/component-head.php' ?>
<!-- Component Head -->

<?php
  $parametros = [":id" => $_GET['idUser']];
  $list = new Model();
  $listDetailsQuartos = $list->EXE_QUERY("SELECT * FROM tb_reservas
  INNER JOIN tb_quartos ON 
  tb_reservas.id_quarto=tb_quartos.id_quarto
  WHERE tb_reservas.id_quarto=:id", $parametros);

  foreach($listDetailsQuartos as $mostrarStatus):
    $status = $mostrarStatus['status_quarto'];
    $quartoId = $mostrarStatus['id_quarto'];
    $quarto = $mostrarStatus['quarto'];
    $capacidade = $mostrarStatus['capacidade_quarto'];
    $preco = $mostrarStatus['preco_quarto'];
    $fotoComprovativo  = $mostrarStatus['comprovativo_reserva'];
  endforeach;
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
              <h3>Dados do quarto selecionado</h3>
            </div>
            <div class="col-lg-12"><hr /></div>
          </div>

          <div class="row">
            <div class="col-lg-12 mt-4">
              <form method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-12">
                    <h3>Efetuar a reservado do quarto selecionado</h3>
                    <hr>
                  </div>
                  <?php 
                    $parametros = [":id" => $_GET['idUser']];
                    $editarReserva = new Model();
                    $listaEditarReserva = $editarReserva->EXE_QUERY("SELECT * FROM tb_reservas
                    WHERE id_reserva=:id", $parametros);

                    foreach($listaEditarReserva as $details):?>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">Nome do Hospede:</label>
                      <input type="text" name="nome" disabled value="<?= $_SESSION['nome'] ?>" class="form-control" />
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">Quarto:</label>
                      <input type="text" disabled value="<?= $quarto ?>" name="nome" class="form-control" />
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">Capacidade:</label>
                      <input type="text" disabled value="<?= $capacidade ?>" name="nome" class="form-control" />
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">Data de Checkin:</label>
                      <input type="date" value="<?= $details["data_checkin_reserva"] ?>" name="datacheckin" class="form-control" />
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">Data de Checkout:</label>
                      <input type="date" value="<?= $details["data_checkout_reserva"] ?>" name="datacheckout" class="form-control" />
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="form-group">
                      <label for="">Nº Hospede:</label>
                      <input type="number" value="<?= $details["num_hospedes_reserva"] ?>" name="num_hospede" class="form-control" />
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="form-group">
                      <label for="">Preço:</label>
                      <input type="number" disabled name="preco" value="<?= $preco ?>" class="form-control" />
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">Comprovativo:</label>
                      <input type="file" name="foto" class="form-control" />
                    </div>
                  </div>
                  <?php endforeach; ?>
                  <div class="col-lg-3 mt-2">
                    <div class="form-group">
                      <input type="submit" name="editar_reserva" value="Editar a reserva" class="form-control btn-primary" />
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

<!-- Component Footer -->
<?php require 'components/component-footer.php' ?>
<!-- Component Footer -->


<!-- =============================================== -->
<?php require '../../source/controllers/CriarReserva.php' ?>
<!-- =============================================== -->

<?php 

  if(isset($_POST['editar_reserva'])):

    $datacheckin  = $_POST['datacheckin'];
    $datacheckout = $_POST['datacheckout'];
    $num_hospede  = $_POST['num_hospede'];

    if(empty($_POST['foto'])) {
      $foto = $fotoComprovativo;
    }else {
      $target       = "../../assets/__storage/" . basename($_FILES['foto']['name']);
      $foto         = $_FILES['foto']['name'];
    }

    $today =  Date('Y-m-d H:i:s');
    if($datacheckin > $datacheckout):
      echo '<script> 
              swal({
                title: "Ops!!",
                text: "A data de checkin não pode ser superior a data de checkout.",
                icon: "error",
                button: "Fechar!",
              })
            </script>';
    elseif($datacheckin <= $today):
      echo '<script> 
          swal({
            title: "Ops!!",
            text: "A data de checkin não pode ser menor que a data de hoje",
            icon: "error",
            button: "Fechar!",
          })
        </script>';
    else:
      // Parametros
      $parametros = [
        ":idReserva"      => $_GET['idUser'],
        ":id"             => $_SESSION['id'],
        ":quarto"         => $quartoId,
        ":dataCheckin"    => $datacheckin,
        ":dataCheckout"   => $datacheckout,
        ":num_hospede"    => $num_hospede,
        ":preco"          => $preco,
        ":comprovativo"   => $foto
      ];

      // Efetuar atualização da reserva 
      $atualizarReservaQuarto = new Model();
      $atualizarReservaQuarto->EXE_NON_QUERY("UPDATE tb_reservas SET
        id_hospede=:id,
        id_quarto=:quarto,
        data_checkin_reserva=:dataCheckin,
        data_checkout_reserva=:dataCheckout,
        num_hospedes_reserva=:num_hospede,
        preco_total_reserva=:preco,
        comprovativo_reserva=:comprovativo,
        data_atualizacao_reserva=now()
        WHERE id_reserva=:idReserva", $parametros);

      if($atualizarReservaQuarto):

        if(!empty($_POST['foto'])){
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
                window.location.href="index.php?id=home";
            }, 2000)
        </script>';
      
      endif;
    endif;
  endif;

?>
