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
                            <div class="card-header text-center">
                                <strong class="card-title">List Stock Produk</strong>
                            </div>
                            <div class="card-body">
                              <table id="mytable" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Sisa Stok</th>
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
    

    <script src=<?php echo base_url("assets/js/jquery.easy-autocomplete.js")?>></script>

</body>
</html>
<script type="text/javascript">
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
                // "data": function(data) {
                //   // data.tanggal_awal = $('#tanggal_awal').val();
                //   // data.tanggal_akhir = $('#tanggal_akhir').val();
                //   // data.id_stan = $('#select_stan').val();
                // },
                "url"    : "<?php echo base_url('adminfranchise/getAllOrder');?>",
                "dataSrc": function (json) {
                  // var return_data = new Array();

                  // for(var i=0;i< json.data.length; i++){
                  //   var id =json.data[i].id_order;
                  //   var res = id.split("ST");
                  //   var stan = "ST"+res[1];
                  //   var setdone = "";

                  //   if (json.data[i].status != 'not_done') {
                  //       setdone = '<div style="color:green">SELESAI</div>'
                  //   }else{
                  //       setdone = '<button onclick=set_done("'+json.data[i].id_order+'") class="btn btn-success">Order Selesai</button> '
                  //   }

                  //   return_data.push({
                  //     'id_order': json.data[i].id_order,
                  //     'id_stan'  : stan,
                  //     'tanggal_order' : uidate(json.data[i].tanggal_order),
                  //     'detail' : '<button onclick=detail_order("'+json.data[i].status+'","'+json.data[i].id_order+'") class="btn btn-primary">Detail</button> ',
                  //     'set_done' : setdone
                  //   });
                  // }
                  // return return_data;
                }
              },
        dom: 'Bfrtlip',
        buttons: [
            {
                extend: 'copyHtml5',
                text: 'Copy',
                filename: 'Order Data',
                exportOptions: {
                  columns:[0,1,2]
                }
            },{
                extend: 'excelHtml5',
                text: 'Excel',
                className: 'exportExcel',
                filename: 'Order Data',
                exportOptions: {
                  columns:[0,1,2]
                }
            },{
                extend: 'csvHtml5',
                filename: 'Order Data',
                exportOptions: {
                  columns:[0,1,2]
                }
            },{
                extend: 'pdfHtml5',
                filename: 'Order Data',
                exportOptions: {
                  columns:[0,1,2]
                }
            },{
                extend: 'print',
                filename: 'Order Data',
                exportOptions: {
                  columns:[0,1,2]
                }
            }
        ],
        "lengthChange": true,
          columns: [
            {'data': 'kode_barang'},
            {'data': 'nama_barang'},
            {'data': 'sisa_stok'},
            {'data': 'hapus'}
          ],
    });

    function reload_table(){
      tabeldata.ajax.reload();
    }

    function hapus(id)
    {
        if (confirm("Apakah anda yakin ingin menghapus data "+id+"?")) {
            $.ajax({
                    type:"post",
                    url: "<?php echo base_url('')?>/",
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
</script>