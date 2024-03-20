
<?php 
    $nom = $_SESSION["Nombre"];
    $ape = $_SESSION["Apellido"];

    $pos_nom = strpos($nom," ");
    $pos_ape = strpos($ape," ");
    $user = substr($nom,0,$pos_nom)." ".substr($ape,0,$pos_ape);
?>

<header class="site-header">
    <div class="container-fluid">

        <a href="#" class="site-logo">
            <img class="hidden-md-down" src="../../public/img/logo-2.png" alt="">
            <img class="hidden-lg-up" src="../../public/img/logo-2-mob.png" alt="">
        </a>


        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">
                    <div class="dropdown user-menu">

                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../../public/img/user1.jpg" alt="">
                            <span class="d-none d-lg-inline-flex text-dark"><?php echo $user ?></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Perfil</a>
                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Ayuda</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../Logout/logout.php"><span class="font-icon glyphicon glyphicon-log-out"></span>Cerrar</a>
                        </div>
                    </div>

                    <button type="button" class="burger-right">
                        <i class="font-icon-menu-addl"></i>
                    </button>
                </div><!--.site-header-shown-->

                <div class="mobile-menu-right-overlay"></div>


                <div class="site-header-collapsed-in" style="margin-left: 20px;">
                    <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
                        <span>toggle menu</span>
                    </button>

                    <button class="hamburger hamburger--htla">
                        <span>toggle menu</span>
                    </button>
                </div><!--.site-header-collapsed-in-->
            </div>
        </div><!--site-header-content-in-->
    </div><!--.site-header-content-->
    </div><!--.container-fluid-->
</header><!--.site-header-->