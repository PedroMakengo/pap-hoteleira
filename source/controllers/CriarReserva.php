<?php 

  // Reserva Quarto
  if(isset($_POST['reserva'])):
    $datacheckin  = $_POST['datacheckin'];
    $datacheckout = $_POST['datacheckout'];
    $num_hospede  = $_POST['num_hospede'];

    $horaCheckin  = $_POST['horaCheckin'];
    $horaCheckout = $_POST['horaCheckout'];
  
    $target       = "../../assets/__storage/" . basename($_FILES['foto']['name']);
    $foto         = $_FILES['foto']['name'];
  
    // Verificar data 
    $today =  Date('Y-m-d');

    // Pegando o campo hora checkout
    // Verificando a capacidade do quarto 
   

    if($_POST['tipo'] == "tab1"):
      // Registro de reserva por dia
      $checkInTimestamp = strtotime($datacheckin);
      $checkOutTimestamp = strtotime($datacheckout);
  
      $difference = $checkOutTimestamp - $checkInTimestamp;
      $totalDays = floor($difference / (60 * 60 * 24));


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

        // Verificar se existe uma reserva com essa data de checkin e checkout 
        $parametros = [
          ":dataCheckin" => $datacheckin, 
          ":dataCheckout" => $datacheckout
        ];

        $reservas = new Model();
        $buscandoTodosQuartosReservados = $reservas->EXE_QUERY("SELECT * FROM tb_reservas
        WHERE data_checkin_reserva=:dataCheckin AND data_checkout_reserva=:dataCheckout", $parametros);

        if($buscandoTodosQuartosReservados):
          echo '<script> 
                  swal({
                    title: "Ops!!",
                    text: "Não podes reservas nesta data de checkin e checkout",
                    icon: "error",
                    button: "Fechar!",
                  })
                </script>';
        else:

          $parametros = [":id" => $quartoId];
          $buscandoNumCapacidadeQuarto = new Model();
          $quartoCapacidade = $buscandoNumCapacidadeQuarto->EXE_QUERY("SELECT * FROM tb_quartos WHERE id_quarto=:id", $parametros);
          foreach($quartoCapacidade as $details):
            $numQuantidadeHopesde = $details['capacidade_quarto'];
          endforeach;
          
          if($num_hospede > $numQuantidadeHopesde):
            echo '<script> 
                  swal({
                    title: "Erro!",
                    text: "O nº de hospede não pode ser maior que a capacidade do quarto",
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
              ":comprovativo"   => $foto, 
              ":totalNoites"    => $totalDays,
              ":horaCheckin"    => $horaCheckin,      
              ":horaCheckout"   => $horaCheckout,
              ":totalHoras"     => 0     
            ];
            $inserirReservaQuarto = new Model();
            $inserirReservaQuarto->EXE_NON_QUERY("INSERT INTO tb_reservas 
              (
                id_hospede, 
                id_quarto, 
                data_checkin_reserva, 
                data_checkout_reserva,
                num_hospedes_reserva,
                preco_total_reserva,
                status_quarto_reserva,
                comprovativo_reserva,
                data_criacao_reserva,
                data_atualizacao_reserva,
                total_noites,
                hora_checkin,
                hora_checkout,
                total_horas
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
                  now(),
                  :totalNoites,
                  :horaCheckin, 
                  :horaCheckout,
                  :totalHoras
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
            
              // Buscar o id da reserva 
              $parametros = [
                ":idHospede"    => $_SESSION['id'],
                ":numHospede"   => $num_hospede,
                ":comprovativo" => $foto
              ];
              // Só executa isso depois de encontrar o id da reserva
              $buscandoIdReserva = new Model();
              $reservaSearch = $buscandoIdReserva->EXE_QUERY("SELECT * FROM tb_reservas
              WHERE 
                id_hospede=:idHospede AND 
                num_hospedes_reserva=:numHospede AND 
                comprovativo_reserva=:comprovativo
                ", $parametros);
  
              foreach($reservaSearch as $details):
                $idReserva = $details['id_reserva'];
              endforeach;
  
              if(count($reservaSearch)):
                  // Informar ao hotel quando o usuário faz uma reserva
                  //===================================================================================================================
                  $today   =  Date('Y-m-d');
                  $id      = $hotelId;
                  $action  = "reservou";
                  $textLog = $_SESSION['nome']. " ". $action . " um quarto referência " . $quarto;
                  $parametros = [
                    ":id"          => $id, 
                    ":nomeHospede" => $_SESSION['nome'],
                    ":actionLog"   => $action, 
                    ":textLog"     => $textLog,
                    ":idReserva"   => $idReserva,
                    ":idQuarto"    => $quartoId
                  ];
                  $insertLog = new Model();
                  $insertLog->EXE_NON_QUERY("INSERT INTO tb_historico_reserva 
                  (id_hotel, usuario_historico, action_historico, historico, data_historico, id_reserva, id_quarto) 
                  VALUES (:id, :nomeHospede,  :actionLog, :textLog, now(), :idReserva, :idQuarto)", $parametros);
                //===================================================================================================================
  
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
            // Mensagem de erro 
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
      endif;





      // Registro de reserva por dia
    else:   
      // Extrair horas e minutos de check-in e check-out
      list($checkInHour, $checkInMinute) = explode(':', $horaCheckin);
      list($checkOutHour, $checkOutMinute) = explode(':', $horaCheckout);

      // Calcular total de minutos de check-in e check-out
      $totalCheckInMinutes = ($checkInHour * 60) + $checkInMinute;
      $totalCheckOutMinutes = ($checkOutHour * 60) + $checkOutMinute;

      if($totalCheckInMinutes > $totalCheckOutMinutes):
        echo '<script> 
          swal({
            title: "Ops!!",
            text: "A hora de checkin não pode ser superior a hora de checkout.",
            icon: "error",
            button: "Fechar!",
          })
        </script>';
      else:

        $parametros = [":id" => $quartoId];
        $buscandoNumCapacidadeQuarto = new Model();
        $quartoCapacidade = $buscandoNumCapacidadeQuarto->EXE_QUERY("SELECT * FROM tb_quartos WHERE id_quarto=:id", $parametros);
        foreach($quartoCapacidade as $details):
          $numQuantidadeHopesde = $details['capacidade_quarto'];
        endforeach;

        if($num_hospede > $numQuantidadeHopesde):
          echo '<script> 
                swal({
                  title: "Erro!",
                  text: "O nº de hospede não pode ser maior que a capacidade do quarto",
                  icon: "error",
                  button: "Fechar!",
                })
              </script>';
        else:

          // Calcular total de horas
          $totalMinutes = $totalCheckOutMinutes - $totalCheckInMinutes;
          $totalHours = floor($totalMinutes / 60);

          $parametros = [
            ":id"             => $_SESSION['id'],
            ":quarto"         => $quartoId,
            ":dataCheckin"    => $datacheckin,
            ":dataCheckout"   => $datacheckout,
            ":num_hospede"    => $num_hospede,
            ":preco"          => $preco,
            ":statusReserva"  => "Por verificar",
            ":comprovativo"   => $foto, 
            ":totalNoites"    => 0,
            ":horaCheckin"    => $horaCheckin,      
            ":horaCheckout"   => $horaCheckout,
            ":totalHoras"     => $totalHours 
          ];

          $inserirReservaQuarto = new Model();
          $inserirReservaQuarto->EXE_NON_QUERY("INSERT INTO tb_reservas 
            (
              id_hospede, 
              id_quarto, 
              data_checkin_reserva, 
              data_checkout_reserva,
              num_hospedes_reserva,
              preco_total_reserva,
              status_quarto_reserva,
              comprovativo_reserva,
              data_criacao_reserva,
              data_atualizacao_reserva,
              total_noites,
              hora_checkin,
              hora_checkout,
              total_horas 
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
                now(),
                :totalNoites,
                :horaCheckin, 
                :horaCheckout,
                :totalHoras
            )", $parametros);

          if($inserirReservaQuarto):
            // Buscar o id da reserva 
            $parametros = [
              ":idHospede"    => $_SESSION['id'],
              ":numHospede"   => $num_hospede,
              ":comprovativo" => $foto
            ];

            $buscandoIdReserva = new Model();
            $reservaSearch = $buscandoIdReserva->EXE_QUERY("SELECT * FROM tb_reservas
            WHERE 
              id_hospede=:idHospede AND 
              num_hospedes_reserva=:numHospede AND 
              comprovativo_reserva=:comprovativo
              ", $parametros);

            foreach($reservaSearch as $details):
              $idReserva = $details['id_reserva'];
            endforeach;


            echo " Estou aqui ". $idReserva;
      
            if(count($reservaSearch)):
              // Informar ao hotel quando o usuário faz uma reserva
              //===================================================================================================================
              $today   =  Date('Y-m-d');
              $id      = $hotelId;
              $action  = "reservou";
              $textLog = $_SESSION['nome']. " ". $action . " um quarto referência " . $quarto;
              $parametros = [
                ":id"          => $id, 
                ":nomeHospede" => $_SESSION['nome'],
                ":actionLog"   => $action, 
                ":textLog"     => $textLog,
                ":idReserva"   => $idReserva,
                ":idQuarto"    => $quartoId
              ];
              $insertLog = new Model();
              $insertLog->EXE_NON_QUERY("INSERT INTO tb_historico_reserva 
              (id_hotel, usuario_historico, action_historico, historico, data_historico, id_reserva, id_quarto) 
              VALUES (:id, :nomeHospede,  :actionLog, :textLog, now(), :idReserva, :idQuarto)", $parametros);
            //===================================================================================================================

              echo '<script> 
                      swal({
                        title: "Dados inseridos!",
                        text: "Operação efetuada com sucesso",
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
      endif;
    endif;
  endif;


























  // Reserva Mesa
  if(isset($_POST['reservarMesaSelecionada'])):

    $target       = "../../assets/__storage/" . basename($_FILES['foto']['name']);
    $foto         = $_FILES['foto']['name'];

    $datacheckin = $_POST['dataCheckin'];

    $today =  Date('Y-m-d');

    if($datacheckin >= $today):

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

        // Histórico de Reserva de Mesa
        //===================================================================================================================
        $today   =  Date('Y-m-d');
        $id      = $hotelId;
        $action  = "reservou";
        $textLog = $_SESSION['nome']. " ". $action . " uma mesa com referência " . $mesa;
        $parametros = [
          ":id"     => $id, 
          ":nomeHospede" => $_SESSION['nome'],
          ":actionLog"   => $action, 
          ":textLog"  => $textLog  
        ];
        $insertLog = new Model();
        $insertLog->EXE_NON_QUERY("INSERT INTO tb_historico_reserva 
        (id_hotel, usuario_historico, action_historico, historico, data_historico) 
        VALUES (:id, :nomeHospede,  :actionLog, :textLog, now()) ", $parametros);
        //===================================================================================================================

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
    else:
      echo '<script> 
              swal({
                title: "Ops!!",
                text: "A data de checkin não pode ser menor que a data de hoje",
                icon: "error",
                button: "Fechar!",
              })
            </script>';
    endif;
  endif;
  

