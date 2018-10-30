        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Skema Promo / Diskon</h1>
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
                            <strong class="card-title">Data Promo</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="button" data-toggle="modal" data-target="#modaltambah" class="btn btn-success" name="tambah" id="tambah" onclick="openDatatable()" value="Tambah Promo">
                                </div>
                            </div>
                            <br>
                                <table id="mytable" class="table table-striped table-bordered" style="width: 100%" width="100%">
                                    <thead>
                                      <tr>
                                        <th>Nama Promo</th>
                                        <th>Jenis Promo</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Hari</th>
                                        <th>Waktu</th>
                                        <th>Edit</th>
                                        <th>Status</th>
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
                                    <label for="id" class=" form-control-label">ID Stan</label>
                                    <input type="text" id="editid" placeholder="Masukkan ID Stan" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama" class=" form-control-label">Nama Stan</label>
                                    <input type="text" id="editnama" placeholder="Masukkan Nama Stan" class="form-control">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class=" form-control-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" id="editpassword" name="editpassword" placeholder="Masukkan Password" class="form-control">
                                        <div class="input-group-btn">
                                            <button onclick="showpwd('editpassword')" class="btn btn-primary">
                                                <i class="fa fa-eye"></i></button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="alamat" class=" form-control-label">Alamat</label>
                                    <input type="text" id="editalamat" placeholder="Masukkan Alamat Stan" class="form-control">
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
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label class=" form-control-label">Nama Promo</label>
                                    <input type="text" id="nama_promo" placeholder="Nama Promo" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Tanggal Mulai</label>
                                    <input type='text' id="tanggal_mulai" placeholder="Tanggal Mulai" class="form-control" required="" name="tanggal1" />
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Tanggal Akhir</label>
                                    <input type="text" id="tanggal_akhir" placeholder="Tanggal Akhir" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Jam Mulai</label>
                                    <input type="text" id="jam_mulai" placeholder="Jam Mulai" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Jam Akhir</label>
                                    <input type="text" id="jam_akhir" placeholder="Jam Akhir" class="form-control">
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class=" form-control-label" id="labelhari">Hari</label>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <button  class="btn btn-sm btn-link" id="buttoncheckicon" onclick="checkallhari()"><i class="fa fa-square-o" id="checkicon"></i> check all</button>
                                        </div>
                                    </div>
                                    

                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                  <label for="checkbox1" class="form-check-label ">
                                                    <input type="checkbox" id="senin" name="hari[]" value="senin" class="form-check-input" onchange="check_hari_checked()"> Senin
                                                  </label>
                                                </div>
                                                <div class="checkbox">
                                                  <label for="checkbox2" class="form-check-label ">
                                                    <input type="checkbox" id="selasa" name="hari[]" value="selasa" class="form-check-input" onchange="check_hari_checked()"> Selasa
                                                  </label>
                                                </div>
                                                <div class="checkbox">
                                                  <label for="checkbox3" class="form-check-label ">
                                                    <input type="checkbox" id="rabu" name="hari[]" value="rabu" class="form-check-input" onchange="check_hari_checked()"> Rabu
                                                  </label>
                                                </div>
                                                <div class="checkbox">
                                                  <label for="checkbox3" class="form-check-label ">
                                                    <input type="checkbox" id="kamis" name="hari[]" value="kamis" class="form-check-input" onchange="check_hari_checked()"> Kamis
                                                  </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                  <label for="checkbox1" class="form-check-label ">
                                                    <input type="checkbox" id="jumat" name="hari[]" value="jumat" class="form-check-input" onchange="check_hari_checked()"> Jumat
                                                  </label>
                                                </div>
                                                <div class="checkbox">
                                                  <label for="checkbox2" class="form-check-label ">
                                                    <input type="checkbox" id="sabtu" name="hari[]" value="sabtu" class="form-check-input" onchange="check_hari_checked()"> Sabtu
                                                  </label>
                                                </div>
                                                <div class="checkbox">
                                                  <label for="checkbox3" class="form-check-label ">
                                                    <input type="checkbox" id="minggu" name="hari[]" value="minggu" class="form-check-input" onchange="check_hari_checked()"> Minggu
                                                  </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Jenis Promo</label>
                                    <select name ="jenispromo" id="jenispromo" class="form-control-sm form-control" onchange="changeNilaiPromo(this.id)">
                                        <option value="buy1get1" selected="selected">Buy 1 Get 1</option>
                                        <option value="buy2get1">Buy 2 Get 1</option>
                                        <option value="persen">Potongan (persen)</option>
                                        <option value="nominal">Potongan (rupiah)</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label id="labelnilaipromo" class=" form-control-label">Nilai Promo</label>

                                    <div class="input-group">
                                        <input type="text" disabled="" id="nilai_promo" placeholder="" class="form-control" onkeyup="this.value=currency(this.value,'jenispromo');">
                                        <div class="input-group-addon" id="labelnilaipromo2"></div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <label class="form-control-label" id="labelstan" style="font-weight: bold">List Stan </label>

                                <div class="row">
                                    <div class="col-md-12">
                                        <table style="width: 100%" width="100%" id="tableliststan" class="table table-striped table-bordered">
                                            <col width="20%">
                                            <col width="30%">
                                            <col width="40%">
                                            <col width="10%">
                                            <thead>
                                              <tr>
                                                <th>ID Stan</th>
                                                <th>Nama Stan</th>
                                                <th>Alamat</th>
                                                <th>
                                                    <input type="checkbox" id="checkerstan" class="" onchange="checkallstan()" name="checkerstan">
                                                </th>
                                              </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                    </div>
                                </div>
                                

                                <label class="form-control-label" id="labelproduk" style="font-weight: bold">List Produk</label>
                                <table id="tablelistproduk" width="100%" class="table table-striped table-bordered">
                                    <col width="25%">
                                    <col width="35%">
                                    <col width="30%">
                                    <col width="10%">
                                    <thead>
                                      <tr>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <!-- <th>Harga Beli</th> -->
                                        <th>Harga Jual</th>
                                        <th>
                                            <input type="checkbox" id="checkerproduk" class="" onchange="checkallproduk()" name="checkerproduk">
                                        </th>
                                      </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success" onclick="tambahpromo()">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL UNTUK EDIT PROMO  -->

        <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Edit Promo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label class=" form-control-label">Nama Promo</label>
                                    <input type="text" id="nama_promo_edit" placeholder="Nama Promo" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Tanggal Mulai</label>
                                    <input type='text' id="tanggal_mulai_edit" placeholder="Tanggal Mulai" class="form-control" required="" name="tanggal1" />
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Tanggal Akhir</label>
                                    <input type="text" id="tanggal_akhir_edit" placeholder="Tanggal Akhir" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Jam Mulai</label>
                                    <input type="text" id="jam_mulai_edit" placeholder="Jam Mulai" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Jam Akhir</label>
                                    <input type="text" id="jam_akhir_edit" placeholder="Jam Akhir" class="form-control">
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class=" form-control-label" id="labelhari_edit">Hari</label>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <button  class="btn btn-sm btn-link" id="buttoncheckiconedit" onclick="checkallhari_edit()"><i class="fa fa-square-o" id="checkiconedit"></i> check all</button>
                                        </div>
                                    </div>
                                    

                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                  <label for="checkbox1" class="form-check-label ">
                                                    <input type="checkbox" id="senin" name="hari_edit[]" value="senin" class="form-check-input" onchange="check_hari_checked_edit()"> Senin
                                                  </label>
                                                </div>
                                                <div class="checkbox">
                                                  <label for="checkbox2" class="form-check-label ">
                                                    <input type="checkbox" id="selasa" name="hari_edit[]" value="selasa" class="form-check-input" onchange="check_hari_checked_edit()"> Selasa
                                                  </label>
                                                </div>
                                                <div class="checkbox">
                                                  <label for="checkbox3" class="form-check-label ">
                                                    <input type="checkbox" id="rabu" name="hari_edit[]" value="rabu" class="form-check-input" onchange="check_hari_checked_edit()"> Rabu
                                                  </label>
                                                </div>
                                                <div class="checkbox">
                                                  <label for="checkbox3" class="form-check-label ">
                                                    <input type="checkbox" id="kamis" name="hari_edit[]" value="kamis" class="form-check-input" onchange="check_hari_checked_edit()"> Kamis
                                                  </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                  <label for="checkbox1" class="form-check-label ">
                                                    <input type="checkbox" id="jumat" name="hari_edit[]" value="jumat" class="form-check-input" onchange="check_hari_checked_edit()"> Jumat
                                                  </label>
                                                </div>
                                                <div class="checkbox">
                                                  <label for="checkbox2" class="form-check-label ">
                                                    <input type="checkbox" id="sabtu" name="hari_edit[]" value="sabtu" class="form-check-input" onchange="check_hari_checked_edit()"> Sabtu
                                                  </label>
                                                </div>
                                                <div class="checkbox">
                                                  <label for="checkbox3" class="form-check-label ">
                                                    <input type="checkbox" id="minggu" name="hari_edit[]" value="minggu" class="form-check-input" onchange="check_hari_checked_edit()"> Minggu
                                                  </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Jenis Promo</label>
                                    <select name ="jenispromo" id="jenispromo_edit" class="form-control-sm form-control" onchange="changeNilaiPromo(this.id)">
                                        <option value="buy1get1" selected="selected">Buy 1 Get 1</option>
                                        <option value="buy2get1">Buy 2 Get 1</option>
                                        <option value="persen">Potongan (persen)</option>
                                        <option value="nominal">Potongan (rupiah)</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label id="labelnilaipromo_edit" class=" form-control-label">Nilai Promo</label>

                                    <div class="input-group">
                                        <input type="text" disabled="" id="nilai_promo_edit" placeholder="" class="form-control" onkeyup="this.value=currency(this.value,'jenispromo_edit');">
                                        <div class="input-group-addon" id="labelnilaipromo2_edit"></div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <label class="form-control-label" id="labelstan_edit" style="font-weight: bold">List Stan</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table width="100%" id="tableliststan_edit" class="table table-striped table-bordered">
                                            <col width="20%">
                                            <col width="30%">
                                            <col width="40%">
                                            <col width="10%">
                                            <thead>
                                              <tr>
                                                <th>ID Stan</th>
                                                <th>Nama Stan</th>
                                                <th>Alamat</th>
                                                <th>
                                                    <input type="checkbox" id="checkerstan_edit" class="" onchange="checkallstanedit()" name="checkerstan_edit">
                                                </th>
                                              </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                

                                <label class="form-control-label" id="labelproduk_edit" style="font-weight: bold">List Produk</label>
                                <table id="tablelistproduk_edit" width="100%" class="table table-striped table-bordered">
                                    <col width="25%">
                                    <col width="35%">
                                    <col width="30%">
                                    <col width="10%">
                                    <thead>
                                      <tr>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <!-- <th>Harga Beli</th> -->
                                        <th>Harga Jual</th>
                                        <th>
                                            <input type="checkbox" id="checkerproduk_edit" class="" onchange="checkallprodukedit()" name="checkerproduk_edit">
                                        </th>
                                      </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="simpaneditpromo">
                        <input type="hidden" id="statuseditpromo">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success" onclick="simpaneditpromo()">Simpan</button>
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

    <script src=<?php echo base_url("assets/vendors/bootstrap-4.1.3-dist/js/bootstrap.min.js")?>></script>
    <!-- <script src=></script> -->
    <!-- echo base_url("assets/js/main.js")?> -->

    <!-- bootstrap-daterangepicker -->
    <script src=<?php echo base_url("assets/vendors/moment/min/moment.min.js")?>></script>
    <script src=<?php echo base_url("assets/vendors/bootstrap-daterangepicker/daterangepicker.js")?>></script>
    <!-- bootstrap-datetimepicker -->    
    <script src=<?php echo base_url("assets/vendors/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js")?>></script>
    <script type="text/javascript">
        var d = new Date();

        var month = d.getMonth()+1;
        var day = d.getDate();

        var output = (day<10 ? '0' : '') + day+ '/' +(month<10 ? '0' : '') + month+ '/' +d.getFullYear();

        //TAMBAH DATA
        $('#tanggal_mulai').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: false
        });

        $('#tanggal_akhir').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: false
        });

        $('#jam_mulai').datetimepicker({
            format: 'HH:mm',
            useCurrent: false
        });

        $('#jam_akhir').datetimepicker({
            format: 'HH:mm',
            useCurrent: false
        });

        $("#tanggal_mulai").on("dp.change", function(e) {
            $('#tanggal_akhir').data("DateTimePicker").minDate(e.date);
        });

        $("#tanggal_akhir").on("dp.change", function(e) {
            $('#tanggal_mulai').data("DateTimePicker").maxDate(e.date);
        });

        $("#jam_mulai").on("dp.change", function(e) {
            $('#jam_akhir').data("DateTimePicker").minDate(e.date);
        });

        $("#jam_akhir").on("dp.change", function(e) {
            $('#jam_mulai').data("DateTimePicker").maxDate(e.date);
        });
          
        $('#tanggal_mulai').data("DateTimePicker").minDate(output);
        $('#tanggal_akhir').data("DateTimePicker").minDate(output);


        //EDIT FDATA
        $('#tanggal_mulai_edit').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: false
        });

        $('#tanggal_akhir_edit').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: false
        });

        $('#jam_mulai_edit').datetimepicker({
            format: 'HH:mm',
            useCurrent: false
        });

        $('#jam_akhir_edit').datetimepicker({
            format: 'HH:mm',
            useCurrent: false
        });

        $("#tanggal_mulai_edit").on("dp.change", function(e) {
            $('#tanggal_akhir_edit').data("DateTimePicker").minDate(e.date);
        });

        $("#tanggal_akhir_edit").on("dp.change", function(e) {
            $('#tanggal_mulai_edit').data("DateTimePicker").maxDate(e.date);
        });

        $("#jam_mulai_edit").on("dp.change", function(e) {
            $('#jam_akhir_edit').data("DateTimePicker").minDate(e.date);
        });

        $("#jam_akhir_edit").on("dp.change", function(e) {
            $('#jam_mulai_edit').data("DateTimePicker").maxDate(e.date);
        });

        
          
        $('#tanggal_mulai_edit').data("DateTimePicker").maxDate($("#tanggal_akhir_edit").data("datetimepicker").getDate());
        $('#tanggal_akhir_edit').data("DateTimePicker").minDate($("#tanggal_mulai_edit").data("datetimepicker").getDate());

        function checkallstan() {
            

            if ($('[name="checkerstan"]:checked').length == $('[name="checkerstan"]').length) {
                $('[name="stanpilihan[]"]').prop('checked', true);
            }else{
                $('[name="stanpilihan[]"]').prop('checked', false);
            }
        }

        function check_stat_check_stan() {
            if ($('[name="stanpilihan[]"]:checked').length == $('[name="stanpilihan[]"]').length) {
                $('[name="checkerstan"]').prop('checked', true);
            }else{
                $('[name="checkerstan"]').prop('checked', false);
            }
        }

        function checkallproduk() {
            

            if ($('[name="checkerproduk"]:checked').length == $('[name="checkerproduk"]').length) {
                $('[name="produkpilihan[]"]').prop('checked', true);
            }else{
                $('[name="produkpilihan[]"]').prop('checked', false);
            }
        }
        
        function check_stat_check_produk() {
            if ($('[name="produkpilihan[]"]:checked').length == $('[name="produkpilihan[]"]').length) {
                $('[name="checkerproduk"]').prop('checked', true);
            }else{
                $('[name="checkerproduk"]').prop('checked', false);
            }
        }

        

        function checkallstanedit() {
            

            if ($('[name="checkerstan_edit"]:checked').length == $('[name="checkerstan_edit"]').length) {
                $('[name="stanpilihan_edit[]"]').prop('checked', true);
            }else{
                $('[name="stanpilihan_edit[]"]').prop('checked', false);
            }
        }

        function check_stat_check_stan_edit() {
            if ($('[name="stanpilihan_edit[]"]:checked').length == $('[name="stanpilihan_edit[]"]').length) {
                $('[name="checkerstan_edit"]').prop('checked', true);
            }else{
                $('[name="checkerstan_edit"]').prop('checked', false);
            }
        }

        function checkallprodukedit() {
            

            if ($('[name="checkerproduk_edit"]:checked').length == $('[name="checkerproduk_edit"]').length) {
                $('[name="produkpilihan_edit[]"]').prop('checked', true);
            }else{
                $('[name="produkpilihan_edit[]"]').prop('checked', false);
            }
        }
        
        function check_stat_check_produk_edit() {
            if ($('[name="produkpilihan_edit[]"]:checked').length == $('[name="produkpilihan_edit[]"]').length) {
                $('[name="checkerproduk_edit"]').prop('checked', true);
            }else{
                $('[name="checkerproduk_edit"]').prop('checked', false);
            }
        }

        function checkallhari() {

            if ($("#buttoncheckicon").text() == ' check all') {
                $("#buttoncheckicon").html('<i class="fa fa-check-square-o"></i> uncheck all');
                $('[name="hari[]"]').prop('checked', true);
            }else{
                $("#buttoncheckicon").html('<i class="fa fa-square-o"></i> check all');
                $('[name="hari[]"]').prop('checked', false);
            }
            // if ($("#buttoncheckicon").) {}
            // buttoncheckicon checkicon
        }

        function check_hari_checked() {
            if ($('[name="hari[]"]:checked').length == $('[name="hari[]"]').length) {
                $("#buttoncheckicon").html('<i class="fa fa-check-square-o"></i> uncheck all');
            }else{
                $("#buttoncheckicon").html('<i class="fa fa-square-o"></i> check all');
            }
        }

        function checkallhari_edit() {

            if ($("#buttoncheckiconedit").text() == ' check all') {
                $("#buttoncheckiconedit").html('<i class="fa fa-check-square-o"></i> uncheck all');
                $('[name="hari_edit[]"]').prop('checked', true);
            }else{
                $("#buttoncheckiconedit").html('<i class="fa fa-square-o"></i> check all</button>');
                $('[name="hari_edit[]"]').prop('checked', false);
            }

            // if ($("#buttoncheckicon").) {}
            // buttoncheckicon checkicon
        }

        function check_hari_checked_edit() {
            if ($('[name="hari_edit[]"]:checked').length == $('[name="hari_edit[]"]').length) {
                $("#buttoncheckiconedit").html('<i class="fa fa-check-square-o"></i> uncheck all');
            }else{
                $("#buttoncheckiconedit").html('<i class="fa fa-square-o"></i> check all');
            }
        }
    </script>
</body>
</html>
