        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Laporan Keuntungan Stand</h1>
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
                            <strong class="card-title">Data Stand</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <b><label class=" form-control-label">Stan</label></b>
                                            <select name="selectstan" id="stan" class="form-control" tabindex="1" onchange="">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <b><label class=" form-control-label">Bulan</label></b>
                                            <input type="text" name="bulan" id="bulan" class="form-control" >
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
                                <th>Keterangan</th>
                                <th>No Invoice</th>
                                <th>Debet</th>
                                <th>Kredit</th>
                                <th>Saldo</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                        <h5 class="text-right" id="totalhargapernota">Total Keuntungan : Rp. 400.000,-</h5>
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

                      $('#bulan').datetimepicker({
                          format: "mm-yyyy",
                          startView: "months", 
                          minViewMode: "months",
                          useCurrent: false
                      });

                      $.ajax({
                          type:"post",
                          url: "<?php echo base_url('superadminfranchise/get_list_stan')?>/",
                          data:{},
                          dataType:"json",
                          success:function(response)
                          {
                            var htmlinsideselect = '';
                            $.each(response, function (i, item) {
                                if (i == 0) {
                                    // $('#stan').append($('<option>', {
                                    //     value: item.id_stan,
                                    //     text: item.nama_stan+' ( '+item.alamat+' )',
                                    //     selected: true
                                    // }));
                                    htmlinsideselect = htmlinsideselect + '<option selected="selected" value="'+item.id_stan+'">'+item.nama_stan +' ( '+item.alamat+' )' +'</option>';
                                }else{
                                    htmlinsideselect = htmlinsideselect + '<option value="'+item.id_stan+'">'+item.nama_stan +' ( '+item.alamat+' )' +'</option>';
                                }
                                
                            });
                            $("#stan").html(htmlinsideselect);
                          },
                          error: function (jqXHR, textStatus, errorThrown)
                          {
                            alert(errorThrown);
                          },
                          complete: function (argument) {
                              $('#stan').trigger("chosen:updated");
                              var id_stan = $('#stan').val();
                              var tanggal_rekap = $('#tanggalrekap').val();
                                // alert(id_stan);
                                ajaxSetData(id_stan,tanggal_rekap);
                          }
                      }
                    );

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