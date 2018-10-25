        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pembelian</h1>
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
            <div class="animated fadeIn" style="animation-fill-mode: none;">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- <h1><span class="badge badge-warning">Fitur dalam tahap Pengembangan!</span></h1> -->
                        <div class="card">
                            <div class="card-header text-center">
                                <strong class="card-title">Tambah Barang</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nama_bahan" class=" form-control-label">Nama Barang</label>
                                            <input type="text" id="nama_bahan" placeholder="Masukkan Nama Bahan Jadi" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="stock_masuk" class="numeric form-control-label">Stock Masuk</label>
                                            <input type="text" id="stock_masuk" placeholder="Masukkan Jumlah Bahan Jadi" class="form-control numeric">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="harga_total" class=" form-control-label">Harga Total</label>
                                            <input type="text" onkeyup="this.value=currency(this.value);" id="harga_total" placeholder="Masukkan Keterangan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <button onclick="tambahbarang()" class="btn btn-success">Tambah Barang</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
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
                                <strong class="card-title">List Barang</strong>
                            </div>
                            <div class="card-body">
                              <table id="mytable" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Stock Masuk</th>
                                    <th>Harga Satuan</th>
                                    <th>Harga Total</th>
                                    <th>Hapus</th>
                                  </tr>
                                </thead>
                              </table>
                            </div>
                        </div> <!-- .card -->
                    </div>
                </div>
                <div id="total_pembelian" style="font-size: 20px;font-style: bold;" class="row">
                    Total Pembelian : RP. 100.000
                </div>
            </div>
        </div>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
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
    <script src=<?php echo base_url("assets/vendors/moment/min/moment.min.js")?>></script>
    <script src=<?php echo base_url("assets/vendors/bootstrap-daterangepicker/daterangepicker.js")?>></script>
    <script src=<?php echo base_url("assets/vendors/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js")?>></script>

    <script src=<?php echo base_url("assets/js/jquery.easy-autocomplete.js")?>></script>

</body>
</html>
<script type="text/javascript">
  function currency(x) {
    var retVal=x.toString().replace(/[^\d]/g,'');
    while(/(\d+)(\d{3})/.test(retVal)) {
      retVal=retVal.replace(/(\d+)(\d{3})/,'$1'+'.'+'$2');
    }
    return retVal;
  }

    $('.numeric').on('input', function (event) { 
        this.value = this.value.replace(/[^0-9]/g, '');
    });

var tabeldata;

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
                filename: 'Order Data',
                exportOptions: {
                  columns:[0,1,2]
                }
            },{
                extend: 'excelHtml5',
                text: 'Excel',
                className: 'exportExcel',
                filename: 'Order Data',
                exportOptions: {
                  columns:[0,1,2]
                }
            },{
                extend: 'csvHtml5',
                filename: 'Order Data',
                exportOptions: {
                  columns:[0,1,2]
                }
            },{
                extend: 'pdfHtml5',
                filename: 'Order Data',
                exportOptions: {
                  columns:[0,1,2]
                }
            },{
                extend: 'print',
                filename: 'Order Data',
                exportOptions: {
                  columns:[0,1,2]
                }
            }
        ],
        "lengthChange": true,
          columns: [
            {'data': 'kode_barang'},
            {'data': 'nama_barang'},
            {'data': 'stock_masuk'},
            {'data': 'harga_satuan'},
            {'data': 'harga_total'}.
            {'data': 'hapus'}.
          ],
    });

    function reload_table(){
      tabeldata.ajax.reload();
    }

    $('.numeric').on('input', function (event) { 
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    function tambahstokkeluar()
    {
        var nama = $("#nama_bahan").val();
        var stock_masuk = $("#stock_masuk").val();
        var harga_total = $("#harga_total").val();
        if (harga_total.replace(/\s/g, '').length>0&&nama.replace(/\s/g, '').length>0&&stock_masuk.replace(/\s/g, '').length>0) {
            $.ajax(
                {
                    type:"post",
                    url: "<?php echo base_url('')?>/",
                    data:{ harga_total:harga_total,nama:nama,stock_masuk:stock_masuk},
                    success:function(response)
                    {
                      if(response == 'Berhasil Ditambahkan'){
                        reload_table();
                        if($('#nama').has("error")){
                          $('#nama').removeClass("error");
                        }
                        if($('#stock_masuk').has("error")){
                          $('#stock_masuk').removeClass("error");
                        }
                        if($('#harga_total').has("error")){
                          $('#harga_total').removeClass("error");
                        }
                        $("#nama").val('');
                        $("#stock_masuk").val('');
                        $("#harga_total").val('');
                        $("#nama").focus();
                        alert(response);
                      }else{
                        alert('unknown error is happen! try again.');
                      }
                      
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                      alert(errorThrown);
                    }
                }
            );
        }else{
            if (nama.replace(/\s/g, '').length<=0) {
                $('#nama').addClass("error");
            }else{
                if($('#nama').has("error")){
                    $('#nama').removeClass("error");
                }
            }

            if (stock_masuk.replace(/\s/g, '').length<=0) {
                $('#stock_masuk').addClass("error");
            }else{
                if($('#stock_masuk').has("error")){
                    $('#stock_masuk').removeClass("error");
                }
            }

            if (harga_total.replace(/\s/g, '').length<=0) {
                $('#harga_total').addClass("error");
            }else{
                if($('#harga_total').has("error")){
                    $('#harga_total').removeClass("error");
                }
            }
        }
    }
</script>