        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Laporan Distribusi</h1>
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
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Pilih Tanggal Distribusi</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <b><label class=" form-control-label">Tanggal Awal</label></b>
                                            <input type="text" name="tanggal_awal" id="tanggal_awal" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <b><label class=" form-control-label">Tanggal Akhir</label></b>
                                            <input type="text" name="tanggal_akhir" id="tanggal_akhir" class="form-control" >
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
                            <strong class="card-title">Laporan Distribusi</strong>
                        </div>
                        <div class="card-body">
                          <table id="mytable" class="table table-striped table-bordered" style="width: 100%" width="100%">
                            <thead>
                              <tr>
                                <th>Tanggal</th>
                                <th>Nama Barang</th>
                                <th>No Nota</th>
                                <th>Kode Barang</th>
                                <th>Tujuan Pengiriman</th>
                                <th>Jumlah</th>
                                <th>Detail</th>
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
    <!-- bootstrap-datetimepicker -->    
    <script src=<?php echo base_url("assets/vendors/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js")?>></script>

    <script src=<?php echo base_url("assets/js/jquery.easy-autocomplete.js")?>></script>
    <script type="text/javascript">
            jQuery( document ).ready(function( $ ) {

                      $('#tanggal_awal').datetimepicker({
                          format: 'DD/MM/YYYY',
                          useCurrent: false
                      });
                      $('#tanggal_akhir').datetimepicker({
                          format: 'DD/MM/YYYY',
                          useCurrent: false
                      });

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
                      responsive: true,
                      serverSide: true,
                      ajax: {
                    "type"   : "POST",
                    "url"    : "<?php echo base_url('');?>",
                    "dataSrc": function (json) {
                      var return_data = new Array();
                      // for(var i=0;i< json.data.length; i++){
                      //   return_data.push({
                      //     'id_bahan_jadi': json.data[i].id_bahan_jadi,
                      //     'nama_bahan_jadi'  : json.data[i].nama_bahan_jadi,
                      //     'edit' : '<button onclick=edit_bahanjadi("'+json.data[i].id_bahan_jadi+'") class="btn btn-warning" style="color:white;">Edit</button> ',
                      //     'hapus' : '<button onclick=delete_bahanjadi("'+json.data[i].id_bahan_jadi+'") class="btn btn-danger" style="color:white;">Delete</button>'
                      //   })
                      // }
                      return return_data;
                    }
                  },
                   dom: 'Bfrtlip',
                        buttons: [
                            {
                                extend: 'copyHtml5',
                                text: 'Copy',
                                filename: 'Produk Data',
                                exportOptions: {
                                  columns:[0,1]
                                }
                            },{
                                extend: 'excelHtml5',
                                text: 'Excel',
                                className: 'exportExcel',
                                filename: 'Produk Data',
                                exportOptions: {
                                  columns:[0,1]
                                }
                            },{
                                extend: 'csvHtml5',
                                filename: 'Produk Data',
                                exportOptions: {
                                  columns:[0,1]
                                }
                            },{
                                extend: 'pdfHtml5',
                                filename: 'Produk Data',
                                exportOptions: {
                                  columns:[0,1]
                                }
                            },{
                                extend: 'print',
                                filename: 'Produk Data',
                                exportOptions: {
                                  columns:[0,1]
                                }
                            }
                        ],
                        "lengthChange": true,
                  columns: [
                    {'data': 'tgl'},
                    {'data': 'nama_barang'},
                    {'data': 'no_nota'},
                    {'data': 'kode_barang'},
                    {'data': 'tujuan_pengiriman'},
                    {'data': 'detail'},
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