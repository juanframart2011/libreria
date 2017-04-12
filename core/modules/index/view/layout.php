<?php 
$u = null;
if( Session::getUID() != "" ):
                        
    $u = UserData::getById( Session::getUID() );
    $user = $u->name." ".$u->lastname;
endif;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="expires" content="0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Productos</title>

        <!-- Bootstrap core CSS -->
        <link href="res/bootstrap3/css/bootstrap.css" rel="stylesheet">

        <!-- Add custom CSS here -->
        <link href="res/select2/select2.css" rel="stylesheet">
        <link href="res/select2/select2-bootstrap.css" rel="stylesheet">

        <link href="css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <script src="js/jquery-1.10.2.js"></script>
        <?php if( isset( $_GET["view"] ) && $_GET["view"] == "home") :?>
            <link href='res/fullcalendar.min.css' rel='stylesheet' />
            <link href='res/fullcalendar.print.css' rel='stylesheet' media='print' />
            <script src='res/js/moment.min.js'></script>
            <script src='res/fullcalendar.min.js'></script>
        <?php 
        endif; ?>
        <script src='res/select2/select2.min.js'></script>
    </head>
    <body>

        <div id="wrapper">
            <?
            if( Session::getUID() != "" ):?>
                <!-- Sidebar -->
                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="./">Inventario Y Control <sup><small></small></sup></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">

                        <ul class="nav navbar-nav"></ul> 
                        <ul class="nav navbar-nav side-nav">
                            <li><a href="index.php?view=home"><i class="fa fa-home"></i> Pedir Producto</a></li>
                            
                            <li><a href="index.php?view=rents"><i class="fa fa-th-large"></i> Pedidos</a></li>
                            <?php 
                            if( $u->is_admin == 1 ):?>
                                <li><a href="index.php?view=clients"><i class="fa fa-male"></i> Vendedoras</a></li>
                                <li><a href="index.php?view=books"><i class="fa fa-book"></i> Productos</a></li>
                                <li><a href="index.php?view=categories"><i class="fa fa-th-list"></i> Categorias</a></li>
                                <li><a href="index.php?view=users"><i class="fa fa-users"></i> Usuarios </a></li>
                            <?php
                            else:?>
                                <li><a href="index.php?view=clienthistory"><i class="fa fa-male"></i> Historial de ventas</a></li>
                            <?
                            endif;?>
                        </ul>
                        <ul class="nav navbar-nav navbar-right navbar-user">
                            <li class="dropdown user-dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
                                <ul class="dropdown-menu"></ul>
                            </li>

                            <li class="dropdown user-dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $user; ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?view=configuration">Configuracion</a></li>
                                    <li><a href="logout.php">Salir</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            <?
            endif;?>

            <div id="page-wrapper">
                <?php 
                // puedo cargar otras funciones iniciales
                // dentro de la funcion donde cargo la vista actual
                // como por ejemplo cargar el corte actual
                View::load("login");?>
            </div><!-- /#page-wrapper -->
        </div><!-- /#wrapper -->

        <!-- JavaScript -->
        <script src="res/bootstrap3/js/bootstrap.min.js"></script>
    </body>
</html>