<?php
$data = $User->getDataBySession($_COOKIE["session"],$db);
if (!empty($_GET['usuario'])) {
    $perfil = $User->getPerfil($_GET['usuario'],$db);
} else {
    $perfil = $data;
}
if (! defined ( 'SECURE' )) {
	die ( "Logged Hacking attempt!" );
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Perfil</title>
        <?php
		include_once (STAT . '/header.php');
		?>
            <!-- page specific plugin styles -->
            <link rel="stylesheet" href="vendors/css/jquery-ui.custom.min.css" />
            <link rel="stylesheet" href="vendors/css/jquery.gritter.min.css" />
            <link rel="stylesheet" href="vendors/css/select2.min.css" />
            <link rel="stylesheet" href="vendors/css/datepicker.min.css" />
            <link rel="stylesheet" href="vendors/css/bootstrap-editable.min.css" /> </head>

    <body class="no-skin">
        <?php include_once STAT.'/menu.php';
          ?>
            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="index.php?do=panel">Inicio</a> </li>
                            <li> <span>Profesores</span></li>
                            <li class="active">Perfil de Usuario</li>
                        </ul>
                        <!-- /.breadcrumb -->
                        <div class="nav-search" id="nav-search">
                            <form class="form-search" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?do=busca" method="GET"> <span class="input-icon">
									<input type="text" placeholder="Buscar..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span> </form>
                        </div>
                        <!-- /.nav-search -->
                    </div>
                    <div class="page-header">
                        <h1>
								Resumen personal
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Perfil de <?php echo $perfil['nombre'] . " " . $perfil['apellido']; ; ?>
								</small>
							</h1> </div>
                    <!-- /.page-header -->
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                                    <div class="col-xs-12 col-sm-9">
                                        <div class="space-12"></div>
                                        <div class="profile-user-info profile-user-info-striped">
                                        <div class="profile-info-row">
                                                <div class="profile-info-name"> Usuario </div>
                                                <div class="profile-info-value"> <span class="editable" id="usuario" name="usuario"><?php echo $perfil['usuario']; ?></span> </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Documento de identidad:  </div>
                                                <div class="profile-info-value"> <span class="editable" id="tipo_documento" name="tipo_documento"><?php echo $perfil['tipo_documento']; ?></span><span class="editable" id="cod_documento" name="cod_documento"><?php echo $perfil['cod_documento']; ?></span> </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Nombre </div>
                                                <div class="profile-info-value"> <span class="editable" id="nombre" name="nombre"><?php echo $perfil['nombre']; ?></span> </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Apellido </div>
                                                <div class="profile-info-value"> <span class="editable" id="apellido" name="apellido"><?php echo $perfil['apellido']; ?></span> </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Correo </div>
                                                <div class="profile-info-value"> <span class="editable" id="correo" name="correo"><?php echo $perfil['correo']; ?></span> </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Telefono </div>
                                                <div class="profile-info-value"> <span class="editable" id="telefono" name="telefono"><?php echo $perfil['telefono']; ?></span> </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Direccion </div>
                                                <div class="profile-info-value">
                                                    <span class="editable" id="direccion" name="direccion">
                                                    <?php echo $perfil['direccion']; ?>
                                                    </span>
                                                    <span class="editable" id="ciudad" name="ciudad">
                                                    <?php echo $perfil['ciudad']; ?>
                                                    </span>
                                                    <span class="editable" id="pais" name="pais">
                                                    <?php echo $perfil['pais']; ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Patrocinador </div>
                                                <div class="profile-info-value"> <span class="editable" id="patrocinador" name="patrocinador"><?php echo $perfil['patrocinador']; ?></span> </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Referidos </div>
                                                <div class="profile-info-value"> <span class="editable" id="referidos" name="referidos"><?php echo $perfil['usuarios_referidos']; ?></span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.user-profile -->
                    </div>
                    <!-- PAGE CONTENT ENDS -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            </div>
            <!-- /.page-content -->
            </div>
            </div>
            <!-- /.main-content -->
            <?php include_once (STAT . '/footer.php'); 		?>
            <!-- /.main-container -->
            <!-- basic scripts -->
            <!--[if !IE]> -->
            <script src="vendors/js/jquery.2.1.1.min.js"></script>
            <!-- <![endif]-->
            <!--[if IE]>
<script src="vendors/js/jquery.1.11.1.min.js"></script>
<![endif]-->
            <!--[if !IE]> -->
            <script type="text/javascript">
                window.jQuery || document.write("<script src='vendors/js/jquery.min.js'>" + "<" + "/script>");

            </script>
            <!-- <![endif]-->
            <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='vendors/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
            <script type="text/javascript">
                if ('ontouchstart' in document.documentElement) document.write("<script src='vendors/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");

            </script>
            <script src="vendors/js/bootstrap.min.js"></script>
            <!-- page specific plugin scripts -->
            <!--[if lte IE 8]>
		  <script src="vendors/js/excanvas.min.js"></script>
		<![endif]-->
            <script src="vendors/js/jquery-ui.custom.min.js"></script>
            <script src="vendors/js/jquery.ui.touch-punch.min.js"></script>
            <script src="vendors/js/jquery.gritter.min.js"></script>
            <script src="vendors/js/bootbox.min.js"></script>
            <script src="vendors/js/jquery.easypiechart.min.js"></script>
            <script src="vendors/js/bootstrap-datepicker.min.js"></script>
            <script src="vendors/js/jquery.hotkeys.min.js"></script>
            <script src="vendors/js/bootstrap-wysiwyg.min.js"></script>
            <script src="vendors/js/select2.min.js"></script>
            <script src="vendors/js/fuelux.spinner.min.js"></script>
            <script src="vendors/js/bootstrap-editable.min.js"></script>
            <script src="vendors/js/ace-editable.min.js"></script>
            <script src="vendors/js/jquery.maskedinput.min.js"></script>
            <!-- ace scripts -->
            <script src="vendors/js/ace-elements.min.js"></script>
            <script src="vendors/js/ace.min.js"></script>
    </body>

    </html>
