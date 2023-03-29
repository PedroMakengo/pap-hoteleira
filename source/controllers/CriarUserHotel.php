<?php
  // Criar conta do usuário 
  if(isset($_POST['accountHotel'])):
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5(md5($_POST['senha']));
    $city  = $_POST['cidade'];
    $nif   = $_POST['nif'];
    $endereco = $_POST['endereco'];


    if(md5(md5($_POST['confirmarSenha'])) == md5(md5($_POST['senha']))):
      $parametros = [
        ":nome"   => $nome,
        ":email"  => $email,
        ":senha"  => $senha,
        ":statusHotel" => "Inativo",
        ":nif"         => $nif,
        ":endereco"    => $endereco,
        ":foto"        => "",
        ":city"        => $city
      ];

      $inserirUserHotel = new Model();
      $inserirUserHotel->EXE_NON_QUERY("INSERT INTO tb_hotel
      (
      nome_hotel, 
      email_hotel, 
      senha_hotel, 
      status_hotel, 
      nif_hotel, 
      endereco_hotel,
      foto_hotel,
      cidade_hotel
      ) 
      VALUES (:nome, :email, :senha, :statusHotel, :nif, :endereco, :foto, :city)", $parametros);

      if($inserirUserHotel):
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
                  window.location.href="login.php";
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
    else:
      echo '<script> 
          swal({
            title: "Verifique suas senhas",
            text: "As duas senhas não são iguais",
            icon: "error",
            button: "Fechar!",
          })
        </script>';
    endif;
  endif;
  
