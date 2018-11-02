 <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Gaji Bonus Stan</h1>
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
                            <strong class="card-title">Tambah Bonus</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="id" class=" form-control-label">Nama Stan</label>
                                            <select class="form-control" id="namastan"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="nama" class=" form-control-label">Omset Minimal</label>
                                            <input type="text" id="omset" placeholder="Minimum Omset" class="form-control numeric">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="id" class=" form-control-label">Bonus ( dalam % )</label>
                                            <input type="text" id="persentase" placeholder="Persentase Bonus" class="form-control numeric_persen">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="id" class=" form-control-label">Action</label>
                                            <button onclick="tambahbonus()" class="btn btn-success form-control">Tambah Bonus</button>
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
                            <strong class="card-title">Data Gaji Bonus</strong>
                        </div>
                        <div class="card-body">
                          <table id="mytable" class="table table-striped table-bordered" style="width: 100%" width="100%">
                            <thead>
                              <tr>
                                <th>ID Stan</th>
                                <th>Nama Stan</th>
                                <th>Omset Minimal</th>
                                <th>Bonus ( % )</th>
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
                    <div class="header modal-header">
                        <h4 class="modal-title">Edit</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="editid" class=" form-control-label">Kode Bahan Jadi</label>
                                    <input type="text" id="editid" placeholder="Masukkan Kode Barang" class="form-control">
                                    <input type="hidden" name="id_lama" id="id_lama">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="editnama" class=" form-control-label">Nama Bahan Jadi</label>
                                    <input type="text" id="editnama" placeholder="Masukkan Nama Barang" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                        <button type="button" onclick="simpaneditbahanjadi()" class="btn add_field_button btn-info">Simpan</button>
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
    <script src=<?php echo base_url("assets/js/lib/chosen/chosen.jquery.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/dataTables.buttons.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/buttons.print.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/buttons.html5.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/buttons.flash.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/JSZip-2.5.0/jszip.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/pdfmake-0.1.36/pdfmake.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/pdfmake-0.1.36/vfs_fonts.js")?>></script>
    

    <script src=<?php echo base_url("assets/js/jquery.easy-autocomplete.js")?>></script>

    <script type="text/javascript">
        $(document).ready(function() {
            jQuery(document).ready(function() {
                jQuery("#namastan").chosen({
                    disable_search_threshold: 10,
                    no_results_text: "Oops, nothing found!",
                    width: "100%"
                });
            });
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
                        htmlinsideselect = htmlinsideselect + '<option selected="selected" value="'+item.id_stan+'">'+item.nama_stan +' ( '+item.alamat+' )' +'</option>';
                    }else{
                        htmlinsideselect = htmlinsideselect + '<option value="'+item.id_stan+'">'+item.nama_stan +' ( '+item.alamat+' )' +'</option>';
                    }
                    
                });
                $("#namastan").html(htmlinsideselect);
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown);
              },
              complete: function (argument) {
                  $('#namastan').trigger("chosen:updated");
                  var id_stan = $('#namastan').val();
                  var tanggal_rekap = $('#tanggalrekap').val();
                    // alert(id_stan);
                    // ajaxSetData(id_stan,tanggal_rekap);
              }
          }
        );

            $('.numeric').on('input', function (event) { 
                this.value = this.value.replace(/[^0-9]/g, '');
                
            });

            $('.numeric_persen').on('input', function (event) { 
                this.value = this.value.replace(/[^.0-9]/g, '');
                if ($(this).val().indexOf('.') == 0) {
                  $(this).val($(this).val().substring(1));
                }
                if ($(this).val().length > 1) {
                    if ($(this).val().charAt(0) == '0') {
                        if ($(this).val().charAt(1) != '.') {
                            $(this).val($(this).val().slice(0,-1));
                        }
                    }
                }

                if ($(this).val().split(".").length > 2) {
                    this.value = this.value.slice(0,-1);
                }

                if ($(this).val()>100) {
                    this.value = 100;
                }
            });

            function tambahbonus() {
                var persen = $("#persentase").val();
                var idstan = $("#namastan").val();
                var omset = $("#omset").val();

                $("#persentase").removeClass("is-invalid");
                $("#omset").removeClass("is-invalid");
                
                if (persen == '') {
                    $("#persentase").addClass("is-invalid");
                }

                if (omset == '') {
                    $("#omset").addClass("is-invalid");
                }

                if (omset!= '' && persen!= '') {
                    $.ajax({
                          type:"post",
                          url: "<?php echo base_url('superadminfranchise/savegajibonus')?>/",
                          data:{
                            persen:persen,
                            idstan:idstan,
                            omset:omset
                          },
                          dataType:"text",
                          success:function(response)
                          {
                            if (response == 'sukses') {
                                reload_table();
                                $("#persentase").val('');
                                $("#omset").val('');
                                alert('Data Berhasil ditambahkan!');
                            }else{
                                alert('Data gagal disimpan. periksa koneksi internet anda!');
                            }
                          },
                          error: function (jqXHR, textStatus, errorThrown)
                          {
                            alert('periksa koneksi internet anda!');
                          },
                          complete: function (argument) {

                          }
                      }
                    );
                }
            }


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
                    "url"    : "<?php echo base_url('superadminfranchise/datatablegajibonus');?>",
                    "dataSrc": function (json) {
                      var return_data = new Array();

                      for(var i=0;i< json.data.length; i++){

                        return_data.push({
                          'id_stan':json.data[i].id_stan,
                          'nama_stan': json.data[i].nama_stan,
                          'omset_minimal': json.data[i].omset_minimal,
                          'bonus'  : json.data[i].persentase_bonus,
                          'edit' : '<button onclick="edit(\''+json.data[i].keterangan+'\',\''+json.data[i].no_nota+'\')" class="btn btn-primary">Edit</button> ',
                          // .split(' ').join('+')
                          'delete' : '<button onclick="delete(\''+json.data[i].keterangan+'\',\''+json.data[i].no_nota+'\')" class="btn btn-primary">Delete</button> '
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
                            filename: 'Gaji Bonus Stan',
                            exportOptions: {
                              columns:[0,1,2,3]
                            }
                        },{
                            extend: 'excelHtml5',
                            text: 'Excel',
                            className: 'exportExcel',
                            filename: 'Gaji Bonus Stan',
                            exportOptions: {
                              columns:[0,1,2,3]
                            }
                        },{
                            extend: 'csvHtml5',
                            filename: 'Gaji Bonus Stan',
                            exportOptions: {
                              columns:[0,1,2,3]
                            }
                        },{
                            extend: 'pdfHtml5',
                            filename: 'Gaji Bonus Stan',
                            exportOptions: {
                              columns:[0,1,2,3]
                            }
                        },{
                            extend: 'print',
                            filename: 'Gaji Bonus Stan',
                            exportOptions: {
                              columns:[0,1,2,3]
                            }
                        }
                    ],
                    "lengthChange": true,
                      columns: [
                      {'data':'id_stan'},
                        {'data': 'nama_stan'},
                        {'data': 'omset_minimal'},
                        {'data': 'bonus'},
                        {'data': 'edit',searchable:false,orderable:false},
                        {'data': 'delete',searchable:false,orderable:false}
                      ],
                      "order": [[ 1, "desc" ]]
                });

                function reload_table(){
                  tabeldata.ajax.reload();
                }
    </script>

</body>
</html>