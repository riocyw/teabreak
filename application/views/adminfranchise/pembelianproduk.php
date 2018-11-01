        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pembelian (Supply Produk)</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <!-- <li class="active">Semua Data Produk</li> -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- <h1><span class="badge badge-warning">Fitur dalam tahap Pengembangan!</span></h1> -->
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">List Supply Produk</strong>
                            </div>
                            <div class="card-body">
                                <div class="row col-md-3 form-group">
                                    <button onclick="tambahnota()" class="btn btn-success">Tambah Nota</button>
                                </div>

                              <table id="mytable" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>Date Data Sort</th>
                                    <th>No Nota</th>
                                    <th>Tanggal</th>
                                    <th>Total Harga</th>
                                    <th>Metode</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Detail</th>
                                  </tr>
                                </thead>
                              </table>
                            </div>
                        </div> <!-- .card -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /#right-panel -->

    <div class="modal fade" id="modaltambah" tabindex="1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Tambah Nota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label" id="label_data_nota" style="font-weight: bold">Data Nota</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="no_nota" class=" form-control-label">No Nota</label>
                                <input type="text" id="no_nota" placeholder="Masukkan No Nota" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tgl" class=" form-control-label">Tanggal</label>
                                <input type="text" id="tgl" placeholder="Masukkan Tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class=" form-control-label">Metode Pembelian</label>
                                <select name="metode" id="metode" class="form-control" tabindex="1" onchange="checkmetode()">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="jatuh_tempo" class=" form-control-label">Jatuh Tempo</label>
                                <input type="text" id="jatuh_tempo" placeholder="Masukkan Tanggal" class="form-control" disabled="">
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan" class=" form-control-label">Keterangan</label>
                                <input type="text" id="keterangan" placeholder="Masukkan Keterangan" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label id="labelbahan" class="form-control-label" id="label_data_nota" style="font-weight: bold">Tambah Barang</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_bahan" class=" form-control-label">Nama Barang</label>
                                <select name="nama_bahan" id="nama_bahan" class="form-control" tabindex="1">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="stock_masuk" class="form-control-label">Stock Masuk</label>
                                <input type="text" id="stock_masuk" placeholder="Masukkan Jumlah Bahan Jadi" class="form-control numericncoma">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="harga_total" class=" form-control-label">Harga Total</label>
                                <input type="text"  id="harga_total" placeholder="Masukkan Total" class="form-control numeric">
                                <!-- onkeyup="this.value=currency(this.value);" -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <button onclick="tambahbarang()" class="btn btn-success">Tambah Barang</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table style="width: 100%" width="100%" id="tabellistbahan" class="table table-striped table-bordered">
                                <col width="15%">
                                <col width="30%">
                                <col width="12.5%">
                                <col width="17.5%">
                                <col width="15%">
                                <col width="5%">
                                <thead>
                                  <tr>
                                    <th>ID Bahan</th>
                                    <th>Nama Bahan</th>
                                    <th>Jumlah</th>
                                    <th>Harga Satuan</th>
                                    <th>Harga Total</th>
                                    <th>Hapus</th>
                                  </tr>
                                  <tr>
                                        <td colspan="6" class="text-center" id="datakosong">Tidak Ada Data</td>
                                      </tr>
                                </thead>
                                <tbody id="bodytabel">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="savenota()">Simpan</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modaldetail" tabindex="1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Detail Nota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label class=" form-control-label"><strong>ID Nota</strong></label>
                                
                                <h4 id="id_detail_nota">SELESAI</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label class=" form-control-label"><strong>Keterangan</strong></label>
                                
                                <h4 id="detailketerangan">SELESAI</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table style="width: 100%" width="100%" id="detaillistbahan" class="table table-striped table-bordered">
                                <col width="15%">
                                <col width="30%">
                                <col width="15%">
                                <col width="20%">
                                <col width="15%">
                                <thead>
                                  <tr>
                                    <th>ID Bahan</th>
                                    <th>Nama Bahan</th>
                                    <th>Jumlah</th>
                                    <th>Harga Satuan</th>
                                    <th>Harga Total</th>
                                  </tr>
                                  <tr>
                                    <td colspan="6" class="text-center" id="datadetailkosong">Tidak Ada Data</td>
                                  </tr>
                                </thead>
                                <tbody id="bodydetailtabel">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Panel -->
    <script src=<?php echo base_url("assets/js/lib/vector-map/jquery.vmap.js")?>></script>
    <script src=<?php echo base_url("assets/js/lib/vector-map/jquery.vmap.min.js")?>></script>
    <script src=<?php echo base_url("assets/js/lib/vector-map/jquery.vmap.sampledata.js")?>></script>
    <script src=<?php echo base_url("assets/js/lib/vector-map/country/jquery.vmap.world.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/datatables.js")?>></script>
    <script src=<?php echo base_url("assets/js/popper.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/js/plugins.js"); ?>></script>
    <script src=<?php echo base_url("assets/js/teabreak.js"); ?>></script>
    <script src=<?php echo base_url("assets/js/lib/chosen/chosen.jquery.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/dataTables.buttons.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/buttons.print.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/buttons.html5.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/buttons.flash.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/JSZip-2.5.0/jszip.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/pdfmake-0.1.36/pdfmake.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/pdfmake-0.1.36/vfs_fonts.js")?>></script>
    <script src=<?php echo base_url("assets/vendors/select2-4.0.1/select2-4.0.1/dist/js/select2.js")?>></script>
    <script src=<?php echo base_url("assets/vendors/jsPDF-1.3.2/jsPDF-1.3.2/dist/jspdf.debug.js")?>></script>

    <script src=<?php echo base_url("assets/vendors/jsPDF-AutoTable-master/dist/jspdf.plugin.autotable.js")?>></script>
    

    <script src=<?php echo base_url("assets/vendors/bootstrap-4.1.3-dist/js/bootstrap.min.js")?>></script>
    <script src=<?php echo base_url("assets/js/lib/chosen/chosen.jquery.min.js")?>></script>
    <!-- <script src=></script> -->
    <!-- echo base_url("assets/js/main.js")?> -->

    <!-- bootstrap-daterangepicker -->
    <script src=<?php echo base_url("assets/vendors/moment/min/moment.min.js")?>></script>
    <script src=<?php echo base_url("assets/vendors/bootstrap-daterangepicker/daterangepicker.js")?>></script>
    <!-- bootstrap-datetimepicker -->    
    <script src=<?php echo base_url("assets/vendors/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js")?>></script>

</body>
</html>
<script type="text/javascript">
var tabeldata;
var arrProduk = new Array();

$('#metode').append($('<option>', {
    value: "cash",
    text: "Cash",
    selected: "selected"
}));

$('#metode').append($('<option>', {
    value: "tempo",
    text: "Tempo"
}));

function checkmetode() {
    if ($('#metode').val() == 'cash') {
        $('#jatuh_tempo').prop('disabled', true);
        $('#jatuh_tempo').val('');
    }else{
        $('#jatuh_tempo').prop('disabled', false);
        
    }
}

$('.numeric').on('input', function (event) { 
        this.value = this.value.replace(/[^0-9]/g, '');
        if ($(this).val().indexOf('.') == 0) {
              $(this).val($(this).val().substring(1));
            }
    });
$('.numericncoma').on('input', function (event) { 
        this.value = this.value.replace(/[^.0-9]/g, '');
        if ($(this).val().indexOf('.') == 0) {
              $(this).val($(this).val().substring(1));
            }

            if ($(this).val().indexOf('0') == 0) {
              $(this).val($(this).val().substring(1));
            }

            if ($(this).val().split(".").length > 2) {
                this.value = this.value.slice(0,-1);
            }
    });


        $(document).ready(function() {
                jQuery(document).ready(function() {
                jQuery("#nama_bahan").chosen({
                    disable_search_threshold: 10,
                    no_results_text: "Oops, nothing found!",
                    width: "100%"
                });
            });

        });

        $.ajax({
              type:"post",
              url: "<?php echo base_url('superadminfranchise/get_list_bahan_jadi')?>/",
              data:{},
              dataType:"json",
              success:function(response)
              {

                $.each(response, function (i, item) {
                    if (i==0) {
                        $('#nama_bahan').append($('<option>', {
                            value: item.id_bahan_jadi,
                            text: item.nama_bahan_jadi,
                            selected: "selected"
                        }));
                    }else{
                        $('#nama_bahan').append($('<option>', {
                            value: item.id_bahan_jadi,
                            text: item.nama_bahan_jadi
                        }));
                    }
                    
                });
                // $("#tujuan").html(htmlinsideselect);
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown);
              },
              complete: function (argument) {
                  $('#nama_bahan').trigger("chosen:updated");
              }
          }
        );

tabeldata = $("#mytable").DataTable({
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
      responsive: true,
      ajax: {
        "type"   : "POST",
        "url"    : "<?php echo base_url('adminfranchise/datatablenotagudang');?>",
        "dataSrc": function (json) {
          var return_data = new Array();

          

          for(var i=0;i< json.data.length; i++){
            var metode = json.data[i].metode.charAt(0).toUpperCase() + json.data[i].metode.slice(1);
              var jatuh_tempo = json.data[i].tempo_tanggal;

              if (jatuh_tempo == "0000-00-00") {
                jatuh_tempo = "-";
              }else{
                jatuh_tempo = uidate(jatuh_tempo);
              }

            return_data.push({
                'date_sort':json.data[i].tanggal,
              'no_nota': json.data[i].no_nota,
              'tanggal_nota': uidate(json.data[i].tanggal),
              'total'  : "Rp. "+currency(json.data[i].total_harga)+",-",
              'metode' : metode,
              'jatuh_tempo' : jatuh_tempo,
              // .split(' ').join('+')
              'detail' : '<button onclick="detail(\''+json.data[i].keterangan+'\',\''+json.data[i].no_nota+'\')" class="btn btn-primary">Detail</button> '
            })
          }
          return return_data;
        }
      },
        dom: 'Bfrtlip',
        buttons: [
            {
                extend: 'copyHtml5',
                text: 'Copy',
                filename: 'Nota Gudang',
                exportOptions: {
                  columns:[1,2,3,4,5]
                }
            },{
                extend: 'excelHtml5',
                text: 'Excel',
                className: 'exportExcel',
                filename: 'Nota Gudang',
                exportOptions: {
                  columns:[1,2,3,4,5]
                }
            },{
                extend: 'csvHtml5',
                filename: 'Nota Gudang',
                exportOptions: {
                  columns:[1,2,3,4,5]
                }
            },{
                extend: 'pdfHtml5',
                filename: 'Nota Gudang',
                exportOptions: {
                  columns:[1,2,3,4,5]
                }
            },{
                extend: 'print',
                filename: 'Nota Gudang',
                exportOptions: {
                  columns:[1,2,3,4,5]
                }
            }
        ],
        "lengthChange": true,
          columns: [
          {'data':'date_sort'},
            {'data': 'no_nota'},
            {'data': 'tanggal_nota'},
            {'data': 'total'},
            {'data': 'metode'},
            {'data': 'jatuh_tempo'},
            {'data': 'detail',searchable:false,orderable:false}
          ],
          "order": [[ 0, "desc" ]]
    });

    function reload_table(){
      tabeldata.ajax.reload();
    }

    $('#tgl').datetimepicker({
        format: 'DD/MM/YYYY',
        useCurrent: false
    });

    $('#jatuh_tempo').datetimepicker({
        format: 'DD/MM/YYYY',
        useCurrent: false
    });

    $('.numeric').on('input', function (event) { 
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    function sinkrontabel() {
        $("#bodytabel").empty();
        if (arrProduk.length == 0) {
            $('#datakosong').show();
        }else{
            $.each(arrProduk, function (i,item) {
                $('#bodytabel').append(
                    '<tr><td id="kodebarang">'+item.kodebarang+'</td><td id="namabarang">'+item.namabarang+'</td><td id="stokmasuk">'+item.stokmasuk+'</td><td id="hargasatuan">'+item.hargasatuan+'</td><td id="hargatotal">'+item.hargatotal+'</td><td><button class="btn btn-danger" onclick="deleteproduk(\''+item.kodebarang+'\')"><i class="fa fa-times"></i></button></td></tr>'
                );
            });
            $('#datakosong').hide();
        }
    }

    function deleteproduk(id) {
        var tempdata = new Array();
        $.each(arrProduk, function (i,item) {
            if (id != item.kodebarang) {
                tempdata.push({kodebarang:item.kodebarang ,namabarang: item.namabarang, stokmasuk: item.stokmasuk, hargasatuan:item.hargasatuan, hargatotal: item.hargatotal});
            }
        });
        arrProduk = new Array();
        arrProduk = tempdata;

        if (arrProduk.length == 0) {
            arrProduk = new Array();
        }
        sinkrontabel();
    }

    function detail(keterangan,no_nota)
    {
        $("#bodydetailtabel").empty();
        $("#id_detail_nota").html(no_nota);
        $("#detailketerangan").html(keterangan);
        $.ajax({
              type:"post",
              url: "<?php echo base_url('adminfranchise/datatabledetailnotagudang')?>/",
              data:{no_nota:no_nota},
              dataType:"json",
              success:function(response)
              {
                if (response.data.length==0) {
                    $('#datadetailkosong').show();
                }else{
                    for(var i=0;i<response.data.length;i++){
                        $('#bodydetailtabel').append(
                        '<tr><td id="kodebarang">'+response.data[i].id_bahan_jadi+'</td><td id="namabarang">'+response.data[i].nama_bahan_jadi+'</td><td id="stokmasuk">'+response.data[i].stok_masuk+'</td><td id="hargasatuan">'+response.data[i].harga_satuan+'</td><td id="hargatotal">'+response.data[i].harga_total+'</td></tr>');
                    }
                    $('#datadetailkosong').hide();
                }
              },
          }
        );
        $("#modaldetail").modal("toggle");
    }

    function tambahbarang() {

        var namabarang = $('#nama_bahan option:selected').text();
        var kodebarang = $('#nama_bahan').val();
        var stokmasuk = $("#stock_masuk").val();
        var hargatotal = $("#harga_total").val();



        if (namabarang.replace(/\s/g, '').length<=0) {
            $('#nama_bahan').addClass("is-invalid");
        }

        if (stokmasuk.replace(/\s/g, '').length<=0) {
            $('#stock_masuk').addClass("is-invalid");
        }

        if (hargatotal.replace(/\s/g, '').length<=0) {
            $('#harga_total').addClass("is-invalid");
        }

        if (namabarang.replace(/\s/g, '').length>0&&stokmasuk.replace(/\s/g, '').length>0&&hargatotal.replace(/\s/g, '').length>0) {
            console.log(arrProduk);
            var stat = false;

            $.each(arrProduk, function (i,item) {
                if (namabarang == item.namabarang) {
                    alert("Bahan Jadi telah ada dalam tabel");
                    stat = true;
                }
            });

            if (!stat) {
                arrProduk.push({kodebarang:kodebarang ,namabarang: namabarang, stokmasuk: stokmasuk, hargasatuan:Math.round(hargatotal/stokmasuk), hargatotal: hargatotal});
            }

            $("#stock_masuk").val('');
            $("#harga_total").val('');

            if($('#nama_bahan').has("is-invalid")){
                $('#nama_bahan').removeClass("is-invalid");
            }

            if($('#stock_masuk').has("is-invalid")){
                $('#stock_masuk').removeClass("is-invalid");
            }

            if($('#harga_total').has("is-invalid")){
                $('#harga_total').removeClass("is-invalid");
            }   
        }

        sinkrontabel();
    }

    function tambahnota()
    {
        $("#modaltambah").modal('show');
    }

    function savenota() {
        var no_nota = $("#no_nota").val();
        var tgl = $("#tgl").val();
        var metode = $("#metode").val();
        var jatuh_tempo = $("#jatuh_tempo").val();
        var keterangan = $("#keterangan").val();
        var allstat = true;

        $("#no_nota").removeClass('is-invalid');
        $("#tgl").removeClass('is-invalid');
        $("#jatuh_tempo").removeClass('is-invalid');
        $("#keterangan").removeClass('is-invalid');
        $('#labelbahan').removeClass('red');

        if (no_nota.replace(/\s/g, '') == '') {
            $("#no_nota").addClass('is-invalid');
            allstat = false;
        }

        if (tgl.replace(/\s/g, '') == '') {
            $("#tgl").addClass('is-invalid');
            allstat = false;
        }

        if (metode != 'cash' && jatuh_tempo == '') {
            $("#jatuh_tempo").addClass('is-invalid');
            allstat = false;
        }

        if (arrProduk.length == 0) {
            $('#labelbahan').addClass('red');
            allstat = false;
        }

        if (allstat) {
            $.ajax({
                  type:"post",
                  url: "<?php echo base_url('adminfranchise/savenotagudang')?>/",
                  data:{
                    no_nota : no_nota,
                    tgl : tgl,
                    metode : metode,
                    jatuh_tempo : jatuh_tempo,
                    keterangan : keterangan,
                    arrProduk : JSON.stringify(arrProduk)
                  },
                  dataType:"text",
                  success:function(response)
                  {
                    if (response == 'sukses') {

                        arrProduk = new Array();
                        sinkrontabel();
                        $("#no_nota").val('');
                        $("#tgl").val('');
                        $("#metode").val('cash');
                        $("#jatuh_tempo").prop('disabled', true);
                        $("#jatuh_tempo").val('');
                        $("#keterangan").val('');
                        $("#modaltambah").modal('toggle');
                        reload_table();

                    }else{
                        alert('Error, Coba Lagi! (Periksa Koneksi internet)');
                    }
                    
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                    alert(errorThrown);
                  }
              }
            );
        }else{
            alert('Pastikan Semua data telah terlengkapi!');
        }


    }
</script>