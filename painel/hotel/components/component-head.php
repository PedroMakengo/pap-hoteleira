<!-- Head -->
<?php require '../../public/verify_session_auth.php' ?>
<!-- End Head -->

<!-- Verify auth user -->
<?php 
  $parametros = [":id" => $_SESSION['id'], ":status_hotel"=>"Inativo"];
  $userAuth = new Model();
  $userAuthVerify = $userAuth->EXE_QUERY("SELECT * FROM tb_hotel 
  WHERE id_hotel=:id AND status_hotel=:status_hotel", $parametros);
?>
<!-- End Head -->



<!-- Inserir assim que a data do checkout passar -->
<?php 
      $parametros = [":id" => $_SESSION['id']];
      $buscandoReservaQuarto = new Model();
      $quartoDesteHotel = $buscandoReservaQuarto->EXE_QUERY("SELECT * FROM tb_reservas 
      INNER JOIN tb_quartos 
      ON tb_reservas.id_quarto=tb_quartos.id_quarto
      INNER JOIN tb_hospedes 
      ON tb_reservas.id_hospede=tb_hospedes.id_hospede
      WHERE tb_quartos.id_hotel=:id", $parametros);

      if($quartoDesteHotel):
        // Inserir no historico a situação da reserva
        foreach($quartoDesteHotel as $details):
          $dataCheckout = $details['data_checkout_reserva'];
          $nomeHospede  = $details['nome_hospede'];
          $idReserva    = $details['id_reserva']; 
          $idQuarto     = $details['id_quarto'];
        endforeach;

        $date = Date("Y-m-d");

        $dataCheckoutSelected = new DateTime(date($dataCheckout));
        $dataAtualFormatada = new DateTime(date($date));
        $differenceDate = $dataAtualFormatada->diff($dataCheckoutSelected)->days;

        if($differenceDate === 3):
          // Faltam 3 dias para a tua reserva terminar...
          $parametros = [
            ":id"               =>  $_SESSION['id'],
            ":actionHistorico"  => "prazo de hospedagem",
            ":nome"             => $nomeHospede,
            ":idReserva"        => $idReserva,
            ":idQuarto"         => $idQuarto
          ];  
          $buscandoReservaRecente = new Model();
          $buscando = $buscandoReservaRecente->EXE_QUERY("SELECT * FROM tb_historico_reserva WHERE
            id_hotel=:id AND 
            action_historico=:actionHistorico AND 
            usuario_historico=:nome AND 
            id_reserva=:idReserva AND 
            id_quarto=:idQuarto", $parametros);

          if(count($buscando)):
            //===================================================================================================================            $today   =  Date('Y-m-d');
            $id    = $_SESSION['id'];
            $action  = "prazo de hospedagem";
            $textLog = $nomeHospede. " ". $action . " termina em 3 dia ";
            $parametros = [
              ":id"     => $id, 
              ":nomeHospede" => $nomeHospede,
              ":actionLog"   => $action, 
              ":textLog"  => $textLog  
            ];
            $insertLog = new Model();
            $insertLog->EXE_NON_QUERY("INSERT INTO tb_historico_reserva 
            (id_hotel, usuario_historico, action_historico, historico, data_historico) 
            VALUES (:id, :nomeHospede,  :actionLog, :textLog, now()) ", $parametros);
            //===================================================================================================================
          endif;
        else:
          $parametros = [
            ":id"               =>  $_SESSION['id'],
            ":actionHistorico"  => "prazo terminado",
            ":nome"             => $nomeHospede,
            ":idReserva"        => $idReserva,
            ":idQuarto"         => $idQuarto
          ];  
          $buscandoReservaRecente = new Model();
          $buscando = $buscandoReservaRecente->EXE_QUERY("SELECT * FROM tb_historico_reserva WHERE
          id_hotel=:id AND 
          action_historico=:actionHistorico AND 
          usuario_historico=:nome AND 
          id_reserva=:idReserva AND 
          id_quarto=:idQuarto", $parametros);

          // Atualizar o estado da reserva do usuário
          if(count($buscando)):
            //===================================================================================================================
            $today   =  Date('Y-m-d');
            $id    = $_SESSION['id'];
            $action  = "prazo terminado";
            $textLog = $nomeHospede. " Opps o teu ". $action . " ";
            $parametros = [
              ":id"     => $id, 
              ":nomeHospede" => $nomeHospede,
              ":actionLog"   => $action, 
              ":textLog"  => $textLog  
            ];
            $insertLog = new Model();
            $insertLog->EXE_NON_QUERY("INSERT INTO tb_historico_reserva 
            (id_hotel, usuario_historico, action_historico, historico, data_historico) 
            VALUES (:id, :nomeHospede,  :actionLog, :textLog, now()) ", $parametros);
            //===================================================================================================================
          else:
            echo "Testando" . count($buscando);
          endif;
        endif;
      endif;
    ?>
    <!--  -->



<!DOCTYPE html>
<html lang="pt-PT">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="../../assets/vendor/bootstrap/css/bootstrap.min.css"
    />
    <link
      href="../../assets/vendor/fonts/circular-std/style.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../assets/libs/css/style.css" />
    <link
      rel="stylesheet"
      href="../../assets/vendor/fonts/fontawesome/css/fontawesome-all.css"
    />

    <link
      rel="stylesheet"
      href="../../assets/vendor/fonts/flag-icon-css/flag-icon.min.css"
    />

    <link rel="stylesheet" href="../../assets/css/dashboard.css" />
    <script src="../../assets/js/template/sweetalert.min.js"></script>
    <title>Sistema de Gestão Hoteleira</title>
  </head>

  <body>