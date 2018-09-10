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
    <title>Tea Break Super Admin Franchise</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href=<?php echo base_url("apple-icon.png")?>>
    <link rel="shortcut icon" href=<?php echo base_url("favicon.ico")?>>

    <link rel="stylesheet" href=<?php echo base_url("assets/css/normalize.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/bootstrap.min.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/font-awesome.min.css")?>>

    <link rel="stylesheet" href=<?php echo base_url("assets/css/themify-icons.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/flag-icon.min.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/cs-skin-elastic.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/lib/datatable/dataTables.bootstrap.min.css") ?>>
    <!-- <link rel="stylesheet" href=<echo base_url("assets/css/bootstrap-select.less")?>> -->
    <link rel="stylesheet" href=<?php echo base_url("assets/scss/style.css")?>>
    <link href=<?php echo base_url("assets/css/lib/vector-map/jqvmap.min.css")?> rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src=<echo base_url("https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js")?>></script> -->

</head>
<style type="text/css">
    .error{
    border: 2px solid red!important;
}
.easy-autocomplete{
    width: auto!important;
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
                    <li class="active">
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
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Master Data Stan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Semua Data Stan</li>
                        </ol>
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
                            <strong class="card-title">Tambah Stan Baru</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="id" class=" form-control-label">ID Stan</label>
                                            <input type="text" id="id" placeholder="Masukkan ID Stan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="nama" class=" form-control-label">Nama Stan</label>
                                            <input type="text" id="nama" placeholder="Masukkan Nama Stan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="password" class=" form-control-label">Password</label>
                                            <div class="input-group">
                                                <input type="password" id="password" name="password" placeholder="Masukkan Password" class="form-control">
                                                <div class="input-group-btn">
                                                    <button onclick="showpwd('password')" class="btn btn-primary">
                                                        <i class="fa fa-eye"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="alamat" class=" form-control-label">Alamat</label>
                                            <input type="text" id="alamat" placeholder="Masukkan Alamat Stan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Action</label>
                                            <button type="submit" onclick="tambahstan()" class="btn btn-success btn-md form-control">
                                              <i class="fa fa-floppy-o"></i> TAMBAH
                                            </button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>    
                          </div>

                        </div>
                    </div> <!-- .card -->

                  </div><!--/.col-->

                  <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Stan</strong>
                        </div>
                        <div class="card-body">
                          <table id="mytable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>ID Stan</th>
                                <th>Nama Stan</th>
                                <th>Alamat</th>
                                <th>Password</th>
                                <th>Edit</th>
                                <th>Delete</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                    </div> <!-- .card -->

                  </div><!--/.col-->
                </div>
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <div class="modal fade" id="modal_edit" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit</h4>
                    </div>
                    <div class="modal-body">
                       <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id" class=" form-control-label">ID Stan</label>
                                    <input type="text" id="editid" placeholder="Masukkan ID Stan" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama" class=" form-control-label">Nama Stan</label>
                                    <input type="text" id="editnama" placeholder="Masukkan Nama Stan" class="form-control">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class=" form-control-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" id="editpassword" name="editpassword" placeholder="Masukkan Password" class="form-control">
                                        <div class="input-group-btn">
                                            <button onclick="showpwd('editpassword')" class="btn btn-primary">
                                                <i class="fa fa-eye"></i></button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="alamat" class=" form-control-label">Alamat</label>
                                    <input type="text" id="editalamat" placeholder="Masukkan Alamat Stan" class="form-control">
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                        <button type="button" onclick="simpanedit()" class="btn add_field_button btn-info">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Right Panel -->
 
    <script src=<?php echo base_url("assets/js/vendor/jquery-2.1.4.min.js")?>></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src=<?php echo base_url("assets/js/main.js")?>></script>

    <script src=<?php echo base_url("assets/js/lib/vector-map/jquery.vmap.js")?>></script>
    <script src=<?php echo base_url("assets/js/lib/vector-map/jquery.vmap.min.js")?>></script>
    <script src=<?php echo base_url("assets/js/lib/vector-map/jquery.vmap.sampledata.js")?>></script>
    <script src=<?php echo base_url("assets/js/lib/vector-map/country/jquery.vmap.world.js")?>></script>
    <script src=<?php echo base_url("assets/js/widgets.js")?>></script>
    <script src=<?php echo base_url("assets/js/lib/data-table/datatables.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/js/lib/data-table/dataTables.bootstrap.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/js/lib/data-table/dataTables.buttons.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/js/lib/data-table/buttons.bootstrap.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/js/lib/data-table/jszip.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/js/lib/data-table/vfs_fonts.js"); ?>></script>
    <script src=<?php echo base_url("assets/js/lib/data-table/buttons.html5.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/js/lib/data-table/buttons.print.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/js/lib/data-table/buttons.colVis.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/js/lib/data-table/datatables-init.js"); ?>></script>
    <script src=<?php echo base_url("assets/js/popper.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/js/plugins.js"); ?>></script>
    <script src=<?php echo base_url("assets/js/lib/chosen/chosen.jquery.min.js"); ?>></script>
    <script>

  var tabeldata ;
<<<<<<< HEAD
  // ( function ( $ ) {
  //           "use strict";

  //           jQuery( '#vmap' ).vectorMap( {
  //               map: 'world_en',
  //               backgroundColor: null,
  //               color: '#ffffff',
  //               hoverOpacity: 0.7,
  //               selectedColor: '#1de9b6',
  //               enableZoom: true,
  //               showTooltip: true,
  //               values: sample_data,
  //               scaleColors: [ '#1de9b6', '#03a9f5' ],
  //               normalizeFunction: 'polynomial'
  //           } );
  //       } )( jQuery );
=======

>>>>>>> ca1dc8a1ff74dce12b8071c40b968b5cce4da635
  function edit_stan(id){
    $.ajax({
          type:"post",
          url: "<?php echo base_url('superadminfranchise/select_edit_stan')?>/",
          data:{ id:id},
          dataType:"json",
          success:function(response)
          {
            $("#editid").val(response[0].id_stan);
            $("#editalamat").val(response[0].alamat);
            $("#editnama").val(response[0].nama_stan);
            $("#editpassword").val(response[0].password);
            $("#modal_edit").modal('show');
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert(errorThrown);
          }
      }
    );
  }

  function simpanedit(){
    var id = $("#editid").val();
    var alamat = $("#editalamat").val();
    var nama =  $("#editnama").val();
    var password = $("#editpassword").val();
    if (id.replace(/\s/g, '').length>3&&nama.replace(/\s/g, '').length>3&&alamat.replace(/\s/g, '').length>3&&password.replace(/\s/g, '').length>3) {
    $.ajax({
          type:"post",
          url: "<?php echo base_url('superadminfranchise/edit_stan')?>/",
          data:{ id:id,alamat:alamat,nama:nama,password:password},
          success:function(response)
          {
            $("#modal_edit").modal('hide');
            if($('#editid').has("error")){
              $('#editid').removeClass("error");
            }
            if($('#editnama').has("error")){
              $('#editnama').removeClass("error");
            }
            if($('#editalamat').has("error")){
              $('#editalamat').removeClass("error");
            }
            if($('#editpassword').has("error")){
              $('#editpassword').removeClass("error");
            }
            reload_table();
            alert("Berhasil mengubah data!");
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert(errorThrown);
          }
      });
    }else{
      if (id.replace(/\s/g, '').length<=3) {
        $('#editid').addClass("error");
      }else{
        if($('#editid').has("error")){
          $('#editid').removeClass("error");
        }
      }
      if (nama.replace(/\s/g, '').length<=3) {
        $('#editnama').addClass("error");
      }else{
        if($('#editnama').has("error")){
          $('#editnama').removeClass("error");
        }
      }
      if (alamat.replace(/\s/g, '').length<=3) {
        $('#editalamat').addClass("error");
      }else{
        if($('#editalamat').has("error")){
          $('#editalamat').removeClass("error");
        }
      }
      if (password.replace(/\s/g, '').length<=3) {
        $('#editpassword').addClass("error");
      }else{
        if($('#editpassword').has("error")){
          $('#editpassword').removeClass("error");
        }
      }
      alert("Silahkan periksa kembali inputan anda!");
    }
  }

function delete_stan(id){
     if(confirm('Apakah anda yakin ingin menghapus data ini??')){
      $.ajax({
              type:"post",
              url: "<?php echo base_url('superadminfranchise/delete_stan')?>/",
              data:{ id:id},
              success:function(response)
              {
                   reload_table();
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown);
              }
          }
      );
    }
  }

function showpwd(id){
    var pwd = document.getElementById(id);

    if (pwd.type === "password") {
        pwd.type = "text";
    } else {
        pwd.type = "password";
    }
}

function tambahstan(){
    var id = $("#id").val();
    var nama = $("#nama").val();
    var alamat = $("#alamat").val();
    var password = $("#password").val();
    if (id.replace(/\s/g, '').length>3&&nama.replace(/\s/g, '').length>3&&alamat.replace(/\s/g, '').length>3&&password.replace(/\s/g, '').length>0) {
        $.ajax(
            {
                type:"post",
                url: "<?php echo base_url('superadminfranchise/tambah_stan')?>/",
                data:{ id:id,nama:nama,alamat:alamat,password:password},
                success:function(response)
                {
                  reload_table();
                  if($('#id').has("error")){
                    $('#id').removeClass("error");
                  }
                  if($('#nama').has("error")){
                    $('#nama').removeClass("error");
                  }
                  if($('#alamat').has("error")){
                    $('#alamat').removeClass("error");
                  }
                  if($('#password').has("error")){
                    $('#password').removeClass("error");
                  }
                  $("#id").val('');
                  $("#nama").val('');
                  $("#alamat").val('');
                  $("#password").val('');
                  $("#id").focus();
                  alert('Berhasil menambahkan produk');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                  alert(errorThrown);
                }
            }
        );
    }else{
        if (id.replace(/\s/g, '').length<=3) {
            $('#id').addClass("error");
        }else{
            if($('#id').has("error")){
                $('#id').removeClass("error");
            }
        }

        if (nama.replace(/\s/g, '').length<=3) {
            $('#nama').addClass("error");
        }else{
            if($('#nama').has("error")){
                $('#nama').removeClass("error");
            }
        }

        if (password.replace(/\s/g, '').length<=3) {
            $('#password').addClass("error");
        }else{
            if($('#password').has("error")){
                $('#password').removeClass("error");
            }
        }

        if (alamat.replace(/\s/g, '').length<=3) {
            $('#alamat').addClass("error");
        }else{
            if($('#alamat').has("error")){
                $('#alamat').removeClass("error");
            }
        }

        alert("Silahkan periksa kembali inputan anda!");
    }
  }

  jQuery( document ).ready(function( $ ) {
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
      return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
      };
    };

    tabeldata = $("#mytable").dataTable({

      initComplete: function() {
        var api = this.api();
        $('#mytable_filter input')
        .on('.DT')
        .on('keyup.DT', function(e) {
          if (e.keyCode == 13) {
            api.search(this.value).draw();
          }
        });
      },
      oLanguage: {
        sProcessing: "loading..."
      },
      serverSide: true,
      ajax: {"url": "<?php echo base_url('superadminfranchise/datastan');?>", "type": "POST"},
      columns: 
      [
      {"data": "id_stan"},
      {"data": "nama_stan"},
      {"data": "alamat"},
      {"data": "password"},
      {"data": "edit",
      "orderable": false},
      {"data": "delete",
      "orderable": false},
      ],

      rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        var index = page * length + (iDisplayIndex + 1);
        // $('td:eq(0)', row).html(index);
      }
    });


});

function reload_table(){
  tabeldata.api().ajax.reload(null,false);
}


    </script>

</body>
</html>
