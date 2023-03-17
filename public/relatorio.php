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
                                  <h2 class='text-center h5 mk-title'>Sistema de Gestão de Imóveis</h2>
                                  <p class='mt-2'>Relatório de Hotel</p>
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
                                  <h2 class='text-center h5 mk-title'>Sistema de Gestão de Imóveis</h2>
                                  <p class='mt-2'>Relatório de Restaurantes</p>
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
                                  <h2 class='text-center h5 mk-title'>Sistema de Gestão de Imóveis</h2>
                                  <p class='mt-2'>Relatório de Usuários</p>
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
                                  <h2 class='text-center h5 mk-title'>Sistema de Gestão de Imóveis</h2>
                                  <p class='mt-2'>Relatório de Usuários</p>
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
                                  <h2 class='text-center h5 mk-title'>Sistema de Gestão de Imóveis</h2>
                                  <p class='mt-2'>Relatório de Usuários</p>
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
                                            <td>{$mostrar["nome_mesas"] }</td>
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


      default:
      break;
    endswitch;