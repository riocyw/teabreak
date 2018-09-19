<script type="text/javascript">
	var tabeldata;
	
	$.ajax({
          type:"post",
          url: "<?php echo base_url('superadminfranchise/get_list_stan')?>/",
          data:{},
          dataType:"json",
          success:function(response)
          {
          	var htmlinsideselect = '';
          	for (var j = response.length - 1; j >= 0; j--) {
          		if (j==response.length-1) {
          			htmlinsideselect = htmlinsideselect + '<option selected="selected" value="'+response[j].id_stan+'">'+response[j].nama_stan +' ( '+response[j].alamat+' )' +'</option>';
          		}else{
          			htmlinsideselect = htmlinsideselect + '<option value="'+response[j].id_stan+'">'+response[j].nama_stan +' ( '+response[j].alamat+' )' +'</option>';
          		}
          		
	        }
	        $("#select_stan").html(htmlinsideselect);
	        
	        tabeldata = $("#mytable").DataTable({
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
		      ajax: {
			    "type"   : "POST",
			    "data": function(data) {
				  data.tanggal_awal = $('#tanggal_awal').val();
				  data.tanggal_akhir = $('#tanggal_akhir').val();
				  data.id_stan = $('#select_stan').val();
				},
			    "url"    : "<?php echo base_url('superadminfranchise/notaData');?>",
			    "dataSrc": function (json) {
			      var return_data = new Array();
			      var total_harga_akhir = 0;

			      for(var i=0;i< json.length; i++){

			        return_data.push({
			          'id_nota': json[i].id_nota,
			          'tanggal_nota'  : json[i].tanggal_nota,
			          'total_harga_jual' : "Rp "+currency(json[i].total_harga),
			          'detail' : '<button onclick=detail_nota("'+json[i].id_nota+'") class="btn btn-warning" style="color:white;">Detail</button> '
			        });
		    		total_harga_akhir = total_harga_akhir + parseInt(json[i].total_harga);
			      }
			      $("#total_harga_akhir").html('Total Penjualan Rp '+currency(parseInt(total_harga_akhir))+',-');

			     //  var eachharga = tabeldata.columns( 2 ).data().eq( 0 );
			    	
			    	// for (var i = eachharga.length - 1; i >= 0; i--) {
			    	// 	alert(eachharga[i]);
			    	// 	var nominal = eachharga[i].replace('Rp ','');
			    	// 	nominal = nominal.replace('.','');
			    	// 	total_harga_akhir = total_harga_akhir + nominal;
			    	// }
			    	
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
		                  columns:[0,1,2]
		                }
		            },{
		                extend: 'excelHtml5',
		                text: 'Excel',
		                className: 'exportExcel',
		                filename: 'Produk Data',
		                exportOptions: {
		                  columns:[0,1,2]
		                }
		            },{
		                extend: 'csvHtml5',
		                filename: 'Produk Data',
		                exportOptions: {
		                  columns:[0,1,2]
		                }
		            },{
		                extend: 'pdfHtml5',
		                filename: 'Produk Data',
		                exportOptions: {
		                  columns:[0,1,2]
		                }
		            },{
		                extend: 'print',
		                filename: 'Produk Data',
		                exportOptions: {
		                  columns:[0,1,2]
		                }
		            }
		        ],
		        "lengthChange": true,
		  columns: [
		    {'data': 'id_nota'},
		    {'data': 'tanggal_nota'},
		    {'data': 'total_harga_jual'},
		    {'data': 'detail','orderable':false,'searchable':false}
		  ],
	    	});
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert(errorThrown);
          }
      }
    );

    function refreshTable() {
    	reload_table();
    }

    function reload_table(){
	  tabeldata.ajax.reload();
	}

	function currency(x) {
	    var retVal=x.toString().replace(/[^\d]/g,'');
	    while(/(\d+)(\d{3})/.test(retVal)) {
	      retVal=retVal.replace(/(\d+)(\d{3})/,'$1'+'.'+'$2');
	    }
	    return retVal;
	  }

	 function detail_nota(id) {
	 	$.ajax({
	          type:"post",
	          url: "<?php echo base_url('superadminfranchise/select_detail_nota')?>/",
	          data:{ id:id},
	          dataType:"json",
	          success:function(response)
	          {
	            // $("#editid").val(response[0].id_produk);
	            // $("#id_lama").val(response[0].id_produk);
	            // $("#editkategori").val(response[0].kategori);
	            // $("#editnama").val(response[0].nama_produk);
	            // $("#editharga").val(currency(response[0].harga_jual));
	            //DETAILLLL
	            $("#modalDetail").modal('toggle');
	          },
	          error: function (jqXHR, textStatus, errorThrown)
	          {
	            alert(errorThrown);
	          }
	      }
	    );
	 }
</script>