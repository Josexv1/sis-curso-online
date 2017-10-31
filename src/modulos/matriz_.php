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
                            <li class="active">Principal</li>
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
                    <div class="page-header">
                        <h1>
								Principal
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Matriz.
								</small>
							</h1> </div>
                    <!-- /.page-header -->
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="container">
                    <div class="infobox-container ">
                        <div class="row">
                            <div class="col-md-1 infobox">1</div>
                            <div class="col-md-1 infobox">2</div>
                            <div class="col-md-1 infobox">3</div>
                            <div class="col-md-1 infobox">4</div>
                            <div class="col-md-1 infobox">5</div>
                            <div class="col-md-1 infobox">6</div>
                            <div class="col-md-1 infobox">7</div>
                            <div class="col-md-1 infobox">8</div>
                            <div class="col-md-1 infobox">9</div>
                            <div class="col-md-1 infobox">10</div>
                        </div>
                        <div class="row matrix-2">
                            <div class="col-md-1 infobox">
                            <span>10</span>
                            </div>
                            <div class="col-md-1 infobox">10</div>
                            <div class="col-md-1 infobox">10</div>
                            <div class="col-md-1 infobox">10</div>
                            <div class="col-md-1 infobox">10</div>
                            <div class="col-md-1 infobox">10</div>
                            <div class="col-md-1 infobox">10</div>
                            <div class="col-md-1 infobox">10</div>
                            <div class="col-md-1 infobox">10</div>
                            <div class="col-md-1 infobox">10</div>
                        </div>
                        <div class="row matrix-3 red">
                            <div class="col-md-1 infobox">100</div>
                            <div class="col-md-1 infobox">100</div>
                            <div class="col-md-1 infobox">100</div>
                            <div class="col-md-1 infobox">100</div>
                            <div class="col-md-1 infobox">100</div>
                            <div class="col-md-1 infobox">100</div>
                            <div class="col-md-1 infobox">100</div>
                            <div class="col-md-1 infobox">100</div>
                            <div class="col-md-1 infobox">100</div>
                            <div class="col-md-1 infobox">100</div>
                        </div>
                        <div class="row matrix-4">
                            <div class="col-md-1 infobox">1000</div>
                            <div class="col-md-1 infobox">1000</div>
                            <div class="col-md-1 infobox">1000</div>
                            <div class="col-md-1 infobox">1000</div>
                            <div class="col-md-1 infobox">1000</div>
                            <div class="col-md-1 infobox">1000</div>
                            <div class="col-md-1 infobox">1000</div>
                            <div class="col-md-1 infobox">1000</div>
                            <div class="col-md-1 infobox">1000</div>
                            <div class="col-md-1 infobox">1000</div>
                        </div>
                    </div>
                    </div>
                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->
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
