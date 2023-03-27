<?php 

  // Reserva Quarto
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
        // Executar a operação de atualizar o estado da reserva
        $parametros = [":id" => $quartoId, ":statusQuarto" => "Reservado"];
        $atualizarQuarto = new Model();
        $atualizarQuarto->EXE_NON_QUERY("UPDATE tb_quartos SET
          status_quarto=:statusQuarto
          WHERE id_quarto=:id", $parametros);

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


  // Reserva Mesa
  if(isset($_POST['reservarMesaSelecionada'])):

    $target       = "../../assets/__storage/" . basename($_FILES['foto']['name']);
    $foto         = $_FILES['foto']['name'];

    $datacheckin = $_POST['dataCheckin'];


    $parametros = [
      ":idMesa"         => $idMesa,
      ":id"             => $_SESSION['id'],
      ":idRestaurante"  => $idRestaurante,
      ":dataCheckin"    => $datacheckin,
      ":status_mesa"    => "Reservado",
      ":foto"           => $foto
    ];

    $inserirReservaMesa = new Model();
    $inserirReservaMesa->EXE_NON_QUERY("INSERT INTO tb_mesa_reservas 
    (
      id_mesa, 
      id_hospede, 
      id_restaurante, 
      data_checkin_mesa_reserva, 
      status_mesa_reserva,
      comprovativo_mesa_reserva,
      data_criacao_mesa_reserva,
      data_atualizacao_mesa_reserva 
      ) 
    VALUES 
    (:idMesa, :id, :idRestaurante, :dataCheckin, :status_mesa, :foto, now(), now()) ", $parametros);

    if($inserirReservaMesa):
      if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)):
        $sms = "Uploaded feito com sucesso";
      else:
        $sms = "Não foi possível fazer o upload";
      endif;


      // Atualizar o estado da reserva
      $parametros = [":id" => $idMesa, ":statusMesa" => "Reservado"];
      $atualizarQuarto = new Model();
      $atualizarQuarto->EXE_NON_QUERY("UPDATE tb_mesas SET 
      status_mesa=:statusMesa
      WHERE id_mesa=:id", $parametros);
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
    endif;
  endif;
  

