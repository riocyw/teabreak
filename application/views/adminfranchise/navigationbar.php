<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tea Break Admin Gudang</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href=<?php echo base_url("apple-icon.png")?>>
    <link rel="shortcut icon" href=<?php echo base_url("assets/logo.ico")?>>

    <link rel="stylesheet" href=<?php echo base_url("assets/css/normalize.css")?>>

    <link rel="stylesheet" href=<?php echo base_url("assets/vendors/bootstrap-4.1.3-dist/css/bootstrap.min.css")?>>

    <link rel="stylesheet" href=<?php echo base_url("assets/css/font-awesome.min.css")?>>

    <link rel="stylesheet" href=<?php echo base_url("assets/css/themify-icons.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/flag-icon.min.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/cs-skin-elastic.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/datatable/datatables.css") ?>>

    <link rel="stylesheet" href=<?php echo base_url("assets/vendors/select2-4.0.1/select2-4.0.1/dist/css/select2.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/lib/chosen/chosen.min.css")?>>
    
    <!-- bootstrap-daterangepicker -->
    <link rel="stylesheet" href=<?php echo base_url("assets/vendors/bootstrap-daterangepicker/daterangepicker.css")?> >

    <!-- bootstrap-datetimepicker -->
    <link rel="stylesheet" href=<?php echo base_url("assets/vendors/Date-Time-Picker-Bootstrap-4/build/css/bootstrap-datetimepicker.min.css")?>>
    <!-- <link rel="stylesheet" href=<echo base_url("assets/css/bootstrap-select.less")?>> -->
    <link rel="stylesheet" href=<?php echo base_url("assets/scss/style.css")?>>
    <link href=<?php echo base_url("assets/css/lib/vector-map/jqvmap.min.css")?> rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



    <!-- <script type="text/javascript" src=<echo base_url("https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js")?>></script> -->
    <script src=<?php echo base_url("assets/js/jquery.min.js")?>></script>
    <script src=<?php echo base_url("assets/js/teabreak.js"); ?>></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $('#'+location.pathname.split("/")[2]).addClass('active');
            // alert(location.pathname.split("/")[2]);
        });
        
        
    </script>


</head>
<style type="text/css">
    .error{
    border: 2px solid red!important;
}
.easy-autocomplete{
    width: auto!important;
}
.red{
    color: red !important;
}


</style>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">Tea Break</a>
                <a class="navbar-brand hidden" href="./">T</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li id="dashboardadmin">
                        <a href="dashboardadmin"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">PRODUK</h3><!-- /.menu-title -->

                    ti-list-ol
                    <li id="stokproduk">
                        <a href="stokproduk"> <i class="menu-icon fa fa-glass"></i>Stok Produk </a>
                    </li>
                    <li id="pembelian">
                        <a href="pembelian"> <i class="menu-icon ti-shopping-cart"></i>Pembelian Produk </a>
                         <!-- style="pointer-events: none;" -->
                    </li>
                    <li id="orderstan">
                        <a href="orderstan"> <i class="menu-icon ti-list-ol"></i>Order Stan </a>
                    </li>
                    <h3 class="menu-title">ADMINISTRASI</h3><!-- /.menu-title -->
                    <li id="pengeluaranlain">
                        <a href="pengeluaranlain"> <i class="menu-icon ti-money"></i>Pengeluaran Lain </a>
                    </li>
                    <li id="distribusi">
                        <a href="distribusi"> <i class="menu-icon ti-truck"></i>Distribusi </a>
                    </li>
                    <li id="stokkeluar">
                        <a href="stokkeluar"> <i class="menu-icon ti-package"></i>Stok Keluar </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">

                        <!-- <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">3</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">Pesanan Masuk</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-info"></i>
                                <p style="color: black">Stan GM meminta order</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-info"></i>
                                <p style="color: black">Stan GM meminta order</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-info"></i>
                                <p style="color: black">Stan GM meminta order</p>
                            </a>
                          </div>
                        </div> -->
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="gantipassword"><i class="fa fa -cog"></i>Ganti Password</a>

                                <a class="nav-link" href="logout"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->