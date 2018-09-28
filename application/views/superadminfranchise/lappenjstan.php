        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Laporan Penjualan Stan</h1>
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
                            <strong class="card-title">Data Laporan Penjualan Stan</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="id" class=" form-control-label">Stan</label>
                                        <select name="select" id="select_stan" class="form-control" onchange="refreshTable()">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="id" class=" form-control-label">Tanggal Awal</label>
                                        <input type="text" id="tanggal_awal" placeholder="Masukkan Tanggal Awal" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="id" class=" form-control-label">Tanggal Akhir</label>
                                        <input type="text" id="tanggal_akhir" placeholder="Masukkan Tanggal Akhir" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                                <table id="mytable" class="table table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th>ID Nota</th>
                                        <th>Tanggal Nota</th>
                                        <th>Total Harga Jual</th>
                                        <th>Detail</th>
                                      </tr>
                                    </thead>
                                </table>
                                <br>
                        </div>
                        <div class="card-footer">
                            <h2 id="total_harga_akhir">Total Penjualan Rp ,-</h2>
                        </div>
                    </div> <!-- .card -->

                  </div><!--/.col-->
                </div>
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Detail Nota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label class=" form-control-label"><strong>Jenis Pembayaran</strong></label>
                                
                                <h4><span class="badge badge-primary" id="jenis_pembayaran">CASH</span></h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label class=" form-control-label"><strong>Status</strong></label>
                                
                                <h4><span class="badge badge-success" id="status">TIDAK VOID</span></h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class=" form-control-label"><strong>List Diskon</strong></label>
                                <div id="listdiskon">
                                    <h6>- diskon 1 (haha)</h6>
                                    <h6>- diskon 1 (haha)</h6>
                                    <h6>- diskon 1 (haha)</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class=" form-control-label"><strong>Keterangan</strong></label>
                                
                                <h6 id="keterangan">Keterangan yang ditulis di bagian keterangan</h6>
                            </div>
                        </div>
                    </div>

                    <!-- DETAIL -->
                    <div class="form-group">
                        <label class=" form-control-label"><strong>Nota Pembelian</strong></label>
                        <table id="detailnota" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Kategori</th>
                                <th>Harga Produk</th>
                                <th>Total Harga Produk</th>
                              </tr>
                            </thead>
                        </table>
                    </div>
                    <h5 class="text-right" id="totalhargapernota">Total Harga Nota : Rp. 0,-</h5>
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
    <script src=<?php echo base_url("assets/js/teabreak.js"); ?>></script>
    <script src=<?php echo base_url("assets/js/lib/chosen/chosen.jquery.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/dataTables.buttons.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/buttons.print.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/buttons.html5.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/buttons.flash.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/JSZip-2.5.0/jszip.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/pdfmake-0.1.36/pdfmake.js")?>></script>
    <script src=<?php echo base_url("assets/datatable/pdfmake-0.1.36/vfs_fonts.js")?>></script>

    <script src=<?php echo base_url("assets/vendors/bootstrap-4.1.3-dist/js/bootstrap.min.js")?>></script>
    <!-- <script src=></script> -->
    <!-- echo base_url("assets/js/main.js")?> -->

    <!-- bootstrap-daterangepicker -->
    <script src=<?php echo base_url("assets/vendors/moment/min/moment.min.js")?>></script>
    <script src=<?php echo base_url("assets/vendors/bootstrap-daterangepicker/daterangepicker.js")?>></script>
    <!-- bootstrap-datetimepicker -->    
    <script src=<?php echo base_url("assets/vendors/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js")?>></script>
    <script type="text/javascript">
        // alert($("#tanggal_awal").val());
        //TAMBAH DATA
        $('#tanggal_awal').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: false
        });

        $('#tanggal_akhir').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: false
        });

        $("#tanggal_awal").on("dp.change", function(e) {
            refreshTable()
            $('#tanggal_akhir').data("DateTimePicker").minDate(e.date);
        });

        $("#tanggal_akhir").on("dp.change", function(e) {
            refreshTable()
            $('#tanggal_awal').data("DateTimePicker").maxDate(e.date);
        });

        $("#tanggal_awal").click(function () {
            if ($("#tanggal_akhir").val()!='') {
                $('#tanggal_awal').data("DateTimePicker").maxDate($('#tanggal_akhir').data('date'));
            }
        });

        $('#tanggal_akhir').click(function () {
            if ($("#tanggal_awal").val()!='') {
                $('#tanggal_akhir').data("DateTimePicker").minDate($('#tanggal_awal').data('date'));
            }
        });

    </script>
</body>
</html>
