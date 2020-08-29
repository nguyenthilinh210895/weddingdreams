<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/29/2020
 * Time: 10:26 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/favicon.ico" type="image/ico" />

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <!-- left col -->
        <?php
        require_once "views/layouts/left_col.php";
        ?>
        <!-- left col -->

        <!-- top navigation -->
        <?php
        require_once "views/layouts/top_navigation.php";
        ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php
            echo $this->content;
            ?>
            <!-- top tiles -->
<!--            <div class="row" style="display: inline-block;" >-->
<!--                <div class="tile_count">-->
<!--                    <div class="col-md-2 col-sm-4  tile_stats_count">-->
<!--                        <span class="count_top"><i class="fa fa-user"></i> Total Users</span>-->
<!--                        <div class="count">2500</div>-->
<!--                        <span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
<!--                    </div>-->
<!--                    <div class="col-md-2 col-sm-4  tile_stats_count">-->
<!--                        <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>-->
<!--                        <div class="count">123.50</div>-->
<!--                        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>-->
<!--                    </div>-->
<!--                    <div class="col-md-2 col-sm-4  tile_stats_count">-->
<!--                        <span class="count_top"><i class="fa fa-user"></i> Total Males</span>-->
<!--                        <div class="count green">2,500</div>-->
<!--                        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
<!--                    </div>-->
<!--                    <div class="col-md-2 col-sm-4  tile_stats_count">-->
<!--                        <span class="count_top"><i class="fa fa-user"></i> Total Females</span>-->
<!--                        <div class="count">4,567</div>-->
<!--                        <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>-->
<!--                    </div>-->
<!--                    <div class="col-md-2 col-sm-4  tile_stats_count">-->
<!--                        <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>-->
<!--                        <div class="count">2,315</div>-->
<!--                        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
<!--                    </div>-->
<!--                    <div class="col-md-2 col-sm-4  tile_stats_count">-->
<!--                        <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>-->
<!--                        <div class="count">7,325</div>-->
<!--                        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <!-- /top tiles -->
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php
        require_once "views/layouts/footer.php";
        ?>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="assets/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="assets/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="assets/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="assets/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="assets/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="assets/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="assets/vendors/Flot/jquery.flot.js"></script>
<script src="assets/vendors/Flot/jquery.flot.pie.js"></script>
<script src="assets/vendors/Flot/jquery.flot.time.js"></script>
<script src="assets/vendors/Flot/jquery.flot.stack.js"></script>
<script src="assets/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="assets/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="assets/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="assets/vendors/moment/min/moment.min.js"></script>
<script src="assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="assets/build/js/custom.min.js"></script>

</body>
</html>

