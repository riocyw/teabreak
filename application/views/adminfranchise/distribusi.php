        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Distribusi</h1>
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
                                <strong class="card-title">Data Distribusi</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="button" data-toggle="modal" data-target="#modaltambah" class="btn btn-success" name="tambah" id="tambah" onclick="dataModal()" value="Tambah Distribusi">
                                    </div>
                                </div>

                                <br>
                                <table id="mytable" class="table table-striped table-bordered" style="width: 100%" width="100%">
                                    <thead>
                                      <tr>
                                        <th>Nama Stand ( Alamat )</th>
                                        <th>Tanggal</th>
                                        <th>Detail</th>
                                        <th>Cetak Surat</th>
                                        <!-- <th>Hapus</th> -->
                                      </tr>
                                    </thead>
                                </table>

                            </div>
                        </div> <!-- .card -->
                    </div>
                </div>
            </div>


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Tambah Promo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label" id="label_data_tujuan" style="font-weight: bold">Data Pengiriman</label>
                        </div>
                        
                    </div>
                    <div class="row">
                        
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class=" form-control-label">Tujuan</label>
                                <select name="selectstan" id="tujuan" class="form-control" tabindex="1">

                                </select>
                            </div>
                        </div>    
                        <!-- <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class=" form-control-label">Tanggal Kirim</label>
                                <input type="text" id="tanggal_kirim" placeholder="Tanggal Distribusi" class="form-control">
                            </div>
                        </div>   -->
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label" id="label_data_tujuan" style="font-weight: bold">Data Order Bahan Jadi</label>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class=" form-control-label">Nama Bahan Jadi</label>
                                <select id="nama_bahan_jadi">
                                </select>
                            </div>
                        </div>    
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label class=" form-control-label">Jumlah</label>
                                <input type="text" id="jumlah" placeholder="Jumlah" class="form-control numeric">
                            </div>
                        </div> 
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class=" form-control-label">Action</label>
                                <button type="button" class="btn btn-success form-control" onclick="tambahbahanjadi()"><i class="fa fa-plus"></i> Tambah</button>
                            </div>
                        </div>

                         
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table style="width: 100%" width="100%" id="tabellistbahan" class="table table-striped table-bordered">
                                <col width="60%">
                                <col width="25%">
                                <col width="15%">
                                <thead>
                                  <tr>
                                    <th>Nama Bahan Jadi</th>
                                    <th>Jumlah</th>
                                    <th>Hapus</th>
                                  </tr>
                                  <tr>
                                        <td colspan="4" class="text-center" id="datakosong">Tidak Ada Data</td>
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

    <!-- <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Tambah Promo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label" id="edit_label_data_tujuan" style="font-weight: bold">Data Pengiriman</label>
                        </div>
                        
                    </div>
                    <div class="row">
                        
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class=" form-control-label">Rubah Ke</label>
                                <select name="selectstan" id="edittujuan" class="form-control" tabindex="1">

                                </select>
                            </div>
                        </div>    
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class=" form-control-label">Tanggal Kirim</label>
                                <input type="text" id="edittanggal_kirim" placeholder="Tanggal Distribusi" class="form-control">
                            </div>
                        </div>  
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label" id="label_data_tujuan" style="font-weight: bold">Data Order Bahan Jadi</label>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class=" form-control-label">Nama Bahan Jadi</label>
                                <select id="editnama_bahan_jadi">
                                </select>
                            </div>
                        </div>    
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label class=" form-control-label">Jumlah</label>
                                <input type="text" id="edit_jumlah" placeholder="Jumlah" class="form-control numeric">
                            </div>
                        </div> 
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class=" form-control-label">Action</label>
                                <button type="button" class="btn btn-success form-control" onclick="edittambahbahanjadi()"><i class="fa fa-plus"></i> Tambah</button>
                            </div>
                        </div>

                         
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table style="width: 100%" width="100%" id="edittabellistbahan" class="table table-striped table-bordered">
                                <col width="60%">
                                <col width="25%">
                                <col width="15%">
                                <thead>
                                  <tr>
                                    <th>Nama Bahan Jadi</th>
                                    <th>Jumlah</th>
                                    <th>Hapus</th>
                                  </tr>
                                  <tr>
                                        <td colspan="4" class="text-center" id="editdatakosong">Tidak Ada Data</td>
                                      </tr>
                                </thead>
                                <tbody id="editbodytabel">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="editdistribusifix()">Simpan</button>
                </div>
            </div>
        </div>
    </div> -->

    <div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Tambah Promo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label" id="edit_label_data_tujuan" style="font-weight: bold">Data Pengiriman</label>
                        </div>
                        
                    </div>
                    <div class="row">
                        
                        <div class="col-md-9 col-sm-12">
                            <div class="form-group">
                                <label class=" form-control-label">Kirim Ke</label>
                                <h5 id="wadahstan" ><b id="detailtujuan"></b></h5>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-12  text-right">
                            <div class="form-group">
                                <label class=" form-control-label">Hari, Tanggal</label>
                                <h6 class="" id="" ><b id="detailtanggal"></b></h6>
                            </div>
                        </div>

                        
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label" id="label_data_tujuan" style="font-weight: bold">Data Order Bahan Jadi</label>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table style="width: 100%" width="100%" id="detailtabellistbahan" class="table table-striped table-bordered">
                                <col width="75%">
                                <col width="25%">
                                <thead>
                                  <tr>
                                    <th>Nama Bahan Jadi</th>
                                    <th>Jumlah</th>
                                  </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="cek()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
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

    <script type="text/javascript">
        var arrayDistribusi = new Array();
        var tabeldata;
        var ideditlist;
        var idtoedit;
        $('#editdatakosong').hide();

        $('.numeric').on('input', function (event) { 
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        $.ajax({
              type:"post",
              url: "<?php echo base_url('superadminfranchise/get_list_stan')?>/",
              data:{},
              dataType:"json",
              success:function(response)
              {

                $.each(response, function (i, item) {
                    if (i == 0) {
                        $('#tujuan').append($('<option>', {
                            value: item.id_stan,
                            text: item.nama_stan+' ( '+item.alamat+' )',
                            selected: "selected"
                        }));
                        $('#edittujuan').append($('<option>', {
                            value: item.id_stan,
                            text: item.nama_stan+' ( '+item.alamat+' )',
                            selected: "selected"
                        }));
                    }else{
                        $('#tujuan').append($('<option>', {
                            value: item.id_stan,
                            text: item.nama_stan+' ( '+item.alamat+' )'
                        }));
                        $('#edittujuan').append($('<option>', {
                            value: item.id_stan,
                            text: item.nama_stan+' ( '+item.alamat+' )'
                        }));
                    }
                    
                });
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown);
              },
              complete: function (argument) {
                  $('#tujuan').trigger("chosen:updated");
                  $('#edittujuan').trigger("chosen:updated");
              }
          }
        );

        $.ajax({
              type:"post",
              url: "<?php echo base_url('superadminfranchise/get_list_bahan_jadi')?>/",
              data:{},
              dataType:"json",
              success:function(response)
              {

                $.each(response, function (i, item) {
                    if (i==0) {
                        $('#nama_bahan_jadi').append($('<option>', {
                            value: item.id_bahan_jadi,
                            text: item.nama_bahan_jadi,
                            selected: "selected"
                        }));

                        $('#editnama_bahan_jadi').append($('<option>', {
                            value: item.id_bahan_jadi,
                            text: item.nama_bahan_jadi,
                            selected: "selected"
                        }));
                    }else{
                        $('#nama_bahan_jadi').append($('<option>', {
                            value: item.id_bahan_jadi,
                            text: item.nama_bahan_jadi
                        }));
                        $('#editnama_bahan_jadi').append($('<option>', {
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
                  $('#nama_bahan_jadi').trigger("chosen:updated");
                  $('#editnama_bahan_jadi').trigger("chosen:updated");
              }
          }
        );

        $(document).ready(function() {
            jQuery(document).ready(function() {
                jQuery("#nama_bahan_jadi").chosen({
                    disable_search_threshold: 10,
                    no_results_text: "Oops, nothing found!",
                    width: "100%"
                });
            });

            jQuery(document).ready(function() {
                jQuery("#tujuan").chosen({
                    disable_search_threshold: 10,
                    no_results_text: "Oops, nothing found!",
                    width: "100%"
                });
            });

            jQuery(document).ready(function() {
                jQuery("#editnama_bahan_jadi").chosen({
                    disable_search_threshold: 10,
                    no_results_text: "Oops, nothing found!",
                    width: "100%"
                });
            });

            jQuery(document).ready(function() {
                jQuery("#edittujuan").chosen({
                    disable_search_threshold: 10,
                    no_results_text: "Oops, nothing found!",
                    width: "100%"
                });
            });

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
            "url"    : "<?php echo base_url('adminfranchise/datatabledistribusi');?>",
            "dataSrc": function (json) {
              var return_data = new Array();
              var total_harga_akhir = 0;

              for(var i=0;i< json.data.length; i++){
                var nama = json.data[i].nama_stan;
                nama = nama.split(' ').join('+');
                return_data.push({
                  'nama_stan': json.data[i].nama_stan,
                  'tanggal'  : uidate(json.data[i].tanggal),
                  'detail' : '<button onclick=detaildistribusi("'+json.data[i].id_distribusi+'","'+nama+'","'+json.data[i].tanggal+'") class="btn btn-warning"><b>Detail</b></button> ',
                  'cetaksurat' : '<button onclick=cetaksurat("'+json.data[i].id_distribusi+'","'+nama+'","'+json.data[i].tanggal+'") class="btn btn-primary"><b>Cetak Surat</b></button> ',
                  // 'hapus' : '<button onclick=hapusdistribusi("'+json.data[i].id_distribusi+'") class="btn btn-danger"><b>Hapus</b></button> ',
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
                {'data': 'nama_stan'},
                {'data': 'tanggal'},
                {'data': 'detail','orderable':false,'searchable':false},
                {'data': 'cetaksurat','orderable':false,'searchable':false},
                // {'data': 'hapus','orderable':false,'searchable':false},
              ],
              "order": [[ 1, "desc" ]]
        });

        // function editdistribusi(id_distribusi,nama_stan,tanggal) {
        //     idtoedit = id_distribusi;
        //     $('#modaledit').modal('toggle');
        //     $('#edit_label_data_tujuan').html("Data Pengiriman ("+nama_stan.split('+').join(' ')+")");
        //     tanggal = tanggal.split('-');
        //     // $('#edittanggal_kirim').datetimepicker({
        //     //     format: 'DD/MM/YYYY',
        //     //     useCurrent: false
        //     // });
        //     // $('#edittanggal_kirim').val(tanggal[2]+"/"+tanggal[1]+"/"+tanggal[0]);

        //     editarrayDistribusi = new Array();
        //     ideditlist = 0;


        //     $.ajax({
        //           type:"post",
        //           url: "<?php echo base_url('adminfranchise/get_list_bahan_jadi_distribusi')?>/",
        //           data:{id:id_distribusi},
        //           dataType:"json",
        //           success:function(response)
        //           {

        //             $.each(response, function (i, item) {
        //                 editarrayDistribusi.push({idbahanjadi: ideditlist, namabahanjadi: item.nama_bahan_jadi, jumlah: item.jumlah})
        //                 ideditlist++;
        //             });
        //           },
        //           error: function (jqXHR, textStatus, errorThrown)
        //           {
        //             alert(errorThrown);
        //           },
        //           complete: function (argument) {
        //               sinkrontabeledit();
        //           }
        //       }
        //     );
        //     sinkrontabeledit();


        //     // alert('Fitur sedang dalam tahap pengembangan!');
        // }
            var width = 0;
            var tabeldetail;
        function detaildistribusi(id_distribusi,nama_stan,tanggal) {
            $('#modaldetail').modal('toggle');
            $('#detailtujuan').text(nama_stan.split('+').join(" "));
            $('#detailtanggal').html(uidate(tanggal));
            
            setTimeout(function(){
                 width = $('#detailtujuan').width();  
                 if (width > $('#wadahstan').width()) {

                 } 
            },0);

            if ( $.fn.DataTable.isDataTable( '#detailtabellistbahan' ) ) {
                $('#detailtabellistbahan').DataTable().destroy();
            }

            tabeldetail = $('#detailtabellistbahan').DataTable({
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
                    "url"    : "<?php echo base_url('adminfranchise/get_list_bahan_jadi_distribusi');?>",
                    "data": function(data) {
                      data.id_distribusi = id_distribusi;
                    },
                    "dataSrc": function (json) {
                      var return_data = new Array();

                      for(var i=0;i< json.data.length; i++){
                        return_data.push({
                          'nama_bahan_jadi': json.data[i].nama_bahan_jadi,
                          'jumlah'  : json.data[i].jumlah
                        });
                      }
                        
                      return return_data;
                    }
                  },
                    "lengthChange": true,
                      columns: [
                        {'data': 'nama_bahan_jadi'},
                        {'data': 'jumlah'}
                      ],
                      "order": [[ 0, "asc" ]]
                });
        }


        // function sinkrontabeledit() {
        //     $("#editbodytabel").empty();

        //     $.each(editarrayDistribusi, function (i,item) {
        //         $('#editbodytabel').append(
        //             '<tr><td>'+item.namabahanjadi+'</td><td><input type="text" placeholder="Jumlah" id="'+item.idbahanjadi+'" oninput="cekangkaedit(\''+item.idbahanjadi+'\')" class="form-control numeric" value="'+item.jumlah+'"></td><td><button class="btn btn-danger" onclick="deletebahanjadiedit(\''+item.idbahanjadi+'\')"><i class="fa fa-times"></i></button></td></tr>'
        //         );
        //     });

        //     if (editarrayDistribusi.length == 0) {
        //         $('#editdatakosong').show();
        //     }else{
        //         $('#editdatakosong').hide();
        //     }
        // }

        // function edittambahbahanjadi() {
        //     $('#edit_jumlah').removeClass('is-invalid');

        //     var idbahanjadi = $('#editnama_bahan_jadi').val();
        //     var namabahanjadi = $('#editnama_bahan_jadi option:selected').text();
             
        //     var jumlah = $('#edit_jumlah').val();
        //     var stat = false;

        //     if (jumlah == '') {
        //         $('#edit_jumlah').addClass('is-invalid');
        //     }else{
        //         jumlah = parseInt(jumlah);
        //         $('#edit_jumlah').removeClass('is-invalid');
        //         $('#editdatakosong').hide();

        //         $.each(editarrayDistribusi, function (i,item) {
        //             if (namabahanjadi == item.namabahanjadi) {
        //                 item.jumlah = parseInt(item.jumlah) + jumlah;
        //                 stat = true;
        //             }
        //         });

        //         if (!stat) {
        //             editarrayDistribusi.push({idbahanjadi: ideditlist, namabahanjadi: namabahanjadi, jumlah: jumlah});
        //             ideditlist++;
        //         }

        //         sinkrontabeledit();
        //         $('#edit_jumlah').val('');
        //         console.log(editarrayDistribusi);
        //     }
        // }

        // function cekangkaedit(id) {
        //     $('#'+id).val($('#'+id).val().replace(/[^0-9]/g, ''));
        //     if ($('#'+id).val() == '0' || $('#'+id).val() == '') {
        //         $('#'+id).val('1');
        //     }
        //     //ubah array

        //     $.each(editarrayDistribusi, function (i,item) {
        //         if (id == item.idbahanjadi) {
        //             item.jumlah = parseInt($('#'+id).val());
        //         }
        //     });
        // }

        // function deletebahanjadiedit(id) {
        //     var tempdata = new Array();
        //     console.log(id);
        //     $.each(editarrayDistribusi, function (i,item) {
        //         if (id != item.idbahanjadi) {
        //             tempdata.push({idbahanjadi: item.idbahanjadi, namabahanjadi: item.namabahanjadi, jumlah: item.jumlah});
        //         }
        //     });
        //     editarrayDistribusi = new Array();
        //     editarrayDistribusi = tempdata;
        //     sinkrontabeledit();
        // }

        // function editdistribusifix() {
        //     // $('#edittanggal_kirim').removeClass('is-invalid');
        //     // if ($('#edittanggal_kirim').val() == '') {
        //     //     $('#edittanggal_kirim').addClass('is-invalid');
        //     // }else{
        //         if (editarrayDistribusi.length == 0) {
        //             alert('tidak ada bahan jadi!');
        //         }else{
        //             var nama_stan = $('#edittujuan option:selected').text();
        //             // var tanggal = $('#edittanggal_kirim').val();
        //             // var tanggal = tanggal.split('/');
        //             var tanggal = date('Y-m-d');
        //             // tanggal = tanggal[2]+"-"+tanggal[1]+"-"+tanggal[0];

        //             $.ajax({
        //                   type:"post",
        //                   url: "<?php echo base_url('adminfranchise/saveUpdateDistribusi')?>/",
        //                   data:{
        //                     id_distribusi:idtoedit,
        //                     namastan:nama_stan,
        //                     tanggal:tanggal,
        //                     editarrayDistribusi:JSON.stringify(editarrayDistribusi)
        //                   },
        //                   dataType:"text",
        //                   success:function(response)
        //                   {
        //                     if (response == 'true') {
        //                         alert('sudah disimpan!');

        //                         // $('#edittanggal_kirim').val('');
        //                         $('#editjumlah').val('');
        //                         editarrayDistribusi = new Array();
        //                         sinkrontabeledit();
        //                         $('#modaledit').modal('toggle');
        //                         reload_table();

        //                     }else{
        //                         console.log(response);
        //                         alert('sambungan internet bermasalah, coba lagi!');
        //                     }
        //                   },
        //                   error: function (jqXHR, textStatus, errorThrown)
        //                   {
        //                     alert(errorThrown);
        //                   }                      
        //               }
        //             );
        //         }
                
        //     // }
        // }

        function cetaksurat(id_distribusi,tujuan,tanggal) {
            var isFirefox = typeof InstallTrigger !== 'undefined';
            var isIE = /*@cc_on!@*/false || !!document.documentMode;
            var isEdge = !isIE && !!window.StyleMedia;
            var image = getimageteabreak();

            var doc = new jsPDF("p", "pt", "a4");

            doc.setFontSize(25);
            doc.setFontStyle('bold');
            doc.addImage(image, 'JPEG',297-83, 5, 165, 69,'center');
            doc.text('Surat Jalan',297,90,'center');

            doc.setFontSize(15)
            doc.text('Hari, Tanggal : '+uidate(tanggal),50,135)
            doc.text('Tujuan            : '+tujuan.split("+").join(" "),50,165)

            doc.text('(..........................)',149.75,780,'center')
            doc.text('(..........................)',297.5,780,'center')
            doc.text('(..........................)',446.25,780,'center')
            doc.text('Gudang',149.75,800,'center')
            doc.text('Pengirim',297.5,800,'center')
            doc.text('Pnerima',446.25,800,'center')

            var columns = [
                {title: "Nama Bahan Jadi", dataKey: "nama"},
                {title: "Jmlh", dataKey: "jumlah"},
                {title: "Check", dataKey: "check"},
            ];

            var columns1 = [
                {title: "Nama Bahan Jadi", dataKey: "nama1"},
                {title: "Jmlh", dataKey: "jumlah1"},
                {title: "Check", dataKey: "check1"},
            ];
            var rows;
            var rows1;
            $.ajax({
                      type:"post",
                      url: "<?php echo base_url('adminfranchise/get_list_bahan_jadi_distribusi_cetak')?>/",
                      data:{ id:id_distribusi},
                      dataType: 'json',
                      success:function(response)
                      {
                        rows = new Array();
                        rows1 = new Array();
                        var jumlahbaris = 0;
                        console.log(response);
                        $.each(response, function (i, item) {
                            if (i<15) {
                                rows.push({"nama": item.nama_bahan_jadi, "jumlah": item.jumlah});
                            }else{
                                rows1.push({"nama1": item.nama_bahan_jadi, "jumlah1": item.jumlah});
                            }
                            jumlahbaris = i;
                        });

                        for (var i = 30; i >= jumlahbaris; i--) {
                            if (i<15) {
                                rows.push({"nama": "", "jumlah": ""});
                            }else{
                                rows1.push({"nama1": "", "jumlah1": ""});    
                            }
                        }
                            
                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                        alert(errorThrown);
                      },
                      complete : function (argument) {
                            doc.autoTable(columns, rows, {
                            theme: 'grid',
                            styles: {
                                // halign: 'center'
                                fontSize: 11,
                            },
                            columnStyles: {
                                nama: {columnWidth: 170},
                                jumlah: {columnWidth: 40,halign: 'center'},
                                check: {columnWidth: 45},
                            },
                            margin: {top: 190,left: 45},
                            addPageContent: function(data) {
                                // doc.text("Header", 40, 30);
                            }
                        });

                        doc.autoTable(columns1, rows1, {
                            theme: 'grid',
                            styles: {
                                fontSize: 11,
                            },
                            columnStyles: {
                                nama1: {columnWidth: 170},
                                jumlah1: {columnWidth: 40,halign: 'center'},
                                check1: {columnWidth: 45},
                            },
                            margin: {top: 190,left: 305},
                            addPageContent: function(data) {
                                // doc.text("Header", 40, 30);
                            }
                        });

                         doc.autoPrint();
            
                        if (isFirefox) {
                            window.open(doc.output('bloburl'), '_blank');
                        }else{
                            document.getElementById("myFrame").src = doc.output('bloburl');
                        }
                      }
                  }
              );
           
            // alert('Fitur sedang dalam tahap pengembangan!');
        }

        function hapusdistribusi(id_distribusi) {
            if(confirm('Apakah anda yakin ingin menghapus data ini??')){
              $.ajax({
                      type:"post",
                      url: "<?php echo base_url('adminfranchise/delete_distribusi')?>/",
                      data:{ id:id_distribusi},
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

        function reload_table() {
            tabeldata.ajax.reload();
        }

        function tambahbahanjadi() {
            $('#jumlah').removeClass('is-invalid');

            var idbahanjadi = $('#nama_bahan_jadi').val();
            var namabahanjadi = $('#nama_bahan_jadi option:selected').text();
             
            var jumlah = $('#jumlah').val();
            var stat = false;

            if (jumlah == '') {
                $('#jumlah').addClass('is-invalid');
            }else{
                jumlah = parseInt(jumlah);
                $('#jumlah').removeClass('is-invalid');
                $('#datakosong').hide();

                $.each(arrayDistribusi, function (i,item) {
                    if (idbahanjadi == item.idbahanjadi) {
                        item.jumlah = parseInt(item.jumlah) + jumlah;
                        stat = true;
                    }
                });

                if (!stat) {
                    arrayDistribusi.push({idbahanjadi: idbahanjadi, namabahanjadi: namabahanjadi, jumlah: jumlah})
                }

                sinkrontabel();
                $('#jumlah').val('');
            }
        }

        function deletebahanjadi(id) {
            var tempdata = new Array();
            $.each(arrayDistribusi, function (i,item) {
                if (id != item.idbahanjadi) {
                    tempdata.push({idbahanjadi: item.idbahanjadi, namabahanjadi: item.namabahanjadi, jumlah: item.jumlah});
                }
            });
            arrayDistribusi = new Array();
            arrayDistribusi = tempdata;
            sinkrontabel();
        }

        function dataModal() {

            // $('#tanggal_kirim').datetimepicker({
            //     format: 'DD/MM/YYYY',
            //     useCurrent: false
            // });
        }

        function tambahdistribusi() {
            
            // $('#tanggal_kirim').removeClass('is-invalid');
            // if ($('#tanggal_kirim').val() == '') {
            //     $('#tanggal_kirim').addClass('is-invalid');
            // }else{
                if (arrayDistribusi.length == 0) {
                    alert('tidak ada bahan jadi!');
                }else{
                    var nama_stan = $('#tujuan option:selected').text();
                    // var tanggal = $('#tanggal_kirim').val();
                    // tanggal = tanggal.split('/');
                    // tanggal = tanggal[2]+"-"+tanggal[1]+"-"+tanggal[0];
                    var d = new Date();
                    var bulan = '';
                    var tanggal = '';
                    if (d.getMonth()+1 < 10) {
                        bulan = "0"+(d.getMonth()+1);
                    }else{
                        bulan = ""+(d.getMonth()+1);
                    }

                    if (d.getDate() < 10) {
                        tanggal = "0"+d.getDate();
                    }else{
                        tanggal = ""+d.getDate();
                    }

                    var tanggal = d.getFullYear()+"/"+bulan+"/"+tanggal;

                    $.ajax({
                          type:"post",
                          url: "<?php echo base_url('adminfranchise/saveDistribusi')?>/",
                          data:{
                            namastan:nama_stan,
                            tanggal:tanggal,
                            arrayDistribusi:JSON.stringify(arrayDistribusi)
                          },
                          dataType:"text",
                          success:function(response)
                          {
                            if (response == 'true') {
                                alert('sudah disimpan!');

                                // $('#tanggal_kirim').val('');
                                $('#jumlah').val('');
                                arrayDistribusi = new Array();
                                sinkrontabel();
                                $('#modaltambah').modal('toggle');
                                reload_table();

                            }else{
                                console.log(response);
                                alert('sambungan internet bermasalah, coba lagi!');
                            }
                          },
                          error: function (jqXHR, textStatus, errorThrown)
                          {
                            alert(errorThrown);
                          }                      }
                    );
                }
                
            // }
        }

        function sinkrontabel() {
            $("#bodytabel").empty();

            $.each(arrayDistribusi, function (i,item) {
                $('#bodytabel').append(
                    '<tr><td>'+item.namabahanjadi+'</td><td><input type="text" placeholder="Jumlah" id="'+item.idbahanjadi+'" oninput="cekangka(\''+item.idbahanjadi+'\')" class="form-control numeric" value="'+item.jumlah+'"></td><td><button class="btn btn-danger" onclick="deletebahanjadi(\''+item.idbahanjadi+'\')"><i class="fa fa-times"></i></button></td></tr>'
                );
            });

            if (arrayDistribusi.length == 0) {
                $('#datakosong').show();
            }
        }

        function cekangka(id) {
            $('#'+id).val($('#'+id).val().replace(/[^0-9]/g, ''));
            if ($('#'+id).val() == '0' || $('#'+id).val() == '') {
                $('#'+id).val('1');
            }
            //ubah array

            $.each(arrayDistribusi, function (i,item) {
                if (id == item.idbahanjadi) {
                    item.jumlah = parseInt($('#'+id).val());
                }
            });

            // sinkrontabel();
        }
    </script>

</body>
</html>