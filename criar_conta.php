<?php 

    require 'Model/minha_conexao.php';
    require 'Model/minha_classe.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar conta</title>
    <link rel="stylesheet" href="Assets/Css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/Css/main.css">
    <style>
        body {
            background-image: url(Assets/Img/1.jpg);
        }
        @font-face {
            font-family: Opens_Sans;
            src: url(Assets/fonts/Open_Sans/OpenSans-Light.ttf);
        }
        *,
        h1, h2, h3, h5, p, span, h4,a,
        label, td, th,
        .modal-title,
        body {
            font-family: Opens_Sans, sans-serif !important;
        }
    </style>
</head>
<body>
    
    <div class="container" style="position: relative; top: 160px;">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="p-4 shadow bg-white">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="h4">Preenche o formulário <strong>Criando conta como estudante</strong></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 form-group">
                                <label for="">Foto</label>
                                <input type="file" class="form-control" name="foto" accept=".jpg">
                            </div>
                            <div class="form-group col-lg-8">
                                <label for="">Nome completo</label>
                                <input type="text" name="nome" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 form-group">
                                <label for="">E-mail</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="">Número de Bilhete</label>
                                <input type="text" class="form-control" name="bi" pattern="[0-9]{9}-[A-Z]{2}-[0-9]{3}">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="">Genero</label>
                                <select name="id_genero" class="form-control">
                                    <?php 
                                        $busca = new User();
                                        $buscando = $busca->EXE_QUERY("SELECT * FROM tb_genero");
                                        foreach($buscando as $mostrar):?>
                                            <option value="<?= $mostrar['id_genero'] ?>"><?= $mostrar['genero'] ?></option>
                                        <?php 
                                        endforeach;?>
                                </select>
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="">Número de Telefone</label>
                                <input type="text" class="form-control" name="tel" maxlength="9">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="">Universidade</label>
                                <select name="id_universidade" class="form-control">
                                    <option value="">Selecione a sua universidade</option>
                                    <?php 
                                        $universidade = new User();
                                        $buscando_universidade = $universidade->EXE_QUERY("SELECT * FROM tb_universidade");
                                        foreach($buscando_universidade as $mostrar):?>
                                            <option value="<?= $mostrar['id_universidade'] ?>"><?= $mostrar['nome_universidade'] ?></option>
                                        <?php 
                                        endforeach;?>
                                </select>
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="">Palavra-passe</label>
                                <input type="password" class="form-control" name="senha" maxlength="8">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-2">
                                <input type="submit" name="adicionar_estudante_site" value="Criar conta" class="text-white bg_padrao btn form-control">
                            </div>
                            <div class="col-lg-12">
                                <p>Já tens uma conta ? <a href="login.php">clique aqui</a></p>
                            </div>
                        </div>

                        <?php 

                            if(isset($_POST['adicionar_estudante_site'])):

                                $nome   = $_POST['nome'];
                                $email  = $_POST['email'];
                                $bi     = $_POST['bi'];
                                $tel    = $_POST['tel'];
                                $senha  = md5(md5($_POST['senha']));
                                $id_universidade = $_POST['id_universidade'];
                                $id_genero = $_POST['id_genero'];

                                $target         = "Assets/Img/Users/" . basename($_FILES['foto']['name']);
                                $foto           = $_FILES['foto']['name'];

                                $validacao_parametros_email = [":email" => $email];
                                $buscando_estudante = new User();
                                $email_buscando_estudante = $buscando_estudante->EXE_QUERY("SELECT * FROM tb_estudante WHERE email=:email", $validacao_parametros_email);
                                if(count($email_buscando_estudante)):
                                    echo "<script>window.alert('Já existe um usuário com este e-mail')</script>";
                                else:
                                    $parametros_adicionar_estudate = [
                                        ":nome"             => $nome,
                                        ":email"            => $email, 
                                        ":senha"            => $senha, 
                                        ":foto"             => $foto, 
                                        ":id_genero"        => $id_genero, 
                                        ":id_univ"          => $id_universidade, 
                                        ":bi"               => $bi,
                                        ":tel"              => $tel,
                                        ":estado"           => 0
                                    ];
                                    $inserir_estudante = new User();
                                    $inserir_estudante->EXE_NON_QUERY("INSERT INTO tb_estudante 
                                    (nome, email, senha, foto, id_genero_fk, id_universidade_fk, num_bi, tel, data_registro_estudante,
                                    estado_estudante) 
                                    VALUES (:nome, :email, :senha, :foto, :id_genero, :id_univ, :bi, :tel, now(), :estado) ", $parametros_adicionar_estudate);

                                    if($inserir_estudante):
                                        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)) :
                                            $sms = "Uploaded feito com sucesso";
                                        else:
                                            $sms = "Não foi possível fazer o upload";
                                        endif;
                                        echo "<script>window.alert('Estudante adicionado com sucesso, por favor aguarde a tua conta será ativa dentro de alguns dias')</script>";
                                        // echo "<script>location.href='index.php'</script>";
                                    endif;
                                endif;
                            endif;
                        
                        ?>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="Assets/Js/jquery-3.2.1.min.js"></script>
    <script src="Assets/Js/bootstrap.min.js"></script>
    
</body>
</html>