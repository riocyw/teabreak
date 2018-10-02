<script type="text/javascript">
	var tabeldata;
	var tabeldetail;
	
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
			    "url"    : "<?php echo base_url('superadminfranchise/stokData');?>",
			    "dataSrc": function (json) {
			      var return_data = new Array();
			      var total_harga_akhir = 0;

			      for(var i=0;i< json.length; i++){
			        return_data.push({
			          'tanggal': json[i].tanggal,
			          'id_bahan_jadi'  : json[i].id_bahan_jadi,
			          'nama_bahan_jadi' : json[i].nama_bahan_jadi,
			          'stok_sisa' : json[i].stok_sisa
			        });
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
				    {'data': 'tanggal'},
				    {'data': 'id_bahan_jadi'},
				    {'data': 'nama_bahan_jadi'},
				    {'data': 'stok_sisa'}
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

</script>