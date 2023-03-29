<!-- Component Head -->
<?php require 'components/component-head.php' ?> 
<!-- Component Head -->

<?php 
  $parametros = [":id" => $_SESSION['id']];
  $listMesasUser = new Model();
  $listMesasRestaurantes = $listMesasUser->EXE_QUERY("SELECT * FROM tb_mesas 
  INNER JOIN tb_restaurante ON 
  tb_mesas.id_restaurante=tb_restaurante.id_restaurante
  WHERE tb_restaurante.id_hotel=:id", $parametros);
?>

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
                    <h4>Dados referente ao <strong><?= $_GET['nome'] ?></strong>
                    </h4>
                  </div>
                  <div class="col-lg-12"><hr /></div>
                </div>
                
                <div class="row">
                  <div class="col-lg-12 p-4">
                  <form method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="">Nome da Mesa <sup>*</sup></label>
                            <input type="text" required name="nome_mesa" class="form-control form-control-lg">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="">Tipo de Mesa <sup>*</sup></label>
                            <select name="tipo" required class="form-control form-control-lg">
                              <option value="">Selecione o tipo de mesa</option>
                              <option value="Vip">Vip</option>
                              <option value="Normal">Normal</option>
                              <option value="Medio">Medio</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="">Preço <sup>*</sup></label>
                            <input type="text" name="preco" required class="form-control form-control-lg">
                          </div>
                        </div>

                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="">Comidas <sup>*</sup></label>
                            <input type="text" required name="comidas" class="form-control form-control-lg">
                          </div>
                        </div>

                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="">Bebidas <sup>*</sup></label>
                            <input type="text" required name="bebidas" class="form-control form-control-lg">
                          </div>
                        </div>

                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="">Restaurante</label>
                            <input type="text" value=<?= $_GET['nome'] ?> disabled name="bebidas" class="form-control form-control-lg">
                          </div>
                        </div>

                        <div class="col-lg-4">
                          <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="register-mesa" value="Registrar Mesa" >
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

      if(isset($_POST['register-mesa'])):

        $nome = $_POST['nome_mesa'];
        $tipo = $_POST['tipo'];
        $preco = $_POST['preco'];
        $comida = $_POST['comidas'];
        $bebidas = $_POST['bebidas'];
        $statusMesa = "Disponível";

        $parametros = [
          ":id"         => $_SESSION['id'],
          ":nome"       => $nome,
          ":tipo"       => $tipo,
          ":preco"      => $preco,
          ":statusMesa" => $statusMesa,
          ":comida"     => $comida,
          ":bebidas"    => $bebidas
        ];

        $inserirMesa = new Model();
        $inserirMesa->EXE_NON_QUERY("INSERT INTO tb_mesas
        (
          id_restaurante, 
          nome_mesa, 
          tipo_mesa, 
          preco_mesa, 
          status_mesa,
          descricao_comida,
          descricao_bebidas,
          data_criacao_mesa,
          data_atualizacao__mesa
        ) 
        VALUES (
        :id, 
        :nome, 
        :tipo, 
        :preco, 
        :statusMesa,
        :comida,
        :bebidas,
        now(),
        now()
        )",$parametros);

        if($inserirMesa):
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
                  window.location.href="mesas-restaurante.php?id=mesas";
              }, 1000)
          </script>';
        endif;
      endif;
    
    ?>

    <!-- Component Header -->
    <?php require 'components/component-footer.php' ?> 
    <!-- Component Header -->