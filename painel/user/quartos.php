<!-- Component Head -->
<?php require 'components/component-head.php' ?>
<!-- Component Head -->

<?php
  $parametros = [":status_quarto" => "Disponível"];
  $listReservas = new Model();
  $listDetailsReservas = $listReservas->EXE_QUERY("SELECT * FROM tb_quartos
  INNER JOIN tb_hotel ON tb_quartos.id_hotel=tb_hotel.id_hotel
  WHERE status_quarto=:status_quarto
  ", $parametros);
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
              <h4>Lista de Quartos Disponíveis</h4>
            </div>
            <div class="col-lg-12"><hr /></div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="table-responsive bg-white p-2">
                <table class="table" id="tabela">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Hotel</th>
                      <th>Tipo de Quarto</th>
                      <th>Capacidade Quarto</th>
                      <th>Preço do Quarto</th>
                      <th>Status</th>
                      <th>Data de Registro</th>
                      <th class="text-center">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      if($listDetailsReservas):
                        foreach($listDetailsReservas as $details):
                        ?>
                          <tr>
                            <td><?= $details['id_quarto'] ?></td>
                            <td><?= $details['nome_hotel'] ?></td>
                            <td><?= $details['tipo_quarto'] ?></td>
                            <td><?= $details['capacidade_quarto'] ?></td>
                            <td><?= $details['preco_quarto'] . " kz" ?></td>
                            <td><?= $details['status_quarto'] ?></td>
                            <td><?= $details['data_criacao_quarto'] ?></td>
                            <td class="text-center">
                              <?php if($details['status_quarto'] == "Reservado"): ?>
                                <button type="button" disabled title="Efetuar uma reserva" class="btn btn-success btn-sm">
                                  <i class="fas fa-eye fs-xl opacity-60 me-2"></i>
                                </button>
                              <?php else: ?>
                                <a title="Efetuar uma reserva" href="register-reserva.php?id=hotel&userId=<?= $details['id_quarto'] ?>" class="btn btn-primary btn-sm">
                                  <i class="fas fa-eye fs-xl opacity-60 me-2"></i>
                                </a>
                              <?php endif; ?>
                            </td>
                          </tr>
                        <?php 
                        endforeach;
                      else:  ?>
                        <tr>
                          <td colspan="12" class="text-center">Não existe registro</td>
                        </tr>
                      <?php 
                      endif;
                    ?>
                  </tbody>
                </table>
              </div>
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