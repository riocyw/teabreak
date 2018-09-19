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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" href=<?php echo base_url("apple-icon.png")?>>
    <link rel="shortcut icon" href=<?php echo base_url("assets/logo.ico")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/normalize.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/navbar.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/bootstrap.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/font-awesome.min.css")?>>

    <link rel="stylesheet" href=<?php echo base_url("assets/css/themify-icons.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/flag-icon.min.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/cs-skin-elastic.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/datatable/datatables.css") ?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/calculator.css") ?>>
    <!-- <link rel="stylesheet" href=<echo base_url("assets/css/bootstrap-select.less")?>> -->
    <link rel="stylesheet" href=<?php echo base_url("assets/scss/style.css")?>>
    <link href=<?php echo base_url("assets/css/lib/vector-map/jqvmap.min.css")?> rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src=<echo base_url("https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js")?>></script> -->

</head>
<body>
    <div class="header" id="header">
        <div class="col-md-7 col-sm-12">
            <div class="header-left" >
                <img class="navbar-brand" align="left" src=<?php echo base_url("images/logo.png")?>>
                <div class="dropdown active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">KASIR <i class="fa fa-caret-down"></i></a>
                    <div class="dropdown-menu">
                        <a class="nav-link" href="#">Menu 1</a>
                        <a class="nav-link" href="#">Menu 2</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">STOK <i class="fa fa-caret-down"></i></a>
                    <div class="dropdown-menu">
                        <a class="nav-link" href="#">Menu 1</a>
                        <a class="nav-link" href="#">Menu 2</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">KAS <i class="fa fa-caret-down"></i></a>
                    <div class="dropdown-menu">
                        <a class="nav-link" href="#">Menu 1</a>
                        <a class="nav-link" href="#">Menu 2</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="header-right">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Rio Christian</i></a>
                    <div class="dropdown-menu">
                        <a class="nav-link" href="#"><i class="fa fa-cog"></i> Ganti Password</a>
                        <a class="nav-link" href="logout"><i class="fa fa-power-off"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="section">
    <div class="col-lg-2 col-md-4 col-sm-12 section1">
        <div style="padding: 0px;" class="col-lg-8 offset-lg-4 col-md-6 offset-md-3 judul">
            KATEGORI
        </div>
        <div id="kategorisection">
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12 section2">
        <div class="col-md-11 offset-md-1 judul">
            MENU
        </div>
        <div id="menusection">
        </div>
    </div>

    <div class="col-lg-7 col-md-12 col-sm-12 section3">
        <div class="judul">
            BILL
        </div>
        <div class="billsection">
            <div class="row divnamap">
                <label class="col-lg-3 offset-lg-1 jnama" for="nama_pelanggan">Nama Pelanggan </label>
                <input class="col-lg-7" type="text" name="nama_pelanggan" id="nama_pelanggan" placeholder="Masukkan Nama Pelanggan...">
            </div>
            <div class="divbill table-responsive">
                <table id="billtable" class="table" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 15%;">Nama</th>
                            <th style="width: 15%;">Topping</th>
                            <th style="width: 20%;">Qty</th>
                            <th style="width: 20%;">Satuan</th>
                            <th style="width: 30%;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="paysection">
            <div class="row">
                <div class="col-lg-8">
                    <table id="bayar" style="text-align: left!important;">
                        <tr>
                            <td>Sub Total </td>
                            <td>:</td>
                            <td>Rp 20.000</td>
                        </tr>
                        <tr>
                            <td>Diskon </td>
                            <td>:</td>
                            <td>Rp 0</td>
                        </tr>
                        <tr>
                            <td>TOTAL</td>
                            <td>:</td>
                            <td><h4>Rp 20.000</h4></td>
                        </tr>
                    </table>
                </div>
                <button class="btn btn-info col-lg-3 btnpay" onclick="pembayaran()">BAYAR</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_bayar" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="header modal-header">
                <h4 class="modal-title">Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row">
                        <button class="btn btn-calc col-lg-3" onclick="kalkulatorkasir('7')">7
                        </button>
                        <button class="btn btn-calc col-lg-3 offset-lg-1" onclick="kalkulatorkasir('8')">8
                        </button>
                        <button class="btn btn-calc col-lg-3 offset-lg-1" onclick="kalkulatorkasir('9')">9
                        </button>
                    </div>
                    <div class="row">
                        <button class="btn btn-calc col-lg-3" onclick="kalkulatorkasir('4')">4
                        </button>
                        <button class="btn btn-calc col-lg-3 offset-lg-1" onclick="kalkulatorkasir('5')">5
                        </button>
                        <button class="btn btn-calc col-lg-3 offset-lg-1" onclick="kalkulatorkasir('6')">6
                        </button>
                    </div>
                    <div class="row">
                        <button class="btn btn-calc col-lg-3" onclick="kalkulatorkasir('1')">1
                        </button>
                        <button class="btn btn-calc col-lg-3 offset-lg-1" onclick="kalkulatorkasir('2')">2
                        </button>
                        <button class="btn btn-calc col-lg-3 offset-lg-1" onclick="kalkulatorkasir('3')">3
                        </button>
                    </div>
                    <div class="row">
                        <button class="btn btn-calc col-lg-3" onclick="kalkulatorkasir('0')">0
                        </button>
                        <button class="btn btn-calc col-lg-3 offset-lg-1" onclick="kalkulatorkasir('00')">00
                        </button>
                        <button class="btn btn-calc col-lg-3 offset-lg-1" onclick="kalkulatorkasir('del')"><
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row jumlahuang">
                        Jumlah Uang
                    </div>
                    <div class="row">
                        <p id="total_bayar" class="form-control">0</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="totaljudul">Total :</p>
                        </div>
                        <div class="col-lg-6">
                            <p id="harus_bayar">Rp 20.000</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="kembalianjudul">Kembalian :</p>
                        </div>
                        <div class="col-lg-6">
                            <p id="kembalian">Rp 80.000</p>
                        </div>
                    </div>
                    <hr class="garis">
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="radio" name="tipe_bayar" checked="true" value="cash"><label>&nbsp Cash</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="radio" name="tipe_bayar" value="debit"><label>&nbsp Debit</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="radio" name="tipe_bayar" value="ovo"><label>&nbsp Ovo</label>
                        </div>
                    </div>
                    <div class="row">
                        <input type="text" name="keterangan" id="keterangan" class="form-control col-lg-4 offset-lg-4" placeholder="keterangan...">
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <button class="btn btn-auto">Auto</button>
                        </div>
                        <div class="col-lg-3 offset-lg-1">
                            <button class="btn btn-kembali" data-dismiss='modal'>Kembali</button>
                        </div>
                        <div class="col-lg-3">
                            <button class="btn btn-cetak-dis">Cetak Nota</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_topping" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="header modal-header">
                <h4 class="modal-title">Edit</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="kategori itemtopping">
                            Buble
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="kategori itemtopping">
                            Cheese
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="kategori itemtopping">
                            Rumput Laut
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="kategori itemtopping">
                            Tidak Pakai
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                <button type="button" onclick="tambah_item()" class="btn add_field_button btn-info">Tambah Item</button>
            </div>
        </div>
    </div>
</div>

<script src=<?php echo base_url("assets/js/jquery.min.js")?>></script>
<script src=<?php echo base_url("assets/js/lib/vector-map/jquery.vmap.js")?>></script>
<script src=<?php echo base_url("assets/js/lib/vector-map/jquery.vmap.min.js")?>></script>
<script src=<?php echo base_url("assets/js/lib/vector-map/jquery.vmap.sampledata.js")?>></script>
<script src=<?php echo base_url("assets/js/lib/vector-map/country/jquery.vmap.world.js")?>></script>
<script src=<?php echo base_url("assets/datatable/datatables.js")?>></script>
<script src=<?php echo base_url("assets/js/popper.min.js"); ?>></script>
<script src=<?php echo base_url("assets/js/plugins.js"); ?>></script>
<script src=<?php echo base_url("assets/js/lib/chosen/chosen.jquery.min.js"); ?>></script>
<script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/dataTables.buttons.js")?>></script>
<script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/buttons.print.js")?>></script>
<script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/buttons.html5.js")?>></script>
<script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/buttons.flash.js")?>></script>
<script src=<?php echo base_url("assets/datatable/JSZip-2.5.0/jszip.js")?>></script>
<script src=<?php echo base_url("assets/datatable/pdfmake-0.1.36/pdfmake.js")?>></script>
<script src=<?php echo base_url("assets/datatable/pdfmake-0.1.36/vfs_fonts.js")?>></script>
<script type="text/javascript">
var nama_produk;
var topping = new Array();
var order = new Array();

function myFunction() {
var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

function pembayaran(){
    $("#modal_bayar").modal('show');
}

function removeBtn(rowid){
    var i = rowid.parentNode.parentNode.parentNode.rowIndex;
    document.getElementById("billtable").deleteRow(i);
}

$('.itemtopping').click(function(){
    $(this).toggleClass("activetopping");
});

function tambah_item(){
    var table = document.getElementById("billtable");
    $.each($('.activetopping'), function (index, item) {
        topping.push(item.innerHTML.trim());
  });
    if (topping.length<1) {
        topping.push("-");   
    }
    var row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    cell1.innerHTML = '<p id="#nama_produk'+table.rows.length+'">'+nama_produk+'</p>';
    cell2.innerHTML = '<p id="topping'+table.rows.length+'">'+topping.toString()+'</p>';
    cell3.innerHTML = '<button class="btn center btn-default btnmin btnqty" onclick="minus(\'qty'+table.rows.length+'\',this)">-</button><p id="qty'+table.rows.length+'" class="qtyitem btnqty">1</p><button class="btn center btn-default btnplus btnqty" onclick="plus(\'qty'+table.rows.length+'\')">+</button>';
    cell4.innerHTML = '<p id="satuan'+table.rows.length+'">Rp 50.000</p>';
    cell5.innerHTML = '<div class="row"><p class="col-lg-9" id="totalharga'+table.rows.length+'">Rp 100.000</p><button class="col-lg-3 btn btn-danger btnremove" onclick="removeBtn(this);">X</button></div>';
    $("#modal_topping").modal('hide');
    // var item = new Array();
    // item.nama_produk = nama_produk;
    // item.topping = topping.toString();
    // item.qty = 1;
    // item.satuan = 50000;
    // item.total = 50000;
    // order.push(item);
    // console.log(order);
    nama_produk="";
    topping = [];
    $.each($('.activetopping'), function (index, item) {
        $(this).toggleClass("activetopping");
    });
}

function plus(id){
    var value = $("#"+id).text();
    value = parseInt(value)+1;
    $("#"+id).text(value);
}

function minus(id,rowid){
    var value = $("#"+id).text();
    if (parseInt(value)>1) {
        value = parseInt(value)-1;
        $("#"+id).text(value);
    }else{
        var i = rowid.parentNode.parentNode.rowIndex;
        document.getElementById("billtable").deleteRow(i);
    }
}

function pilih_topping(produk){
    nama_produk = produk;
    $("#modal_topping").modal('show');
}

function pilih_kategori(kategori){
    $.ajax({
          type:"post",
          url: "<?php echo base_url('adminstand/getProdukInKategori')?>/",
          data:{ kategori:kategori},
          dataType:"json",
          success:function(response)
          {
            document.getElementById("menusection").innerHTML = "";
            for(var i=0;i< response.length; i++){
                var div = document.createElement('div');
                div.className = "menu col-lg-5 offset-lg-1 col-md-5 offset-md-1";
                div.setAttribute("onclick", "pilih_topping('"+response[i].nama_produk+"')");
                div.innerHTML = response[i].nama_produk;
                document.getElementById('menusection').appendChild(div);
            }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert(errorThrown);
          }
      }
    );
}

jQuery( document ).ready(function( $ ) {
    $.ajax({
          type:"post",
          url: "<?php echo base_url('adminstand/getAllKategori')?>/",
          dataType:"json",
          success:function(response)
          {
            document.getElementById("kategorisection").innerHTML = "";
            for(var i=0;i< response.length; i++){
                var div = document.createElement('div');
                div.className = "kategori col-lg-8 offset-lg-4 col-sm-12 col-md-10 offset-md-1";
                div.setAttribute("onclick", "pilih_kategori('"+response[i].kategori+"')");
                div.innerHTML = response[i].kategori;
                document.getElementById('kategorisection').appendChild(div);
            }
            pilih_kategori(response[0].kategori);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert(errorThrown);
          }
      }
    );
});


function kalkulatorkasir(number) {
    var nominal = $("#total_bayar").html();
    nominal = nominal.replace('.','');

    if (number == 'del') {
        if (nominal != '0') {
            if (nominal.length == 1) {
                $("#total_bayar").html('0');
            }else{
                nominal = nominal.slice(0,-1)
                $("#total_bayar").html(nominal);
            }
        }
    }else{
        if (nominal == '0') {
            $("#total_bayar").html(currency(number));
        }else{
            nominal = nominal + number;
            $("#total_bayar").html(currency(nominal));
        }
        
        // switch(number) {
        //     case '0':
        //          nominal = nominal + number;
        //          $("#total_bayar").val() = currency(nominal);
        //         break;
        //     case '1':
        //         nominal = nominal + number;
        //          $("#total_bayar").val() = currency(nominal);
        //         break;
        //     case '2':
        //         code block
        //         break;
        //     case '3':
        //         code block
        //         break;
        //     case '4':
        //         code block
        //         break;
        //     case '5':
        //         code block
        //         break;
        //     case '6':
        //         code block
        //         break;
        //     case '7':
        //         code block
        //         break;
        //     case '8':
        //         code block
        //         break;
        //     case '9':
        //         code block
        //         break;
        //     case '00':
        //         code block
        //         break;
        //     default:
        //         break;
        // } 
    }
}

function currency(x) {
    var retVal=x.toString().replace(/[^\d]/g,'');
    while(/(\d+)(\d{3})/.test(retVal)) {
      retVal=retVal.replace(/(\d+)(\d{3})/,'$1'+'.'+'$2');
    }
    return retVal;
}
</script>
</body>
</html>
