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
    <title>Teabreak Management System</title>
    <meta name="description" content="Teabreak Management System">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href=<?php echo base_url("apple-icon.png")?>>
    <link rel="shortcut icon" href=<?php echo base_url("favicon.ico")?>>

    <link rel="stylesheet" href=<?php echo base_url("assets/css/normalize.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/bootstrap.min.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/font-awesome.min.css")?>>

    <link rel="stylesheet" href=<?php echo base_url("assets/css/themify-icons.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/flag-icon.min.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/cs-skin-elastic.css")?>>
    <!-- <link rel="stylesheet" href=<echo base_url("assets/css/bootstrap-select.less")?>> -->
    <link rel="stylesheet" href=<?php echo base_url("assets/scss/style.css")?>>
    <link href=<?php echo base_url("assets/css/lib/vector-map/jqvmap.min.css")?> rel="stylesheet">

    <link href=<?php echo base_url("assets/fonts/font.css")?> rel='stylesheet' type='text/css'>

    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src=<?php echo base_url("assets/js/plugins.js")?>></script>
    <script src=<?php echo base_url("assets/js/main.js")?>></script>
    <script src=<?php echo base_url("assets/js/jquery.dataTables.min.js")?>></script>
    <script src=<?php echo base_url("assets/js/dataTables.bootstrap.min.js")?>></script>

    <!-- <script type="text/javascript" src=<echo base_url("https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js")?>></script> -->

</head>
<style type="text/css">
    .row{
        margin-left: 0px!important;
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
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li >
                        <a href="dashboardsuperadmin"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">PRODUK</h3><!-- /.menu-title -->
                    <li class="active">
                        <a href="masterdataproduk"> <i class="menu-icon fa fa-glass"></i>Master Data Produk </a>
                    </li>
                    <h3 class="menu-title">STAN</h3><!-- /.menu-title -->
                    <li>
                        <a href="masterdatastan"> <i class="menu-icon ti-home"></i>Master Data Stan </a>
                    </li>
                    <li>
                        <a href="gajibonusstan"> <i class="menu-icon ti-money"></i>Gaji Bonus Stan </a>
                    </li>
                    <h3 class="menu-title">PROMO</h3><!-- /.menu-title -->
                    <li>
                        <a href="skemapromo"> <i class="menu-icon fa fa-percent"></i>Skema Promo </a>
                    </li>

                    <h3 class="menu-title">KARYAWAN</h3><!-- /.menu-title -->
                    <li>
                        <a href="masterdatakaryawan"> <i class="menu-icon fa fa-users"></i>Data Karyawan </a>
                    </li>

                    <h3 class="menu-title">LAPORAN</h3><!-- /.menu-title -->
                    <li>
                        <a href=""> <i class="menu-icon ti-receipt"></i>Laporan A</a>
                    </li>
                    <li>
                        <a href=""> <i class="menu-icon ti-receipt"></i>Laporan B</a>
                    </li>
                    <li>
                        <a href=""> <i class="menu-icon ti-receipt"></i>Laporan C</a>
                    </li>
                    <li>
                        <a href=""> <i class="menu-icon ti-receipt"></i>Laporan D</a>
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

                        <div class="dropdown for-notification">
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
                        </div>
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

        <div class="breadcrumbs">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Master Data Produk Jadi</h1>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="card-body" style="background: white;">
                <h6>Tambah Produk</h6>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <div class="row">
                            <label for="kode_barang">Kode Barang</label>
                        </div>
                        <div class="row">
                            <input maxlength="250" type="text" name="kode_barang" id="kode_barang">
                        </div>    
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <label for="nama_barang">Nama Barang</label>
                        </div>
                        <div class="row">
                            <input maxlength="250" type="text" name="nama_barang" id="nama_barang">
                        </div>  
                    </div>
                </div>
                <div class="row" style="margin-top: 50px;">
                    <div class="col-md-9">
                        <div class="row">
                            <label for="nama_barang">Kategori Barang</label>
                        </div>
                        <div class="row">
                            <input class="col-md-7" maxlength="250" type="text" name="kategori" id="kategori">
                            <input class="btn btn-secondary col-md-3" type="submit" name="submit" value="Tambah Produk">
                        </div>  
                    </div>
                </div>
                <div>
                    <table id="mytable" class="table-responsive display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama barang</th>
                                <th>Kategori</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

</body>
</html>
