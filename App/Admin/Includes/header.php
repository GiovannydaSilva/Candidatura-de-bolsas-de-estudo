<header>
    <div class="main-header-wrapper">
        <div class="container">
        <div class="row">
            <a href="#" class="col-xs-6 si-box-padding">
                <h3>Admin</h3>
            </a>

            <div class="col-xs-6 si-box-padding">
                <div class="admin-user-wrapper clearfix">
                    <div class="user-img">
                        <img src="../../Assets/Img/Users/<?= $_SESSION['foto'] ?>" class="img-responsive" alt="">
                    </div>

                    <div class="user-name btn-group">
                    <button class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><?= $_SESSION['nome'] ?>
                        <span>Administrator</span>
                    </button>
                        <ul class="dropdown-menu dropdown-menu-right logout-drop">
                            <li><a href="perfil.php"><i class="ti-user"></i><span>Perfil</span></a></li>
                            <li><a href="?logout=true"><i class="ti-power-off"></i><span>Sair</span></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        </div>

    </div>

    <div class="menu-list">
        <nav class="navbar navbar-default menu-white-wrapper">
        <div class="container">

            <div class="navbar-header">

                <div class="search-wrapper-head search-nav-left clearfix visible-xs">
                    <div class="search-input-wrapper">
                    <input type="text" name="search" placeholder="Search here...">
                    </div>
                    <div class="search-icon-wrapper">
                    <a href="#"><i class="ti-search"></i></a>
                    </div>
                </div>

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Navegação</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="row sec-cx">
                    <div class="col-md-12 si-box-padding">
                    <ul class="nav navbar-nav">
                        <li class="<?php if($_GET['id'] == '1'): echo 'active'; endif;?>"><a href="home.php?id=1"><i class="ti-home"></i>Home</a></li>
                        <li class="<?php if($_GET['id'] == '2'): echo 'active'; endif;?>"><a href="universidade.php?id=2">Universidade</a></li>
                        <li class="<?php if($_GET['id'] == '3'): echo 'active'; endif;?>"><a href="estudantes.php?id=3">Estudantes</a></li>
                        <li class="<?php if($_GET['id'] == '4'): echo 'active'; endif;?>"><a href="usuarios.php?id=4">Usuários</a></li>
                        <li class="<?php if($_GET['id'] == '5'): echo 'active'; endif;?>"><a href="bolsa.php?id=5">Bolsa</a></li>
                        <li class="<?php if($_GET['id'] == '6'): echo 'active'; endif;?>"><a href="candidatos.php?id=6">Candidatos</a></li>
                        <li class="<?php if($_GET['id'] == '7'): echo 'active'; endif;?>"><a href="comentarios.php?id=7">Comentários</a></li>
                    </ul>
                    </div>
                </div>
            </div>

        </div>
        </nav>
    </div>
</header>