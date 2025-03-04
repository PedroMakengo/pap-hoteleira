<?php
  // Efectuando a verificação do login
  if(isset($_POST['login'])):
    // Pegar os dados enviado apartir do front-end
    if(empty($_POST['email']) && empty($_POST['password'])):
      echo '<script>
                swal({
                  title: "Opps!",
                  text: "Preencha todos os campos",
                  icon: "error",
                  button: "Fechar!",
                })
            </script>';
        echo '<script>
            setTimeout(function() {
                window.location.href="login.php";
            }, 2000)
        </script>';
      // echo "<script>window.alert('Por favor preenche todos os campos')</script>";
    else:
      $nome = $_POST['nome'];
      $pass  = $_POST['password'];

      $parametros = [
        ":nome"  => $nome,
        ":senha"   => md5(md5($pass))
      ];
      // (1) Efectuando o login do Administrador
      $login = new Model();
      $loginAdmin = $login->EXE_QUERY("SELECT * FROM tb_admin WHERE 
      nome=:nome AND senha=:senha", $parametros);
      if($loginAdmin):
        // Sessão do administrador
        foreach($loginAdmin as $mostrar):
          $_SESSION['id']       = addslashes($mostrar['id_admin']);
          $_SESSION['nome']     = addslashes($mostrar['nome']);
          $_SESSION['email']    = addslashes($mostrar['email']);
          $_SESSION['senha']    = addslashes($mostrar['senha']);
          $_SESSION['foto']     = addslashes($mostrar['foto']);
        endforeach;
        echo "<script>location.href='painel/admin/index.php?id=home'</script>";
      else:

        // (2) Analisando o login do usuário Hotel
        $loginUserHotel = $login->EXE_QUERY("SELECT * FROM tb_hotel WHERE 
        nome_hotel=:nome AND senha_hotel=:senha", $parametros);
        if($loginUserHotel):
          // Trabalhar na sessão do usuário hotel
          foreach($loginUserHotel as $details):
            $_SESSION['id']     = addslashes($details['id_hotel']);
            $_SESSION['nome']   = addslashes($details['nome_hotel']);
            $_SESSION['email']  = addslashes($details['email_hotel']);
            $_SESSION['senha']  = addslashes($details['senha_hotel']);
            $_SESSION['status'] = addslashes($details['status_hotel']);
            $_SESSION['foto']   = addslashes($details['foto_hotel']);
            $_SESSION['nif']    = addslashes($details['nif_hotel']);
          endforeach;
          echo "<script>location.href='painel/hotel/index.php?id=home'</script>";
        else:

          // (3) Analisando o login do usuário Normal 
          $loginUserHospede = $login->EXE_QUERY("SELECT * FROM tb_hospedes WHERE 
            nome_hospede=:nome AND senha_hospede=:senha", $parametros);
          if($loginUserHospede):
            foreach($loginUserHospede as $details):
              $_SESSION['id']     = addslashes($details['id_hospede']);
              $_SESSION['nome']   = addslashes($details['nome_hospede']);
              $_SESSION['email']  = addslashes($details['email_hospede']);
              $_SESSION['senha']  = addslashes($details['senha_hospede']);
              $_SESSION['foto']   = addslashes($details['foto_hospedes']);
              $_SESSION['genero'] = addslashes($details['genero_hospedes']);
            endforeach;
            echo "<script>location.href='painel/user/index.php?id=home'</script>";
          else:
            echo '<script>
            swal({
              title: "Opps!",
              text: "Infelizmente este usuário não foi encontrado",
              icon: "error",
              button: "Fechar!",
            })
            </script>';
          endif;
        endif;
      endif;
    endif;
  endif;
