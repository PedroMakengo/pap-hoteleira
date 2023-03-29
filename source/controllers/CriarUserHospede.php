<?php
  // Criar conta do usuário 
  if(isset($_POST['criarconta'])):
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5(md5($_POST['senha']));

    if(md5(md5($_POST['senha'])) == md5(md5($_POST['confirmarSenha']))):
      $parametros = [
        ":nome"   => $nome,
        ":email"  => $email,
        ":senha"  => $senha 
      ];

      $inserirUserHospede = new Model();
      $inserirUserHospede->EXE_NON_QUERY("INSERT INTO tb_hospedes
      (nome_hospede, email_hospede, senha_hospede) VALUES (:nome, :email, :senha) ", $parametros);

      if($inserirUserHospede):
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
  
