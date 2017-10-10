<?php
// if (!defined('SECURE')) {
//     die("Logged Hacking attempt!");
// }
include ROOT_DIR . '/tema/header.html';
$delitos = new delito();
//$total = $delitos->total();
//var_dump($total);
?>
<!-- Custom Theme Style -->
<link href="build/css/custom.min.css" rel="stylesheet">
<style>
.resize {

font-size: 28px;

}
</style>
</link>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll
                -view">
                    <?php
include ROOT_DIR . '/tema/menu.html';
?>
                </div>
            </div>
                                <?php
include ROOT_DIR . '/tema/top_menu.html';
?>
            <!-- page content -->
            <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count">
                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                        <span class="count_top">
                            <i class="fa fa-database">
                            </i>
                            Total delitos
                        </span>
                        <div class="count">
                            2500
                        </div>
                        <span class="count_bottom">
                            <i class="fa fa-sort-asc">
                                </i>
                            <i class="green">
                             4%
                             </i>  
                            
                
                            En la semana
                        </span>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                        <span class="count_top">
                            <i class="fa fa-clock-o">
                            </i>
                            Periodo con + delitos
                        </span>
                        <div class="count">
                            Tarde
                        </div>
                        <span class="count_bottom">
                            <i class="green">
                                <i class="fa fa-sort-asc">
                                </i>
                                3%
                            </i>
                            En la semana
                        </span>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                        <span class="count_top">
                            <i class="fa fa-database">
                            </i>
                            Total Ocsisos
                        </span>
                        <div class="count <red></red>">
                            2,500
                        </div>
                        <span class="count_bottom">
                            <i class="green">
                                <i class="fa fa-sort-asc">
                                </i>
                                34%
                            </i>
                            En la semana
                        </span>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                        <span class="count_top">
                            <i class="fa fa-map">
                            </i>
                            Sector y cuadrante + activo
                        </span>
                        <div class="resize">
                            <strong>Andres Eloy Blanco: P-21</strong>
                        </div>
                        <span class="count_bottom">
                            <i class="red">
                                <i class="fa fa-sort-desc">
                                </i>
                                12%
                            </i>
                            En la semana
                        </span>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                        <span class="count_top">
                            <i class="fa fa-group">
                            </i>
                            Organismo + actvo
                        </span>
                        <div class="count">
                            PNB
                        </div>
                        <span class="count_bottom">
                            <i class="green">
                                <i class="fa fa-sort-asc">
                                </i>
                                34%
                            </i>
                            En la semana
                        </span>
                    </div>
                    
                </div>
                <!-- /top tiles -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="dashboard_graph">
                            <div class="row x_title">
                                <div class="col-md-6">
                                    <h3>
                                        Comparacion de delitos
                                    </h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="pull-right" id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                        <i class="glyphicon glyphicon-calendar fa fa-calendar">
                                        </i>
                                        <span>
                                            Enero 01, 2017 - Febrero 20, 2017
                                        </span>
                                        <b class="caret">
                                        </b>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="demo-placeholder" id="chart_plot_01">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                                <div class="x_title">
                                    <h2>
                                        Top delitos semanales
                                    </h2>
                                    <div class="clearfix">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-6">
                                    <div>
                                        <p>
                                            Homicidios
                                        </p>
                                        <div class="">
                                            <div class="progress progress_sm" style="width: 76%;">
                                                <div class="progress-bar bg-red" data-transitiongoal="80" role="progressbar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p>
                                            Robos
                                        </p>
                                        <div class="">
                                            <div class="progress progress_sm" style="width: 76%;">
                                                <div class="progress-bar bg-orange" data-transitiongoal="60" role="progressbar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-6">
                                    <div>
                                        <p>
                                            Hurtos
                                        </p>
                                        <div class="">
                                            <div class="progress progress_sm" style="width: 76%;">
                                                <div class="progress-bar bg-green" data-transitiongoal="40" role="progressbar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p>
                                            Resistencia a la autoridad
                                        </p>
                                        <div class="">
                                            <div class="progress progress_sm" style="width: 76%;">
                                                <div class="progress-bar bg-blue" data-transitiongoal="50" role="progressbar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel tile fixed_height_320">
                            <div class="x_title">
                                <h2>
                                   Top Delitos 2017
                                </h2>
                                
                                <div class="clearfix">
                                </div>
                            </div>
                            <div class="x_content">
                                
                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                        <span>
                                            Robos
                                        </span>
                                    </div>
                                    <div class="w_center w_55">
                                        <div class="progress">
                                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" class="progress-bar bg-green" role="progressbar" style="width: 66%;">
                                                <span class="sr-only">
                                                    60% Complete
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span>
                                            123k
                                        </span>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                        <span>
                                            Hurtos
                                        </span>
                                    </div>
                                    <div class="w_center w_55">
                                        <div class="progress">
                                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" class="progress-bar bg-green" role="progressbar" style="width: 45%;">
                                                <span class="sr-only">
                                                    60% Complete
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span>
                                            53k
                                        </span>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                        <span>
                                           Resistencia
                                        </span>
                                    </div>
                                    <div class="w_center w_55">
                                        <div class="progress">
                                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" class="progress-bar bg-green" role="progressbar" style="width: 25%;">
                                                <span class="sr-only">
                                                    60% Complete
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span>
                                            23k
                                        </span>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                        <span>
                                           Homicidios
                                        </span>
                                    </div>
                                    <div class="w_center w_55">
                                        <div class="progress">
                                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" class="progress-bar bg-green" role="progressbar" style="width: 5%;">
                                                <span class="sr-only">
                                                    60% Complete
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span>
                                            3k
                                        </span>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                        <span>
                                            Violaciones
                                        </span>
                                    </div>
                                    <div class="w_center w_55">
                                        <div class="progress">
                                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" class="progress-bar bg-green" role="progressbar" style="width: 2%;">
                                                <span class="sr-only">
                                                    60% Complete
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span>
                                            1k
                                        </span>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel tile fixed_height_320 overflow_hidden">
                            <div class="x_title">
                                <h2>
                                    Municipios mas Peligrosos
                                </h2>
                                
                                <div class="clearfix">
                                </div>
                            </div>
                            <div class="x_content">
                                <table class="" style="width:100%">
                                    <tr>
                                        <th style="width:37%;">
                                            <p>
                                                Top 5
                                            </p>
                                        </th>
                                        <th>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                <p class="">
                                                    Municipios
                                                </p>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                                <p class="">
                                                    Porcentaje
                                                </p>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <canvas class="canvasDoughnut" height="140" style="margin: 15px 10px 10px 0" width="140">
                                            </canvas>
                                        </td>
                                        <td>
                                            <table class="tile_info">
                                                <tr>
                                                    <td>
                                                        <p>
                                                            <i class="fa fa-square blue">
                                                            </i>
                                                            Moran
                                                        </p>
                                                    </td>
                                                    <td>
                                                        30%
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>
                                                            <i class="fa fa-square green">
                                                            </i>
                                                            Iribarren
                                                        </p>
                                                    </td>
                                                    <td>
                                                        10%
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>
                                                            <i class="fa fa-square purple">
                                                            </i>
                                                            Palavecinos
                                                        </p>
                                                    </td>
                                                    <td>
                                                        20%
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>
                                                            <i class="fa fa-square aero">
                                                            </i>
                                                            Jimenez
                                                        </p>
                                                    </td>
                                                    <td>
                                                        15%
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>
                                                            <i class="fa fa-square red">
                                                            </i>
                                                            Crespo
                                                        </p>
                                                    </td>
                                                    <td>
                                                        30%
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                                        </div>
                </div>
            </div>
            <!-- /page content -->
            <?php
include ROOT_DIR . '/tema/footer.html';
?>
            <!-- jQuery -->
            <script src="vendors/jquery/dist/jquery.min.js">
            </script>
            <!-- Bootstrap -->
            <script src="vendors/bootstrap/dist/js/bootstrap.min.js">
            </script>
            <!-- FastClick -->
            <script src="vendors/fastclick/lib/fastclick.js">
            </script>
            <!-- NProgress -->
            <script src="vendors/nprogress/nprogress.js">
            </script>
            <!-- Chart.js -->
            <script src="vendors/Chart.js/dist/Chart.min.js">
            </script>
            <!-- gauge.js -->
            <script src="vendors/gauge.js/dist/gauge.min.js">
            </script>
            <!-- bootstrap-progressbar -->
            <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js">
            </script>
            <!-- iCheck -->
            <script src="vendors/iCheck/icheck.min.js">
            </script>
            <!-- Skycons -->
            <script src="vendors/skycons/skycons.js">
            </script>
            <!-- Flot -->
            <script src="vendors/Flot/jquery.flot.js">
            </script>
            <script src="vendors/Flot/jquery.flot.pie.js">
            </script>
            <script src="vendors/Flot/jquery.flot.time.js">
            </script>
            <script src="vendors/Flot/jquery.flot.stack.js">
            </script>
            <script src="vendors/Flot/jquery.flot.resize.js">
            </script>
            <!-- Flot plugins -->
            <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js">
            </script>
            <script src="vendors/flot-spline/js/jquery.flot.spline.min.js">
            </script>
            <script src="vendors/flot.curvedlines/curvedLines.js">
            </script>
            <!-- DateJS -->
            <script src="vendors/DateJS/build/date.js">
            </script>
            <!-- JQVMap -->
            <script src="vendors/jqvmap/dist/jquery.vmap.js">
            </script>
            <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js">
            </script>
            <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js">
            </script>
            <!-- bootstrap-daterangepicker -->
            <script src="vendors/moment/min/moment.min.js">
            </script>
            <script src="vendors/bootstrap-daterangepicker/daterangepicker.js">
            </script>
            <!-- Custom Theme Scripts -->
            <script src="build/js/custom.min.js">
            </script>
        </div>
    </div>
</body>
