        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Stok Keluar</h1>
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
                            <div class="card-header">
                                <strong class="card-title">Tambah Stock Keluar</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nama_bahan" class=" form-control-label">Nama Bahan Jadi</label>
                                            <select id="nama_bahan" class="">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tgl" style="position: relative; z-index: 100000;" class=" form-control-label">Tanggal</label>
                                            <input type="text" id="tgl" placeholder="Masukkan Tanggal" class="form-control" disabled="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="jumlah" class=" form-control-label">Jumlah</label>
                                            <input type="text" id="jumlah" placeholder="Masukkan Jumlah Bahan Jadi" class="form-control numeric">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="keterangan" class=" form-control-label">Keterangan</label>
                                            <input type="text" id="keterangan" placeholder="Masukkan Keterangan" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <button onclick="tambahstockkeluar()" class="btn btn-success">Tambah Stock Keluar</button>
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
                            <div class="card-header">
                                <strong class="card-title">List Stock Keluar</strong>
                            </div>
                            <div class="card-body">
                              <table id="mytable" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Kode Bahan Jadi</th>
                                    <th>Nama Bahan Jadi</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
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

        $(document).ready(function() {
            jQuery(document).ready(function() {
                jQuery("#nama_bahan").chosen({
                    disable_search_threshold: 10,
                    no_results_text: "Oops, nothing found!",
                    width: "100%"
                });
            });

        });

        $.ajax({
              type:"post",
              url: "<?php echo base_url('superadminfranchise/get_list_bahan_jadi')?>/",
              data:{},
              dataType:"json",
              success:function(response)
              {

                $.each(response, function (i, item) {
                    if (i==0) {
                        $('#nama_bahan').append($('<option>', {
                            value: item.id_bahan_jadi,
                            text: item.nama_bahan_jadi,
                            selected: "selected"
                        }));
                    }else{
                        $('#nama_bahan').append($('<option>', {
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
                  $('#nama_bahan').trigger("chosen:updated");
              }
          }
        );

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
                "url"    : "<?php echo base_url('adminfranchise/datatablestokkeluar');?>",
                "dataSrc": function (json) {
                  var return_data = new Array();
                  var tanggal = '';
                  var jam = '';
                  var tanggal_all ='';

                  for(var i=0;i< json.data.length; i++){
                    tanggal_all = json.data[i].tanggal_jam;
                    tanggal = (tanggal_all.split(" "))[0];
                    jam = (tanggal_all.split(" "))[1];
                    return_data.push({
                      'tanggal_jam': uidate(tanggal),
                      'waktu' : jam,
                      'id_bahan_jadi'  : json.data[i].id_bahan_jadi,
                      'nama_bahan_jadi' : json.data[i].nama_bahan_jadi,
                      'keterangan' : json.data[i].keterangan,
                      'jumlah' : json.data[i].jumlah
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
                        filename: 'Stok Keluar Gudang',
                        exportOptions: {
                          columns:[0,1,2,3,4,5]
                        }
                    },{
                        extend: 'excelHtml5',
                        text: 'Excel',
                        className: 'exportExcel',
                        filename: 'Stok Keluar Gudang',
                        exportOptions: {
                          columns:[0,1,2,3,4,5]
                        }
                    },{
                        extend: 'csvHtml5',
                        filename: 'Stok Keluar Gudang',
                        exportOptions: {
                          columns:[0,1,2,3,4,5]
                        }
                    },{
                        extend: 'pdfHtml5',
                        filename: 'Stok Keluar Gudang',
                        exportOptions: {
                          columns:[0,1,2,3,4,5]
                        }
                    },{
                        extend: 'print',
                        filename: 'Stok Keluar Gudang',
                        exportOptions: {
                          columns:[0,1,2,3,4,5]
                        }
                    }
                ],
                "lengthChange": true,
                  columns: [
                    {'data': 'tanggal_jam'},
                    {'data': 'waktu'},
                    {'data': 'id_bahan_jadi'},
                    {'data': 'nama_bahan_jadi'},
                    {'data': 'keterangan'},
                    {'data': 'jumlah'}
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
        this.value = this.value.replace(/[^.0-9]/g, '');
        if ($(this).val().indexOf('.') == 0) {
              $(this).val($(this).val().substring(1));
            }

            if ($(this).val().indexOf('0') == 0) {
              $(this).val($(this).val().substring(1));
            }

            if ($(this).val().split(".").length > 2) {
                this.value = this.value.slice(0,-1);
            }
    });

    function tambahstockkeluar()
    {
        var id = $("#nama_bahan").val();
        var nama = $("#nama_bahan option:selected").text();
        var keterangan = $("#keterangan").val();
        var jumlah = $("#jumlah").val();
        var tgl = $("#tgl").val();
        if (tgl.replace(/\s/g, '').length>0&&nama.replace(/\s/g, '').length>0&&jumlah.replace(/\s/g, '').length>0&&keterangan.replace(/\s/g, '').length>0) {
            $.ajax(
                {
                    type:"post",
                    url: "<?php echo base_url('adminfranchise/tambahstokkeluargudang')?>/",
                    data:{ tgl:tgl,id:id,jumlah:jumlah,keterangan:keterangan,nama:nama},
                    success:function(response)
                    {
                      if(response == 'Berhasil Ditambahkan'){
                        reload_table();
                        if($('#nama_bahan').has("is-invalid")){
                          $('#nama_bahan').removeClass("is-invalid");
                        }
                        if($('#jumlah').has("is-invalid")){
                          $('#jumlah').removeClass("is-invalid");
                        }
                        if($('#keterangan').has("is-invalid")){
                          $('#keterangan').removeClass("is-invalid");
                        }
                        if($('#tgl').has("is-invalid")){
                          $('#tgl').removeClass("is-invalid");
                        }
                        $("#nama_bahan").val('');
                        $("#jumlah").val('');
                        $("#keterangan").val('');
                        $("#tgl").val(tanggal+"/"+bulan+"/"+tahun);
                        $("#nama_bahan").focus();
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
                $('#nama_bahan').addClass("is-invalid");
            }else{
                if($('#nama_bahan').has("is-invalid")){
                    $('#nama_bahan').removeClass("is-invalid");
                }
            }

            if (jumlah.replace(/\s/g, '').length<=0) {
                $('#jumlah').addClass("is-invalid");
            }else{
                if($('#jumlah').has("is-invalid")){
                    $('#jumlah').removeClass("is-invalid");
                }
            }

            if (keterangan.replace(/\s/g, '').length<=0) {
                $('#keterangan').addClass("is-invalid");
            }else{
                if($('#keterangan').has("is-invalid")){
                    $('#keterangan').removeClass("is-invalid");
                }
            }

            if (tgl.replace(/\s/g, '').length<=0) {
                $('#tgl').addClass("is-invalid");
            }else{
                if($('#tgl').has("is-invalid")){
                    $('#tgl').removeClass("is-invalid");
                }
            }
        }
    }
</script>