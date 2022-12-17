<?php

    if(isset($_POST['adicionar_universidade'])):

        $nome   = $_POST['nome'];
        $email  = $_POST['email'];
        $ref    = $_POST['referencia'];
        $muni   = $_POST['id_municipio_fk'];
        $desc   = $_POST['descricao'];
        
        $target         = "../../Assets/Img/Users/" . basename($_FILES['foto']['name']);
        $foto           = $_FILES['foto']['name'];

        $parametros_usuario_validacao = [
            ":email"        => $email
        ];
        $buscar_usuario = new User();
        $buscando_email_usuario = $buscar_usuario->EXE_QUERY("SELECT * FROM tb_universidade WHERE email_universidade=:email", $parametros_usuario_validacao);
        if(count($buscando_email_usuario) == true):
            echo "<script>window.alert('Já existe uma universidade com este e-mail')</script>";
        else:
            $parametros_inserir_universidade = [
                ":nome"      => $nome,
                ":email"     => $email,
                ":senha"     => md5(md5($ref)),
                ":id"        => $_SESSION['id'],
                ":id_prov"   => $_POST['id_provincia_fk'],
                ":id_muni"   => $muni,
                ":dg_uni"    => $_POST['nome_diretor'],
                ":foto"      => $foto,
                ":ref"       => $ref,
                ":estado"    => 0,
                ":descri"    => $desc
            ];
            $inserir_universidade = new User();
            $inserir_universidade->EXE_NON_QUERY("INSERT INTO tb_universidade
            (nome_universidade, email_universidade, senha_universidade, id_usuario_fk, id_provincia_fk, id_municipio_fk,
            dg_universidade, foto_universidade, ref_universidade, estado_universidade, descricao_universidade, data_registro_universidade) 
            VALUES 
            (:nome, :email, :senha, :id, :id_prov, :id_muni, :dg_uni, :foto, :ref, :estado, :descri, now()) ", $parametros_inserir_universidade);
    
            if($inserir_universidade):
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)) :
                    $sms = "Uploaded feito com sucesso";
                else:
                    $sms = "Não foi possível fazer o upload";
                endif;
                echo "<script>window.alert('Universidade registrada com sucesso')</script>";
                echo "<script>location.href='universidade.php?id=2'</script>";
            endif;
        endif;
    endif;


    if(isset($_POST['adicionar_usuario_admin'])):

        $nome  = $_POST['nome'];
        $email = $_POST['email'];
        $bi    = $_POST['num_bi'];
        $sexo  = $_POST['id_genero_fk'];
        $id_fk = $_POST['id_privilegio_fk'];


        $parametro_buscar = [":email"   => $email];
        $email_usuario_buscar = new User();
        $buscar = $email_usuario_buscar->EXE_QUERY("SELECT * FROM tb_usuario WHERE email_usuario=:email", $parametro_buscar);
        if(count($buscar) == true):
            echo "<script>window.alert('Já existe um usuário com este e-mail')</script>";
        else:
            $parametros_inserir_usuario = [
                ":id_privilegio_fk"         => $id_fk,
                ":sexo"                     => $sexo,
                ":nome"                     => $nome,
                ":email"                    => $email,
                ":senha"                    => md5(md5($bi)),
                ":foto"                     => 'user.jpg',
                ":bi"                       => $bi
            ];
            $inserir_usuario = new User();
            $inserir_usuario->EXE_NON_QUERY("INSERT INTO tb_usuario 
            (id_privilegio_fk, id_genero_fk, nome_usuario, email_usuario, senha_usuario, foto_usuario,
            num_bi_usuario, data_registro_usuario, data_atualizacao_usuario) 
            VALUES (:id_privilegio_fk, :sexo, :nome, :email, :senha, :foto, :bi, now(), now()) ", $parametros_inserir_usuario);
            if($inserir_usuario):
                echo "<script>window.alert('Registro de usuários')</script>";
                echo "<script>location.href='usuarios.php?id=4'</script>";
            endif;
        endif;

        
    endif;