        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Master Bahan Jadi</h1>
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
                            <strong class="card-title">Tambah Bahan Jadi</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="id" class=" form-control-label">Kode Bahan Jadi</label>
                                            <input type="text" id="id" placeholder="Masukkan Kode Barang" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nama" class=" form-control-label">Nama Bahan Jadi</label>
                                            <input type="text" id="nama" placeholder="Masukkan Nama Barang" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            
                                            <div class="input-group-btn"><button onclick="tambahbahanjadi()" class="btn btn-success">Tambah Bahan Jadi</button></div>
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
                            <strong class="card-title">Data Bahan Jadi</strong>
                        </div>
                        <div class="card-body">
                          <table id="mytable" class="table table-striped table-bordered" style="width: 100%" width="100%">
                            <thead>
                              <tr>
                                <th>ID Bahan Jadi</th>
                                <th>Nama Bahan Jadi</th>
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
    

    <script src=<?php echo base_url("assets/js/jquery.easy-autocomplete.js")?>></script>
    <script type="text/javascript">
        function tambahbahanjadi(){
            var id = $("#id").val();
            var nama = $("#nama").val();
            if (id.replace(/\s/g, '').length>0&&nama.replace(/\s/g, '').length>0) {
                $.ajax(
                    {
                        type:"post",
                        url: "<?php echo base_url('superadminfranchise/tambahbahanjadi')?>/",
                        data:{ id:id,nama:nama},
                        success:function(response)
                        {
                          if(response == 'Berhasil Ditambahkan'){
                            reload_table();
                            if($('#id').has("error")){
                              $('#id').removeClass("error");
                            }
                            if($('#nama').has("error")){
                              $('#nama').removeClass("error");
                            }

                            $("#id").val('');
                            $("#nama").val('');

                            $("#id").focus();
                            alert(response);
                          }else if(response =='ID Data Sudah ada di dalam database'){

                            $('#id').addClass("error");
                            
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
                if (id.replace(/\s/g, '').length<=0) {
                    $('#id').addClass("error");
                }else{
                    if($('#id').has("error")){
                        $('#id').removeClass("error");
                    }
                }

                if (nama.replace(/\s/g, '').length<=0) {
                    $('#nama').addClass("error");
                }else{
                    if($('#nama').has("error")){
                        $('#nama').removeClass("error");
                    }
                }

                alert("Silahkan periksa kembali inputan anda!");
            }
          }

          function edit_bahanjadi(id){
            $.ajax({
                  type:"post",
                  url: "<?php echo base_url('superadminfranchise/select_edit_bahanjadi')?>/",
                  data:{ id:id},
                  dataType:"json",
                  success:function(response)
                  {
                    $("#editid").val(response[0].id_bahan_jadi);
                    $("#id_lama").val(response[0].id_bahan_jadi);
                    $("#editnama").val(response[0].nama_bahan_jadi);
                    $("#modal_edit").modal('show');
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                    alert(errorThrown);
                  }
              }
            );
          }

          function delete_bahanjadi(id){
             if(confirm('Apakah anda yakin ingin menghapus data ini??')){
              $.ajax({
                      type:"post",
                      url: "<?php echo base_url('superadminfranchise/delete_bahanjadi')?>/",
                      data:{ id:id},
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

          function simpaneditbahanjadi(){
                var id = $("#editid").val();
                var idlama = $("#id_lama").val();
                var nama =  $("#editnama").val();
                if (id.replace(/\s/g, '').length>0&&nama.replace(/\s/g, '').length>0) {
                $.ajax({
                      type:"post",
                      url: "<?php echo base_url('superadminfranchise/edit_bahanjadi')?>/",
                      data:{ id:id,nama:nama,idlama:idlama},
                      success:function(response)
                      {
                        if(response == 'Berhasil Diupdate'){
                          $("#modal_edit").modal('hide');
                          if($('#editid').has("error")){
                            $('#editid').removeClass("error");
                          }
                          if($('#editnama').has("error")){
                            $('#editnama').removeClass("error");
                          }
                          reload_table();
                          alert(response);
                        }else if(response=='Update Error! ID Data Sudah ada di dalam database'){

                          $('#editid').addClass("error");
                          alert(response);
                        }else{
                          alert('unknown error is happen! try again.');
                        }
                        
                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                        alert(errorThrown);
                      }
                  });
                }else{
                  if (id.replace(/\s/g, '').length<=0) {
                    $('#editid').addClass("error");
                  }else{
                    if($('#editid').has("error")){
                      $('#editid').removeClass("error");
                    }
                  }
                  if (nama.replace(/\s/g, '').length<=0) {
                    $('#editnama').addClass("error");
                  }else{
                    if($('#editnama').has("error")){
                      $('#editnama').removeClass("error");
                    }
                  }
                  alert("Silahkan periksa kembali inputan anda!");
                }
              }


            jQuery( document ).ready(function( $ ) {
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
                    "url"    : "<?php echo base_url('superadminfranchise/bahanjadi_data');?>",
                    "dataSrc": function (json) {
                      var return_data = new Array();
                      for(var i=0;i< json.data.length; i++){
                        return_data.push({
                          'id_bahan_jadi': json.data[i].id_bahan_jadi,
                          'nama_bahan_jadi'  : json.data[i].nama_bahan_jadi,
                          'edit' : '<button onclick=edit_bahanjadi("'+json.data[i].id_bahan_jadi+'") class="btn btn-warning" style="color:white;">Edit</button> ',
                          'hapus' : '<button onclick=delete_bahanjadi("'+json.data[i].id_bahan_jadi+'") class="btn btn-danger" style="color:white;">Delete</button>'
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
                    {'data': 'id_bahan_jadi'},
                    {'data': 'nama_bahan_jadi'},
                    {'data': 'edit','orderable':false,'searchable':false},
                    {'data': 'hapus','orderable':false,'searchable':false}
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