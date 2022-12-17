<?php 
    require 'Model/minha_conexao.php';
    require 'Model/minha_classe.php';

    require 'Controllers/Login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    
    <div class="container" style="position: relative; top: 120px;">
        <div class="row">
            <div class="col-lg-4 m-auto">
                <div class="p-4 shadow bg-white">
                    <form action="" method="POST">
                        <div class="col-lg-12 text-center">
                            <h1 class="h5"><a href="index.php">System Bolsa</a></h1>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label for="">Nome de utilizador</label>
                            <input type="text" required name="user" class="form-control">
                        </div>
                        <div class="col-lg-12 form-group">
                            <label for="">Password</label>
                            <input type="password" required name="senha" class="form-control">
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="submit" value="Login" name="iniciar_sessao" class="text-white bg_padrao btn form-control">
                        </div>
                        <div class="col-lg-12">
                            <p>Pretendes criar uma conta ? <a href="criar_conta.php">clique aqui</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row" style="position: relative; top: -50px">
            <div class="col-lg-8 text-left">
                <img src="Assets/Img/details-2-office-team-work.svg" style="width: 50%" alt="">
            </div>
        </div>
    </div>

    <script src="Assets/Js/jquery-3.2.1.min.js"></script>
    <script src="Assets/Js/bootstrap.min.js"></script>
    
</body>
</html>