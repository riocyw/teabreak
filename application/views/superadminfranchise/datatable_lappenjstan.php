<script type="text/javascript">
	var tabeldata;
	tabeldata = $("#mytable").dataTable({

	  //     initComplete: function() {
	  //       var api = this.api();
	  //       $('#mytable_filter input')
	  //       .on('.DT')
	  //       .on('keyup.DT', function(e) {
	  //         if (e.keyCode == 13) {
	  //           api.search(this.value).draw();
	  //         }
	  //       });
	  //     },
	  //     oLanguage: {
	  //       sProcessing: "loading..."
	  //     },
	  //     responsive: true,
	  //     serverSide: true,
	  //     ajax: {
	  //   "type"   : "POST",
	  //   "url"    : "<?php echo base_url('superadminfranchise/produk_data');?>",
	  //   "dataSrc": function (json) {
	  //     var return_data = new Array();
	  //     for(var i=0;i< json.data.length; i++){
	  //       return_data.push({
	  //         'id_produk': json.data[i].id_produk,
	  //         'nama_produk'  : json.data[i].nama_produk,
	  //         'kategori' : json.data[i].kategori,
	  //         'harga_jual' : "Rp "+currency(json.data[i].harga_jual),
	  //         'edit' : '<button onclick=edit_produk("'+json.data[i].id_produk+'") class="btn btn-warning" style="color:white;">Edit</button> ',
	  //         'hapus' : '<button onclick=delete_produk("'+json.data[i].id_produk+'") class="btn btn-danger" style="color:white;">Delete</button>'
	  //       })
	  //     }
	  //     return return_data;
	  //   }
	  // },
	  //  dom: 'Bfrtlip',
	  //       buttons: [
	  //           {
	  //               extend: 'copyHtml5',
	  //               text: 'Copy',
	  //               filename: 'Produk Data',
	  //               exportOptions: {
	  //                 columns:[0,1,2,3]
	  //               }
	  //           },{
	  //               extend: 'excelHtml5',
	  //               text: 'Excel',
	  //               className: 'exportExcel',
	  //               filename: 'Produk Data',
	  //               exportOptions: {
	  //                 columns:[0,1,2,3]
	  //               }
	  //           },{
	  //               extend: 'csvHtml5',
	  //               filename: 'Produk Data',
	  //               exportOptions: {
	  //                 columns:[0,1,2,3]
	  //               }
	  //           },{
	  //               extend: 'pdfHtml5',
	  //               filename: 'Produk Data',
	  //               exportOptions: {
	  //                 columns:[0,1,2,3]
	  //               }
	  //           },{
	  //               extend: 'print',
	  //               filename: 'Produk Data',
	  //               exportOptions: {
	  //                 columns:[0,1,2,3]
	  //               }
	  //           }
	  //       ],
	  //       "lengthChange": true,
	  // columns: [
	  //   {'data': 'id_produk'},
	  //   {'data': 'nama_produk'},
	  //   {'data': 'kategori'},
	  //   {'data': 'harga_jual'},
	  //   {'data': 'edit','orderable':false,'searchable':false},
	  //   {'data': 'hapus','orderable':false,'searchable':false}
	  // ],

	  //     rowCallback: function(row, data, iDisplayIndex) {
	  //       var info = this.fnPagingInfo();
	  //       var page = info.iPage;
	  //       var length = info.iLength;
	  //       var index = page * length + (iDisplayIndex + 1);
	  //       // $('td:eq(0)', row).html(index);
	  //     }
	    });
</script>