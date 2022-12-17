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
                                <p class="pull-left">Listagem de candidatos</p>
                            </div>
                            <div class="table-responsive">
                                <table id="myTable" class="display custom-table-data">
                                    <thead>
                                        <tr>
                                            <th>Referencia</th>
                                            <th>Nome Completo</th>
                                            <th>E-mail</th>
                                            <th>Nº de Telefone</th>
                                            <th>Nº de Bilhete</th>
                                            <th>Genero</th>
                                            <th class="text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                            $busca_candidato = new User();
                                            $buscando = $busca_candidato->EXE_QUERY("SELECT * FROM tb_candidatura_bolsa 
                                            INNER JOIN tb_genero ON tb_candidatura_bolsa.id_genero_fk=tb_genero.id_genero
                                            INNER JOIN tb_vagas_bolsa ON tb_candidatura_bolsa.id_vagas_bolsa_fk=tb_vagas_bolsa.id_vagas_bolsa");
                                            if(count($buscando)):
                                                foreach($buscando as $retorno):?>
                                                <tr>
                                                    <td><?= $retorno['id_candidato'] ?></td>
                                                    <td><?= $retorno['nome'] ?></td>
                                                    <td><?= $retorno['email'] ?></td>
                                                    <td><?= $retorno['tel_candidato'] ?></td>
                                                    <td><?= $retorno['num_bi'] ?></td>
                                                    <td><?= $retorno['nome_bolsa'] ?></td>
                                                    <td class="text-center">
                                                        <a href="candidatos.php?id=<?= $retorno['id_candidato'] ?>&action=delete" class="btn btn-danger btn-sm">Eliminar</a>
                                                    </td>
                                                </tr>
                                            <?php 
                                                endforeach;
                                            
                                            else:?>
                                                <tr>
                                                    <td colspan="10">Não existe nenhum candidato</td>
                                                </tr>
                                            <?php 
                                            endif;?>
                                    </tbody>
                                </table>
                                <?php 
                                if (isset($_GET['action']) && $_GET['action'] == 'delete'):
                                    $id = $_GET['id'];
                                    $parametros  = [
                                        ":id" => $id
                                    ];
                                    $delete = new User();
                                    $delete->EXE_NON_QUERY("DELETE FROM tb_candidatura_bolsa WHERE id_candidato=:id", $parametros);
                                    if($delete == true):
                                        echo "<script>window.alert('Apagado com sucesso');</script>";
                                        echo "<script>location.href='candidatos.php?id=6'</script>";
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