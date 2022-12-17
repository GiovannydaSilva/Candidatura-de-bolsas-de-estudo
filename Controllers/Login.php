<?php 
    session_start();

    if(isset($_POST['iniciar_sessao'])):
        $user = $_POST['user'];
        $senha = md5(md5($_POST['senha']));

        $parametros_login_user = [
            ":user"     => $user, 
            ":senha"    => $senha
        ];

        $login = new User();
        $usuario_admin = $login->EXE_QUERY("SELECT * FROM tb_usuario INNER JOIN tb_genero ON tb_usuario.id_genero_fk=tb_genero.id_genero WHERE tb_usuario.id_privilegio_fk = 1 AND username=:user AND senha_usuario=:senha", $parametros_login_user);
        if(count($usuario_admin)):
            $login_at = date("Y-m-d H:i");
            $id = $usuario_admin[0]['id_usuario'];
                    $parametros_login = [
                        ":login_at"    => $login_at,
                        ":id" => $id
                    ];
                    $login->EXE_QUERY("UPDATE tb_usuario set login_at = :login_at where id_usuario = :id", $parametros_login);
            foreach($usuario_admin as $retorno):
                $_SESSION['id']       = addslashes($retorno['id_usuario']);
                $_SESSION['username'] = addslashes($retorno['username']);
                $_SESSION['nome']     = addslashes($retorno['nome_usuario']);
                $_SESSION['email']    = addslashes($retorno['email_usuario']);
                $_SESSION['foto']     = addslashes($retorno['foto_usuario']);
                $_SESSION['bi']       = addslashes($retorno['num_bi_usuario']);
                $_SESSION['sexo']     = addslashes($retorno['genero']);
            endforeach;
            echo "<script>location.href='App/Admin/home.php?id=1'</script>";
        else:
            $usuario_universidade = $login->EXE_QUERY("SELECT * FROM tb_usuario WHERE username=:user AND senha_usuario=:senha AND id_privilegio_fk = 2", $parametros_login_user);
            if(count($usuario_universidade)):
                $login_at = date("Y-m-d H:i");
            $id = $id = $usuario_admin[0]['id_usuario'];

                $parametros_login = [
                    ":login_at"    => $login_at,
                    ":id" => $id
                ];
                $login->EXE_QUERY("UPDATE tb_usuario set login_at = :login_at where id_usuario = :id", $parametros_login);
                foreach($usuario_universidade as $retorno):
                    $_SESSION['id']    = addslashes($retorno['id_usuario']);
                    $_SESSION['username'] = addslashes($retorno['username']);
                    $_SESSION['nome']  = addslashes($retorno['nome_usuario']);
                    $_SESSION['email'] = addslashes($retorno['email_usuario']);
                    $_SESSION['foto']  = addslashes($retorno['foto_usuario']);
                    $_SESSION['bi']    = addslashes($retorno['num_bi_usuario']);
                endforeach;
                 // Buscar dados na tabela universidade relacionada a este usuário
                 $parametros_universidade = [":email"   => $_SESSION['email']];
                 $buscar_universidade = new User();
                 $buscando_universidade = $buscar_universidade->EXE_QUERY("SELECT * FROM tb_universidade INNER JOIN tb_provincia ON tb_universidade.id_provincia_fk=tb_provincia.id_provincia WHERE email_universidade=:email", $parametros_universidade);
                 foreach($buscando_universidade as $mostrar):
                    $_SESSION['id_uni']     = addslashes($mostrar['id_universidade']);
                    $_SESSION['nome_univ']  = addslashes($mostrar['nome_universidade']);
                    $_SESSION['provinica']  = addslashes($mostrar['provincia']);
                    $_SESSION['dg_nome']    = addslashes($mostrar['dg_universidade']);
                    $_SESSION['ref']        = addslashes($mostrar['ref_universidade']); 
                 endforeach;
                 echo "<script>location.href='App/Universidade/home.php?id=1'</script>";
            else:
                $usuario_estudante = $login->EXE_QUERY("SELECT * FROM tb_usuario INNER JOIN tb_genero ON tb_usuario.id_genero_fk=tb_genero.id_genero WHERE id_privilegio_fk = 3 AND username=:user AND senha_usuario=:senha", $parametros_login_user);
                if(count($usuario_estudante)):
                    $login_at = date("Y-m-d H:i");
            $id = $usuario_admin[0]['id_usuario'];
                    $parametros_login = [
                        ":login_at"    => $login_at,
                        ":id" => $id
                    ];
                    $login->EXE_QUERY("UPDATE tb_usuario set login_at = :login_at where id_usuario = :id", $parametros_login);
                    foreach($usuario_estudante as $retorno):
                        $_SESSION['id']    = addslashes($retorno['id_usuario']);
                        $_SESSION['username'] = addslashes($retorno['username']);
                        $_SESSION['nome']  = addslashes($retorno['nome_usuario']);
                        $_SESSION['email'] = addslashes($retorno['email_usuario']);
                        $_SESSION['senha'] = addslashes($retorno['senha_usuario']);
                        $_SESSION['foto']  = addslashes($retorno['foto_usuario']);
                        $_SESSION['bi']    = addslashes($retorno['num_bi_usuario']);
                        $_SESSION['sexo']  = addslashes($retorno['genero']);
                    endforeach;
                    $parametros_usuario = [":email" => $_SESSION['email']];
                    $buscar_universidade_usuario = new User();
                    $usuario = $buscar_universidade_usuario->EXE_QUERY("SELECT * FROM tb_estudante WHERE email=:email", $parametros_usuario);
                    foreach($usuario as $mostrar):
                        $_SESSION['id_uni'] = $mostrar['id_universidade_fk'];
                    endforeach;
                    echo "<script>location.href='App/Users/home.php?id=1'</script>";
                else:
                    echo "<script>window.alert('Não foi possível entrar')</script>";
                endif;
            endif;
        endif;
    endif;
