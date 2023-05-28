
<style>
  .buttons button {
    background: #ccc;
    border: 0;
  }

  .buttons button.active {
    background: #704828;
    color: #FFF;
  }
   
  .tab {
    display: none;
  }
</style>

<!-- Component Head -->
<?php require 'components/component-head.php' ?>
<!-- Component Head -->

<?php
  $parametros = [":id" => $_GET['userId']];
  $list = new Model();
  $listDetailsQuartos = $list->EXE_QUERY("SELECT * FROM tb_quartos
  WHERE id_quarto=:id", $parametros);

  // global $status, $quartoId;
  foreach($listDetailsQuartos as $mostrarStatus):
    $status     = $mostrarStatus['status_quarto'];
    $quartoId   = $mostrarStatus['id_quarto'];
    $quarto     = $mostrarStatus['quarto'];
    $capacidade = $mostrarStatus['capacidade_quarto'];
    $preco      = $mostrarStatus['preco_quarto'];
    $precoHora  = $mostrarStatus['preco_hora'];
    $hotelId    = $mostrarStatus['id_hotel'];
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
                        <div class="col-lg-3">
                          <div class="border-bottom mb-2 pb-2">
                            <p>Preço Por Noite: <strong><?= $details['preco_quarto'] ?></strong></p>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="border-bottom mb-2 pb-2">
                            <p>Preço Por Hora: <strong><?= $details['preco_hora'] ?></strong></p>
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

              

            <!-- Fazer com que a pessoa marque a sua reserva porém com uma data de espera -->
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

                  <div class="col-lg-4 mr-4">
                    <div class="form-group">
                      <label for="">Tipo de Reserva:</label>
                      <select name="tipo" id="tabSelect" onchange="changeTab()" class="buttons form-control">
                        <option value="">Selecione o período</option>
                        <option value="tab1">Por dia</option>
                        <option value="tab2">Por hora</option>
                      </select>
                    </div>
                  </div>

                  <div class="row content-tab">
                    <div class="col-lg-12 tab" id="tab1">
                      <div class="row">
                        <div class="col-lg-6 reserva-section">
                          <div class="form-group">
                            <label for="">Data de Checkin:</label>
                            <input type="date" id="data1" name="datacheckin" class="form-control" 
                              onchange="calcularDiferenca()"
                            />
                          </div>
                        </div>

                        <div class="col-lg-6 reserva-section">
                          <div class="form-group">
                            <label for="">Data de Checkout:</label>
                            <input type="date" id="data2" name="datacheckout" class="form-control"
                              onchange="calcularDiferenca()"
                            />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-12 tab" id="tab2">
                      <div class="row">
                        <div class="col-lg-6 reserva-section">
                          <div class="form-group">
                            <label for="" title="Hora de Checkin">Checkin:</label>
                            <input 
                              type="time" 
                              name="horaCheckin" 
                              id="hora1" 
                              class="form-control" 
                              onchange="calcularDiferencaHora()" 
                            />
                            <input type="text" style="display: none" value="hora" name="reservaTipo" class="form-control" />
                          </div>
                        </div>

                        <div class="col-lg-6 reserva-section">
                          <div class="form-group">
                            <label for="" title="Hora de Checkout">Checkout:</label>
                            <input 
                            type="time" 
                            name="horaCheckout" 
                            id="hora2"   
                            class="form-control"
                            onchange="calcularDiferencaHora()"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-2">
                    <div class="form-group">
                      <label for="">Nº Hospede:</label>
                      <input type="number" name="num_hospede" class="form-control" />
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">Preço por Noite:</label>
                      <input type="hidden" name="diferencaEmDias" id="diferenca" />
                      <input type="text" disabled name="preco" value="<?= $preco ?>" id="diferencaVisualizar" class="form-control" />
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">Preço por Hora:</label>
                      <input type="text" disabled name="precoHora" id="precoHora" value="<?= $precoHora ?>" class="form-control" />
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">Comprovativo:</label>
                      <input type="file" name="foto" required class="form-control" />
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
            <!-- Fazer com que a pessoa marque a sua reserva porém com uma data de espera -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Component Footer -->
<?php require 'components/component-footer-reserva.php' ?>
<!-- Component Footer -->


<!-- =============================================== -->
<?php require '../../source/controllers/CriarReserva.php' ?>
<!-- =============================================== -->


<script>
    
    function changeTab() {
      var select = document.getElementById("tabSelect");
      var selectedTab = select.options[select.selectedIndex].value;

      var tabs = document.getElementsByClassName("tab");
      for (var i = 0; i < tabs.length; i++) {
        tabs[i].style.display = "none";
      }
      
      document.getElementById(selectedTab).style.display = "block";
    }

    // CALCULAR DIFERENÇA DE DIAS
    function calcularDiferenca() {
      var data1 = new Date(document.getElementById('data1').value);
      var data2 = new Date(document.getElementById('data2').value);

      // Calcula a diferença em milissegundos
      var diffEmMilissegundos = Math.abs(data2 - data1);

      // Calcula a diferença em dias
      var diffEmDias = Math.ceil(diffEmMilissegundos / (1000 * 60 * 60 * 24));

      // Adiciona o valor no input "diferenca"
      document.getElementById('diferenca').value = diffEmDias;

      // Calcula o valor total
      var preco = <?php echo $preco; ?>;
      var valorTotal = preco * diffEmDias;

      var valorTotalFormatado  = valorTotal.toLocaleString('pt-AO', { style: 'currency', currency: 'AOA' });

      // Exibe o valor da diferença e o valor total dentro do campo de entrada
      document.getElementById('diferencaVisualizar').value = valorTotalFormatado;
    }

    function calcularDiferencaHora() {
      var hora1 = document.getElementById('hora1').value;
      var hora2 = document.getElementById('hora2').value;

      // Converter as horas para objetos Date
      var time1 = new Date('1970-01-01T' + hora1 + 'Z');
      var time2 = new Date('1970-01-01T' + hora2 + 'Z');

      // Calcular a diferença em minutos
      var diffEmMinutos = (time2 - time1) / 1000 / 60;

      // Adicionar o valor no input "diferenca"
      document.getElementById('diferenca').value = diffEmMinutos;

      // Calcular o valor total
      var valorTotal = <?= $precoHora ?> * diffEmMinutos;

      var valorTotalFormatado  = valorTotal.toLocaleString('pt-AO', { style: 'currency', currency: 'AOA' });

      // console.log(valorTotalFormatado)
      // Exibir o valor da diferença e o valor total dentro do campo de entrada
      document.getElementById('precoHora').value = valorTotalFormatado;
    }
</script>