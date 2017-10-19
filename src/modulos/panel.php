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
									Cursos.
								</small>
							</h1> </div>
                    <!-- /.page-header -->
                    <div class="row center">
                        <div class="col-xs-6 col-sm-3 pricing-box">
                            <div class="widget-box">
                                <div class="widget-header header-color-dark">
                                    <h5 class="bigger lighter">Blogger Starter</h5>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <ul class="list-unstyled spaced2">
                                            <li>
                                                <i class="icon-ok green"></i>
                                                Bono de referidos: 16$
                                            </li>

                                            <li>
                                                <i class="icon-ok green"></i>
                                                Bono de recompra de referido:
                                                <ul>
                                                    <li>Recompra de 50$, Ganas: 3,5$</li>
                                                    <li>Recompra de 100$, Ganas: 7$</li>
                                                    <li>Recompra de 650$, Ganas: 18$</li>
                                                    <li>Recompra de 1200$, Ganas: 35$</li>
                                                </ul>
                                            </li>

                                            <li>
                                                <i class="icon-ok green"></i>
                                                Bono de matriz 10x4: 1$ por persona, Hasta 10.000$
                                            </li>
                                        </ul>

                                        <hr />
                                        <div class="price">
                                            $125
                                            <small>/mes</small>
                                        </div>
                                    </div>

                                    <div>
                                        <a href="index.php?do=comprar&curso=blogger&version=starter" class="btn btn-block btn-inverse">
                                            <i class="icon-shopping-cart bigger-110"></i>
                                            <span>Comprar</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3 pricing-box">
                            <div class="widget-box">
                                <div class="widget-header header-color-orange">
                                    <h5 class="bigger lighter">Blogger Medium Pack</h5>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <ul class="list-unstyled spaced2">
                                        <li>
                                        <i class="icon-ok green"></i>
                                        Bono de referidos: 43$
                                    </li>

                                    <li>
                                        <i class="icon-ok green"></i>
                                        Bono de recompra de referido:
                                        <ul>
                                            <li>Recompra de 50$, Ganas: 3,5$</li>
                                            <li>Recompra de 100$, Ganas: 7$</li>
                                            <li>Recompra de 650$, Ganas: 18$</li>
                                            <li>Recompra de 1200$, Ganas: 35$</li>
                                        </ul>
                                    </li>

                                    <li>
                                        <i class="icon-ok green"></i>
                                        Bono de matriz 10x4: 1$ por persona, Hasta 10.000$
                                    </li>
                                        </ul>

                                        <hr />
                                        <div class="price">
                                            $650
                                            <small>/mes</small>
                                        </div>
                                    </div>

                                    <div>
                                        <a href="index.php?do=comprar&curso=blogger&version=medium" class="btn btn-block btn-warning">
                                            <i class="icon-shopping-cart bigger-110"></i>
                                            <span>Comprar</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3 pricing-box">
                            <div class="widget-box">
                                <div class="widget-header header-color-blue">
                                    <h5 class="bigger lighter">Blogger Business Package</h5>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                    <ul class="list-unstyled spaced2">
                                    <li>
                                    <i class="icon-ok green"></i>
                                    Bono de referidos: 72$
                                </li>

                                <li>
                                    <i class="icon-ok green"></i>
                                    Bono de recompra de referido:
                                    <ul>
                                        <li>Recompra de 50$, Ganas: 3,5$</li>
                                        <li>Recompra de 100$, Ganas: 7$</li>
                                        <li>Recompra de 650$, Ganas: 18$</li>
                                        <li>Recompra de 1200$, Ganas: 35$</li>
                                    </ul>
                                </li>

                                <li>
                                    <i class="icon-ok green"></i>
                                    Bono de matriz 10x4: 1$ por persona, Hasta 10.000$
                                </li>
                                    </ul>

                                        <hr />
                                        <div class="price">
                                            $1200
                                            <small>/mes</small>
                                        </div>
                                    </div>

                                    <div>
                                        <a href="index.php?do=comprar&curso=blogger&version=bussiness" class="btn btn-block btn-primary">
                                            <i class="icon-shopping-cart bigger-110"></i>
                                            <span>Comprar</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div><!-- PAGE CONTENT ENDS -->
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
