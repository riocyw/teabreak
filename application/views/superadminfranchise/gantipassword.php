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
    <title>Tea Break Super Admin Franchise - Ganti Password</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href=<?php echo base_url("apple-icon.png")?>>
    <link rel="shortcut icon" href=<?php echo base_url("favicon.ico")?>>

    <link rel="stylesheet" href=<?php echo base_url("assets/css/normalize.css")?>>

    <link rel="stylesheet" href=<?php echo base_url("assets/vendors/bootstrap-4.1.3-dist/css/bootstrap.min.css")?>>

    <link rel="stylesheet" href=<?php echo base_url("assets/css/font-awesome.min.css")?>>

    <link rel="stylesheet" href=<?php echo base_url("assets/css/themify-icons.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/flag-icon.min.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/cs-skin-elastic.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/datatable/datatables.css") ?>>
    <!-- bootstrap-daterangepicker -->
    <link rel="stylesheet" href=<?php echo base_url("assets/vendors/bootstrap-daterangepicker/daterangepicker.css")?> >

    <!-- bootstrap-datetimepicker -->
    <link rel="stylesheet" href=<?php echo base_url("assets/vendors/Date-Time-Picker-Bootstrap-4/build/css/bootstrap-datetimepicker.min.css")?>>
    <!-- <link rel="stylesheet" href=<echo base_url("assets/css/bootstrap-select.less")?>> -->
    <link rel="stylesheet" href=<?php echo base_url("assets/scss/style.css")?>>
    <link href=<?php echo base_url("assets/css/lib/vector-map/jqvmap.min.css")?> rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src=<echo base_url("https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js")?>></script> -->

</head>
<style type="text/css">
.red{
    color: red !important;
}
.green{
    color: green !important;
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
                    <li >
                        <a href="dashboardsuperadmin"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">PRODUK</h3><!-- /.menu-title -->
                    <li>
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
                        <a href="lappenjstan"> <i class="menu-icon ti-receipt"></i>Laporan Penjualan Stand</a>
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
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Ganti Password</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Ganti Password Super Admin Franchise</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" id="username" name="" value=<?php echo $this->session->userdata('usernamesupadmin'); ?>>
                                        <label id="labelpasslama" for="id" class=" form-control-label">Password Lama</label>
                                        <input type="password" style="display: none" placeholder="Masukkan Password Lama">

                                        <div class="input-group">
                                            <input type="password" id="passwordlama" placeholder="Masukkan Password Lama" class="form-control">
                                            <div class="input-group-btn">
                                                <button onclick="showpwd('passwordlama','eyelama')" class="btn btn-primary">
                                                    <i id="eyelama" class="fa fa-eye"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label id="labelpassbaru" for="id" class=" form-control-label">Password Baru</label>
                                        

                                        <div class="input-group">
                                            <input type="password" id="passwordbaru" placeholder="Masukkan Password Baru" class="form-control">
                                            <div class="input-group-btn">
                                                <button onclick="showpwd('passwordbaru','eyebaru')" class="btn btn-primary">
                                                    <i id="eyebaru" class="fa fa-eye"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label id="labelkonfpassbaru" for="id" class=" form-control-label">Konfirmasi Password Baru</label>
                                        

                                        <div class="input-group">
                                            <input type="password" id="konfirmasipasswordbaru" placeholder="Masukkan Password Baru Lagi" class="form-control">
                                            <div class="input-group-btn">
                                                <button onclick="showpwd('konfirmasipasswordbaru','eyebaruconf')" class="btn btn-primary">
                                                    <i id="eyebaruconf" class="fa fa-eye"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <br>
                                <div class="col-md-12">
                                    <b><p id="labelerror" class="red text-center"></p></b>
                                    <button onclick="gantipassword()" class="btn btn-success btn-block">CHANGE PASSWORD</button>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-footer">
                        </div>
                    </div> <!-- .card -->

                  </div><!--/.col-->
                </div>
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->
 
    <script src=<?php echo base_url("assets/js/jquery.min.js")?>></script>
    <script src=<?php echo base_url("assets/js/lib/vector-map/jquery.vmap.js")?>></script>
    <script src=<?php echo base_url("assets/js/lib/vector-map/jquery.vmap.min.js")?>></script>
    <script src=<?php echo base_url("assets/js/lib/vector-map/jquery.vmap.sampledata.js")?>></script>
    <script src=<?php echo base_url("assets/js/lib/vector-map/country/jquery.vmap.world.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/datatables.js")?>></script>
    <script src=<?php echo base_url("assets/js/popper.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/js/plugins.js"); ?>></script>
    <script src=<?php echo base_url("assets/js/lib/chosen/chosen.jquery.min.js"); ?>></script>

    <script src=<?php echo base_url("assets/vendors/bootstrap-4.1.3-dist/js/bootstrap.min.js")?>></script>
    <!-- <script src=></script> -->
    <!-- echo base_url("assets/js/main.js")?> -->

    <script type="text/javascript">
        function showpwd(id,idicon) {
            var pwd = document.getElementById(id);

            if (pwd.type === "password") {
                pwd.type = "text";
                $("#"+idicon).addClass('fa-eye-slash');
                $("#"+idicon).removeClass('fa-eye');
            } else {
                pwd.type = "password";
                $("#"+idicon).addClass('fa-eye');
                $("#"+idicon).removeClass('fa-eye-slash');
            }
        }
        
        function gantipassword() {
            var passlama = $("#passwordlama").val();
            var passbaru = $("#passwordbaru").val();
            var konfirmasipassbaru = $("#konfirmasipasswordbaru").val();
            var username = $("#username").val();
            $('#labelerror').addClass('red');
            $('#labelerror').removeClass('green');

            if (passlama == '' || passbaru == '' || konfirmasipassbaru == '') {
                $('#labelerror').html('Pastikan seluruh isian terisi');
                if(passlama == ''){

                    $("#passwordlama").addClass('is-invalid');
                    $("#labelpasslama").addClass('red');
                }else{
                    $("#passwordlama").removeClass('is-invalid');
                    $("#labelpasslama").removeClass('red');
                
                }

                if (passbaru == '') {
                    $("#passwordbaru").addClass('is-invalid');
                    $("#labelpassbaru").addClass('red');
                }else{
                    $("#passwordbaru").removeClass('is-invalid');
                    $("#labelpassbaru").removeClass('red');
                
                }

                if (konfirmasipassbaru == '') {
                    $("#konfirmasipasswordbaru").addClass('is-invalid');
                    $("#labelkonfpassbaru").addClass('red');
                }else{
                    $("#konfirmasipasswordbaru").removeClass('is-invalid');
                    $("#labelkonfpassbaru").removeClass('red');
                }
            }else{
                $("#passwordlama").removeClass('is-invalid');
                $("#passwordbaru").removeClass('is-invalid');
                $("#konfirmasipasswordbaru").removeClass('is-invalid');

                $("#labelpasslama").removeClass('red');
                $("#labelpassbaru").removeClass('red');
                $("#labelkonfpassbaru").removeClass('red');

                if (konfirmasipassbaru == passbaru) {
                    if (passbaru.length < 6 || passbaru.length > 20) {
                        $('#labelerror').html('Password baru harus mengandung 6 - 20 karakter');
                    }else{
                        $('#labelerror').html('');
                        $.ajax({
                              type:"post",
                              url: "<?php echo base_url('superadminfranchise/prosesgantipassword')?>/",
                              data:{ 
                                passlama:passlama,
                                passbaru:passbaru,
                                konfirmasipassbaru:konfirmasipassbaru,
                                username:username,
                                usertype:"superadminfranchise"
                              },
                              dataType:"json",
                              success:function(response)
                              {
                                if (response.toString() == 'false') {
                                    $('#labelerror').html('Password lama salah');
                                }else if (response.toString() == 'true') {
                                    $('#labelerror').html('Sukses ganti password');
                                    $('#labelerror').addClass('green');
                                    $('#labelerror').removeClass('red');
                                }else{
                                    $('#labelerror').html('Server error! coba lagi nanti');
                                }
                              },
                              error: function (jqXHR, textStatus, errorThrown)
                              {
                                alert(errorThrown);
                              }
                          }
                        );
                    }
                }else{
                    $('#labelerror').html('Password Baru harus sama dengan Konfirmasi Password Baru');
                }
            }

            
        }
    </script>
</body>
</html>
