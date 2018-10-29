        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Stok Produk</h1>
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
                                <strong class="card-title">List Stock Produk</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class=" form-control-label">Tanggal</label>
                                            <input type="text" id="tanggal" placeholder="Masukkan Tanggal" class="form-control">
                                        </div>
                                    </div>
                                </div>
                              <table style="width: 100%" width="100%" id="mytable" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>ID Bahan Jadi</th>
                                    <th>Nama Bahan Jadi</th>
                                    <th>Stok Masuk</th>
                                    <th>Stok Keluar</th>
                                    <th>Sisa Stok</th>
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

    $('#tanggal').val(tanggal+"/"+bulan+"/"+tahun);


    $('#tanggal').datetimepicker({
        format: 'DD/MM/YYYY',
        useCurrent: false
    });

    $("#tanggal").on("dp.change", function(e) {
        reload_table();
    });

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
                "data": function(data) {
                    var res = $("#tanggal").val().split("/");
                  data.tanggal = res[2]+"-"+res[1]+"-"+res[0];
                },
                "url"    : "<?php echo base_url('adminfranchise/datatablestokbahanjadigudang');?>",
                "dataSrc": function (json) {
                  var return_data = new Array();

                  for(var i=0;i< json.data.length; i++){

                    return_data.push({
                      'id_bahan_jadi': json.data[i].id_bahan_jadi,
                      'nama_bahan_jadi'  : json.data[i].nama_bahan_jadi,
                      'stok_masuk' : json.data[i].stok_masuk,
                      'stok_keluar' : json.data[i].stok_keluar,
                      'sisa_stok' : json.data[i].stok_sisa
                    });
                  }

                  return return_data;
                }
              },
        dom: 'Bfrtlip',
        buttons: [
            {
                extend: 'copyHtml5',
                text: 'Copy',
                filename: 'Data Stock Gudang',
                exportOptions: {
                  columns:[0,1,2,3,4]
                }
            },{
                extend: 'excelHtml5',
                text: 'Excel',
                className: 'exportExcel',
                filename: 'Data Stock Gudang',
                exportOptions: {
                  columns:[0,1,2,3,4]
                }
            },{
                extend: 'csvHtml5',
                filename: 'Data Stock Gudang',
                exportOptions: {
                  columns:[0,1,2,3,4]
                }
            },{
                extend: 'pdfHtml5',
                filename: 'Data Stock Gudang',
                exportOptions: {
                  columns:[0,1,2,3,4]
                }
            },{
                extend: 'print',
                filename: 'Data Stock Gudang',
                exportOptions: {
                  columns:[0,1,2,3,4]
                }
            }
        ],
        "lengthChange": true,
          columns: [
            {'data': 'id_bahan_jadi'},
            {'data': 'nama_bahan_jadi'},
            {'data': 'stok_masuk'},
            {'data': 'stok_keluar'},
            {'data': 'sisa_stok'}
          ],
    });

    function reload_table(){
      tabeldata.ajax.reload();
    }

    // function hapus(id)
    // {
    //     if (confirm("Apakah anda yakin ingin menghapus data "+id+"?")) {
    //         $.ajax({
    //                 type:"post",
    //                 url: "<?php echo base_url('')?>/",
    //                 data:{ id:id},
    //                 success:function(response)
    //                 {
    //                      reload_table();
    //                 },
    //                 error: function (jqXHR, textStatus, errorThrown)
    //                 {
    //                   alert(errorThrown);
    //                 }
    //             }
    //         );
    //     }
    // }
</script>