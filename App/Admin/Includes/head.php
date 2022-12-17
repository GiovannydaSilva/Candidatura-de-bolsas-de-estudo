<?php 
   require '../../Model/minha_conexao.php';
   require '../../Model/minha_classe.php';

   session_start();
    if(!isset($_SESSION['email']) AND !isset($_SESSION['senha'])):
		header('location: ../../login.php');
		exit();
	endif;

	if(isset($_GET['logout']) && $_GET['logout'] == 'true'):
		session_destroy();
      /* Parte que está a dar bug 
      $usuario_admin = $logout->EXE_QUERY("SELECT * FROM tb_usuario INNER JOIN tb_genero ON tb_usuario.id_genero_fk=tb_genero.id_genero WHERE tb_usuario.id_privilegio_fk = 1 AND email_usuario=:email AND senha_usuario=:senha", $parametros_login_user);
      $logout_at = date("Y-m-d H:i");
      $id = $usuario_admin[0]['id_usuario'];
      $parametros_logout = [
         ":logout_at"    => $logout_at,
         ":id" => $id
      ];
      $login->EXE_QUERY("UPDATE tb_usuario set logout_at = :logout_at where id_usuario = :id", $parametros_logout);
		header("location: ../../login.php");*/
    endif;

    require '../../Controllers/Admin/Admin.php';
?>
<!doctype html>
<html lang="pt-br">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Site Bolsa | Admin</title>
   <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="../assets/plugins/themify/themify-icons.css">
   <link rel="stylesheet" type="text/css" href="../assets/plugins/mCustomScrollbar/jquery.mCustomScrollbar.css">
   <link rel="stylesheet" type="text/css" href="../assets/css/jquery.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

   <style>
      .navbar-nav a {
         text-transform: uppercase;
      }
      .carregando{
        color:#ff0000;
        display: none;
      }
   </style>
   <script type="text/javascript" src="../../Assets/js/jquery-3.2.1.min.js"></script>

   


</head>
<body>