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
                                <div class="row">
                                    <div class="col-lg-7">
                                        <p class="pull-left">Listagem de usuários</p>
                                    </div>
                                    <div class="col-lg-5 text-right">
                                       <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Adicionar usuario</button>
                                    </div>
                                </div>
                            </div>

                            <!-- MODAL -->
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Registro de usuários</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST">
                                                <div class="row">
                                                    <div class="col-lg-8 form-group">
                                                        <label for="">Nome Completo</label>
                                                        <input type="text" placeholder="Nome Completo" name="nome" class="form-control">
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <label for="">E-mail</label>
                                                        <input type="email" placeholder="E-mail" name="email" class="form-control">
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <label for="">Nº do Bilhete</label>
                                                        <input type="text" placeholder="Nº do Bilhete" name="num_bi" class="form-control">
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <label for="">Genero</label>
                                                        <select name="id_genero_fk" class="form-control">
                                                            <option value="">Selecione o genero</option>
                                                            <?php 
                                                                $genero = new User();
                                                                $busca_genero = $genero->EXE_QUERY("SELECT * FROM tb_genero");
                                                                foreach($busca_genero as $mostrar):?>
                                                                    <option value="<?= $mostrar['id_genero'] ?>"><?= $mostrar['genero'] ?></option>
                                                                <?php 
                                                                endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <label for="">Privilegio</label>
                                                        <select name="id_privilegio_fk" class="form-control">
                                                            <option value="">Selecione o privileigo</option>
                                                            <?php 
                                                                $privilegio = new User();
                                                                $busca_privilegio = $privilegio->EXE_QUERY("SELECT * FROM tb_privilegio WHERE privilegio != 'Universidade' ");
                                                                foreach($busca_privilegio as $mostrar):?>
                                                                    <option value="<?= $mostrar['id_privilegio'] ?>"><?= $mostrar['privilegio'] ?></option>
                                                                <?php 
                                                                endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 form-group">
                                                        <input type="submit" class="form-control btn btn-sm btn-success col-lg-8" value="Adicionar usuário" name="adicionar_usuario_admin" id="">
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
                                            <th>Nome Completo</th>
                                            <th>E-mail</th>
                                            <th>Nº de Bilhete</th>
                                            <th>Privilegio</th>
                                            <th>Data registro</th>
                                            <th class="text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $parametros_usuario = [":id"=> $_SESSION['id']];
                                            $busca_usuario = new User();
                                            $buscando = $busca_usuario->EXE_QUERY("SELECT * FROM tb_usuario INNER JOIN tb_privilegio ON tb_usuario.id_privilegio_fk=tb_privilegio.id_privilegio WHERE id_usuario != :id", $parametros_usuario);
                                            if(count($buscando)):
                                                foreach($buscando as $retorno):?>
                                                <tr>
                                                    <td><?= $retorno['id_usuario'] ?></td>
                                                    <td><?= $retorno['nome_usuario'] ?></td>
                                                    <td><?= $retorno['email_usuario'] ?></td>
                                                    <td><?= $retorno['num_bi_usuario'] ?></td>
                                                    <td><?= $retorno['privilegio'] ?></td>
                                                    <td><?= $retorno['data_registro_usuario'] ?></td>
                                                    <td class="text-center">
                                                        <a  href="usuarios.php?id=<?= $retorno['id_usuario'] ?>&action=delete" class="btn btn-danger btn-sm col" width="20px">Eliminar</a>
                                                        <?php if($retorno['privilegio'] != 'Universidade'):?>
                                                        <button class="btn btn-primary btn-sm col" width="16px" data-toggle="modal" data-target=".modal_editar_usuario<?= $retorno['id_usuario'] ?>">Editar</button>
                                                        <?php endif;?>
                                                    </td>
                                                </tr>

                                                <!-- MODAL -->
                                                <div class="modal fade modal_editar_usuario<?= $retorno['id_usuario'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Editar usuários</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" method="POST">
                                                                    <div class="row">
                                                                        <div class="col-lg-8 form-group">
                                                                            <label for="">Nome Completo</label>
                                                                            <input type="text" value="<?= $retorno['nome_usuario'] ?>" placeholder="Nome Completo" name="nome" class="form-control">
                                                                        </div>
                                                                        <div class="col-lg-4 form-group">
                                                                            <label for="">E-mail</label>
                                                                            <input type="email" value="<?= $retorno['email_usuario'] ?>" placeholder="E-mail" name="email" class="form-control">
                                                                        </div>
                                                                        <div class="col-lg-4 form-group">
                                                                            <label for="">Nº do Bilhete</label>
                                                                            <input type="text" value="<?= $retorno['num_bi_usuario'] ?>" placeholder="Nº do Bilhete" name="num_bi" class="form-control">
                                                                        </div>
                                                                        <div class="col-lg-4 form-group">
                                                                            <label for="">Genero</label>
                                                                            <select name="id_genero_fk" class="form-control">
                                                                                <option value="">Selecione o genero</option>
                                                                                <?php 
                                                                                    $genero = new User();
                                                                                    $busca_genero = $genero->EXE_QUERY("SELECT * FROM tb_genero");
                                                                                    foreach($busca_genero as $mostrar):?>
                                                                                        <option value="<?= $mostrar['id_genero'] ?>"><?= $mostrar['genero'] ?></option>
                                                                                    <?php 
                                                                                    endforeach;?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-4 form-group">
                                                                            <label for="">Privilegio</label>
                                                                            <select name="id_privilegio_fk" class="form-control">
                                                                                <option value="">Selecione o privileigo</option>
                                                                                <?php 
                                                                                    $privilegio = new User();
                                                                                    $busca_privilegio = $privilegio->EXE_QUERY("SELECT * FROM tb_privilegio WHERE privilegio != 'Universidade' ");
                                                                                    foreach($busca_privilegio as $mostrar):?>
                                                                                        <option value="<?= $mostrar['id_privilegio'] ?>"><?= $mostrar['privilegio'] ?></option>
                                                                                    <?php 
                                                                                    endforeach;?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3 form-group">
                                                                            <input type="submit" name="<?= $alterar = 'usuario'. $retorno['id_usuario'] ?>" class="form-control btn btn-sm btn-primary col-lg-8" value="Alterar usuário"  id="">
                                                                        </div>
                                                                    </div>

                                                                    <?php 

                                                                        if(isset($_POST[$alterar])):
                                                                            $nome       = $_POST['nome'];
                                                                            $email      = $_POST['email'];
                                                                            $bi         = $_POST['num_bi'];
                                                                            $genero     = $_POST['id_genero_fk'];
                                                                            $privilegio = $_POST['id_privilegio_fk'];

                                                                            $parametros_atualizar_usuario = [
                                                                                ":id"       => $retorno['id_usuario'],
                                                                                ":nome"     => $nome,
                                                                                ":email"    => $email,
                                                                                ":bi"       => $bi, 
                                                                                ":genero"   => $genero,
                                                                                ":privilegio" => $privilegio
                                                                            ];

                                                                            $atualizar_usuario = new User();
                                                                            $atualizar_usuario->EXE_NON_QUERY("UPDATE tb_usuario SET nome_usuario=:nome,
                                                                            email_usuario=:email, num_bi_usuario=:bi, id_genero_fk=:genero, id_privilegio_fk=:privilegio
                                                                             WHERE id_usuario=:id", $parametros_atualizar_usuario);
                                                                            if($atualizar_usuario):
                                                                                echo "<script>location.href='usuarios.php'</script>";
                                                                            endif;
                                                                        endif;
                                                                    
                                                                    ?>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END MODAL -->
                                            <?php 
                                                endforeach;
                                            else:?>
                                                <tr>
                                                    <td colspan="10">Não existe nenhum usuario</td>
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
                                        $delete->EXE_NON_QUERY("DELETE FROM tb_usuario WHERE id_usuario=:id", $parametros);
                                        if($delete == true):
                                            echo "<script>window.alert('Apagado com sucesso');</script>";
                                            echo "<script>location.href='usuarios.php?id=4'</script>";
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