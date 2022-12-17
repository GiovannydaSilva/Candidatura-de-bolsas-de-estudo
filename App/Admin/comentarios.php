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
                                <p class="pull-left">Listagem de comentários</p>
                            </div>
                            <div class="table-responsive">
                                <table id="myTable" class="display custom-table-data">
                                    <thead>
                                        <tr>
                                            <th>Referencia</th>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>Tel</th>
                                            <th>Comentário</th>
                                            <th>Data registro mensagem</th>
                                            <th class="text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $busca_usuario = new User();
                                            $buscando = $busca_usuario->EXE_QUERY("SELECT * FROM tb_comentario");
                                            if(count($buscando)):
                                                foreach($buscando as $retorno):?>
                                                <tr>
                                                    <td><?= $retorno['id_comentario'] ?></td>
                                                    <td><?= $retorno['nome'] ?></td>
                                                    <td><?= $retorno['email'] ?></td>
                                                    <td><?= $retorno['tel'] ?></td>
                                                    <td><?= $retorno['mensagem'] ?></td>
                                                    <td><?= $retorno['data_mensagem_registro'] ?></td>
                                                    <td class="text-center">
                                                        <a href="comentarios.php?id=<?= $retorno['id_comentario'] ?>&action=delete" class="btn btn-danger btn-sm">Eliminar</a>
                                                    </td>
                                                </tr>
                                            <?php 
                                                endforeach;
                                            else:?>
                                                <tr>
                                                    <td colspan="10">Não existe nenhum comentário</td>
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
                                        $delete->EXE_NON_QUERY("DELETE FROM tb_comentario WHERE id_comentario=:id", $parametros);
                                        if($delete == true):
                                            echo "<script>window.alert('Apagado com sucesso');</script>";
                                            echo "<script>location.href='comentarios.php?id=7'</script>";
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