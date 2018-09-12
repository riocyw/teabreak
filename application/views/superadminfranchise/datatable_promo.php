<script type="text/javascript">
  var tabeldata ;
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
      for(var i=0;i< json.data.length; i++){
        return_data.push({
          'nama_diskon': json.data[i].nama_diskon,
          'jenis_diskon' : json.data[i].jenis_diskon,
          'tanggal_mulai' : json.data[i].tanggal_mulai,
          'tanggal_akhir' : json.data[i].tanggal_akhir,
          'hari' : json.data[i].hari,
          'waktu' : json.data[i].jam_mulai+' - '+json.data[i].jam_akhir,
          'edit' : '<button onclick=edit_diskon("'+json.data[i].id_diskon+'") class="btn btn-warning" style="color:white;">Edit</button> ',
          'status' : '<button onclick=status_diskon("'+json.data[i].id_diskon+'") class="btn btn-info" style="color:white;">'+statuspromo(json.data[i].status)+'</button>'
        })
      }
      return return_data;
    }
  },
  "columns"    : [
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
  if(status==1){
    return "Aktif"
  }else{
    return "Tidak Aktif"
  }
}

</script>