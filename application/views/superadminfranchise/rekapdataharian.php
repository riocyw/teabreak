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
                            <select name="selectstan" id="stan" class="form-control" tabindex="1" onchange="refreshrekap()">

                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <b><label class=" form-control-label">Tanggal</label></b>
                            <input type="text" name="tanggal" id="tanggalrekap" class="form-control" >
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
                                        <div class="stat-text"><b>Kas Awal</b>
                                            <button class="btn btn-sm btn-link" onclick="openmodaldetailkas()"><b><i class="fa fa-eye"></i> detail</b></button>
                                        </div>
                                        <div class="stat-digit"><b id="kasawal">Rp. --.---,-</b></div>
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
                                            <b id="hasilpenjualan">Rp. --.---,-</b>

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
                                        <div class="stat-text"><b>Pengeluaran</b>
                                            <button class="btn btn-sm btn-link" onclick="openmodaldetailpengeluaran()"><b><i class="fa fa-eye"></i> detail</b></button>
                                        </div>
                                        <div class="stat-digit"><b id="pengeluaran">Rp. --.---,-</b></div>
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
                                        <div class="stat-digit"><h2><b id="totalpemasukan">Rp. --.---,-</b></h2></div>
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
                                        <div class="stat-digit"><h2><b id="totalkasir">Rp. --.---,-</b></h2></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 text-right">
                      <button class="btn btn-lg btn-primary" onclick="cetakrekap()"><i class="fa fa-print"></i> CETAK LAPORAN </button>
                    </div>
                    <div class="col-md-6 col-sm-6 text-left">
                      <button class="btn btn-lg btn-success" onclick="simpanrekap()"><i class="fa fa-save"></i> SIMPAN LAPORAN </button>
                      
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

    <div class="modal fade" id="modalDetailPengeluaran" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Detail Pengeluaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <table id="mytable" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th style="width: 70%;">Keterangan</th>
                                    <th style="width: 20%;">Pengeluaran</th>
                                    <th style="width: 10%;">Shift</th>
                                    <!-- <th style="width: 12.5%;">Edit</th> -->
                                  </tr>
                                </thead>
                                <tbody id="detailpengeluaran">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDetailKas" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Detail Kas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label class=" form-control-label"><strong>Shift Pagi</strong></label>
                                
                                <h4><span class="badge badge-warning" id="kaspagidetail">Rp. -.---.---,-</span></h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label class=" form-control-label"><strong>Shift Malam</strong></label>
                                
                                <h4><span class="badge badge-secondary" id="kasmalamdetail">Rp. -.---.---,-</span></h4>
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
    <!-- bootstrap-daterangepicker -->
    <script src=<?php echo base_url("assets/vendors/moment/min/moment.min.js")?>></script>
    <script src=<?php echo base_url("assets/vendors/bootstrap-daterangepicker/daterangepicker.js")?>></script>
    <!-- bootstrap-datetimepicker -->    
    <script src=<?php echo base_url("assets/vendors/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js")?>></script>
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

        $('#tanggalrekap').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: false
        });



        $("#tanggalrekap").on("dp.change", function(e) {
            refreshrekap();
        });

        var tanggalfull = new Date();
          var tanggal = tanggalfull.getDate();
          var bulan = tanggalfull.getMonth()+1;
          var tahun = tanggalfull.getFullYear();
          var jam = tanggalfull.getHours();
          var menit = tanggalfull.getMinutes();

          if (parseInt(tanggal)<10) {
            tanggal = "0"+tanggal;
          }

          if (parseInt(bulan)<10) {
            bulan = "0"+bulan;
          }

          if (parseInt(jam)<10) {
            jam = "0"+jam;
          }

          if (parseInt(menit)<10) {
            menit = "0"+menit;
          }

          $('#tanggal').text("Tanggal : "+tanggal+"/"+bulan+"/"+tahun);
          $('#waktu').text("Waktu : "+jam+":"+menit);
          $('#tanggalrekap').val(tanggal+"/"+bulan+"/"+tahun);

        function openmodaldetail() {
            $('#modalDetail').modal('toggle');
        }

        function openmodaldetailpengeluaran() {
            $('#modalDetailPengeluaran').modal('toggle');
        }

        function openmodaldetailkas() {
            $('#modalDetailKas').modal('toggle');
        }

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
                        // $('#stan').append($('<option>', {
                        //     value: item.id_stan,
                        //     text: item.nama_stan+' ( '+item.alamat+' )',
                        //     selected: true
                        // }));
                        htmlinsideselect = htmlinsideselect + '<option selected="selected" value="'+item.id_stan+'">'+item.nama_stan +' ( '+item.alamat+' )' +'</option>';
                    }else{
                        htmlinsideselect = htmlinsideselect + '<option value="'+item.id_stan+'">'+item.nama_stan +' ( '+item.alamat+' )' +'</option>';
                    }
                    
                });
                $("#stan").html(htmlinsideselect);
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown);
              },
              complete: function (argument) {
                  $('#stan').trigger("chosen:updated");
                  var id_stan = $('#stan').val();
                  var tanggal_rekap = $('#tanggalrekap').val();
                    // alert(id_stan);
                    ajaxSetData(id_stan,tanggal_rekap);
              }
          }
        );

        

        function ajaxSetData(id_stan,tanggal_rekap) {
            $.ajax({
              type:"post",
              url: "<?php echo base_url('superadminfranchise/getrekapdata')?>/",
              data:{id_stan:id_stan,tanggal_rekap:tanggal_rekap},
              success:function(response)
              {
                response = jQuery.parseJSON(response);
                var kasawal = response.kasawal;
                var hasilpenjualan = response.hasilpenjualan;
                var pengeluaran = response.pengeluaran;
                var cashdetail = response.cashdetail;
                var ovodetail = response.ovodetail;
                var debitdetail = response.debitdetail;
                var totalkasir = response.totalkasir;
                var totalpemasukan = response.totalpemasukan;
                var kaspagi = response.kaspagi;
                var kasmalam = response.kasmalam;

                kasawal = "Rp. "+currency(kasawal)+",-";
                hasilpenjualan = "Rp. "+currency(hasilpenjualan)+",-";
                pengeluaran = "Rp. "+currency(pengeluaran)+",-";
                cashdetail = "Rp. "+currency(cashdetail)+",-";
                ovodetail = "Rp. "+currency(ovodetail)+",-";
                debitdetail = "Rp. "+currency(debitdetail)+",-";
                totalkasir = "Rp. "+currency(totalkasir)+",-";
                totalpemasukan = "Rp. "+currency(totalpemasukan)+",-";
                kaspagi = "Rp. "+currency(kaspagi)+",-";
                kasmalam = "Rp. "+currency(kasmalam)+",-";

                $('#kasawal').html(kasawal);
                $('#hasilpenjualan').html(hasilpenjualan);
                $('#pengeluaran').html(pengeluaran);
                $('#cashdetail').html(cashdetail);
                $('#ovodetail').html(ovodetail);
                $('#debitdetail').html(debitdetail);
                $('#totalkasir').html(totalkasir);
                $('#totalpemasukan').html(totalpemasukan);
                $('#kaspagidetail').html(kaspagi);
                $('#kasmalamdetail').html(kasmalam);
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown);
              }
            });


            $.ajax({
              type:"post",
              url: "<?php echo base_url('superadminfranchise/getdetailpengeluaranrekap')?>/",
              data:{id_stan:id_stan,tanggal_rekap:tanggal_rekap},
              success:function(response)
              {
                $('#detailpengeluaran').html('');
                // console.log(response);
                response = jQuery.parseJSON(response);
                $.each(response, function (i,item) {
                    $('#detailpengeluaran').append(
                        '<tr><td>'+item.keterangan+'</td><td>'+item.pengeluaran+'</td><td>'+item.shift+'</td></tr>'
                    );
                });
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown);
              }
            });


        }

      function currency(number1) {
        var retVal=number1.toString().replace(/[^\d]/g,'');
        while(/(\d+)(\d{3})/.test(retVal)) {
          retVal=retVal.replace(/(\d+)(\d{3})/,'$1'+'.'+'$2');
        }
        return retVal;
      }

      function cetakrekap() {
          alert("fitur masih dalam tahap pengembangan!");
      }

      function simpanrekap() {
          alert("fitur masih dalam tahap pengembangan!");
      }

      function refreshrekap() {
        var id_stan = $('#stan').val();
        var tanggal_rekap = $('#tanggalrekap').val();
        // alert(id_stan);
          ajaxSetData(id_stan,tanggal_rekap);
      }
    </script>
</body>
</html>


