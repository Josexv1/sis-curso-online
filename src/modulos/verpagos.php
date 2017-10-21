<?php
    $data = $User->getDataBySession($_COOKIE["session"],$db);
    include_once CORE . '/clase.compra.php';
    $compra = new Compra;
    $u = $compra->verCompras($db);
    if ($data['nivel']!=1) {
        header('Location: index.php?do=panel');
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Verificar pagos</title>
        <?php
		include_once (STAT . '/header.php');
		?>
        <link rel="stylesheet" href="vendors/css/colorbox.min.css" />
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
									Verificar pagos
								</small>
							</h1> </div>
                    <!-- /.page-header -->
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Curso</th>
                                        <th>version</th>
                                        <th>Fecha</th>
                                        <th>Precio a pagar</th>
                                        <th>Tx Bitcoin</th>
                                        <th>Cartera bitcoin</th>
                                        <th>Comprobante de pago</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($u as $row) {
                                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['usuario'];   ?>
                                        </td>
                                        <td>
                                            <?php echo $row['curso'];  ?>
                                        </td>
                                        <td>
                                            <?php echo $row['version'];?>
                                        </td>
                                        <td>
                                            <?php echo $row['fecha']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['precio']?>
                                        </td>
                                        <td>
                                            <?php echo $row['txbitcoin']?>
                                        </td>
                                        <td>
                                            <?php echo $row['carterabitcoin']?>
                                        </td>
                                        <td>
                                            <a href="<?php echo $row['imagenPago'];?>" ><img src="<?php echo $row['imagenPago'];?>" alt="" height="50px" width="50px" ></a>
                                        </td>
                                        <td>
                                               <div class="hidden-sm hidden-xs btn-group">
                                                <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?do=status=users&id=<?PHP echo $row['usuario']?>">
                                                    <button class="btn btn-xs btn-danger" title="Inactivo"> <i class="ace-icon fa fa-times bigger-120"></i> </button>
                                                </a>
                                            </div>

                                            <div class="hidden-sm hidden-xs btn-group">
                                                <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?do=eliminar&tipo=users2&id=<?PHP echo $row['usuario']?>">
                                                    <button class="btn btn-xs btn-success" title="Activo"> <i class="ace-icon fa fa-check bigger-120"></i> </button>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>
                                    <?php
} ?>
                            </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->
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
                <script src="vendors/js/jquery.dataTables.min.js"></script>
		        <script src="vendors/js/jquery.dataTables.bootstrap.js"></script>
                <script src="vendors/js/jquery.colorbox-min.js"></script>
                <!-- inline scripts related to this page -->
                <script>
                // automatic modal
			    $(window).load(function(){
        		$('#Alerta').modal('show');
    			});
                </script>
                <!-- inline scripts related to this page -->
    </body>

    </html>
