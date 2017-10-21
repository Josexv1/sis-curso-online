<?php
    $data = $User->getDataBySession($_COOKIE["session"],$db);
    include_once CORE . '/clase.compra.php';
    if (isset($_GET['curso'])) {
        $curso = $_GET['curso'];
    } else {
        header('Location: index.php?do=panel');
    }
    if ($curso == 'blogger') {
        if (isset($_GET['version'])) {
            switch ($_GET['version']) {
                case 'starter':{
                    $precio = 120;
                    break;
                }
                case 'medium':
                    $precio = 650;
                    break;
                case 'bussiness':
                    $precio = 1200;
                    break;
            }
        }
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
                                <li>Realiza un deposito o transferencia bancaria a los siguientes numeros de cuenta 0000000000 banco X. O por Paypal al siguiente correo: correo@correo.com</li>
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
                    <input hidden name="precio" value="<?php echo $precio ?>">
                    <input type="text" name="txBitcoin" placeholder="Codigo de transaccion bitcoin">
                    <input type="text" name="carteraBitcoin" placeholder="Tu direccion bitcoin">
                    </br>
                    <label for="">Suba una captura de la transaccion.</label>
                        <input type="file" name="fileToUpload" id="fileToUpload">
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
    // si r es positivo, osea que registramos el formulario, procedemos a subir la imagen.
    $target_dir = UP;
    $target_file = $target_dir . $data['usuario'] . '_pago_' . date("Y-h-i-sa") .basename($_FILES["fileToUpload"]["name"]);
    $fullpath = ROOT . $target_file;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {

            $uploadOk = 0;
        }
    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($imageFileType != "jpg"
    && $imageFileType != "png"
    && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<div class='modal fade' id='Alerta' tabindex='-1' role='dialog' aria-labeledby='AlertaLabel' aria-hidden='false'>
            <div class='modal-dialog'>
                    <div class='modal-content'>
                <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                  <h3>Error!</h3>
                </div>
                <div class='modal-body'>
                  <p> La imagen no se subio!.</p>
                </div>
                <div class='modal-footer'>
                <button type='button' class='btn btn-info' data-dismiss='modal'>¡Entiendo!</button>
                </div>
                    </div>
                  </div>
              </div>";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fullpath)) {
                $com->regFoto($target_file, $data['usuario'], $_POST['fecha'], $db);
                echo "<div class='modal fade' id='Alerta' tabindex='-1' role='dialog' aria-labeledby='AlertaLabel' aria-hidden='false'>
                <div class='modal-dialog'>
                        <div class='modal-content'>
                    <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                      <h3>¡Felicidades!</h3>
                    </div>
                    <div class='modal-body'>
                      <p> La imagen se subio con exito!. Y se guardo en la base de datos!</p>
                    </div>
                    <div class='modal-footer'>
                    <button type='button' class='btn btn-info' data-dismiss='modal'>¡Entiendo!</button>
                    </div>
                        </div>
                      </div>
                  </div>";
            } else {
                echo "<div class='modal fade' id='Alerta' tabindex='-1' role='dialog' aria-labeledby='AlertaLabel' aria-hidden='false'>
                <div class='modal-dialog'>
                        <div class='modal-content'>
                    <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                      <h3>Error!</h3>
                    </div>
                    <div class='modal-body'>
                      <p>La imagen pudo ser subida, cencelando pago.</p>
                    </div>
                    <div class='modal-footer'>
                    <button type='button' class='btn btn-info' data-dismiss='modal'>¡Entiendo!</button>
                    </div>
                        </div>
                      </div>
                  </div>";
            }
        }
    }// end if $r
}
?>
