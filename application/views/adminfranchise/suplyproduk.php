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

        <div class="row form-group">
            <button onclick="tambahstockkeluar()" class="btn btn-success">Tambah Nota</button>
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

    var tanggalfull = new Date();
    var tanggal = tanggalfull.getDate();
    var bulan = tanggalfull.getMonth()+1;
    var tahun = tanggalfull.getFullYear();

    if (parseInt(tanggal)<10) {
        tanggal = "0"+tanggal;
    }

    if (parseInt(bulan)<10) {
        bulan = "0"+bulan;
    }

    $('#tgl').val(tanggal+"/"+bulan+"/"+tahun);

    $('#tgl').datetimepicker({
        format: 'DD/MM/YYYY',
        useCurrent: false
    });

    $("#tgl").on("dp.change", function(e) {
        refreshrekap();
    });

    $('.numeric').on('input', function (event) { 
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    function tambahstokkeluar()
    {
        
    }
</script>