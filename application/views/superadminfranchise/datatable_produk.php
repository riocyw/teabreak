
<script type="text/javascript">
  var tabeldata ;

  function edit_produk(id){
    alert(id);
  }

  function delete_produk(id){
     if(confirm('Apakah anda yakin ingin menghapus data ini??'))
    {
      $.ajax(
                {
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
        .off('.DT')
        .on('keyup.DT', function(e) {
          if (e.keyCode == 13) {
            api.search(this.value).draw();
          }
        });
      },
      oLanguage: {
        sProcessing: "loading..."
      },
      serverSide: true,
      ajax: {"url": "<?php echo base_url('superadminfranchise/produk_data');?>", "type": "POST"},
      columns: 
      [

      {"data": "id_produk",
      "orderable": false},
      {"data": "nama_produk"},
      {"data": "kategori"},
      {"data": "edit",
      "orderable": false},
{"data": "delete",
      "orderable": false},
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