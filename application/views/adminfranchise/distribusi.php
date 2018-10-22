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
                                        <th>Edit</th>
                                        <th>Cetak Surat</th>
                                        <th>Hapus</th>
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
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class=" form-control-label">Tanggal Kirim</label>
                                <input type="text" id="tanggal_kirim" placeholder="Tanggal Distribusi" class="form-control">
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
                                <col width="20%">
                                <col width="40%">
                                <col width="25%">
                                <col width="15%">
                                <thead>
                                  <tr>
                                    <th>ID Bahan Jadi</th>
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
    <script src=<?php echo base_url("assets/vendors/select2-4.0.1/select2-4.0.1/dist/js/select2.js")?>></script>
    

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

        $('.numeric').on('input', function (event) { 
            this.value = this.value.replace(/[^0-9]/g, '');
        });

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
                  'edit' : '<button onclick=editdistribusi("'+json.data[i].id_distribusi+'") class="btn btn-warning"><b>Detail/Edit</b></button> ',
                  'cetaksurat' : '<button onclick=cetaksurat("'+json.data[i].id_distribusi+'") class="btn btn-primary"><b>Cetak Surat</b></button> ',
                  'hapus' : '<button onclick=hapusdistribusi("'+json.data[i].id_distribusi+'") class="btn btn-danger"><b>Hapus</b></button> ',
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
                {'data': 'edit','orderable':false,'searchable':false},
                {'data': 'cetaksurat','orderable':false,'searchable':false},
                {'data': 'hapus','orderable':false,'searchable':false},
              ],
        });

        function editdistribusi(id_distribusi) {
            alert('Fitur sedang dalam tahap pengembangan!');
        }

        function cetaksurat(id_distribusi) {
            alert('Fitur sedang dalam tahap pengembangan!');
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

            $('#tanggal_kirim').datetimepicker({
                format: 'DD/MM/YYYY',
                useCurrent: false
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
                        }else{
                            $('#tujuan').append($('<option>', {
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
                        }else{
                            $('#nama_bahan_jadi').append($('<option>', {
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
                  }
              }
            );


        }

        function tambahdistribusi() {
            
            $('#tanggal_kirim').removeClass('is-invalid');
            if ($('#tanggal_kirim').val() == '') {
                $('#tanggal_kirim').addClass('is-invalid');
            }else{
                if (arrayDistribusi.length == 0) {
                    alert('tidak ada bahan jadi!');
                }else{
                    var nama_stan = $('#tujuan option:selected').text();
                    var tanggal = $('#tanggal_kirim').val();
                    tanggal = tanggal.split('/');
                    tanggal = tanggal[2]+"-"+tanggal[1]+"-"+tanggal[0];

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

                                $('#tanggal_kirim').val('');
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
                
            }
        }

        function sinkrontabel() {
            $("#bodytabel").empty();

            $.each(arrayDistribusi, function (i,item) {
                $('#bodytabel').append(
                    '<tr><td>'+item.idbahanjadi+'</td><td>'+item.namabahanjadi+'</td><td><input type="text" placeholder="Jumlah" id="'+item.idbahanjadi+'" oninput="cekangka(\''+item.idbahanjadi+'\')" class="form-control numeric" value="'+item.jumlah+'"></td><td><button class="btn btn-danger" onclick="deletebahanjadi(\''+item.idbahanjadi+'\')"><i class="fa fa-times"></i></button></td></tr>'
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