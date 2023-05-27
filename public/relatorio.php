<?php
    include '../source/model/Config.php';
    include '../source/model/Model.php';
    include '../assets/mpdf-6.1/mpdf.php';
    
    // Instanciar 
    $hotel = new Model();

    switch ($_GET['id']):

      case 'hoteis':
        // Instanciando
          $sql = $hotel->EXE_QUERY("SELECT * FROM tb_hotel");
          $html = "
                <html>
                  <head>
                      <style type='text/css'>
                          body {margin: 0 auto;padding: 0px;font-weight: 100 !important;}
                          .container {margin: 100px auto !important;}
                          .nav-header {margin: 0px auto;text-align: center;}
                          .mk-title {font-weight: 100;font-size: 18px;}
                          .mk-title-lg {font-weight: 100;font-size: 18px}
                          img {width: 200px}

                          table { width: 100%; border-spacing: 0 0.5rem; }
                          table th {
                            background: #0193F9;
                            font-weight: 400;
                            padding: 1rem 2rem;
                            text-align: left;
                            line-height: 1.5rem;
                          }
                          table td {
                            padding: 1rem 2rem;
                            border: 0;
                            background: #f7f7f7;
                            color: #000 !important;
                          }
                      </style>
                  </head>
                  <body>
                      <div class='container'>
                          <div class='row'>
                              <div class='nav-header'>
                                  <img src='../assets/images/logo.png'>
                                  <h2 class='text-center h5 mk-title'>Sistema de Gestão Hoteleiro</h2>
                                  <p class='mt-2'>Relatório de Hoteis Cadastrados</p>
                              </div>
                          </div>
                          <div class='body-mk mt-4'>
                              <div class='table'>
                                  <table>
                                      <thead>
                                          <tr>
                                              <th style='color: white'>Id</th>
                                              <th style='color: white'>Nome</th>
                                              <th style='color: white'>E-mail</th>
                                              <th style='color: white'>NIF</th>
                                              <th style='color: white'>Endereço</th>
                                              <th style='color: white'>Cidade</th>
                                          </tr>
                                      </thead>
                                      <tbody>
              ";
              foreach ($sql as $mostrar) :
                $html = $html ."
                                          <tr>
                                            <td>{$mostrar["id_hotel"] }</td>
                                            <td>{$mostrar["nome_hotel"] }</td>
                                            <td>{$mostrar["email_hotel"] }</td>
                                            <td>{$mostrar["nif_hotel"] }</td>
                                            <td>{$mostrar["endereco_hotel"] }</td>
                                            <td>{$mostrar["cidade_hotel"] }</td>
                                          </tr>
                ";
                      endforeach;
                      $html = $html."
                                      </tbody>
                                  </table>
                              </div>
                          </div>
              </div>
              ";

          $multa = "index.php";
          $mpdf = new mPDF();
          $mpdf->SetDisplayMode("fullpage");
          $mpdf->WriteHTML($html);
          $mpdf->Output($multa, 'I');
          exit();
      break;

      case 'restaurante':
        // Instanciando
          $sql = $hotel->EXE_QUERY("SELECT * FROM tb_restaurante 
            INNER JOIN tb_hotel ON 
            tb_restaurante.id_hotel=tb_hotel.id_hotel");
          $html = "
                <html>
                  <head>
                      <style type='text/css'>
                          body {margin: 0 auto;padding: 0px;font-weight: 100 !important;}
                          .container {margin: 100px auto !important;}
                          .nav-header {margin: 0px auto;text-align: center;}
                          .mk-title {font-weight: 100;font-size: 18px;}
                          .mk-title-lg {font-weight: 100;font-size: 18px}
                         img {width: 200px}

                          table { width: 100%; border-spacing: 0 0.5rem; }
                          table th {
                            background: #0193F9;
                            font-weight: 400;
                            padding: 1rem 2rem;
                            text-align: left;
                            line-height: 1.5rem;
                          }
                          table td {
                            padding: 1rem 2rem;
                            border: 0;
                            background: #f7f7f7;
                            color: #000 !important;
                          }
                      </style>
                  </head>
                  <body>
                      <div class='container'>
                          <div class='row'>
                              <div class='nav-header'>
                                  <img src='../assets/images/logo.png'>
                                  <h2 class='text-center h5 mk-title'>Sistema de Gestão Hoteleiro</h2>
                                  <p class='mt-2'>Relatório de Restaurantes Cadastrados</p>
                              </div>
                          </div>
                          <div class='body-mk mt-4'>
                              <div class='table'>
                                  <table>
                                      <thead>
                                          <tr>
                                              <th style='color: white'>Id</th>
                                              <th style='color: white'>Hotel</th>
                                              <th style='color: white'>Restaurante</th>
                                              <th style='color: white'>Nº de Mesas</th>
                                              <th style='color: white'>Classificação</th>
                                              <th style='color: white'>Data Registro</th>
                                          </tr>
                                      </thead>
                                      <tbody>
              ";
              foreach ($sql as $mostrar) :
                $html = $html ."
                                          <tr>
                                            <td>{$mostrar["id_restaurante"] }</td>
                                            <td>{$mostrar["nome_hotel"] }</td>
                                            <td>{$mostrar["nome_restaurante"] }</td>
                                            <td>{$mostrar["num_mesas_restaurante"] }</td>
                                            <td>{$mostrar["classificacao_restaurante"] }</td>
                                            <td>{$mostrar["data_criacao_restaurante"] }</td>
                                          </tr>
                ";
                      endforeach;
                      $html = $html."
                                      </tbody>
                                  </table>
                              </div>
                          </div>
              </div>
              ";

          $multa = "index.php";
          $mpdf = new mPDF();
          $mpdf->SetDisplayMode("fullpage");
          $mpdf->WriteHTML($html);
          $mpdf->Output($multa, 'I');
          exit();
      break;

      case 'usuarios':
        // Instanciando
          $sql = $hotel->EXE_QUERY("SELECT * FROM tb_hospedes");
          $html = "
                <html>
                  <head>
                      <style type='text/css'>
                          body {margin: 0 auto;padding: 0px;font-weight: 100 !important;}
                          .container {margin: 100px auto !important;}
                          .nav-header {margin: 0px auto;text-align: center;}
                          .mk-title {font-weight: 100;font-size: 18px;}
                          .mk-title-lg {font-weight: 100;font-size: 18px}
                         img {width: 200px}

                          table { width: 100%; border-spacing: 0 0.5rem; }
                          table th {
                            background: #0193F9;
                            font-weight: 400;
                            padding: 1rem 2rem;
                            text-align: left;
                            line-height: 1.5rem;
                          }
                          table td {
                            padding: 1rem 2rem;
                            border: 0;
                            background: #f7f7f7;
                            color: #000 !important;
                          }
                      </style>
                  </head>
                  <body>
                      <div class='container'>
                          <div class='row'>
                              <div class='nav-header'>
                                  <img src='../assets/images/logo.png'>
                                  <h2 class='text-center h5 mk-title'>Sistema de Gestão Hoteleiro</h2>
                                  <p class='mt-2'>Relatório de Hospedes de Cadastrados</p>
                              </div>
                          </div>
                          <div class='body-mk mt-4'>
                              <div class='table'>
                                  <table>
                                      <thead>
                                          <tr>
                                              <th style='color: white'>Id</th>
                                              <th style='color: white'>Nome</th>
                                              <th style='color: white'>E-mail</th>
                                              <th style='color: white'>BI</th>
                                              <th style='color: white'>Tel</th>
                                              <th style='color: white'>Genero</th>
                                              <th style='color: white'>Data Registro</th>
                                          </tr>
                                      </thead>
                                      <tbody>
              ";
              foreach ($sql as $mostrar) :
                $genero = $mostrar['genero_hospedes'] == 'M' ? 'Masculino': 'Femenino';
                $html = $html ."
                                          <tr>
                                            <td>{$mostrar["id_hospede"] }</td>
                                            <td>{$mostrar["nome_hospede"] }</td>
                                            <td>{$mostrar["email_hospede"] }</td>
                                            <td>{$mostrar["bi_hospede"] }</td>
                                            <td>{$mostrar["telefone_hospede"] }</td>
                                            <td>{$genero}</td>
                                            <td>{$mostrar['data_criacao_hospede']}</td>s
                                          </tr>
                ";
                      endforeach;
                      $html = $html."
                                      </tbody>
                                  </table>
                              </div>
                          </div>
              </div>
              ";

          $multa = "index.php";
          $mpdf = new mPDF();
          $mpdf->SetDisplayMode("fullpage");
          $mpdf->WriteHTML($html);
          $mpdf->Output($multa, 'I');
          exit();
      break;

      case 'reservas-quarto':
        // Instanciando
          $sql = $hotel->EXE_QUERY("SELECT * FROM tb_reservas 
          INNER JOIN tb_quartos ON 
          tb_reservas.id_quarto=tb_quartos.id_quarto
          INNER JOIN tb_hospedes ON 
          tb_reservas.id_hospede=tb_hospedes.id_hospede
          INNER JOIN tb_hotel ON 
          tb_quartos.id_hotel=tb_hotel.id_hotel");
          $html = "
                <html>
                  <head>
                      <style type='text/css'>
                          body {margin: 0 auto;padding: 0px;font-weight: 100 !important;}
                          .container {margin: 100px auto !important;}
                          .nav-header {margin: 0px auto;text-align: center;}
                          .mk-title {font-weight: 100;font-size: 18px;}
                          .mk-title-lg {font-weight: 100;font-size: 18px}
                         img {width: 200px}

                          table { width: 100%; border-spacing: 0 0.5rem; }
                          table th {
                            background: #0193F9;
                            font-weight: 400;
                            padding: 1rem 2rem;
                            text-align: left;
                            line-height: 1.5rem;
                          }
                          table td {
                            padding: 1rem 2rem;
                            border: 0;
                            background: #f7f7f7;
                            color: #000 !important;
                          }
                      </style>
                  </head>
                  <body>
                      <div class='container'>
                          <div class='row'>
                              <div class='nav-header'>
                                  <img src='../assets/images/logo.png'>
                                  <h2 class='text-center h5 mk-title'>Sistema de Gestão Hoteleiro</h2>
                                  <p class='mt-2'>Relatório de Reservas de Quartos Cadastrados</p>
                              </div>
                          </div>
                          <div class='body-mk mt-4'>
                              <div class='table'>
                                  <table>
                                      <thead>
                                          <tr>
                                              <th style='color: white'>Id</th>
                                              <th style='color: white'>Nome Hospede</th>
                                              <th style='color: white'>Hotel</th>
                                              <th style='color: white'>Quarto</th>
                                              <th style='color: white'>Checkin</th>
                                              <th style='color: white'>Checkout</th>
                                              <th style='color: white'>Data Registro</th>
                                          </tr>
                                      </thead>
                                      <tbody>
              ";
              foreach ($sql as $mostrar) :
                $html = $html ."
                                          <tr>
                                            <td>{$mostrar["id_reserva"] }</td>
                                            <td>{$mostrar["nome_hospede"] }</td>
                                            <td>{$mostrar["nome_hotel"] }</td>
                                            <td>{$mostrar["quarto"] }</td>
                                            <td>{$mostrar["data_checkin_reserva"] }</td>
                                            <td>{$mostrar["data_checkout_reserva"] }</td>
                                            <td>{$mostrar["data_criacao_reserva"] }</td>
                                          </tr>
                ";
                      endforeach;
                      $html = $html."
                                      </tbody>
                                  </table>
                              </div>
                          </div>
              </div>
              ";

          $multa = "index.php";
          $mpdf = new mPDF();
          $mpdf->SetDisplayMode("fullpage");
          $mpdf->WriteHTML($html);
          $mpdf->Output($multa, 'I');
          exit();
      break;

      case 'reservas-mesa':
        // Instanciando
          $sql = $hotel->EXE_QUERY("SELECT * FROM tb_mesa_reservas 
          INNER JOIN tb_mesas ON 
          tb_mesa_reservas.id_mesa=tb_mesas.id_mesa 
          INNER JOIN tb_restaurante ON 
          tb_mesas.id_restaurante=tb_restaurante.id_restaurante 
          INNER JOIN tb_hotel ON 
          tb_restaurante.id_hotel=tb_hotel.id_hotel
          INNER JOIN tb_hospedes ON 
          tb_mesa_reservas.id_hospede=tb_hospedes.id_hospede");
          $html = "
                <html>
                  <head>
                      <style type='text/css'>
                          body {margin: 0 auto;padding: 0px;font-weight: 100 !important;}
                          .container {margin: 100px auto !important;}
                          .nav-header {margin: 0px auto;text-align: center;}
                          .mk-title {font-weight: 100;font-size: 18px;}
                          .mk-title-lg {font-weight: 100;font-size: 18px}
                         img {width: 200px}

                          table { width: 100%; border-spacing: 0 0.5rem; }
                          table th {
                            background: #0193F9;
                            font-weight: 400;
                            padding: 1rem 2rem;
                            text-align: left;
                            line-height: 1.5rem;
                          }
                          table td {
                            padding: 1rem 2rem;
                            border: 0;
                            background: #f7f7f7;
                            color: #000 !important;
                          }
                      </style>
                  </head>
                  <body>
                      <div class='container'>
                          <div class='row'>
                              <div class='nav-header'>
                                  <img src='../assets/images/logo.png'>
                                  <h2 class='text-center h5 mk-title'>Sistema de Gestão Hoteleiro</h2>
                                  <p class='mt-2'>Relatório de Mesas Cadastrados</p>
                              </div>
                          </div>
                          <div class='body-mk mt-4'>
                              <div class='table'>
                                  <table>
                                      <thead>
                                          <tr>
                                              <th style='color: white'>Id</th>
                                              <th style='color: white'>Cliente</th>
                                              <th style='color: white'>Hotel</th>
                                              <th style='color: white'>Mesa</th>
                                              <th style='color: white'>Data Registro</th>
                                          </tr>
                                      </thead>
                                      <tbody>
              ";
              foreach ($sql as $mostrar) :
                $html = $html ."
                                          <tr>
                                            <td>{$mostrar["id_reserva_mesa"] }</td>
                                            <td>{$mostrar["nome_hospede"] }</td>
                                            <td>{$mostrar["nome_hotel"] }</td>
                                            <td>{$mostrar["nome_mesa"] }</td>
                                            <td>{$mostrar["data_criacao_mesa_reserva"] }</td>
                                          </tr>
                ";
                      endforeach;
                      $html = $html."
                                      </tbody>
                                  </table>
                              </div>
                          </div>
              </div>
              ";

          $multa = "index.php";
          $mpdf = new mPDF();
          $mpdf->SetDisplayMode("fullpage");
          $mpdf->WriteHTML($html);
          $mpdf->Output($multa, 'I');
          exit();
      break;

      // HOTEL   
      case 'meus-quartos':
          // Instanciando
          $parametros = [
            ":idU" => $_GET['idHotel']
          ];
          $sql = $hotel->EXE_QUERY("SELECT * FROM tb_quartos WHERE id_hotel=:id", $parametros);
          $html = "
                <html>
                  <head>
                      <style type='text/css'>
                          body {margin: 0 auto;padding: 0px;font-weight: 100 !important;}
                          .container {margin: 100px auto !important;}
                          .nav-header {margin: 0px auto;text-align: center;}
                          .mk-title {font-weight: 100;font-size: 18px;}
                          .mk-title-lg {font-weight: 100;font-size: 18px}
                         img {width: 200px}

                          table { width: 100%; border-spacing: 0 0.5rem; }
                          table th {
                            background: #0193F9;
                            font-weight: 400;
                            padding: 1rem 2rem;
                            text-align: left;
                            line-height: 1.5rem;
                          }
                          table td {
                            padding: 1rem 2rem;
                            border: 0;
                            background: #f7f7f7;
                            color: #000 !important;
                          }
                      </style>
                  </head>
                  <body>
                      <div class='container'>
                          <div class='row'>
                              <div class='nav-header'>
                                  <img src='../assets/images/logo.png'>
                                  <h2 class='text-center h5 mk-title'>Sistema de Gestão Hoteleiro</h2>
                                  <p class='mt-2'>Relatório de Quartos Cadastrados</p>
                              </div>
                          </div>
                          <div class='body-mk mt-4'>
                              <div class='table'>
                                  <table>
                                      <thead>
                                          <tr>
                                              <th style='color: white'>Id</th>
                                              <th style='color: white'>Nome Quarto</th>
                                              <th style='color: white'>Tipo</th>
                                              <th style='color: white'>Capacidade</th>
                                              <th style='color: white'>Preço</th>
                                              <th style='color: white'>Data Registro</th>
                                          </tr>
                                      </thead>
                                      <tbody>
              ";
              foreach ($sql as $mostrar) :
                $html = $html ."
                                          <tr>
                                            <td>{$mostrar["id_quarto"] }</td>
                                            <td>{$mostrar["quarto"] }</td>
                                            <td>{$mostrar["tipo_quarto"] }</td>
                                            <td>{$mostrar["capacidade_quarto"] }</td>
                                            <td>{$mostrar["preco_quarto"] }</td>
                                            <td>{$mostrar["data_criacao_quarto"] }</td>
                                          </tr>
                ";
                      endforeach;
                      $html = $html."
                                      </tbody>
                                  </table>
                              </div>
                          </div>
              </div>
              ";

          $multa = "index.php";
          $mpdf = new mPDF();
          $mpdf->SetDisplayMode("fullpage");
          $mpdf->WriteHTML($html);
          $mpdf->Output($multa, 'I');
          exit();
      break;

      case 'minhas-mesas':
        // Instanciando
          $parametros = [":id" => $_SESSION['id']];
          $sql = $hotel->EXE_QUERY("SELECT * FROM tb_mesas 
          INNER JOIN tb_restaurante ON 
          tb_mesas.id_restaurante=tb_restaurante.id_restaurante 
          WHERE tb_restaurante.id_hotel=:id", $parametros);
          $html = "
                <html>
                  <head>
                      <style type='text/css'>
                          body {margin: 0 auto;padding: 0px;font-weight: 100 !important;}
                          .container {margin: 100px auto !important;}
                          .nav-header {margin: 0px auto;text-align: center;}
                          .mk-title {font-weight: 100;font-size: 18px;}
                          .mk-title-lg {font-weight: 100;font-size: 18px}
                         img {width: 200px}

                          table { width: 100%; border-spacing: 0 0.5rem; }
                          table th {
                            background: #0193F9;
                            font-weight: 400;
                            padding: 1rem 2rem;
                            text-align: left;
                            line-height: 1.5rem;
                          }
                          table td {
                            padding: 1rem 2rem;
                            border: 0;
                            background: #f7f7f7;
                            color: #000 !important;
                          }
                      </style>
                  </head>
                  <body>
                      <div class='container'>
                          <div class='row'>
                              <div class='nav-header'>
                                  <img src='../assets/images/logo.png'>
                                  <h2 class='text-center h5 mk-title'>Sistema de Gestão Hoteleiro</h2>
                                  <p class='mt-2'>Relatório de Quartos</p>
                              </div>
                          </div>
                          <div class='body-mk mt-4'>
                              <div class='table'>
                                  <table>
                                      <thead>
                                          <tr>
                                              <th style='color: white'>Id</th>
                                              <th style='color: white'>Mesa</th>
                                              <th style='color: white'>Tipo</th>
                                              <th style='color: white'>Preço</th>
                                              <th style='color: white'>Data Registro</th>
                                          </tr>
                                      </thead>
                                      <tbody>
              ";
              foreach ($sql as $mostrar) :
                $html = $html ."
                                          <tr>
                                            <td>{$mostrar["id_mesa"] }</td>
                                            <td>{$mostrar["nome_mesa"] }</td>
                                            <td>{$mostrar["tipo_mesa"] }</td>
                                            <td>{$mostrar["preco_mesa"] }</td>
                                            <td>{$mostrar["data_criacao_mesa"] }</td>
                                          </tr>
                ";
                      endforeach;
                      $html = $html."
                                      </tbody>
                                  </table>
                              </div>
                          </div>
              </div>
              ";

          $multa = "index.php";
          $mpdf = new mPDF();
          $mpdf->SetDisplayMode("fullpage");
          $mpdf->WriteHTML($html);
          $mpdf->Output($multa, 'I');
          exit();
      break;

      case 'minhas-reservas':
        // Instanciando
          $parametros = [":id" => $_SESSION['id']];
          $sql = $hotel->EXE_QUERY("SELECT * FROM tb_reservas INNER JOIN tb_quartos 
          ON tb_reservas.id_quarto=tb_quartos.id_quarto 
          INNER JOIN tb_hospedes ON tb_reservas.id_hospede=tb_hospedes.id_hospede
          WHERE tb_quartos.id_hotel=:id", $parametros);
          $html = "
                <html>
                  <head>
                      <style type='text/css'>
                          body {margin: 0 auto;padding: 0px;font-weight: 100 !important;}
                          .container {margin: 100px auto !important;}
                          .nav-header {margin: 0px auto;text-align: center;}
                          .mk-title {font-weight: 100;font-size: 18px;}
                          .mk-title-lg {font-weight: 100;font-size: 18px}
                         img {width: 200px}

                          table { width: 100%; border-spacing: 0 0.5rem; }
                          table th {
                            background: #0193F9;
                            font-weight: 400;
                            padding: 1rem 2rem;
                            text-align: left;
                            line-height: 1.5rem;
                          }
                          table td {
                            padding: 1rem 2rem;
                            border: 0;
                            background: #f7f7f7;
                            color: #000 !important;
                          }
                      </style>
                  </head>
                  <body>
                      <div class='container'>
                          <div class='row'>
                              <div class='nav-header'>
                                  <img src='../assets/images/logo.png'>
                                  <h2 class='text-center h5 mk-title'>Sistema de Gestão Hoteleiro</h2>
                                  <p class='mt-2'>Relatório de Reservadas Cadastrados</p>
                              </div>
                          </div>
                          <div class='body-mk mt-4'>
                              <div class='table'>
                                  <table>
                                      <thead>
                                          <tr>
                                              <th style='color: white'>Id</th>
                                              <th style='color: white'>Nome Hospede</th>
                                              <th style='color: white'>Quarto</th>
                                              <th style='color: white'>Data Checkin</th>
                                              <th style='color: white'>Data Checkout</th>
                                              <th style='color: white'>Data Total de Noites</th>
                                              <th style='color: white'>Hora de Checkin</th>
                                              <th style='color: white'>Hora de Checkout</th>
                                              <th style='color: white'>Total de Horas</th>
                                              <th style='color: white'>Data Registro</th>
                                          </tr>
                                      </thead>
                                      <tbody>
              ";
              foreach ($sql as $mostrar) :
                $html = $html ."
                                <tr>
                                    <td>{$mostrar["id_reserva"] }</td>
                                    <td>{$mostrar["nome_hospede"] }</td>
                                    <td>{$mostrar["quarto"] }</td>
                                    <td>{$mostrar["data_checkin_reserva"] }</td>
                                    <td>{$mostrar["data_checkout_reserva"] }</td>
                                    <td>{$mostrar["total_noites"] }</td>
                                    <td>{$mostrar["hora_checkin"] }</td>
                                    <td>{$mostrar["hora_checkout"] }</td>
                                    <td>{$mostrar["total_horas"] }</td>
                                    <td>{$mostrar["data_criacao_reserva"] }</td>
                                </tr>
                ";
                      endforeach;
                      $html = $html."
                                      </tbody>
                                  </table>
                              </div>
                          </div>
              </div>
              ";

          $multa = "index.php";
          $mpdf = new mPDF();
          $mpdf->SetDisplayMode("fullpage");
          $mpdf->WriteHTML($html);
          $mpdf->Output($multa, 'I');
          exit();
      break;

      default:
      break;
    endswitch;


?>