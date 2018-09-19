
<script type="text/javascript">
  var tabeldata ;

  $('#harga').on('input propertychange paste', function (e) {
    var reg = /^0+/gi;
    if (this.value.match(reg)) {
      this.value = this.value.replace(reg, '');
    }
  });
  function currency(x) {
    var retVal=x.toString().replace(/[^\d]/g,'');
    while(/(\d+)(\d{3})/.test(retVal)) {
      retVal=retVal.replace(/(\d+)(\d{3})/,'$1'+'.'+'$2');
    }
    return retVal;
  }

  function tambahproduk(){
    var id = $("#id").val();
    var nama = $("#nama").val();
    var kategori = $("#kategori").val();
    var harga = $("#harga").val();
    harga = harga.replace(".","");
    if (id.replace(/\s/g, '').length>3&&nama.replace(/\s/g, '').length>3&&kategori.replace(/\s/g, '').length>3&&harga.replace(/\s/g, '').length>0) {
        $.ajax(
            {
                type:"post",
                url: "<?php echo base_url('superadminfranchise/tambah_produk')?>/",
                data:{ id:id,nama:nama,kategori:kategori,harga:harga},
                success:function(response)
                {
                  if(response == 'Berhasil Ditambahkan'){
                    reload_table();
                    if($('#id').has("error")){
                      $('#id').removeClass("error");
                    }
                    if($('#nama').has("error")){
                      $('#nama').removeClass("error");
                    }
                    if($('#kategori').has("error")){
                      $('#kategori').removeClass("error");
                    }
                    if($('#harga').has("error")){
                      $('#harga').removeClass("error");
                    }
                    $("#id").val('');
                    $("#nama").val('');
                    $("#kategori").val('');
                    $("#harga").val('');
                    $("#id").focus();
                    alert(response);
                  }else if(response =='ID Data Sudah ada di dalam database'){

                    $('#id').addClass("error");
                    
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
        if (id.replace(/\s/g, '').length<=3) {
            $('#id').addClass("error");
        }else{
            if($('#id').has("error")){
                $('#id').removeClass("error");
            }
        }

        if (nama.replace(/\s/g, '').length<=3) {
            $('#nama').addClass("error");
        }else{
            if($('#nama').has("error")){
                $('#nama').removeClass("error");
            }
        }

        if (harga.replace(/\s/g, '').length<=3) {
            $('#harga').addClass("error");
        }else{
            if($('#harga').has("error")){
                $('#harga').removeClass("error");
            }
        }

        if (kategori.replace(/\s/g, '').length<=3) {
            $('#kategori').addClass("error");
        }else{
            if($('#kategori').has("error")){
                $('#kategori').removeClass("error");
            }
        }

        alert("Silahkan periksa kembali inputan anda!");
    }
  }

  function edit_produk(id){
    $.ajax({
          type:"post",
          url: "<?php echo base_url('superadminfranchise/select_edit_produk')?>/",
          data:{ id:id},
          dataType:"json",
          success:function(response)
          {
            $("#editid").val(response[0].id_produk);
            $("#id_lama").val(response[0].id_produk);
            $("#editkategori").val(response[0].kategori);
            $("#editnama").val(response[0].nama_produk);
            $("#editharga").val(currency(response[0].harga_jual));
            $("#modal_edit").modal('show');
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert(errorThrown);
          }
      }
    );
  }

  function simpanedit(){
    var id = $("#editid").val();
    var idlama = $("#id_lama").val();
    var kategori = $("#editkategori").val();
    var nama =  $("#editnama").val();
    var harga = $("#editharga").val();
    harga = harga.replace(".","");
    if (id.replace(/\s/g, '').length>3&&nama.replace(/\s/g, '').length>3&&kategori.replace(/\s/g, '').length>3&&harga>=0) {
    $.ajax({
          type:"post",
          url: "<?php echo base_url('superadminfranchise/edit_produk')?>/",
          data:{ id:id,kategori:kategori,nama:nama,harga:harga,idlama:idlama},
          success:function(response)
          {
            if(response == 'Berhasil Diupdate'){
              $("#modal_edit").modal('hide');
              if($('#editid').has("error")){
                $('#editid').removeClass("error");
              }
              if($('#editnama').has("error")){
                $('#editnama').removeClass("error");
              }
              if($('#editkategori').has("error")){
                $('#editkategori').removeClass("error");
              }
              if($('#editharga').has("error")){
                $('#editharga').removeClass("error");
              }
              reload_table();
              alert(response);
            }else if(response=='Update Error! ID Data Sudah ada di dalam database'){

              $('#editid').addClass("error");
              alert(response);
            }else{
              alert('unknown error is happen! try again.');
            }
            
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert(errorThrown);
          }
      });
    }else{
      if (id.replace(/\s/g, '').length<=3) {
        $('#editid').addClass("error");
      }else{
        if($('#editid').has("error")){
          $('#editid').removeClass("error");
        }
      }
      if (nama.replace(/\s/g, '').length<=3) {
        $('#editnama').addClass("error");
      }else{
        if($('#editnama').has("error")){
          $('#editnama').removeClass("error");
        }
      }
      if (kategori.replace(/\s/g, '').length<=3) {
        $('#editkategori').addClass("error");
      }else{
        if($('#editkategori').has("error")){
          $('#editkategori').removeClass("error");
        }
      }
      if (harga.replace(/\s/g, '').length<=3) {
        $('#editharga').addClass("error");
      }else{
        if($('#editharga').has("error")){
          $('#editharga').removeClass("error");
        }
      }
      alert("Silahkan periksa kembali inputan anda!");
    }
  }

  function delete_produk(id){
     if(confirm('Apakah anda yakin ingin menghapus data ini??')){
      $.ajax({
              type:"post",
              url: "<?php echo base_url('superadminfranchise/delete_produk')?>/",
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
    "url"    : "<?php echo base_url('superadminfranchise/produk_data');?>",
    "dataSrc": function (json) {
      var return_data = new Array();
      for(var i=0;i< json.data.length; i++){
        return_data.push({
          'id_produk': json.data[i].id_produk,
          'nama_produk'  : json.data[i].nama_produk,
          'kategori' : json.data[i].kategori,
          'harga_jual' : "Rp "+currency(json.data[i].harga_jual),
          'edit' : '<button onclick=edit_produk("'+json.data[i].id_produk+'") class="btn btn-warning" style="color:white;">Edit</button> ',
          'hapus' : '<button onclick=delete_produk("'+json.data[i].id_produk+'") class="btn btn-danger" style="color:white;">Delete</button>'
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
                filename: 'Produk Data',
                exportOptions: {
                  columns:[0,1,2,3]
                }
            },{
                extend: 'excelHtml5',
                text: 'Excel',
                className: 'exportExcel',
                filename: 'Produk Data',
                exportOptions: {
                  columns:[0,1,2,3]
                }
            },{
                extend: 'csvHtml5',
                filename: 'Produk Data',
                exportOptions: {
                  columns:[0,1,2,3]
                }
            },{
                extend: 'pdfHtml5',
                filename: 'Produk Data',
                exportOptions: {
                  columns:[0,1,2,3]
                }
            },{
                extend: 'print',
                filename: 'Produk Data',
                exportOptions: {
                  columns:[0,1,2,3]
                }
            }
        ],
        "lengthChange": true,
  columns: [
    {'data': 'id_produk'},
    {'data': 'nama_produk'},
    {'data': 'kategori'},
    {'data': 'harga_jual'},
    {'data': 'edit','orderable':false,'searchable':false},
    {'data': 'hapus','orderable':false,'searchable':false}
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


</script>