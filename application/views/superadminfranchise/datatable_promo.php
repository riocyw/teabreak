<script type="text/javascript">
  var jenis = document.getElementById("jenispromo");
  var valjenis = jenis.options[jenis.selectedIndex].value;
  if (valjenis == 'buy1get1' || valjenis == 'buy2get1') {
    document.getElementById("nilai_promo").disabled = true;
    $("#labelnilaipromo").text("Nilai Promo");
    $("#labelnilaipromo2").html("<span class='fa fa-exclamation'></span>");
    
  }else if (valjenis =='nominal') {
    document.getElementById("nilai_promo").disabled = false;
    $("#labelnilaipromo").text("Nilai Promo (Rupiah)");
    $("#labelnilaipromo2").text("Rp");
  }else if(valjenis == 'persen'){
    document.getElementById("nilai_promo").disabled = false;
    $("#labelnilaipromo").text("Nilai Promo (%)");
    $("#labelnilaipromo2").text("%");
  }
  document.getElementById("nilai_promo").value = '';

  var tabeldata ;
  var listprodukadd;
  var liststanadd;
  var listprodukaddedit;
  var liststanaddedit;

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
    "url"    : "<?php echo base_url('superadminfranchise/promo_data');?>",
    "dataSrc": function (json) {
      var return_data = new Array();
      var jenis_diskon = '';
      var statuss = '';
      for(var i=0;i< json.data.length; i++){
        if (json.data[i].jenis_diskon == 'buy1get1') {
          jenis_diskon = 'Buy 1 Get 1';
        }else if (json.data[i].jenis_diskon == 'buy2get1'){
          jenis_diskon = 'Buy 2 Get 1';
        }else if (json.data[i].jenis_diskon.includes('nominal')) {
          jenis_diskon = 'Diskon Nominal ( Rp.'+(json.data[i].jenis_diskon).replace('nominal','')+" )";
        }else{
          jenis_diskon = 'Diskon Persen ( '+(json.data[i].jenis_diskon).replace('persen','')+" %)";
        }

        if (json.data[i].status == 'active') {
          status = '<button onclick=status_diskon("'+json.data[i].id_diskon+'","'+json.data[i].status+'") class="btn btn-success" style="color:white;">'+statuspromo(json.data[i].status)+'</button>';
        }else{
          status = '<button onclick=status_diskon("'+json.data[i].id_diskon+'","'+json.data[i].status+'") class="btn btn-danger" style="color:white;">'+statuspromo(json.data[i].status)+'</button>';
        }
        return_data.push({
          'nama_diskon': json.data[i].nama_diskon,
          'jenis_diskon' : jenis_diskon,
          'tanggal_mulai' : json.data[i].tanggal_mulai,
          'tanggal_akhir' : json.data[i].tanggal_akhir,
          'hari' : json.data[i].hari,
          'waktu' : json.data[i].jam_mulai+' - '+json.data[i].jam_akhir,
          'edit' : '<button onclick=edit_promo("'+json.data[i].id_diskon+'") class="btn btn-warning" style="color:white;">Edit</button> ',
          'status' : status
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
                filename: 'Data Promo',
                exportOptions: {
                  columns:[0,1,2,3,4,5]
                }
            },{
                extend: 'excelHtml5',
                text: 'Excel',
                className: 'exportExcel',
                filename: 'Data Promo',
                exportOptions: {
                  columns:[0,1,2,3,4,5]
                }
            },{
                extend: 'csvHtml5',
                filename: 'Data Promo',
                exportOptions: {
                  columns:[0,1,2,3,4,5]
                }
            },{
                extend: 'pdfHtml5',
                filename: 'Data Promo',
                exportOptions: {
                  columns:[0,1,2,3,4,5]
                }
            },{
                extend: 'print',
                filename: 'Data Promo',
                exportOptions: {
                  columns:[0,1,2,3,4,5]
                }
            }
        ],
        "lengthChange": true,
  columns    : [
    {'data': 'nama_diskon'},
    {'data': 'jenis_diskon'},
    {'data': 'tanggal_mulai'},
    {'data': 'tanggal_akhir'},
    {'data': 'hari'},
    {'data': 'waktu','orderable':false,'searchable':false},
    {'data': 'edit','orderable':false,'searchable':false},
    {'data': 'status','orderable':false,'searchable':false}
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

function statuspromo(status){
  
  if(status=='active'){
    return "Aktif"
  }else{
    return "Tidak Aktif"
  }
}

function status_diskon(id,status) {
  if(confirm('Apakah anda yakin ingin mengubah status data ini ?')){
    $.ajax({
            type:"post",
            url: "<?php echo base_url('superadminfranchise/change_status_diskon')?>/",
            data:{ id:id,status:status},
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

 function edit_promo(id){
    var openall = true;
    $.ajax({
          type:"post",
          url: "<?php echo base_url('superadminfranchise/select_edit_promo')?>/",
          data:{ id:id},
          dataType:"json",
          success:function(response)
          {
        // $('#labelhari').removeClass('red');
        // $('#labelstan').removeClass('red');
        // $('#labelproduk').removeClass('red');

            var tanggal = (response[0].tanggal_mulai).split("-");
            
            var tanggaleditmulai = tanggal[2]+'/'+tanggal[1]+'/'+tanggal[0];
            tanggal = (response[0].tanggal_akhir).split("-");
            var tanggaleditakhir = tanggal[2]+'/'+tanggal[1]+'/'+tanggal[0];

            var jenis_diskon = response[0].jenis_diskon;
            // alert(response[0].jenis_diskon);
            var nilai_promo = '';
            var labelnilaipromo2 = '<span class="fa fa-exclamation"></span>';
            var labelnilaipromo = 'Nilai Promo';
            if (jenis_diskon != 'buy1get1' && jenis_diskon != 'buy2get1') {
              if (jenis_diskon.includes('nominal')) {
                nilai_promo = jenis_diskon.replace('nominal','');
                jenis_diskon = 'nominal';
                labelnilaipromo2 = 'Rp';
                labelnilaipromo = 'Nilai Promo (Rupiah)';

              }else{
                nilai_promo = jenis_diskon.replace('persen','');
                jenis_diskon = 'persen';
                labelnilaipromo2 = '%';
                labelnilaipromo = 'Nilai Promo (Persen)';
              }
            }

            var allhari = response[0].hari;
            allhari = allhari.split(','); 
                
            $("#simpaneditpromo").val(response[0].id_diskon);
            $("#statuseditpromo").val(response[0].status);
            $("#nama_promo_edit").val(response[0].nama_diskon);
            $("#tanggal_mulai_edit").val(tanggaleditmulai);
            $("#tanggal_akhir_edit").val(tanggaleditakhir);
            $("#jam_mulai_edit").val(response[0].jam_mulai);
            $("#jam_akhir_edit").val(response[0].jam_akhir);
            $("#jenispromo_edit").val(jenis_diskon);
            $("#nilai_promo_edit").val(nilai_promo);
            $("#labelnilaipromo2_edit").html(labelnilaipromo2);
            $("#labelnilaipromo_edit").text(labelnilaipromo);

            var hari = document.getElementsByName('hari_edit[]');
            var statcheckall = 0;
            for (var i=0, n=hari.length;i<n;i++) 
            {
                hari[i].checked = false;
                for (var j = allhari.length - 1; j >= 0; j--) {
                  
                  if (hari[i].value == allhari[j]) 
                  {
                      hari[i].checked = true;
                      statcheckall++;
                  }
                }
                
            }

            if (statcheckall == 7) {
              alert('all');
              $("#buttoncheckiconedit").html('<i class="fa fa-check-square-o"></i> uncheck all');

            }else{
              alert('not all');
              $("#buttoncheckiconedit").html('<i class="fa fa-square-o"></i> check all');
            }

            var stan = document.getElementsByName('stanpilihan[]');
            for (var i=0, n=stan.length;i<n;i++) 
            {
                if (stan[i].checked) 
                {

                }
            }

            var produk = document.getElementsByName('produkpilihan[]');
            for (var i=0, n=produk.length;i<n;i++) 
            {
                if (produk[i].checked) 
                {

                }
            }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            openall = false;
            alert(errorThrown);
          }
      }
    );
        var checkedstan;
        var allstan;
        var checkedproduk;
        var allproduk;

        $.ajax({
          type:"post",
          url: "<?php echo base_url('superadminfranchise/get_list_stan')?>/",
          data:{ id:id},
          dataType:"json",
          success:function(responsealldata)
          {
              var checkstanall = true;
              allstan = responsealldata;
              $.ajax({
                    type:"post",
                    url: "<?php echo base_url('superadminfranchise/select_edit_datatable_stan_promo')?>/",
                    data:{ id:id},
                    dataType:"json",
                    success:function(response)
                    {
                      checkedstan = response;
                      // var stan = document.getElementsByName('stanpilihan_edit[]');
                      // for (var i=0, n=stan.length;i<n;i++) 
                      // {
                      //     stan[i].checked = false;
                      //     for (var j = response.length - 1; j >= 0; j--) {
                            
                      //       if (stan[i].value == response[j].id_stan) 
                      //       {
                      //           stan[i].checked = true;
                      //       }
                      //     }
                      // }
                          if ( $.fn.DataTable.isDataTable( '#tableliststan_edit' ) ) {
                              $('#tableliststan_edit').DataTable().destroy();
                          }else{

                          }
                          $('#tableliststan_edit').DataTable().destroy();
                          liststanaddedit = $("#tableliststan_edit").dataTable({

                            "aaData" : allstan,
                            "aoColumns": [
                                { "mDataProp": "id_stan" },
                                { "mDataProp": "nama_stan" },
                                { "mDataProp": "alamat" },
                                { "mDataProp": "id_stan" }
                            ],
                            oLanguage: {
                              sProcessing: "loading..."
                            },
                            responsive: true,
                            // "scrollX": true,
                            // "scrollY":"300px",
                            // "scrollCollapse": true,
                            'columnDefs': [{
                               'targets': 3,
                               'searchable': false,
                               'orderable': false,
                               'className': 'dt-body-center',
                               'render': function (data, type, full, meta){
                                  var statuss = false;
                                  for (var j = checkedstan.length - 1; j >= 0; j--) {
                        
                                    if (full.id_stan == checkedstan[j].id_stan) 
                                    {
                                        statuss = true;
                                    }
                                  }

                                  if (statuss) {
                                    return '<input type="checkbox" name="stanpilihan_edit[]" value="' + $('<div/>').text(data).html() + '" checked onchange="check_stat_check_stan_edit()">';
                                  }else{
                                    checkstanall = false;
                                    return '<input type="checkbox" name="stanpilihan_edit[]" value="' + $('<div/>').text(data).html() + '" onchange="check_stat_check_stan_edit()">';
                                    
                                  }
                                }
                            }],
                            'order': [[1, 'asc']]
                          });

                          if (checkstanall) {
                            $('[name="checkerstan_edit"]').prop('checked', true);
                          }else{
                            $('[name="checkerstan_edit"]').prop('checked', false);
                          }

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                      if (openall == true) {
                        openall = false;
                      }
                      alert(errorThrown);
                    }
                }
              );

          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert(errorThrown);
          },
          complete: function (argument) {
            // body...
          }
        });




        $.ajax({
          type:"post",
          url: "<?php echo base_url('superadminfranchise/get_list_produk')?>/",
          data:{ id:id},
          dataType:"json",
          success:function(responsealldata1)
          {
            var checkprodukall = true;
              allproduk = responsealldata1;

              $.ajax({
                    type:"post",
                    url: "<?php echo base_url('superadminfranchise/select_edit_datatable_produk_promo')?>/",
                    data:{ id:id},
                    dataType:"json",
                    success:function(response1)
                    {
                      checkedproduk = response1;
                      // var produk = document.getElementsByName('produkpilihan_edit[]');
                      // for (var i=0, n=produk.length;i<n;i++) 
                      // {
                      //     produk[i].checked = false;
                      //     for (var j = response.length - 1; j >= 0; j--) {
                            
                      //       if (produk[i].value == response[j].id_produk) 
                      //       {
                      //           produk[i].checked = true;
                      //       }
                      //     }
                      // }

                      if ( ! $.fn.DataTable.isDataTable( '#tablelistproduk_edit' ) ) {
                        
                      }else{
                        $("#tablelistproduk_edit").DataTable().destroy();
                      }
                      $('#tablelistproduk_edit').DataTable().destroy();
                      listprodukaddedit = $("#tablelistproduk_edit").dataTable({
                            "aaData" : allproduk,
                                "aoColumns": [
                                    { "mDataProp": "id_produk" },
                                    { "mDataProp": "nama_produk" },
                                    { "mDataProp": "harga_jual" },
                                    { "mDataProp": "id_produk" }
                                ],
                                oLanguage: {
                                  sProcessing: "loading..."
                                },
                                responsive: true,
                                // "scrollX": true,
                                // "scrollY":"300px",
                                // "scrollCollapse": true,
                                'columnDefs': [{
                                   'targets': 3,
                                   'searchable': false,
                                   'orderable': false,
                                   'className': 'dt-body-center',
                                   'render': function (data, type, full, meta){
                                      var statusss = false;
                                      for (var j = checkedproduk.length - 1; j >= 0; j--) {
                            
                                        if (full.id_produk == checkedproduk[j].id_produk) 
                                        {
                                            statusss = true;
                                        }
                                      }

                                      if (statusss) {
                                        // return full.id_produk+'v';
                                        return '<input type="checkbox" name="produkpilihan_edit[]" value="' + $('<div/>').text(data).html() + '" checked onchange="check_stat_check_produk_edit()">';
                                      }else{
                                        // return full.id_produk+'x';
                                        checkprodukall = false;
                                        return '<input type="checkbox" name="produkpilihan_edit[]" value="' + $('<div/>').text(data).html() + '" onchange="onchange="check_stat_check_produk_edit()">';
                              
                                      }
                                    }
                                }],
                                'order': [[1, 'asc']]
                          });

                      if (checkprodukall) {
                            $('[name="checkerproduk_edit"]').prop('checked', true);
                          }else{
                            $('[name="checkerproduk_edit"]').prop('checked', false);
                          }
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                      if (openall == true) {
                        openall = false;
                      }
                      alert(errorThrown);
                    }
                }
              );
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert(errorThrown);
          }
        });

    if (openall == true) {
      $("#modaledit").modal('toggle');
    }else{
      alert('ERROR');
    }
  }

  $('#modaledit').on('hidden.bs.modal', function () {
        $('#nama_promo_edit').removeClass('is-invalid');
        $('#tanggal_mulai_edit').removeClass('is-invalid');
        $('#tanggal_akhir_edit').removeClass('is-invalid');
        $('#jam_mulai_edit').removeClass('is-invalid');
        $('#jam_akhir_edit').removeClass('is-invalid');
        $('#labelhari_edit').removeClass('red');
        $('#labelstan_edit').removeClass('red');
        $('#labelproduk_edit').removeClass('red');
        $("#nilai_promo_edit").removeClass('is-invalid');
  })

  function simpaneditpromo() {
    var status = false;
    var nama_promo_edit = $("#nama_promo_edit").val();

    var tanggal_mulai_edit = $("#tanggal_mulai_edit").val();
    var alltanggalmulai_edit = tanggal_mulai_edit.split("/");
    tanggal_mulai_edit = alltanggalmulai_edit[2]+"-"+alltanggalmulai_edit[1]+"-"+alltanggalmulai_edit[0];


    var tanggal_akhir_edit = $("#tanggal_akhir_edit").val();
    var alltanggalakhir_edit = tanggal_akhir_edit.split("/");
    tanggal_akhir_edit = alltanggalakhir_edit[2]+"-"+alltanggalakhir_edit[1]+"-"+alltanggalakhir_edit[0];

    var jam_mulai_edit =  $("#jam_mulai_edit").val();
    var jam_akhir_edit = $("#jam_akhir_edit").val();
    var hari_edit = document.getElementsByName('hari_edit[]');
    var hariall_edit = '';

    for (var i=0, n=hari_edit.length;i<n;i++) 
    {
        if (hari_edit[i].checked) 
        {
            if (hariall_edit == '') {
              hariall_edit = hari_edit[i].value;
            }else{
              hariall_edit += ","+hari_edit[i].value;
            }
        }
    }

    var jenis_edit =$("#jenispromo_edit").val();
    var nilai_promo_edit = $("#nilai_promo_edit").val();

    if (jenis_edit == 'nominal') {
      nilai_promo_edit = nilai_promo_edit.replace(".","");
    }

    var stan_edit = document.getElementsByName('stanpilihan_edit[]');
    var stanall_edit = '';

    for (var i=0, n=stan_edit.length;i<n;i++) 
    {
        if (stan_edit[i].checked) 
        {
          if (stanall_edit == '') {
            stanall_edit = stan_edit[i].value;
          }else{
            stanall_edit += ","+stan_edit[i].value;
          }
        }
    }

    var produk_edit = document.getElementsByName('produkpilihan_edit[]');
    var produkall_edit = '';

    for (var i=0, n=produk_edit.length;i<n;i++) 
    {
        if (produk_edit[i].checked) 
        {
          if (produkall_edit == '') {
            produkall_edit = produk_edit[i].value;
          }else{
            produkall_edit += ","+produk_edit[i].value;
          }
        }
    }

    var id_simpaneditpromo = $("#simpaneditpromo").val();
    var status_simpaneditpromo = $("#statuseditpromo").val();

    alert(nama_promo_edit+" "+tanggal_mulai_edit+" "+tanggal_akhir_edit+" "+jam_mulai_edit.length+" "+jam_akhir_edit+" "+hariall_edit+" "+jenis_edit+" "+nilai_promo_edit+" "+stanall_edit+" "+produkall_edit+" "+id_simpaneditpromo);

    if (nama_promo_edit.length!=0 && tanggal_mulai_edit!='undefined-undefined-' && tanggal_akhir_edit!='undefined-undefined-' && jam_mulai_edit.length!=0 && jam_akhir_edit.length!=0 && hariall_edit!='' && jenis_edit.length!=0 && stanall_edit!="" && produkall_edit!="") {
        $('#nama_promo_edit').removeClass('is-invalid');
        $('#tanggal_mulai_edit').removeClass('is-invalid');
        $('#tanggal_akhir_edit').removeClass('is-invalid');
        $('#jam_mulai_edit').removeClass('is-invalid');
        $('#jam_akhir_edit').removeClass('is-invalid');
        $('#labelhari_edit').removeClass('red');
        $('#labelstan_edit').removeClass('red');
        $('#labelproduk_edit').removeClass('red');
        if (jenis_edit == 'buy1get1' || jenis_edit == 'buy2get1') {
          $("#nilai_promo_edit").removeClass('is-invalid');
          status = true;
        }else if (nilai_promo_edit == '') {
          $("#nilai_promo_edit").addClass('is-invalid');
          alert("Silahkan periksa kembali inputan anda!");
        }else{
          $("#nilai_promo_edit").removeClass('is-invalid');
          status = true;
        }

        if (status == true) {
          $.ajax({
            type:"post",
            url: "<?php echo base_url('superadminfranchise/edit_promo')?>/",
            data:{id_simpaneditpromo:id_simpaneditpromo, status_simpaneditpromo:status_simpaneditpromo, nama_promo_edit:nama_promo_edit,tanggal_mulai_edit:tanggal_mulai_edit,tanggal_akhir_edit:tanggal_akhir_edit,jam_mulai_edit:jam_mulai_edit,jam_akhir_edit:jam_akhir_edit,hariall_edit:hariall_edit,jenis_edit:jenis_edit,nilai_promo_edit:nilai_promo_edit,stanall_edit:stanall_edit,produkall_edit:produkall_edit},
            success:function(response)
            {
              if (response == '1') {
                alert("Data berhasil diubah");
                $('#nama_promo_edit').val('');
                $('#tanggal_mulai_edit').val('');
                $('#tanggal_akhir_edit').val('');
                $('#jam_mulai_edit').val('');
                $('#jam_akhir_edit').val('');
                $("#jenispromo_edit").val('buy1get1');
                $("#nilai_promo_edit").val('');
                $("#labelnilaipromo_edit").text('Nilai Promo');
                $("#labelnilaipromo2_edit").html('<span class="fa fa-exclamation"></span>');

                for (var i=0, n=hari_edit.length;i<n;i++) 
                {
                    if (hari_edit[i].checked) 
                    {
                        hari_edit[i].checked = false;
                    }
                }

                for (var i=0, n=stan_edit.length;i<n;i++) 
                {
                    if (stan_edit[i].checked) 
                    {
                        stan_edit[i].checked = false;
                    }
                }

                for (var i=0, n=produk_edit.length;i<n;i++) 
                {
                    if (produk_edit[i].checked) 
                    {
                        produk_edit[i].checked = false;
                    }
                }

                $("#modaledit").modal('toggle');
                reload_table();
              }else{
                alert("Gagal Melakukan Proses Edit Data! Coba lagi!");
              }
              
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert(errorThrown);
            }
          }); 
        }
    }else{
        if (nama_promo_edit == '') {
          $('#nama_promo_edit').addClass('is-invalid');
        }else{
          $('#nama_promo_edit').removeClass('is-invalid');
        }

        if (tanggal_mulai_edit == 'undefined-undefined-') {
          $('#tanggal_mulai_edit').addClass('is-invalid');
        }else{
          $('#tanggal_mulai_edit').removeClass('is-invalid');
        }

        if (tanggal_akhir_edit == 'undefined-undefined-') {
          $('#tanggal_akhir_edit').addClass('is-invalid');
        }else{
          $('#tanggal_akhir_edit').removeClass('is-invalid');
        }
        alert(jam_mulai_edit);
        if (jam_mulai_edit == '') {
          $('#jam_mulai_edit').addClass('is-invalid');
        }else{
          $('#jam_mulai_edit').removeClass('is-invalid');
        }

        if (jam_akhir_edit == '') {
          $('#jam_akhir_edit').addClass('is-invalid');
        }else{
          $('#jam_akhir_edit').removeClass('is-invalid');
        }

        if (hariall_edit == '') {
          $('#labelhari_edit').addClass('red');
        }else{
          $('#labelhari_edit').removeClass('red');
        }

        if (stanall_edit == '') {
          $('#labelstan_edit').addClass('red');
        }else{
          $('#labelstan_edit').removeClass('red');
        }

        if (produkall_edit == '') {
          $('#labelproduk_edit').addClass('red');
        }else{
          $('#labelproduk_edit').removeClass('red');
        }

        if (jenis_edit == 'buy1get1' || jenis_edit == 'buy2get1') {
          $("#nilai_promo_edit").removeClass('is-invalid');
        }else if (nilai_promo == '') {
          $("#nilai_promo_edit").addClass('is-invalid');
        }else{
          $("#nilai_promo_edit").removeClass('is-invalid');
        }

        if (jenis_edit == 'buy1get1' || jenis_edit == 'buy2get1') {
          $("#nilai_promo_edit").removeClass('is-invalid');
        }else if (nilai_promo_edit == '') {
          $("#nilai_promo_edit").addClass('is-invalid');
        }else{
          $("#nilai_promo_edit").removeClass('is-invalid');
        }
        
        alert("Silahkan periksa kembali inputan anda!");
    }
        // $('#nama_promo').removeClass('is-invalid');
        // $('#tanggal_mulai').removeClass('is-invalid');
        // $('#tanggal_akhir').removeClass('is-invalid');
        // $('#jam_mulai').removeClass('is-invalid');
        // $('#jam_akhir').removeClass('is-invalid');
        // $('#labelhari').removeClass('red');
        // $('#labelstan').removeClass('red');
        // $('#labelproduk').removeClass('red');
        // if (jenis == 'buy1get1' || jenis == 'buy2get1') {
        //   $("#nilai_promo").removeClass('is-invalid');
        //   status = true;
        // }else if (nilai_promo == '') {
        //   $("#nilai_promo").addClass('is-invalid');
        // }else{
        //   $("#nilai_promo").removeClass('is-invalid');
        //   status = true;
        // }

        // if (status == true) {
        //   $.ajax({
        //     type:"post",
        //     url: "<?php echo base_url('superadminfranchise/tambah_promo')?>/",
        //     data:{ nama_promo:nama_promo,tanggal_mulai:tanggal_mulai,tanggal_akhir:tanggal_akhir,jam_mulai:jam_mulai,jam_akhir:jam_akhir,hariall:hariall,jenis:jenis,nilai_promo:nilai_promo,stanall:stanall,produkall:produkall},
        //     success:function(response)
        //     {
        //       if (response == '1') {
        //         alert("Data berhasil ditambahkan");
        //         $('#nama_promo').val('');
        //         $('#tanggal_mulai').val('');
        //         $('#tanggal_akhir').val('');
        //         $('#jam_mulai').val('');
        //         $('#jam_akhir').val('');
        //         $("#jenispromo").val('buy1get1');
        //         $("#nilai_promo").val('');
        //         $("#labelnilaipromo").text('Nilai Promo');
        //         $("#labelnilaipromo2").html('<span class="fa fa-exclamation"></span>');

        //         for (var i=0, n=hari.length;i<n;i++) 
        //         {
        //             if (hari[i].checked) 
        //             {
        //                 hari[i].checked = false;
        //             }
        //         }

        //         for (var i=0, n=stan.length;i<n;i++) 
        //         {
        //             if (stan[i].checked) 
        //             {
        //                 stan[i].checked = false;
        //             }
        //         }

        //         for (var i=0, n=produk.length;i<n;i++) 
        //         {
        //             if (produk[i].checked) 
        //             {
        //                 produk[i].checked = false;
        //             }
        //         }

        //         $("#modaltambah").modal('toggle');
        //         reload_table();
        //       }else{
        //         alert("Gagal Menambahkan Data! Coba lagi!");
        //       }
              
        //     },
        //     error: function (jqXHR, textStatus, errorThrown)
        //     {
        //       alert(errorThrown);
        //     }
        //   }); 
        // }
        
    // }else{
      // if (nama_promo == '') {
      //   $('#nama_promo').addClass('is-invalid');
      // }else{
      //   $('#nama_promo').removeClass('is-invalid');
      // }

      

      // if (tanggal_mulai == 'undefined-undefined-') {
      //   $('#tanggal_mulai').addClass('is-invalid');
      // }else{
      //   $('#tanggal_mulai').removeClass('is-invalid');
      // }

      // if (tanggal_akhir == 'undefined-undefined-') {
      //   $('#tanggal_akhir').addClass('is-invalid');
      // }else{
      //   $('#tanggal_akhir').removeClass('is-invalid');
      // }
      // alert(jam_mulai);
      // if (jam_mulai == '') {
      //   $('#jam_mulai').addClass('is-invalid');
      // }else{
      //   $('#jam_mulai').removeClass('is-invalid');
      // }

      // if (jam_akhir == '') {
      //   $('#jam_akhir').addClass('is-invalid');
      // }else{
      //   $('#jam_akhir').removeClass('is-invalid');
      // }

      // if (hariall == '') {
      //   $('#labelhari').addClass('red');
      // }else{
      //   $('#labelhari').removeClass('red');
      // }

      // if (stanall == '') {
      //   $('#labelstan').addClass('red');
      // }else{
      //   $('#labelstan').removeClass('red');
      // }

      // if (produkall == '') {
      //   $('#labelproduk').addClass('red');
      // }else{
      //   $('#labelproduk').removeClass('red');
      // }

      // if (jenis == 'buy1get1' || jenis == 'buy2get1') {
      //   $("#nilai_promo").removeClass('is-invalid');
      // }else if (nilai_promo == '') {
      //   $("#nilai_promo").addClass('is-invalid');
      // }else{
      //   $("#nilai_promo").removeClass('is-invalid');
      // }
      
      // alert("Silahkan periksa kembali inputan anda!");
    // }
  }

  function tambahpromo(){
    var status = false;
    var nama_promo = $("#nama_promo").val();

    var tanggal_mulai = $("#tanggal_mulai").val();
    var alltanggalmulai = tanggal_mulai.split("/");
    tanggal_mulai = alltanggalmulai[2]+"-"+alltanggalmulai[1]+"-"+alltanggalmulai[0];


    var tanggal_akhir = $("#tanggal_akhir").val();
    var alltanggalakhir = tanggal_akhir.split("/");
    tanggal_akhir = alltanggalakhir[2]+"-"+alltanggalakhir[1]+"-"+alltanggalakhir[0];

    var jam_mulai =  $("#jam_mulai").val();
    var jam_akhir = $("#jam_akhir").val();
    var hari = document.getElementsByName('hari[]');
    var hariall = '';

    for (var i=0, n=hari.length;i<n;i++) 
    {
        if (hari[i].checked) 
        {
            if (hariall == '') {
              hariall = hari[i].value;
            }else{
              hariall += ","+hari[i].value;
            }
        }
    }

    var jenis =$("#jenispromo").val();
    var nilai_promo = $("#nilai_promo").val();

    if (jenis == 'nominal') {
      nilai_promo = nilai_promo.replace(".","");
    }

    var stan = document.getElementsByName('stanpilihan[]');
    var stanall = '';

    for (var i=0, n=stan.length;i<n;i++) 
    {
        if (stan[i].checked) 
        {
          if (stanall == '') {
            stanall = stan[i].value;
          }else{
            stanall += ","+stan[i].value;
          }
        }
    }

    var produk = document.getElementsByName('produkpilihan[]');
    var produkall = '';

    for (var i=0, n=produk.length;i<n;i++) 
    {
        if (produk[i].checked) 
        {
          if (produkall == '') {
            produkall = produk[i].value;
          }else{
            produkall += ","+produk[i].value;
          }
        }
    }
    // alert(hariall);
    // alert(produkall);

    if (nama_promo.length!=0 && tanggal_mulai!='undefined-undefined-' && tanggal_akhir!='undefined-undefined-' && jam_mulai.length!=0 && jam_akhir.length!=0 && hariall!='' && jenis.length!=0 && stanall!="" && produkall!="") {
        $('#nama_promo').removeClass('is-invalid');
        $('#tanggal_mulai').removeClass('is-invalid');
        $('#tanggal_akhir').removeClass('is-invalid');
        $('#jam_mulai').removeClass('is-invalid');
        $('#jam_akhir').removeClass('is-invalid');
        $('#labelhari').removeClass('red');
        $('#labelstan').removeClass('red');
        $('#labelproduk').removeClass('red');
        if (jenis == 'buy1get1' || jenis == 'buy2get1') {
          $("#nilai_promo").removeClass('is-invalid');
          status = true;
        }else if (nilai_promo == '') {
          $("#nilai_promo").addClass('is-invalid');
        }else{
          $("#nilai_promo").removeClass('is-invalid');
          status = true;
        }

        if (status == true) {
          $.ajax({
            type:"post",
            url: "<?php echo base_url('superadminfranchise/tambah_promo')?>/",
            data:{ nama_promo:nama_promo,tanggal_mulai:tanggal_mulai,tanggal_akhir:tanggal_akhir,jam_mulai:jam_mulai,jam_akhir:jam_akhir,hariall:hariall,jenis:jenis,nilai_promo:nilai_promo,stanall:stanall,produkall:produkall},
            success:function(response)
            {
              if (response == '1') {
                alert("Data berhasil ditambahkan");
                $('#nama_promo').val('');
                $('#tanggal_mulai').val('');
                $('#tanggal_akhir').val('');
                $('#jam_mulai').val('');
                $('#jam_akhir').val('');
                $("#jenispromo").val('buy1get1');
                $("#nilai_promo").val('');
                $("#labelnilaipromo").text('Nilai Promo');
                $("#labelnilaipromo2").html('<span class="fa fa-exclamation"></span>');

                for (var i=0, n=hari.length;i<n;i++) 
                {
                    if (hari[i].checked) 
                    {
                        hari[i].checked = false;
                    }
                }

                for (var i=0, n=stan.length;i<n;i++) 
                {
                    if (stan[i].checked) 
                    {
                        stan[i].checked = false;
                    }
                }

                for (var i=0, n=produk.length;i<n;i++) 
                {
                    if (produk[i].checked) 
                    {
                        produk[i].checked = false;
                    }
                }

                $("#modaltambah").modal('toggle');
                reload_table();
              }else{
                alert("Gagal Menambahkan Data! Coba lagi!");
              }
              
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert(errorThrown);
            }
          }); 
        }
        
    }else{
      if (nama_promo == '') {
        $('#nama_promo').addClass('is-invalid');
      }else{
        $('#nama_promo').removeClass('is-invalid');
      }

      

      if (tanggal_mulai == 'undefined-undefined-') {
        $('#tanggal_mulai').addClass('is-invalid');
      }else{
        $('#tanggal_mulai').removeClass('is-invalid');
      }

      if (tanggal_akhir == 'undefined-undefined-') {
        $('#tanggal_akhir').addClass('is-invalid');
      }else{
        $('#tanggal_akhir').removeClass('is-invalid');
      }

      if (jam_mulai == '') {
        $('#jam_mulai').addClass('is-invalid');
      }else{
        $('#jam_mulai').removeClass('is-invalid');
      }

      if (jam_akhir == '') {
        $('#jam_akhir').addClass('is-invalid');
      }else{
        $('#jam_akhir').removeClass('is-invalid');
      }

      if (hariall == '') {
        $('#labelhari').addClass('red');
      }else{
        $('#labelhari').removeClass('red');
      }

      if (stanall == '') {
        $('#labelstan').addClass('red');
      }else{
        $('#labelstan').removeClass('red');
      }

      if (produkall == '') {
        $('#labelproduk').addClass('red');
      }else{
        $('#labelproduk').removeClass('red');
      }

      if (jenis == 'buy1get1' || jenis == 'buy2get1') {
        $("#nilai_promo").removeClass('is-invalid');
      }else if (nilai_promo == '') {
        $("#nilai_promo").addClass('is-invalid');
      }else{
        $("#nilai_promo").removeClass('is-invalid');
      }
      
      alert("Silahkan periksa kembali inputan anda!");
    }
  }

  function changeNilaiPromo(id){
    if (id == 'jenispromo') {
      var jenis = document.getElementById("jenispromo");
      var valjenis = jenis.options[jenis.selectedIndex].value;
      if (valjenis == 'buy1get1' || valjenis == 'buy2get1') {
        document.getElementById("nilai_promo").disabled = true;
        $("#labelnilaipromo").text("Nilai Promo");
        $("#labelnilaipromo2").html("<span class='fa fa-exclamation'></span>");
        
      }else if (valjenis =='nominal') {
        document.getElementById("nilai_promo").disabled = false;
        $("#labelnilaipromo").text("Nilai Promo (Rupiah)");
        $("#labelnilaipromo2").text("Rp");
      }else if(valjenis == 'persen'){
        document.getElementById("nilai_promo").disabled = false;
        $("#labelnilaipromo").text("Nilai Promo (%)");
        $("#labelnilaipromo2").text("%");
      }
      document.getElementById("nilai_promo").value = '';
    }else{
      var jenis = document.getElementById("jenispromo_edit");
      var valjenis = jenis.options[jenis.selectedIndex].value;
      if (valjenis == 'buy1get1' || valjenis == 'buy2get1') {
        document.getElementById("nilai_promo_edit").disabled = true;
        $("#labelnilaipromo_edit").text("Nilai Promo");
        $("#labelnilaipromo2_edit").html("<span class='fa fa-exclamation'></span>");
        
      }else if (valjenis =='nominal') {
        document.getElementById("nilai_promo_edit").disabled = false;
        $("#labelnilaipromo_edit").text("Nilai Promo (Rupiah)");
        $("#labelnilaipromo2_edit").text("Rp");
      }else if(valjenis == 'persen'){
        document.getElementById("nilai_promo_edit").disabled = false;
        $("#labelnilaipromo_edit").text("Nilai Promo (%)");
        $("#labelnilaipromo2_edit").text("%");
      }
      document.getElementById("nilai_promo_edit").value = '';
    }
    
  }

  function currency(x,id) {

        var jns = document.getElementById(id);
      
      var valjenis = jns.options[jns.selectedIndex].value;
      if (valjenis == 'nominal') {
        var retVal=x.toString().replace(/[^\d]/g,'');
        while(/(\d+)(\d{3})/.test(retVal)) {
          retVal=retVal.replace(/(\d+)(\d{3})/,'$1'+'.'+'$2');
        }
        return retVal;
      }else{
        var retVal=x.toString().replace(/[^\d]/g,'');
        var x = parseFloat(retVal);
        if (isNaN(x) || x < 0 || x > 100) {
            if (x<0) {
              return '0';
            }else if (x>100) {
              return '100';
            }else{
              return '';
            }
        }
        return retVal;
      }
      
  }

  function openDatatable() {
    if ( ! $.fn.DataTable.isDataTable( '#tableliststan' ) ) {
      liststanadd = $("#tableliststan").dataTable({
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
        "url"    : "<?php echo base_url('superadminfranchise/show_list_stan');?>",
        "dataSrc": function (json) {
          var return_data = new Array();
          for(var i=0;i< json.data.length; i++){
            return_data.push({
              'id_stan': json.data[i].id_stan,
              'nama_stan' : json.data[i].nama_stan,
              'alamat' : json.data[i].alamat,
              'pilih' : '<input type="checkbox" name="stanpilihan[]" value="'+json.data[i].id_stan+'" class="" onchange="check_stat_check_stan()">',
              // 'hari' : json.data[i].hari,
              // 'waktu' : json.data[i].jam_mulai+' - '+json.data[i].jam_akhir,
              // 'edit' : '<button onclick=edit_diskon("'+json.data[i].id_diskon+'") class="btn btn-warning" style="color:white;">Edit</button> ',
              // 'status' : '<button onclick=status_diskon("'+json.data[i].id_diskon+'") class="btn btn-info" style="color:white;">'+statuspromo(json.data[i].status)+'</button>'
            })
          }
          return return_data;
        }
      },
      columns    : [
        {'data': 'id_stan'},
        {'data': 'nama_stan'},
        {'data': 'alamat'},
        {'data': 'pilih','orderable':false,'searchable':false},
      ],
      'columnDefs': [
        {
            "targets": 3, // your case first column
            "className": "text-center",
            // "width": "4%"
       }],

          rowCallback: function(row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            // $('td:eq(0)', row).html(index);
          }
        });  
    }

    if ( ! $.fn.DataTable.isDataTable( '#tablelistproduk' ) ) {
      listprodukadd = $("#tablelistproduk").dataTable({
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
        "url"    : "<?php echo base_url('superadminfranchise/show_list_produk');?>",
        "dataSrc": function (json) {
          var return_data = new Array();
          for(var i=0;i< json.data.length; i++){
            return_data.push({
              'id_produk': json.data[i].id_produk,
              'nama_produk' : json.data[i].nama_produk,
              'harga_jual' : json.data[i].harga_jual,
              'pilih' : '<input type="checkbox" name="produkpilihan[]" value="'+json.data[i].id_produk+'" class="" onchange="check_stat_check_produk()">'
              // 'hari' : json.data[i].hari,
              // 'waktu' : json.data[i].jam_mulai+' - '+json.data[i].jam_akhir,
              // 'edit' : '<button onclick=edit_diskon("'+json.data[i].id_diskon+'") class="btn btn-warning" style="color:white;">Edit</button> ',
              // 'status' : '<button onclick=status_diskon("'+json.data[i].id_diskon+'") class="btn btn-info" style="color:white;">'+statuspromo(json.data[i].status)+'</button>'
            })
          }
          return return_data;
        }
      },
      columns    : [
        {'data': 'id_produk'},
        {'data': 'nama_produk'},
        {'data': 'harga_jual'},
        {'data': 'pilih','orderable':false,'searchable':false},
      ],
      'columnDefs': [
        {
            "targets": 3, // your case first column
            "className": "text-center",
            // "width": "4%"
       }],

          rowCallback: function(row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            // $('td:eq(0)', row).html(index);
          }
        });
    }
  }

</script>






<!-- 
    if ( ! $.fn.DataTable.isDataTable( '#tableliststan_edit' ) ) {
      liststanadd = $("#tableliststan_edit").dataTable({
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
          // "searching": false,
          // paging:false,
          // ordering:false,
          // scrollX:true,
          // "scrollY":"300px",
          // "scrollCollapse": true,
          ajax: {
        "type"   : "POST",
        "url"    : "<?php echo base_url('superadminfranchise/show_list_stan');?>",
        "dataSrc": function (json) {
          var return_data = new Array();
          for(var i=0;i< json.data.length; i++){
            return_data.push({
              'id_stan': json.data[i].id_stan,
              'nama_stan' : json.data[i].nama_stan,
              'alamat' : json.data[i].alamat,
              'pilih' : json.data[i].id_stan,
            })
          }
          return return_data;
        }
      },
      columns    : [
        {'data': 'id_stan'},
        {'data': 'nama_stan'},
        {'data': 'alamat'},
        {'data': 'pilih','orderable':false,'searchable':false},
      ],
      'columnDefs': [
        {
            "targets": 3, // your case first column
            "className": "text-center",
            'render': function (data, type, full, meta){
                  var status = false;
                  for (var j = response.length - 1; j >= 0; j--) {
                    
                    if (full[3] == response[j].id_stan) 
                    {
                       status = true;
                    }
                  }

                  if (status == true) {
                    return '<input type="checkbox" name="stanpilihan_edit[]" value="' + full[3] + '" checked="true">';
                  }else{
                    return '<input type="checkbox" name="stanpilihan_edit[]" value="' + full[3] + '">';
                  }
                 
             }
       }],

          rowCallback: function(row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            // $('td:eq(0)', row).html(index);
          }
        });  
    }


    if ( ! $.fn.DataTable.isDataTable( '#tablelistproduk_edit' ) ) {
      listprodukadd = $("#tablelistproduk_edit").dataTable({
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
          responsive: false,
          serverSide: true,
          "searching": false,
          paging:false,
          ordering:false,
          "scrollX": true,
          "scrollY":"300px",
          "scrollCollapse": true,
          ajax: {
        "type"   : "POST",
        "url"    : "<?php echo base_url('superadminfranchise/show_list_produk');?>",
        "dataSrc": function (json) {
          var return_data = new Array();
          for(var i=0;i< json.data.length; i++){
            return_data.push({
              'id_produk': json.data[i].id_produk,
              'nama_produk' : json.data[i].nama_produk,
              'harga_jual' : json.data[i].harga_jual,
              'pilih' : '<input type="checkbox" name="produkpilihan_edit[]" value="'+json.data[i].id_produk+'" class="">'
            })
          }
          return return_data;
        }
      },
      columns    : [
        {'data': 'id_produk'},
        {'data': 'nama_produk'},
        {'data': 'harga_jual'},
        {'data': 'pilih','orderable':false,'searchable':false},
      ],
      'columnDefs': [
        {
            "targets": 3, // your case first column
            "className": "text-center",
            // "width": "4%"
       }],

          rowCallback: function(row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            // $('td:eq(0)', row).html(index);
          }
        }); -->