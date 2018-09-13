<?php





defined('BASEPATH') OR exit('No direct script access allowed');


class SuperAdminFranchise extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->helper('url');
	    $this->load->helper('site_helper');
	    $this->load->model('Post');
	    $this->load->model('Produk');
  	}
  	
	public function dashboard()
	{
		$this->load->view('superadminfranchise/dashboard');
	}

	public function masterdataproduk()
	{
		$this->load->view('superadminfranchise/masterdataproduk');
		$this->load->view('superadminfranchise/datatable_produk');
	}

	public function tambah_produk(){
		
		$data = array(
	        'id_produk' => $this->input->post('id'),
	        'nama_produk' => $this->input->post('nama'),
	        'kategori' => $this->input->post('kategori'),
	        'harga_jual' => $this->input->post('harga')
	         );
		$this->Produk->insert('produk',$data);
	}

	public function data_kategori(){
		$data = $this->db->distinct()->select('kategori')->from('produk')->get();
		echo json_encode($data->result());
	}

	public function promo_data(){
		$this->load->library('datatables');
		$this->datatables->select('id_diskon,nama_diskon,jenis_diskon,tanggal_mulai,tanggal_akhir,hari,jam_mulai,jam_akhir');
		$this->datatables->from('diskon');
		echo $this->datatables->generate();
	}

	//SHOW DATATABLE DETAIL DISKON - STAN

	public function promo_detail_stan(){
		$this->load->library('datatables');
		$this->datatables->select('id_stan');
		$this->datatables->from('detail_stan_diskon');
		$this->datatables->where('id_diskon',"".$this->input->post('id_diskon'));
		echo $this->datatables->generate();
	}

	//SHOW DATATABLE DETAIL DISKON - PRODUK

	public function promo_detail_produk(){
		$this->load->library('datatables');
		$this->datatables->select('id_produk');
		$this->datatables->from('detail_barang_diskon');
		$this->datatables->where('id_diskon',"".$this->input->post('id_diskon'));
		echo $this->datatables->generate();
	}

    //FUNCTION FOR MASTER DATA PRODUK (HELPER)
	public function produk_data(){
		$this->load->library('datatables');
		$this->datatables->select('id_produk,nama_produk,kategori,harga_jual');
		$this->datatables->from('produk');
		
		echo $this->datatables->generate();

		// Datatables Variables (Cara Manual*)
		// $draw = intval($this->input->get("draw"));
		// $start = intval($this->input->get("start"));
		// $length = intval($this->input->get("length"));
		// $produk = $this->Produk->getProduk('produk');
		// $data = array();

		// foreach ($produk->result() as $d) {
		// 	$d->harga_jual = number_format($d->harga_jual,0,",",".");
		// 	$data[] = array(
		// 		$d->id_produk,
		// 		$d->nama_produk,
		// 		$d->kategori,
		// 		$d->harga_jual,
		// 	);
		// }

		// $output = array(
		// 	"draw" => $draw,
		// 	"recordsTotal" => $produk->num_rows(),
		// 	"recordsFiltered" => $produk->num_rows(),
		// 	"data" => $data,
		// );
		// echo json_encode($output);
		// exit();
	}

	public function select_edit_produk(){
		$id = $this->input->post('id');
		$data = $this->Produk->getData("id_produk='".$id."'",'produk');
		echo json_encode($data);
	}

	public function edit_produk(){
		$id = $this->input->post('id');
		$where = array('id_produk' => $id);

		$data = array(
			'id_produk' => $id,
	        'nama_produk' => $this->input->post('nama'),
	        'kategori' => $this->input->post('kategori'),
	        'harga_jual' => $this->input->post('harga')
	         );
		$this->Post->Update('produk',$data,$where);
	}

	public function delete_produk(){
		$id = $this->input->post('id');
		$this->Produk->Delete('produk',$id);
	}

	public function masterdatastan(){
		// $data = [];
  //     $alldata = $this->Post->getAllData("stan");
  //     foreach ($alldata as $value) {
  //     	array_push($data, array($value["id_stan"],$value["nama_stan"],$value["alamat"],$value["password"],"<button class='btn btn-warning'>Edit</button>","<button class='btn btn-danger'>Delete</button>"));
  //     }
      // var_dump(json_encode($data));
		$this->load->view('superadminfranchise/masterdatastan');
		$this->load->view('superadminfranchise/datatable_stan');
	}

	public function datastan(){
		$this->load->library('datatables');
		$this->datatables->select('id_stan,nama_stan,alamat,password');
		$this->datatables->from('stan');
		echo$this->datatables->generate();
	}

	public function tambah_stan(){
		$data = array(
	        'id_stan' => $this->input->post('id'),
	        'nama_stan' => $this->input->post('nama'),
	        'alamat' => $this->input->post('alamat'),
	        'password' => $this->input->post('password')
	    );

		$this->Produk->insert('stan',$data);


	}

	public function delete_stan(){
		$id = $this->input->post('id');
		$this->Produk->delete('stan',$id);
	}


	public function select_edit_stan(){
		$id = $this->input->post('id');
		$data = $this->Produk->getData("id_stan='".$id."'",'stan');
		echo json_encode($data);
	}

	public function edit_stan(){
		$id = $this->input->post('id');
		$where = array('id_stan' => $id);

		$data = array(
			'id_stan' => $id,
	        'nama_stan' => $this->input->post('nama'),
	        'alamat' => $this->input->post('alamat'),
	        'password' => $this->input->post('password')
	         );
		$this->Post->Update('stan',$data,$where);
	}

	public function gajibonusstan(){
		
	}

	public function skemapromo(){
		$this->load->view('superadminfranchise/skemapromo');
		$this->load->view('superadminfranchise/datatable_promo');
	}

	//GET DATA PROMO YANG AKAN DIEDIT
	public function select_edit_promo(){
		$id = $this->input->post('id');
		$data = $this->Produk->getData("id_diskon='".$id."'",'diskon');
		echo json_encode($data);
	}

	//TAMBAH PROMO

	public function tambah_promo(){
		//add to promo table
		$id = IDPromoGenerator();
		if ($this->input->post('jenis') == 'diskon') {
			$jenis = $this->input->post('jenis').$this->input->post('nilai_promo');
		}else{
			$jenis = $this->input->post('jenis');
		}
		
		
		$data = array(
	        'id_diskon' => $id,
	        'nama_diskon' => $this->input->post('nama'),
	        'jenis_diskon' => $jenis,
	        'tanggal_mulai' => $this->input->post('tanggal_mulai'),
	        'tanggal_akhir' => $this->input->post('tanggal_akhir'),
	        'jam_mulai' => $this->input->post('jam_mulai'),
	        'jam_akhir' => $this->input->post('jam_akhir'),
	        'hari' => $this->input->post('hari'),
	        'status' => "active"
        );
		$this->Produk->insert('diskon',$data);

		$stan = $this->input->post('stan_list');
		$produk = $this->input->post('produk_list');

		//add to detail stan table
		foreach ($stan as $value) {
			$data = array(
		        'id_diskon' => $id,
		        'id_stan' => $value
	        );
			$this->Produk->insert('detail_stan_diskon',$data);
		}

		//add to detail product table

		foreach ($produk as $value) {
			$data = array(
		        'id_diskon' => $id,
		        'id_produk' => $value
	        );
			$this->Produk->insert('detail_barang_diskon',$data);
		}
		

	}

	public function edit_promo(){
		$id = $this->input->post('id');
		$where = array('id_diskon' => $id);

		$data = array(
			'id_diskon' => $id,
	        'nama_diskon' => $this->input->post('nama'),
	        'jenis_diskonn' => $this->input->post('jenis'),
	        'tanggal_mulai' => $this->input->post('tanggal_mulai'),
	        'tanggal_akhir'=> $this->input->post('tanggal_akhir'),
	        'jam_mulai'=> $this->input->post('jam_mulai'),
	        'jam_akhir'=> $this->input->post('jam_akhir'),
	        'hari'=> $this->input->post('hari'),
	        'status'=> $this->input->post('status')
	    );
		$this->Produk->update('diskon',$data,$where);

		$stan = $this->input->post('stan_list');
		$produk = $this->input->post('produk_list');

		$this->Produk->delete('detail_stan_diskon',$id);
		$this->Produk->delete('detail_barang_diskon',$id);

		//add to detail stan table
		foreach ($stan as $value) {


			$data = array(
		        'id_diskon' => $id,
		        'id_stan' => $value
	        );
			$this->Produk->insert('detail_stan_diskon',$data);
		}

		//add to detail product table

		foreach ($produk as $value) {
			$data = array(
		        'id_diskon' => $id,
		        'id_produk' => $value
	        );
			$this->Produk->insert('detail_barang_diskon',$data);
		}
	}

	public function masterdatakaryawan(){
		$this->load->view('superadminfranchise/masterdatakaryawan');
		$this->load->view('superadminfranchise/datatable_karyawan');
	}
}