<!-- Component Head -->
<?php require 'components/component-head.php' ?>
<!-- Component Head -->

<?php
  $parametros = [":id" => $_GET['userId'], ":status_quarto"=> 'Disponível'];
  $list = new Model();
  $listDetailsQuartos = $list->EXE_QUERY("SELECT * FROM tb_quartos
  WHERE id_quarto=:id AND status_quarto=:status_quarto", $parametros);

  foreach($listDetailsQuartos as $mostrarStatus):
    $status = $mostrarStatus['status_quarto'];
    $quartoId = $mostrarStatus['id_quarto'];
    $quarto = $mostrarStatus['quarto'];
    $capacidade = $mostrarStatus['capacidade_quarto'];
    $preco = $mostrarStatus['preco_quarto'];
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
            <div class="col-lg-12">
              <!-- Retornar as informações do quarto -->
              <?php 
                if($listDetailsQuartos):
                  foreach($listDetailsQuartos as $details):
              ?>
                  <div class="row">
                    <div class="col-lg-5">
                      <img style="width:100%; height: 30vh;" src="../../assets/__storage/<?= $details['foto_primeira_quarto'] ?>" />
                    </div>
                    <div class="col-lg-7">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="border-bottom mb-2 pb-2">
                            <p>Quarto: <strong><?= $details['quarto'] ?></strong></p>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="border-bottom mb-2 pb-2">
                            <p>Tipo de Quarto: <strong><?= $details['tipo_quarto'] ?></strong></p>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="border-bottom mb-2 pb-2">
                            <p>Preço do Quarto: <strong><?= $details['preco_quarto'] ?></strong></p>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="border-bottom mb-2 pb-2">
                            <p>Capacidade do Quarto: <strong><?= $details['capacidade_quarto'] ?></strong></p>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="border-bottom mb-2 pb-2">
                            <p>Status do Quarto: <strong><?= $details['status_quarto'] ?></strong></p>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="border-bottom mb-2 pb-2">
                            <p>Data: <strong><?= $details['data_criacao_quarto'] ?></strong></p>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="border-bottom mb-2 pb-2">
                            <p>Descrição: <br> <strong><?= $details['descricao_quarto'] ?></strong></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              <?php 
                  endforeach;
                else: ?>
                <div class="row">
                  <div class="col-lg-12 text-center">
                    <p>Não existe nenhum registro</p>
                  </div>
                </div>
                <?php 
                endif;?>
              <!-- Retornar as informações do quarto -->
            </div>

            
            <?php if($status == 'Disponível'): ?>
              <div class="col-lg-12 mt-4">
                <form method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-12">
                      <h3>Efetuar a reservado do quarto selecionado</h3>
                      <hr>
                    </div>
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
                        <input type="date" name="datacheckin" class="form-control" />
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="">Data de Checkout:</label>
                        <input type="date" name="datacheckout" class="form-control" />
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <label for="">Nº Hospede:</label>
                        <input type="number" name="num_hospede" class="form-control" />
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <label for="">Nº Hospede:</label>
                        <input type="number" disabled name="preco" value="<?= $preco ?>" class="form-control" />
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label for="">Comprovativo:</label>
                        <input type="file" name="foto" class="form-control" />
                      </div>
                    </div>
                    <div class="col-lg-3 mt-2">
                      <div class="form-group">
                        <input type="submit" name="reserva" value="Efetuar reserva" class="form-control btn-primary" />
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            <?php elseif($status == 'Manutenção'): ?>
              <div class="col-lg-12 mt-4">
                <div class="text-center">
                  <p>Não é possível efetuar uma reserva porque o quarto encontra-se em manutenção</p>
                </div>
              </div>
            <?php elseif($status == 'Indisponível'): ?>
              <div class="col-lg-12 mt-4">
                <div class="text-center">
                  <p>Não é possível efetuar uma reserva porque o quarto encontra-se Indisponível</p>
                </div>
              </div>
            <?php endif; ?>
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
<?php 

if(isset($_POST['reserva'])):
  $datacheckin  = $_POST['datacheckin'];
  $datacheckout = $_POST['datacheckout'];
  $num_hospede  = $_POST['num_hospede'];

  $target       = "../../assets/__storage/" . basename($_FILES['foto']['name']);
  $foto         = $_FILES['foto']['name'];

  // Verificar data 
  $today =  Date('Y-m-d');
  echo $today  ." - ". $datacheckin;
  if($datacheckin > $datacheckout):
    echo '<script> 
            swal({
              title: "Ops!!",
              text: "A data de checkin não pode ser superior a data de checkout.",
              icon: "error",
              button: "Fechar!",
            })
          </script>';
  elseif($datacheckin < $today):
    echo '<script> 
        swal({
          title: "Ops!!",
          text: "A data de checkin não pode ser menor que a data de hoje",
          icon: "error",
          button: "Fechar!",
        })
      </script>';
  else:
    $parametros = [
      ":id"             => $_SESSION['id'],
      ":quarto"         => $quartoId,
      ":dataCheckin"    => $datacheckin,
      ":dataCheckout"   => $datacheckout,
      ":num_hospede"    => $num_hospede,
      ":preco"          => $preco,
      ":statusReserva"  => "Por verificar",
      ":comprovativo"   => $foto
    ];
    $inserirReservaQuarto = new Model();
    $inserirReservaQuarto->EXE_NON_QUERY("INSERT INTO tb_reservas (
        id_hospede, 
        id_quarto, 
        data_checkin_reserva, 
        data_checkout_reserva,
        num_hospedes_reserva,
        preco_total_reserva,
        status_quarto_reserva,
        comprovativo_reserva,
        data_criacao_reserva,
        data_atualizacao_reserva
        ) VALUES (
          :id, 
          :quarto, 
          :dataCheckin, 
          :dataCheckout, 
          :num_hospede,
          :preco, 
          :statusReserva, 
          :comprovativo,
          now(),
          now()
      )", $parametros);

    if($inserirReservaQuarto):
      if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)):
        $sms = "Uploaded feito com sucesso";
      else:
        $sms = "Não foi possível fazer o upload";
      endif;
      echo '<script> 
              swal({
                title: "Dados inseridos!",
                text: "Usuário cadastrado com sucesso",
                icon: "success",
                button: "Fechar!",
              })
            </script>';
      echo '<script>
            setTimeout(function() {
                window.location.href="index.php?id=home";
            }, 2000)
        </script>';
    else:
    echo '<script>
            swal({
              title: "Opps!",
              text: "Ocorreu um erro ao inserir este usuário"
              icon: "error",
              button: "Fechar!",
            })
          </script>';
    endif;
  endif;
endif;



?>
<!-- =============================================== -->
