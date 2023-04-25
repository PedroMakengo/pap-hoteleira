<!-- Head -->
<?php require '../../public/verify_session_auth.php' ?>
<!-- End Head -->

<!-- Verificando se existe um action prazo termrinado para atualizar o status -->
<?php 
  $parametros = [
    ":nome" => $_SESSION['nome'], 
    ":actionHistorico"=> "prazo terminado"
  ];
  $buscandoHistorico = new Model();
  $buscando = $buscandoHistorico->EXE_QUERY("SELECT * FROM tb_historico_reserva 
  WHERE usuario_historico=:nome AND action_historico=:actionHistorico  ORDER BY data_historico DESC", $parametros);

  if(count($buscando)):
    // Atualizar o stado da reserva
    $parametros = [
      ":id" => $_SESSION['id'],
      ":estado"   => "Disponível"  
    ];

    $updateState = new Model();
    $updateState->EXE_NON_QUERY("UPDATE tb_reservas SET status_quarto_reserva=:estado 
    WHERE id_hospede=:id", $parametros);

    // echo "Testando";
    echo '<script> 
          swal({
            title: "Dados atualizados!",
            text: "Terminou o seu prazo de hospedagem verifica nas notificações",
            icon: "success",
            button: "Fechar!",
          })
        </script>';

  endif;
?>

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
    <title>Sistema de Gestão Hoteleira</title>
    <script src="../../assets/js/template/sweetalert.min.js"></script>
  </head>

  <body>