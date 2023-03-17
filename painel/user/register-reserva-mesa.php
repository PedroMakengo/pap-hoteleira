<!-- Component Head -->
<?php require 'components/component-head.php' ?>
<!-- Component Head -->

<?php
  $parametros = [":id" => $_GET['id']];
  $list = new Model();
  $listaMesa = $list->EXE_QUERY("SELECT * FROM tb_mesas
  INNER JOIN tb_restaurante ON 
  tb_mesas.id_restaurante=tb_restaurante.id_restaurante
  INNER JOIN tb_hotel ON 
  tb_restaurante.id_hotel=tb_hotel.id_hotel
  WHERE tb_mesas.id_mesa=:id", $parametros);

  foreach($listaMesa as $mostrar):
    $idRestaurante = $mostrar['id_restaurante'];
    $idMesa        = $mostrar['id_mesa'];
    $statusMesa    = $mostrar['status_mesa'];
    $restaurante   = $mostrar['nome_restaurante'];
    $hotel         = $mostrar['nome_hotel'];
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
              <h3>Dados da Mesa selecionado</h3>
            </div>
            <div class="col-lg-12"><hr /></div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Retornar as informações do quarto -->
              <?php 
                if($listaMesa):
                  foreach($listaMesa as $details):
              ?>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="border-bottom mb-2 pb-2">
                            <p>Mesa: <strong><?= $details['nome_mesa'] ?></strong></p>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="border-bottom mb-2 pb-2">
                            <p>Tipo de Mesa: <strong><?= $details['tipo_mesa'] ?></strong></p>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="border-bottom mb-2 pb-2">
                            <p>Preço do Mesa: <strong><?= $details['preco_mesa'] ?></strong></p>
                          </div>
                        </div>
                        <div class="col-lg-3s">
                          <div class="border-bottom mb-2 pb-2">
                            <p>Restaurante: <strong><?= $details['nome_restaurante'] ?></strong></p>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="border-bottom mb-2 pb-2">
                            <p>Classificação do Restaurante: <strong><?= $details['classificacao_restaurante'] ?></strong></p>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="border-bottom mb-2 pb-2">
                            <p>Descrição: <br> <strong><?= $details['descricao_restaurante'] ?></strong></p>
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
           
            <?php if($statusMesa == "Reservado"): ?>
              <div class="col-lg-12 mt-4">
                <div class="text-center">
                  <p>Não é possível efetuar uma reserva porque a mesa encontra-se em reservado</p>
                </div>
              </div>
              <?php elseif($statusMesa == "Disponível"): ?>
                <div class="col-lg-12 mt-4">
                  <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-lg-12">
                        <h3>Efetuar a reservado da mesa selecionado</h3>
                        <hr>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Nome do Hospede</label>
                          <input type="text" class="form-control" disabled value="<?= $_SESSION['nome'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <label for="">Mesa</label>
                          <input type="text" class="form-control" disabled value="<?= $restaurante?>">
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <label for="">Restaurante</label>
                          <input type="text" class="form-control" disabled value="<?= $restaurante?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Hotel</label>
                          <input type="text" class="form-control" disabled value="<?= $hotel ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">DataCheckin</label>
                          <input type="date" class="form-control" name="dataCheckin" />
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="form-group">
                          <label for="">Comprovativo:</label>
                          <input type="file" class="form-control" name="foto" />
                        </div>
                      </div>
                      <div class="col-lg-3 mt-2">
                        <div class="form-group">
                          <input type="submit" name="reservarMesaSelecionada" value="Efetuar reserva" class="form-control btn-primary" />
                        </div>
                      </div>
                    </div>
                  </form>
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
<?php require '../../source/controllers/CriarReserva.php' ?>
<!-- =============================================== -->
