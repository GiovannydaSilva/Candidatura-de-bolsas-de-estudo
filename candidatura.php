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
    <title>Candidatura - Bolsa de Estudo</title>
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
    
    <div class="container" style="position: relative; top: 130px;">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="p-4 shadow bg-white">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="h5">Formulário de candidatura <strong>Bolsa de estudo</strong> - Universidade <strong>
                                    <?php 
                                        $id = $_GET['id'];
                                        $parametros_bolsa = [":id"  => $id];
                                        $buscar_vagas = new User();
                                        $vagas = $buscar_vagas->EXE_QUERY("SELECT * FROM tb_vagas_bolsa INNER JOIN tb_universidade
                                        ON tb_vagas_bolsa.id_universidade_fk=tb_universidade.id_universidade WHERE tb_vagas_bolsa.id_vagas_bolsa=:id", $parametros_bolsa);
                                        foreach($vagas as $bolsa):
                                            echo $bolsa['nome_universidade'];
                                        endforeach;?>
                                    </strong></h3>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 form-group">
                                <label for="">Nome Completo</label>
                                <input type="text" placeholder="Nome Completo" class="form-control" name="nome_completo">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="">E-mail</label>
                                <input type="email" placeholder="E-mail" class="form-control" name="email">
                            </div>
                             <div class="col-lg-4 form-group">
                                <label for="">Número de Telefone</label>
                                <input type="tel" class="form-control" placeholder="Nº de Telefone" name="tel">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="">Número de Bilhete</label>
                                <input type="text" class="form-control" placeholder="Nº de Bilhete de Identidade" name="num_bi">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="">Genero</label>
                                <select name="id_genero" class="form-control">
                                    <option value="">Selecione o seu genero</option>
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
                                <label for="">Data de Nascimento</label>
                                <input type="date" class="form-control" name="data_nascimento">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="">Provincia</label>
                                <select name="id_provincia_fk" class="form-control">
                                    <option value="">Selecione a sua provincia</option>
                                    <?php 
                                        $provincia = new User();
                                        $busca_provincia = $provincia->EXE_QUERY("SELECT * FROM tb_provincia");
                                        foreach($busca_provincia as $mostrar):?>
                                            <option value="<?= $mostrar['id_provincia'] ?>"><?= $mostrar['provincia'] ?></option>
                                        <?php 
                                        endforeach;?>
                                </select>
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="">Morada</label>
                                <input type="text" class="form-control" placeholder="Municipo/Rua/Bairro" name="morada">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="">Nome do Pai</label>
                                <input type="text" class="form-control" placeholder="Nome do pai" name="nome_pai">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="">Nome da Mãe</label>
                                <input type="text" class="form-control" placeholder="Nome da mãe" name="nome_mae">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="">Média de Conclusão de Curso</label>
                                <input type="number" maxlenght="2" class="form-control" name="media">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="">Certificado</label>
                                <input type="file"  class="form-control" name="foto">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-2">
                                <input type="submit" name="adicionar_candidatura" value="Candidatar-se" class="text-white bg_padrao btn form-control">
                            </div>
                            <div class="col-lg-12">
                                <p>Voltar para a página inicial <a href="index.php">clique aqui</a></p>
                            </div>
                        </div>

                       <?php 
                            if(isset($_POST['adicionar_candidatura'])):

                                $nome       = $_POST['nome_completo'];
                                $email      = $_POST['email'];
                                $tel        = $_POST['tel'];
                                $bi         = $_POST['num_bi'];
                                $genero     = $_POST['id_genero'];
                                $id_provi   = $_POST['id_provincia_fk'];
                                $morada     = $_POST['morada'];
                                $nome_pai   = $_POST['nome_pai'];
                                $nome_mae   = $_POST['nome_mae'];
                                $media      = $_POST['media'];
                                $target     = "Assets/Img/Users/" . basename($_FILES['foto']['name']);
                                $certifica  = $_FILES['foto']['name'];
                                $data_nasc  = $_POST['data_nascimento'];
                                $estados = 0;

                                $verificar_candidatura_parametros = [":email"   => $email];
                                $buscando_candidatura = new User();
                                $candidatura_buscando = $buscando_candidatura->EXE_QUERY("SELECT * FROM tb_candidatura_bolsa WHERE email =:email", $verificar_candidatura_parametros);
                                if(count($candidatura_buscando)):
                                    echo "<script>window.alert('Já existe um candidato com este e-mail')</script>";
                                else:

                                    $parametros_inserir_candidatura = [
                                        ":id"           => $_GET['id'],
                                        ":nome"         => $nome, 
                                        ":email"        => $email, 
                                        ":tel"          => $tel, 
                                        ":bi"           => $bi, 
                                        ":data_nasc"    => $data_nasc,
                                        ":nome_pai"     => $nome_pai,
                                        ":nome_mae"     => $nome_mae,
                                        ":morada"       => $morada,
                                        ":id_genero"    => $genero,
                                        ":id_provinc"   => $id_provi,
                                        ":media"        => $media,
                                        ":certi"        => $certifica,
                                        ":estado"       => 0
                                    ];
                                    
                                        $inserir_candidatura = new User();
                                    if($media >= 14)://adicioneu 07/04/21
                                        $inserir_candidatura->EXE_NON_QUERY("INSERT INTO tb_candidatura_bolsa 
                                        (id_vagas_bolsa_fk, nome, email, 
                                        tel_candidato, num_bi, data_nascimento, nome_pai, nome_mae, morada, id_genero_fk, 
                                        id_provincia_fk, media_conclusao_medio, certificado, 
                                        estado_candidatura, data_candidatura) 
                                        VALUES 
                                        (:id, :nome, :email, :tel, :bi, :data_nasc, :nome_pai, :nome_mae, :morada, :id_genero, :id_provinc,
                                        :media, :certi, :estado, now() ) ", $parametros_inserir_candidatura);
                                    endif;
                                    if($inserir_candidatura):
                                        // Atualizar o número de vagas na tabela tb_vagas_bolsa
                                        $parametros_vaga = [":id_vaga" => $_GET['id']];
                                        $buscando_vaga = new User();
                                        $buscando_candidatura = $buscando_vaga->EXE_QUERY("SELECT * FROM tb_vagas_bolsa WHERE id_vagas_bolsa=:id_vaga", $parametros_vaga);
                                        foreach($buscando_candidatura as $num):
                                            $numero_vaga_disponivel = $num['num_vagas_disponiveis'];
                                            $estados = $num['estado'];
                                        endforeach;
                                        if($estados):
                                            $novo_numero = $numero_vaga_disponivel - 1;
                                            $parametro_atualizar_vagas = [":id" => $_GET['id'], ":num"=> $novo_numero];

                                            $atualizar_vaga = new User();
                                            $atualizar_vaga->EXE_NON_QUERY("UPDATE tb_vagas_bolsa SET num_vagas_disponiveis=:num WHERE id_vagas_bolsa=:id", $parametro_atualizar_vagas);
                                        endif;
                                        // Uploader
                                        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)) :
                                            $sms = "Uploaded feito com sucesso";endif;
                                        else:
                                            $sms = "Não foi possível fazer o upload";
                                        endif;
                                        echo "<script>window.alert('A sua candidatura foi efetuada com sucesso')</script>";
                                        // echo "<script>location.href='index.php'</script>";
                                    endif;
                                endif;
                            //endif;
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