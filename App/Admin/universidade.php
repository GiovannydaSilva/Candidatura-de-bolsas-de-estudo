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
                     <h4><i class="#"></i><span>Dashboard</span></h4>
                  </div>

                  <div class="bread-crumbs">
                     <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
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
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p class="pull-left">Listagem de universidades</p>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Adicionar universidade</button>
                                    </div>
                                </div>
                            </div>

                            <!-- MODAL -->
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Registro de universidade</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-lg-12 form-group">
                                                        <label for="">Nome da universidade</label>
                                                        <input type="text" name="nome" class="form-control">
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <label for="">E-mail da universidade</label>
                                                        <input type="text" name="email" class="form-control">
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <label for="">Referencia Universidade</label>
                                                        <input type="text" name="referencia" class="form-control">
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <label for="">Provincia</label>
                                                        <select name="id_provincia_fk" class="form-control">
                                                            <option value="">Selecione a sua provincia</option>
                                                            <?php 
                                                                $provincia = new User();
                                                                $buscar = $provincia->EXE_QUERY("SELECT * FROM tb_provincia");
                                                                foreach($buscar as $mostrar):?>
                                                                    <option value="<?= $mostrar['id_provincia'] ?>"><?= $mostrar['provincia'] ?></option>
                                                                <?php
                                                                endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <label for="">Municipio</label>
                                                        <select name="id_municipio_fk" class="form-control">
                                                            <option value="">Selecione a sua municipio</option>
                                                            <?php 
                                                                $municipio = new User();
                                                                $buscar = $municipio->EXE_QUERY("SELECT * FROM tb_municipio");
                                                                foreach($buscar as $mostrar):?>
                                                                    <option value="<?= $mostrar['id_municipio'] ?>"><?= $mostrar['municipio'] ?></option>
                                                                <?php
                                                                endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <label for="">Nome do Diretor</label>
                                                        <input type="text" class="form-control" name="nome_diretor">
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <label for="">Foto</label>
                                                        <input type="file" class="form-control" name="foto">
                                                    </div>
                                                    <div class="col-lg-12 form-group">
                                                        <label for="">Descrição universidade</label>
                                                        <textarea name="descricao" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 form-group">
                                                        <input type="submit" class="form-control btn btn-sm btn-success col-lg-8" value="Adicionar universidade" name="adicionar_universidade" id="">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END MODAL -->
                            <div class="table-responsive">
                                <table id="myTable" class="display custom-table-data">
                                    <thead>
                                        <tr>
                                            <th>Referencia</th>
                                            <th>Nome universidade</th>
                                            <th>E-mail</th>
                                            <th>Estado universidade</th>
                                            <th>Data registro universidade</th>
                                            <th class="text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $busca_universidade = new User();
                                            $buscando = $busca_universidade->EXE_QUERY("SELECT * FROM tb_universidade WHERE estado_universidade=0");
                                            if(count($buscando)):
                                                foreach($buscando as $retorno):?>
                                                <tr>
                                                    <td><?= $retorno['id_universidade'] ?></td>
                                                    <td><?= $retorno['nome_universidade'] ?></td>
                                                    <td><?= $retorno['email_universidade'] ?></td>
                                                    <td><?= $retorno['estado_universidade'] == 0 ? 'Por aprovado' : 'Aprovado' ?></td>
                                                    <td><?= $retorno['data_registro_universidade'] ?></td>
                                                    <td class="text-center">
                                                        <a href="universidade.php?id=<?= $retorno['id_universidade'] ?>&action=delete" class="btn btn-sm btn-danger">
                                                            Eliminar
                                                        </a>
                                                        <?php 
                                                        if($retorno['estado_universidade'] == 0):?>
                                                            <form method="POST">
                                                                <button type="submit" name="<?php echo $submeter = 'validar'.$retorno['id_universidade'] ?>" class="btn btn-sm btn-success">
                                                                    Validar
                                                                </button>
                                                                <?php 
                                                                    if(isset($_POST[$submeter])):

                                                                        $id = $retorno['id_universidade'];
                                                                        $parametros_validar_universidade = [
                                                                            ":id"           => $id, 
                                                                            ":estado"       => 1
                                                                        ];
                                                                        $atualizar_universidade = new User();
                                                                        $atualizar_universidade->EXE_NON_QUERY("UPDATE tb_universidade SET estado_universidade=:estado WHERE id_universidade=:id", $parametros_validar_universidade);
                                                                        if($atualizar_universidade):
                                                                            // Inserir a universidade como usuário;
                                                                            $id_privilegio = 2;
                                                                            $parametros_usuario = [
                                                                                ":id_pri"       => $id_privilegio,
                                                                                ":genero"       => 3,
                                                                                ":nome"         => $retorno['nome_universidade'],
                                                                                ":email"        => $retorno['email_universidade'],
                                                                                ":senha"        => $retorno['senha_universidade'],
                                                                                ":foto"         => $retorno['foto_universidade'],
                                                                                ":ref"          => $retorno['ref_universidade']
                                                                            ];
                                                                            // Validação com e-mail 
                                                                            $verificar_parametros_email = [":email_usuario"  => $retorno['email_universidade']];
                                                                            $busca_email = new User();
                                                                            $busca_email_universidade = $busca_email->EXE_QUERY("SELECT * FROM tb_usuario WHERE email_usuario=:email_usuario", $verificar_parametros_email);
                                                                            if(count($busca_email_universidade)):
                                                                                echo "<script>window.alert('Já existe um usuário com este e-mail')</script>";
                                                                            else:
                                                                                $inserir_usuario = new User();
                                                                                $inserir_usuario->EXE_NON_QUERY("INSERT INTO tb_usuario 
                                                                                (id_privilegio_fk, id_genero_fk, nome_usuario, email_usuario, senha_usuario, foto_usuario, num_bi_usuario, data_registro_usuario, data_atualizacao_usuario) 
                                                                                VALUES 
                                                                                (:id_pri, :genero, :nome, :email, :senha, :foto, :ref, now(), now()) ", $parametros_usuario);
                                                                                if($inserir_usuario):
                                                                                    // Mensagem de registro de usuário
                                                                                    // echo "<script>window.alert('Efetuado com sucesso')</script>";
                                                                                    echo "<script>location.href='universidade.php?id=2'</script>";
                                                                                endif;
                                                                            endif;
                                                                        endif;
                                                                    endif;
                                                                ?>
                                                            </form>
                                                        <?php
                                                        else:?>
                                                        <?php 
                                                        endif;?>
                                                    </td>
                                                </tr>
                                            <?php 
                                                endforeach;
                                            else:?>
                                                <tr>
                                                    <td colspan="10">Não existe nenhuma universidade</td>
                                                </tr>
                                            <?php 
                                            endif;?>
                                    </tbody>
                                </table>
                            </div>
                            <?php 
                            if (isset($_GET['action']) && $_GET['action'] == 'delete'):
                                $id = $_GET['id'];
                                $parametros  =[
                                    ":id"=>$id
                                ];
                                $delete = new User();
                                $delete->EXE_NON_QUERY("DELETE FROM tb_universidade WHERE id_universidade=:id", $parametros);
                                if($delete == true):
                                    echo "<script>window.alert('Apagado com sucesso');</script>";
                                    echo "<script>location.href='universidade.php?id=2'</script>";
                                else:
                                    echo "<script>window.alert('Operação falhou');</script>";
                                endif;
                            endif;?>
                        </div>
                    </div>
                </section>
            </div>

         </div>
      </div>
   </section>
</div>

<?php require 'Includes/footer.php' ?>