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
                            <form class="form-horizontal" role="form" action="">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nombre del curso</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Blogger" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Precio </label>

										<div class="col-sm-9">
											<input type="number" id="form-field-2" placeholder="1000" class="col-xs-10 col-sm-5" />
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">Precio sin punto ni simbolos.</span>
											</span>
										</div>
									</div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Descripcion del curso </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="Descripcion" class="col-xs-10 col-sm-5" />
										</div>
									</div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Duracion </label>

										<div class="col-sm-9">
											<input type="number" id="form-field-2" placeholder="15" class="col-xs-10 col-sm-5" />
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">Cantidad de videos que contiene</span>
											</span>
										</div>
									</div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Codigo </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="Codigo" class="col-xs-10 col-sm-5" />
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">Las iniciales. EJ: BS (Blogger Starter)</span>
											</span>
										</div>
									</div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Version </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="Starter" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div>
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="button">
												<i class="icon-ok bigger-110"></i>
												Guardar
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
                            </form>
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
                <!-- inline scripts related to this page -->
    </body>

    </html>
