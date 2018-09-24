        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Ganti Password</h1>
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
                            <strong class="card-title">Ganti Password Super Admin Franchise</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" id="username" name="" value=<?php echo $this->session->userdata('usernamesupadmin'); ?>>
                                        <label id="labelpasslama" for="id" class=" form-control-label">Password Lama</label>
                                        <input type="password" style="display: none" placeholder="Masukkan Password Lama">

                                        <div class="input-group">
                                            <input type="password" id="passwordlama" placeholder="Masukkan Password Lama" class="form-control">
                                            <div class="input-group-btn">
                                                <button onclick="showpwd('passwordlama','eyelama')" class="btn btn-primary">
                                                    <i id="eyelama" class="fa fa-eye"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label id="labelpassbaru" for="id" class=" form-control-label">Password Baru</label>
                                        

                                        <div class="input-group">
                                            <input type="password" id="passwordbaru" placeholder="Masukkan Password Baru" class="form-control">
                                            <div class="input-group-btn">
                                                <button onclick="showpwd('passwordbaru','eyebaru')" class="btn btn-primary">
                                                    <i id="eyebaru" class="fa fa-eye"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label id="labelkonfpassbaru" for="id" class=" form-control-label">Konfirmasi Password Baru</label>
                                        

                                        <div class="input-group">
                                            <input type="password" id="konfirmasipasswordbaru" placeholder="Masukkan Password Baru Lagi" class="form-control">
                                            <div class="input-group-btn">
                                                <button onclick="showpwd('konfirmasipasswordbaru','eyebaruconf')" class="btn btn-primary">
                                                    <i id="eyebaruconf" class="fa fa-eye"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <br>
                                <div class="col-md-12">
                                    <b><p id="labelerror" class="red text-center"></p></b>
                                    <button onclick="gantipassword()" class="btn btn-success btn-block">CHANGE PASSWORD</button>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-footer">
                        </div>
                    </div> <!-- .card -->

                  </div><!--/.col-->
                </div>
            </div>
        </div> <!-- .content -->
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

    <script src=<?php echo base_url("assets/vendors/bootstrap-4.1.3-dist/js/bootstrap.min.js")?>></script>
    <!-- <script src=></script> -->
    <!-- echo base_url("assets/js/main.js")?> -->

    <script type="text/javascript">
        function showpwd(id,idicon) {
            var pwd = document.getElementById(id);

            if (pwd.type === "password") {
                pwd.type = "text";
                $("#"+idicon).addClass('fa-eye-slash');
                $("#"+idicon).removeClass('fa-eye');
            } else {
                pwd.type = "password";
                $("#"+idicon).addClass('fa-eye');
                $("#"+idicon).removeClass('fa-eye-slash');
            }
        }
        
        function gantipassword() {
            var passlama = $("#passwordlama").val();
            var passbaru = $("#passwordbaru").val();
            var konfirmasipassbaru = $("#konfirmasipasswordbaru").val();
            var username = $("#username").val();
            $('#labelerror').addClass('red');
            $('#labelerror').removeClass('green');

            if (passlama == '' || passbaru == '' || konfirmasipassbaru == '') {
                $('#labelerror').html('Pastikan seluruh isian terisi');
                if(passlama == ''){

                    $("#passwordlama").addClass('is-invalid');
                    $("#labelpasslama").addClass('red');
                }else{
                    $("#passwordlama").removeClass('is-invalid');
                    $("#labelpasslama").removeClass('red');
                
                }

                if (passbaru == '') {
                    $("#passwordbaru").addClass('is-invalid');
                    $("#labelpassbaru").addClass('red');
                }else{
                    $("#passwordbaru").removeClass('is-invalid');
                    $("#labelpassbaru").removeClass('red');
                
                }

                if (konfirmasipassbaru == '') {
                    $("#konfirmasipasswordbaru").addClass('is-invalid');
                    $("#labelkonfpassbaru").addClass('red');
                }else{
                    $("#konfirmasipasswordbaru").removeClass('is-invalid');
                    $("#labelkonfpassbaru").removeClass('red');
                }
            }else{
                $("#passwordlama").removeClass('is-invalid');
                $("#passwordbaru").removeClass('is-invalid');
                $("#konfirmasipasswordbaru").removeClass('is-invalid');

                $("#labelpasslama").removeClass('red');
                $("#labelpassbaru").removeClass('red');
                $("#labelkonfpassbaru").removeClass('red');

                if (konfirmasipassbaru == passbaru) {
                    if (passbaru.length < 6 || passbaru.length > 20) {
                        $('#labelerror').html('Password baru harus mengandung 6 - 20 karakter');
                    }else{
                        $('#labelerror').html('');
                        $.ajax({
                              type:"post",
                              url: "<?php echo base_url('superadminfranchise/prosesgantipassword')?>/",
                              data:{ 
                                passlama:passlama,
                                passbaru:passbaru,
                                konfirmasipassbaru:konfirmasipassbaru,
                                username:username,
                                usertype:"superadminfranchise"
                              },
                              dataType:"json",
                              success:function(response)
                              {
                                if (response.toString() == 'false') {
                                    $('#labelerror').html('Password lama salah');
                                }else if (response.toString() == 'true') {
                                    $('#labelerror').html('Sukses ganti password');
                                    $('#labelerror').addClass('green');
                                    $('#labelerror').removeClass('red');
                                }else{
                                    $('#labelerror').html('Server error! coba lagi nanti');
                                }
                              },
                              error: function (jqXHR, textStatus, errorThrown)
                              {
                                alert(errorThrown);
                              }
                          }
                        );
                    }
                }else{
                    $('#labelerror').html('Password Baru harus sama dengan Konfirmasi Password Baru');
                }
            }

            
        }
    </script>
</body>
</html>
