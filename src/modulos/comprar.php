<?php

    $data = $User->getDataBySession($_COOKIE["session"],$db);
    include_once CORE . '/clase.compra.php';
    include_once CORE . '/clase.curso.php';
    $cursos = new Curso;
    $c = $cursos->getCurso($_GET['curso'], $_GET['version'], $db);
    if (isset($_GET['curso'])) {
        $curso = $_GET['curso'];
    } else {
        header('Location: index.php?do=panel');
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Comprar curso</title>
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
									Comprar Curso: <?php echo $_GET['curso'] . ' ' . $_GET['version']?>
								</small>
							</h1> </div>
                    <!-- /.page-header -->
                    <div class="data">
                    <div class="col-xs-12">
                        <div class="well">
                            <h4>Como realizar tu pago.</h4>
                            <ul>
                                <li>Realiza un deposito de <?php echo $c['precio'] ?>$ o transferencia bancaria a los siguientes numeros de cuenta 0000000000 banco X. O por Paypal al siguiente correo: correo@correo.com</li>
                                <li>Toma un capture a la transaccion</li>
                                <li>Sube la foto y espera a que se active tu cuenta.</li>
                            </ul>
                            <p></p>
                            <p></p>
                            <p></p>
                        </div>
                    <div class="well">
                        <h4 class="blue">Tambien puedes hacer tu pago en bitcoin.</h4>
                        <p>Haz tu pago a la siguiente direccion: 11kk1k1k1k1k1k</p>
                        <p>Y llenas los datos del formulario de abajo. <b>Si no pagas con Bitcoin dejalo en blanco.</b></p>
                    </div>
                    <form action="<?php CORE . '/upload.php'; ?>" method="post" enctype="multipart/form-data">
                    <input hidden name="usuario" value="<?php echo $data['usuario']; ?>">
                    <input hidden name="curso" value="<?php echo $_GET['curso']; ?>">
                    <input hidden name="version" value="<?php echo $_GET['version']; ?>">
                    <input hidden name="fecha" value="<?php echo date("Y h:i:sa"); ?>">
                    <input hidden name="precio" value="<?php echo $c['precio'] ?>">
                    <input type="text" name="txBitcoin" placeholder="Codigo de transaccion bitcoin">
                    <input type="text" name="carteraBitcoin" placeholder="Tu direccion bitcoin">
                    </br>
                    <label for="">Suba una captura de la transaccion.</label>
                        <input type="file" name="file" id="file">
                        <input type="submit" value="Subir pago" name="pagar">
                    </form>

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
                <script>
                // automatic modal
			    $(window).load(function(){
        		$('#Alerta').modal('show');
    			});
                </script>
    </body>

    </html>
    <?php
if (isset($_POST["pagar"])) {
    $com = new Compra;
    $r = $com->registrar($_POST, $db);
    if ($r) {
        $temp = explode(".", $_FILES["file"]["name"]);
        $path = $_SERVER['DOCUMENT_ROOT'] . UP . $_POST['usuario'];
        $finalname = 'pago_'. date("Y_h_i_m") . '.' . end($temp);
        if (($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png")
        && ($_FILES["file"]["size"] < 2000000)) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Error " . $_FILES["file"]["error"] . "<br>";
            } else {
                if(file_exists($path.$finalname)){
                    echo "$path$finalname already exists. ";
                    $oke = false;
                } else {
                    if (!is_dir($path)) {
                        mkdir($path, 0755, true);  // Create non-executable upload folder(s) if needed.
                        echo "Se creo el directorio $path";
                        $oke = false;
                    }
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $path.'/'.$finalname)) {
                        $oke = true;
                        echo "uploaded to: $path/$finalname";
                    }
                }
            }
        } else {
            echo "
            <div class='modal fade' id='Alerta' tabindex='-1' role='dialog' aria-labeledby='AlertaLabel' aria-hidden='false'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                        <h3>¡Error!</h3>
                    </div>
                    <div class='modal-body'>
                        <p>La imagen no pudo ser subida!</p>
                        <p>La imagen debe ser JPG o PNG, no debe pesar mas de 2MB</p>
                    </div>
                    <div class='modal-footer'>
                    <button type='button' class='btn btn-info' data-dismiss='modal'>¡Entiendo!</button>
                    </div>
                </div>
                </div>
            </div>";
            $oke = false;
        }//fin if complejo
    }// end if $r
    if ($oke) {
        $com->regFoto($path.'/'.$finalname, $data['usuario'], $_POST['fecha'], $db);
    }
}
?>
