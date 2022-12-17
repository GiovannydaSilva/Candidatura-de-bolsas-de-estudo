<?php require 'Includes/head.php'; ?>

<?php require 'Includes/header.php'; ?>
<div class="content-outer-wrapper">
   <div class="chance" style="background: linear-gradient(-87deg, #04B8DD 0, #419cce 100% ) !important"></div>
   <section class="profile-page">
      <div class="container">

         <div class="row">
            <div class="col-md-12 si-box-padding">
               <section class="common-head-wrapper-sm clearfix">

                  <div class="wrapper-head">
                     <h4><i class="#"></i><span>Administração</span></h4>
                  </div>

                  <div class="bread-crumbs">
                     <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Administração</a></li>
                     </ul>
                  </div>

               </section>
            </div>
         </div>

         <div class="row">
            <div class="col-md-12">

                <section class="merchant-table row">
                    <div class="col-md-12 si-box-padding">
                        <div class="data-table-wrapper border-table widget-wrapper-sm">
                            <div class="table-head clearfix data-table-head">
                                <p class="pull-left">Listagem de estudantes registrados</p>
                            </div>
                            <div class="table-responsive">
                                <table id="myTable" class="display custom-table-data">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome Completo</th>
                                            <th>E-mail</th>
                                            <th>Nº de Telefone</th>
                                            <th>Genero</th>
                                            <th>Nº de Bilhete</th>
                                            <th>Estado</th>
                                            <th>Data registro</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $busca_estudante = new User();
                                            $buscando = $busca_estudante->EXE_QUERY("SELECT * FROM tb_estudante INNER JOIN tb_genero ON tb_estudante.id_genero_fk=tb_genero.id_genero WHERE estado_estudante=0");
                                            if(count($buscando)):
                                                foreach($buscando as $retorno):?>
                                                <tr>
                                                    <td><?= $retorno['id_estudante'] ?></td>
                                                    <td><?= $retorno['nome'] ?></td>
                                                    <td><?= $retorno['email'] ?></td>
                                                    <td><?= $retorno['tel'] ?></td>
                                                    <td><?= $retorno['genero'] ?></td>
                                                    <td><?= $retorno['num_bi'] ?></td>
                                                    <td><?= $retorno['estado_estudante'] == 0 ? 'Por aprovar' : 'Aprovado' ?></td>
                                                    <td><?= $retorno['data_registro_estudante'] ?></td>
                                                    <td class="action-td">
                                                        <?php if($retorno['estado_estudante'] == 0):?>
                                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".candidatura<?= $retorno['id_estudante'] ?>">Validar</button>
                                                        <?php endif;?>
                                                        <a href="estudantes.php?id=<?= $retorno['id_estudante'] ?>&action=delete" class="btn btn-sm btn-danger">Eliminar</a>
                                                    </td>
                                                </tr>

                                                <!-- Modal -->
                                                <div class="modal fade candidatura<?= $retorno['id_estudante'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Confirmação do estudante</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                    <button type="submit" class="col-lg-12 btn btn-sm btn-primary" name="<?= $submeter_candidato = 'candidato' . $retorno['id_estudante'] ?>">Confirmar estudante</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <?php 
                                                                if(isset($_POST[$submeter_candidato])):
                                                                    $parametros_vaga_aceitacao = [
                                                                    ":id"       => $retorno['id_estudante'],
                                                                    ":estado"   => 1 
                                                                    ];
                                                                    $atualizar_vaga_candidatura = new User();
                                                                    $atualizar_vaga_candidatura->EXE_NON_QUERY("UPDATE tb_estudante SET estado_estudante=:estado WHERE id_estudante=:id", $parametros_vaga_aceitacao);

                                                                    if($atualizar_vaga_candidatura):

                                                                    // Inserir dados na tabela usuário 
                                                                    $parametro_validacao_usuario = [':email'    => $retorno['email']];
                                                                    $buscando_usuario_existe = new User();
                                                                    $busca = $buscando_usuario_existe->EXE_QUERY("SELECT * FROM tb_usuario WHERE email_usuario=:email", $parametro_validacao_usuario);
                                                                        if(count($busca)):
                                                                        echo "<script>window.alert('Já existe um usuário com este email')</script>";
                                                                        else:
                                                                            $parametros_inserir_estudante = [
                                                                                ":id_privi"     => 3,
                                                                                ":genero"       => $retorno['id_genero_fk'],
                                                                                ":nome"         => $retorno['nome'],
                                                                                ":email"        => $retorno['email'],
                                                                                ":senha"        => $retorno['senha'],
                                                                                ":foto"         => $retorno['foto'],
                                                                                ":bi"           => $retorno['num_bi']
                                                                            ];

                                                                            $inserir_estudante = new User();
                                                                            $inserir_estudante->EXE_NON_QUERY("INSERT INTO tb_usuario 
                                                                            (id_privilegio_fk, id_genero_fk, nome_usuario, email_usuario, senha_usuario, foto_usuario,
                                                                            num_bi_usuario, data_registro_usuario, data_atualizacao_usuario) 
                                                                            VALUES 
                                                                            (:id_privi, :genero, :nome, :email, :senha, :foto, :bi, now(), now()) ", $parametros_inserir_estudante);
                                                                            echo "<script>window.alert('Operação efetuada com sucesso')</script>";
                                                                            echo "<script>location.href='estudantes.php?id=3'</script>";
                                                                        endif;
                                                                    endif;
                                                                endif;
                                                            ?>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal -->
                                            <?php 
                                                endforeach;
                                            else:?>
                                                <tr>
                                                    <td colspan="10">Não existe nenhum estudante</td>
                                                </tr>
                                            <?php 
                                            endif;?>
                                    </tbody>
                                </table>
                                <?php 
                                if (isset($_GET['action']) && $_GET['action'] == 'delete'):
                                    $id = $_GET['id'];
                                    $parametros  =[
                                        ":id"=>$id
                                    ];
                                    $delete = new User();
                                    $delete->EXE_NON_QUERY("DELETE FROM tb_estudante WHERE id_estudante=:id", $parametros);
                                    if($delete == true):
                                        echo "<script>window.alert('Apagado com sucesso');</script>";
                                        echo "<script>location.href='estudantes.php?id=3'</script>";
                                    else:
                                        echo "<script>window.alert('Operação falhou');</script>";
                                    endif;
                                endif;?> 
                            </div>
                        </div>
                    </div>
                </section>
            </div>
         </div>
      </div>
   </section>
</div>

<?php require 'Includes/footer.php' ?>