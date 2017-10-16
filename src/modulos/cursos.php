<?php
$data = $User->getDataBySession($_COOKIE["session"],$db);
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
                            <div>
                            Cursitos :D
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
