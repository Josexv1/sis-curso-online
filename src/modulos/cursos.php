<?php
$data = $User->getDataBySession($_COOKIE["session"],$db);
include_once CORE . '/clase.curso.php';
$c = new Curso;
$cursos = $c->imprimirCursos($db);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Panel principal</title>
        <?php
		include_once (STAT . '/header.php');
		?>
    </head>

    <body class="no-skin">
        <?php
		include_once (STAT . '/menu.php');
		?>
            </head>
            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="index.php?do=panel">Inicio</a> </li>
                            <li class="active">Cursos</li>
                        </ul>
                        <!-- /.breadcrumb -->
                        <div class="nav-search" id="nav-search">
                            <form class="form-search" action="" method="get"> <span class="input-icon">
									<input type="text" placeholder="Buscar..." name="cedula" class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span> </form>
                        </div>
                        <!-- /.nav-search -->
                    </div>
                    <!-- /.page-header -->
                    <div class="data">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div data-for="mostrar-cursos">
                            <?php foreach ($cursos as $curso) {
                                            ?>
                                    <div class="col-xs-6 col-sm-3 pricing-box">
                            <div class="widget-box">
                                <div class="widget-header header-color-dark">
                                    <h5 class="bigger lighter"><?php echo $curso['nombre'] . ' ' . $curso['version'] ?></h5>
                                    <?php if ($data['nivel'] == 1) {
                                        echo '<a href="index.php?do=eliminar&tipo=curso&id=' . $curso['codigo']. '" class="btn btn-block btn-warning">
                                        <i class="icon-shopping-cart bigger-110"></i>
                                        <span>Eliminar</span>
                                    </a>';
                                    }?>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <ul class="list-unstyled spaced2">
                                            <li>
                                            <p>
                                            <?php echo $curso['descripcion']?>
                                            </p>
                                        </ul>

                                        <hr />
                                        <div class="price">
                                            $<?php echo $curso['precio']?>
                                            <small>/mes</small>
                                        </div>
                                    </div>

                                    <div>
                                        <a href="index.php?do=comprar&curso=<?php echo $curso['nombre']?>&version=<?php echo $curso['version']?>" class="btn btn-block btn-inverse">
                                            <i class="icon-shopping-cart bigger-110"></i>
                                            <span>Comprar</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                            </div>
                        <!-- PAGE CONTENT ENDS -->
                        <!-- /.col -->
                    </div>
                    <!-- /.data -->
                </div>
                <!-- main container inner -->
            </div>
            <!-- /.main-content -->
            <?php include_once (STAT . '/footer.php'); 		?>
                <!-- page specific plugin scripts -->
                <!--[if lte IE 8]>
		  <script src="vendors/js/excanvas.min.js"></script>
		<![endif]-->
                <script src="vendors/js/jquery-ui.custom.min.js"></script>
                <script src="vendors/js/jquery.ui.touch-punch.min.js"></script>
                <script src="vendors/js/jquery.easypiechart.min.js"></script>
                <script src="vendors/js/jquery.sparkline.min.js"></script>
                <script src="vendors/js/jquery.flot.min.js"></script>
                <script src="vendors/js/jquery.flot.pie.min.js"></script>
                <script src="vendors/js/jquery.flot.resize.min.js"></script>
                <!-- inline scripts related to this page -->
    </body>

    </html>
