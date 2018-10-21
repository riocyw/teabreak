        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Rekap Data Harian</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <!-- <li class="active">Semua Data Stan</li> -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b><label class=" form-control-label">Stan</label></b>
                            <select name="selectstan" id="stan" class="form-control" tabindex="1">

                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"><b>Kas Awal</b></div>
                                        <div class="stat-digit"><b>Rp. --.---,-</b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"><b>Hasil Penjualan</b>
                                            <button class="btn btn-sm btn-link" onclick="openmodaldetail()"><b><i class="fa fa-eye"></i> detail</b></button>
                                        </div>
                                        <div class="stat-digit">
                                            <b>Rp. --.---,-</b>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-money text-danger border-danger"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"><b>Pengeluaran</b></div>
                                        <div class="stat-digit"><b>Rp. --.---,-</b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 text-center">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <!-- <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div> -->
                                    <div class="stat-content dib">
                                        <div class="stat-text"><h4><b>Total Pemasukan</b></h4></div>
                                        <div class="stat-digit"><h2><b>Rp. --.---,-</b></h2></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <!-- <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div> -->
                                    <div class="stat-content dib">
                                        <div class="stat-text"><h4><b>Total Uang pada Mesin Kasir</b></h4></div>
                                        <div class="stat-digit"><h2><b>Rp. --.---,-</b></h2></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 text-right">
                      <button class="btn btn-lg btn-primary"><i class="fa fa-print"></i> CETAK LAPORAN </button>
                    </div>
                    <div class="col-md-6 col-sm-6 text-left">
                      <button class="btn btn-lg btn-success"><i class="fa fa-save"></i> SIMPAN LAPORAN </button>
                      
                    </div>
                    <div class="col-md-12 col-sm-12 text-center" style="margin-top: 15px">
                      <h6 id="tanggal" class="">Tanggal : --/--/----</h6>
                        <h6 id="waktu" class="">Waktu : --:--</h6>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Detail Pemasukan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                <label class=" form-control-label"><strong>CASH</strong></label>
                                
                                <h4><span class="badge badge-success" id="cashdetail">Rp. -.---.---,-</span></h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                <label class=" form-control-label"><strong>DEBIT</strong></label>
                                
                                <h4><span class="badge badge-primary" id="debitdetail">Rp. -.---.---,-</span></h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                <label class=" form-control-label"><strong>OVO</strong></label>
                                
                                <h4><span class="badge badge-warning" id="ovodetail">Rp. -.---.---,-</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
    <script src=<?php echo base_url("assets/js/lib/chosen/chosen.jquery.min.js")?>></script>
    <script type="text/javascript">

        $(document).ready(function() {
            jQuery(document).ready(function() {
                jQuery("#stan").chosen({
                    disable_search_threshold: 10,
                    no_results_text: "Oops, nothing found!",
                    width: "100%"
                });
            });
        });

        function openmodaldetail() {
            $('#modalDetail').modal('toggle');
        }

        $.ajax({
              type:"post",
              url: "<?php echo base_url('superadminfranchise/get_list_stan')?>/",
              data:{},
              dataType:"json",
              success:function(response)
              {

                $.each(response, function (i, item) {
                    $('#stan').append($('<option>', {
                        value: item.id_stan,
                        text: item.nama_stan+' ( '+item.alamat+' )'
                    }));
                });
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown);
              },
              complete: function (argument) {
                  $('#stan').trigger("chosen:updated");
              }
          }
        );
    </script>
</body>
</html>


