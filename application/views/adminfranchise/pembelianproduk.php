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
                            <div class="card-header text-center">
                                <strong class="card-title">List Supply Produk</strong>
                            </div>
                            <div class="card-body">
                                <div class="row col-md-3 form-group">
                                    <button onclick="tambahstockkeluar()" class="btn btn-success">Tambah Nota</button>
                                </div>

                              <table id="mytable" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>No Nota</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Total Harga</th>
                                    <th>Metode</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
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

        <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_nota" class=" form-control-label">No Nota</label>
                                <input type="text" id="no_nota" placeholder="Masukkan No Nota" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tgl" style="position: relative; z-index: 100000;" class=" form-control-label">Tanggal</label>
                                <input type="text" id="tgl" placeholder="DD/MM/YYYY" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="keterangan" class=" form-control-label">Keterangan</label>
                                <input type="text" id="keterangan" placeholder="Masukkan Keterangan" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class=" form-control-label">Metode Pembelian</label>
                                <select name="metode" id="metode" class="form-control" tabindex="1">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jatuh_tempo" style="position: relative; z-index: 100000;" class=" form-control-label">Jatuh Tempo</label>
                                <input type="text" id="jatuh_tempo" placeholder="DD/MM/YYYY" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label" id="label_data_nota" style="font-weight: bold">Tambah Barang</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_bahan" class=" form-control-label">Nama Barang</label>
                                <input type="text" id="nama_bahan" placeholder="Masukkan Nama Bahan Jadi" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="stock_masuk" class="form-control-label">Stock Masuk</label>
                                <input type="text" id="stock_masuk" placeholder="Masukkan Jumlah Bahan Jadi" class="form-control numeric">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="harga_total" class=" form-control-label">Harga Total</label>
                                <input type="text" onkeyup="this.value=currency(this.value);" id="harga_total" placeholder="Masukkan Keterangan" class="form-control">
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
                                <col width="10%">
                                <col width="15%">
                                <col width="15%">
                                <col width="10%">
                                <thead>
                                  <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Stock Masuk</th>
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
                    <button type="button" class="btn btn-success" onclick="tambahdistribusi()">Simpan</button>
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
    value: "ovo",
    text: "OVO"
}));

$('#metode').append($('<option>', {
    value: "debit",
    text: "Debit"
}));

$('#metode').append($('<option>', {
    value: "cash",
    text: "Cash",
    selected: "selected"
}));

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
        "url"    : "<?php echo base_url('');?>"
      },
        dom: 'Bfrtlip',
        buttons: [
            {
                extend: 'copyHtml5',
                text: 'Copy',
                filename: 'Supply Data',
                exportOptions: {
                  columns:[0,1,2]
                }
            },{
                extend: 'excelHtml5',
                text: 'Excel',
                className: 'exportExcel',
                filename: 'Supply Data',
                exportOptions: {
                  columns:[0,1,2]
                }
            },{
                extend: 'csvHtml5',
                filename: 'Supply Data',
                exportOptions: {
                  columns:[0,1,2]
                }
            },{
                extend: 'pdfHtml5',
                filename: 'Supply Data',
                exportOptions: {
                  columns:[0,1,2]
                }
            },{
                extend: 'print',
                filename: 'Supply Data',
                exportOptions: {
                  columns:[0,1,2]
                }
            }
        ],
        "lengthChange": true,
          columns: [
            {'data': 'no_nota'},
            {'data': 'tanggal'},
            {'data': 'keterangan'},
            {'data': 'total'},
            {'data': 'metode'},
            {'data': 'jatuh_tempo'},
            {'data': 'edit'},
            {'data': 'hapus'},
          ],
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

        $.each(arrProduk, function (i,item) {
            $('#bodytabel').append(
                '<tr><td id="kodebarang">'+item.kodebarang+'</td><td id="namabarang">'+item.namabarang+'</td><td id="stokmasuk">'+item.stokmasuk+'</td><td id="hargasatuan">'+item.hargasatuan+'</td><td id="hargatotal">'+item.hargatotal+'</td><td><button class="btn btn-danger" onclick="deleteproduk(\''+item.kodebarang+'\')"><i class="fa fa-times"></i></button></td></tr>'
            );
        });

        if (arrProduk.length == 0) {
            $('#datakosong').show();
        }else{
            $('#datakosong').hide();
        }
    }

    function deleteproduk(id) {
        var tempdata = new Array();
        $.each(arrProduk, function (i,item) {
            if (id != item.kodebarang) {
                tempdata.push({kodebarang:kodebarang ,namabarang: namabarang, stokmasuk: stokmasuk, hargasatuan:hargasatuan, hargatotal: hargatotal});
            }
        });
        arrProduk = new Array();
        arrProduk = tempdata;
        sinkrontabel();
    }

    function tambahbarang() {

        var namabarang = $('#nama_bahan').val();
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
            var stat = false;

            $.each(arrProduk, function (i,item) {
                if (namabarang == item.namabarang) {
                    item.stokmasuk = parseInt(item.stokmasuk) + stokmasuk;
                    stat = true;
                }
            });

            if (!stat) {
                arrProduk.push({kodebarang:namabarang ,namabarang: namabarang, stokmasuk: stokmasuk, hargasatuan:hargatotal, hargatotal: hargatotal});
            }
            $('#nama_bahan').val('');
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

    function tambahstockkeluar()
    {
        $("#modaltambah").modal('show');
    }
</script>