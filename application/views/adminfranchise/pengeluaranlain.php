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
                            <strong class="card-title">Tambah Pengeluaran</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="id" class=" form-control-label">Keterangan</label>
                                            <input type="text" id="keterangan" placeholder="Masukkan Keterangan" class="form-control">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nama" class=" form-control-label">Jumlah Pengeluaran</label>
                                            <input type="text" id="jumlah" placeholder="Masukkan Jumlah Pengeluaran" class="form-control numeric">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama" class=" form-control-label">Action</label>
                                            <div class="form-group-btn "><button onclick="tambahpengeluaran()" class="btn btn-success ">Tambah Pengeluaran</button></div>
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
                            <strong class="card-title">Data Pengeluaran</strong>
                        </div>
                        <div class="card-body">
                          <table id="mytable" class="table table-striped table-bordered" style="width: 100%" width="100%">
                            <thead>
                              <tr>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Jumlah Pengeluaran</th>
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="editid" class=" form-control-label">Keterangan</label>
                            <textarea class="form-control" rows="5" id="editket" placeholder="Keterangan"></textarea>
                            <input type="hidden" name="id_lama" id="id_lama">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="editid" class=" form-control-label">Pengeluaran</label>
                            <input type="text" id="editpeng" placeholder="Masukkan Pengeluaran" class="form-control numeric">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                <button type="button" onclick="simpanedit()" class="btn add_field_button btn-info">Simpan</button>
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

        var tabeldata;
        $('.numeric').on('input', function (event) { 
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        function tambahpengeluaran() {

            if ($('#keterangan').val()=='') {
                $('#keterangan').addClass('is-invalid');
            }

            if ($('#jumlah').val()=='') {
                $('#jumlah').addClass('is-invalid');
            }

            if ($('#keterangan').val() != '' || $('#jumlah').val() != ''){
                var keterangan = $('#keterangan').val();
                var jumlah = $('#jumlah').val();

                $.ajax(
                    {
                        type:"post",
                        url: "<?php echo base_url('adminfranchise/tambah_pengeluaran_lain')?>/",
                        data:{ keterangan:keterangan,jumlahpengeluaran:jumlah},
                        success:function(response)
                        {
                             $("#keterangan").val('');
                            $("#jumlah").val('');
                            reload_table();

                          if(response == 'Berhasil Ditambahkan'){
                            
                            
                            if($('#keterangan').has("is-invalid")){
                              $('#keterangan').removeClass("is-invalid");
                            }

                            if($('#jumlah').has("is-invalid")){
                              $('#jumlah').removeClass("is-invalid");
                            }

                            $("#keterangan").focus();

                            alert(response);
                          }else if(response =='Data telah di update!.'){
                            
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
            "url"    : "<?php echo base_url('adminfranchise/getpengeluaranlain');?>",
            "dataSrc": function (json) {
              var return_data = new Array();
              var shift;
              for(var i=0;i< json.data.length; i++){
                return_data.push({
                  'tanggal': uidate(json.data[i].tanggal),
                  'keterangan': json.data[i].keterangan,
                  'pengeluaran'  : "Rp. "+currency(json.data[i].pengeluaran)+",-",
                  'edit' : '<button onclick="editpengeluaran(\''+json.data[i].id_pengeluaran+'\',\''+json.data[i].keterangan+'\',\''+json.data[i].pengeluaran+'\')" class="btn btn-warning" >Edit</button> ',
                  'delete' : '<button onclick="deletepengeluaran(\''+json.data[i].id_pengeluaran.split(' ').join('+')+'\')" class="btn btn-danger">Delete</button> '
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
                    filename: 'Pengeluaran Lain Gudang',
                    exportOptions: {
                      columns:[0,1,2]
                    }
                },{
                    extend: 'excelHtml5',
                    text: 'Excel',
                    className: 'exportExcel',
                    filename: 'Pengeluaran Lain Gudang',
                    exportOptions: {
                      columns:[0,1,2]
                    }
                },{
                    extend: 'csvHtml5',
                    filename: 'Pengeluaran Lain Gudang',
                    exportOptions: {
                      columns:[0,1,2]
                    }
                },{
                    extend: 'pdfHtml5',
                    filename: 'Pengeluaran Lain Gudang',
                    exportOptions: {
                      columns:[0,1,2]
                    }
                },{
                    extend: 'print',
                    filename: 'Pengeluaran Lain Gudang',
                    exportOptions: {
                      columns:[0,1,2]
                    }
                }
            ],
            "lengthChange": true,
              columns: [
                {'data': 'tanggal'},
                {'data': 'keterangan'},
                {'data': 'pengeluaran'},
                {'data': 'edit','orderable':false,'searchable':false},
                {'data': 'delete','orderable':false,'searchable':false},
              ],
        });

        function reload_table(){
          tabeldata.ajax.reload();
        }

        function editpengeluaran(id,keterangan,pengeluaran) {
          $('#modal_edit').modal('toggle');
          $('#editket').val(keterangan.split('-').join('\n'));
          $('#editpeng').val(pengeluaran);
          $('#id_lama').val(id);
        }

        function deletepengeluaran(id) {
          if(confirm('Apakah anda yakin ingin menghapus data ini??')){
            $.ajax({
                    type:"post",
                    url: "<?php echo base_url('adminfranchise/delete_pengeluaran')?>/",
                    data:{ id:id,sst:'sinkron'},
                    success:function(response)
                    {
                        if (response == 'ERROR') {
                          alert('Pastikan anda terhubung dengan internet!');
                        }else if (response == 'SUCCESSSAVE') {
                          alert('Data Berhasil Dihapus!');
                          reload_table();
                        }else{
                          alert('Error! Coba lagi nanti!');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                      alert(errorThrown);
                    }
                }
            );
          }
        }

        function simpanedit() {
          var keteranganbaru = $('#editket').val().split('\n').join('-');
          var pengeluaranbaru = $('#editpeng').val();
          var id_pengeluaran = $('#id_lama').val();
          var shiftbaru = $('#shift').val();

          if (keteranganbaru == '' || pengeluaranbaru == '') {
            if (keteranganbaru == '') {
              $('#editket').addClass('is-invalid');
            }

            if (pengeluaranbaru == '') {
              $('#editpeng').addClass('is-invalid');
            }

            alert('Periksa Kembali inputan anda');
          }else{
            console.log(id_pengeluaran);
            $.ajax(
                {
                    type:"post",
                    url: "<?php echo base_url('adminfranchise/edit_pengeluaran_lain')?>/",
                    data:{ keteranganbaru:keteranganbaru,pengeluaranbaru:pengeluaranbaru,id_pengeluaran:id_pengeluaran,shiftbaru:shiftbaru},
                    success:function(response)
                    {
                      reload_table();

                      if(response == 'Berhasil Diupdate'){
                        
                        
                        if($('#editket').has("is-invalid")){
                          $('#editket').removeClass("is-invalid");
                        }

                        if($('#editpeng').has("is-invalid")){
                          $('#editpeng').removeClass("is-invalid");
                        }

                        $('#modal_edit').modal('toggle');

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
          }

        }
    </script>

</body>
</html>