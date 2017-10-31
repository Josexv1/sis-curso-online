<?php
    $data = $User->getDataBySession($_COOKIE["session"],$db);
    $pos = $User->getPosicion($db);
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
                <!-- row del 1 al 10-->
                <div class="row">
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="1" data-max="1">
                            <p >1</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="2" data-max="2">
                            <p>2</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="3" data-max="3">
                            <p>3</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="4" data-max="4">
                            <p>4</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="5" data-max="5">
                            <p>5</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="6" data-max="6">
                            <p>6</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="7" data-max="7">
                            <p>7</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="8" data-max="8">
                            <p>8</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="9" data-max="9">
                            <p>9</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="10" data-max="10">
                            <p>10</p>
                        </div>
                    </div>
                </div>
                <!-- row del 11 al 111-->
                <div class="row">
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="11" data-max="21">
                            <p data-min="" data-max="">10</p>
                            <p>(11/21)</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="22" data-max="32">
                            <p>10</p>
                            <p>(22/32)</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="33" data-max="43">
                            <p>10</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="44" data-max="54">
                            <p>10</p>
                            <p>(44/54)</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="55" data-max="65">
                            <p>10</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="66" data-max="76">
                            <p>10</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="77" data-max="87">
                            <p>10</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="88" data-max="98">
                            <p>10</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="99" data-max="109">
                            <p>10</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="110" data-max="120">
                            <p>10</p>
                        </div>
                    </div>
                </div>
                <!-- row del 111 al 1111-->
                <div class="row">
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="121" data-max="221">
                            <p>100</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="222" data-max="322">
                            <p>100</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="323" data-max="423">
                            <p>100</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="424" data-max="524">
                            <p>100</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="525" data-max="625">
                            <p>100</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="626" data-max="726">
                            <p>100</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="727" data-max="827">
                            <p>100</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="828" data-max="828">
                            <p>100</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="929" data-max="1029">
                            <p>100</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="1030" data-max="1130">
                            <p>100</p>
                        </div>
                    </div>
                </div>
                <!-- row del 1111 al 11.110-->
                <div class="row">
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="1131" data-max="2131">
                            <p>1000</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="2132" data-max="3132">
                            <p>1000</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="3233" data-max="4133">
                            <p>1000</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="4134" data-max="5134">
                            <p>1000</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="5135" data-max="6135">
                            <p>1000</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="6136" data-max="7136">
                            <p>1000</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="7137" data-max="8137">
                            <p>1000</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="8138" data-max="9138">
                            <p>1000</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="9139" data-max="10139">
                            <p>1000</p>
                        </div>
                    </div>
                    <div class="col-md-1 bloque">
                        <div class="circle" data-min="10140" data-max="11140">
                            <p>1000</p>
                        </div>
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
        <?php include_once (STAT . '/footer.php');      ?>
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
        // primero tomamos la posicion de la base de datos, y luego agregamos verde
        // a los circulos que si tengan personas.
        var val = <?php echo $pos['max(b_glob_pos)']?>;
        $('div[data-max]').each(function() {
            if (val > $(this).attr('data-min')) {
                $(this).removeClass('circle').addClass('circlegreen').attr('data-rel', 'tooltip').attr('title','Puestos completo');
            }
            if (val > $(this).attr('data-min') && val < $(this).attr('data-max')) {
                var restantes = $(this).attr('data-max') - val
                $(this).removeClass('circlegreen').addClass('circleyellow').attr('title','Quedan ' + restantes +' puestos');
            }
        });

        </script>
    </body>
</html>
