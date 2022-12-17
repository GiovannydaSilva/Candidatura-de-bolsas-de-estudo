<?php require 'Includes/head.php'; ?>

<?php require 'Includes/header.php'; ?>
<div class="content-outer-wrapper">
   <div class="chance" style="background: linear-gradient(-87deg, #04B8DD 0, #04B8DD 100% ) !important"></div>
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

               <section class="chart-section-dash">
                  <div class="row">
                        <div class="col-md-12 si-box-padding">
                            <div class="data-table-wrapper border-table widget-wrapper-sm">
                                <form action="" enctype="multipart/form-data" method="POST" class="p-4" style="padding: 20px !important;">
                                   <div class="row">
                                      <?php 
                                          $parametros_perfil = [":email"   => $_SESSION['email']];
                                          $perfil = new User();
                                          $buscar = $perfil->EXE_QUERY("SELECT * FROM tb_usuario WHERE email_usuario=:email", $parametros_perfil);
                                          foreach($buscar as $retorno):?>
                                             <div class="col-lg-4 form-group">
                                                <label for="">Nome Completo</label>
                                                <input type="text" value="<?= $retorno['nome_usuario'] ?>" class="form-control" name="nome">
                                             </div>
                                             <div class="col-lg-4 form-group">
                                                <label for="">E-mail</label>
                                                <input type="text" value="<?= $retorno['email_usuario'] ?>" class="form-control" name="email">
                                             </div>
                                             <div class="col-lg-4 form-group">
                                                <label for="">Palavra Passe</label>
                                                <input type="password" required class="form-control" name="senha">
                                             </div>
                                             <div class="col-lg-4 form-group">
                                                <label for="">Foto</label>
                                                <input type="file" required class="form-control" name="foto">
                                             </div>
                                             <div class="col-lg-4 form-group">
                                                <label for="">Nº de bilhete</label>
                                                <input type="text" value="<?= $retorno['num_bi_usuario'] ?>" class="form-control" name="bi">
                                             </div>
                                             <div class="col-lg-4 form-group">
                                                <label for="">Genero</label>
                                                <select name="id_genero_fk" class="form-control" id="">
                                                   <?php 
                                                      $options = new User();
                                                      $option = $options->EXE_QUERY("SELECT * FROM tb_genero");
                                                      foreach($option as $val):?>
                                                         <option value="<?= $val['id_genero'] ?>"><?= $val['genero'] ?></option>
                                                      <?php
                                                      endforeach;?>
                                                </select>
                                             </div>
                                       <?php endforeach;?>
                                   </div>
                                   <div class="row">
                                      <div class="form-group col-lg-2">
                                         <input type="submit" name="mudar_perfil" value="Editar perfil" class="form-control col-lg-10" style="background: #3C9FCF !important; color: #fff;">
                                      </div>
                                   </div>

                                   <?php 
                                   
                                       if(isset($_POST['mudar_perfil'])):
                                          $nome   = $_POST['nome'];
                                          $email  = $_POST['email'];
                                          $senha  = md5(md5($_POST['senha']));
                                          $genero = $_POST['id_genero_fk'];
                                          $bi     = $_POST['bi'];
                                          $target = "../../Assets/Img/Users/" . basename($_FILES['foto']['name']);
                                          $foto   = $_FILES['foto']['name'];
                                          
                                          $parametros_mudar_perfil = [
                                             ":id"          => $_SESSION['id'],
                                             ":nome"        => $nome,
                                             ":email"       => $email,
                                             ":senha"       => $senha,
                                             ":bi"          => $bi,
                                             ":genero"      => $genero,
                                             ":foto"        => $foto
                                          ];

                                          $mudar_perfil_usuario = new User();
                                          $mudar_perfil_usuario->EXE_NON_QUERY("UPDATE tb_usuario SET 
                                          nome_usuario=:nome, email_usuario=:email, senha_usuario=:senha, num_bi_usuario=:bi,
                                          id_genero_fk=:genero, foto_usuario=:foto WHERE id_usuario=:id", $parametros_mudar_perfil);
                                          if($mudar_perfil_usuario):
                                             if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)) :
                                                $sms = "Uploaded feito com sucesso";
                                             else:
                                                   $sms = "Não foi possível fazer o upload";
                                             endif;
                                             echo "<script>location.href='perfil.php'</script>";
                                          endif;

                                          echo "<script>window.alert('Mudança de perfil funcionando')</script>";
                                       endif;
                                       echo "<script>window.alert('Mudança de perfil funcionando')</script>";
                                   
                                   ?>
                                </form>
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