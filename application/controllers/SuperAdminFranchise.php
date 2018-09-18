<?php





defined('BASEPATH') OR exit('No direct script access allowed');


class SuperAdminFranchise extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->helper('url');
	    $this->load->helper('site_helper');
	    $this->load->model('Post');
	    $this->load->model('Produk');
	    $this->load->library('session');
  	}

  	public function login()
  	{
  		$adminId = $this->session->userdata('aksessupadmin');
        if(empty($adminId)){
            $this->load->view('superadminfranchise/login');
        }else{
            redirect('dashboardsuperadmin');
        }
  	}

  	public function gantipassword()
  	{
  		$akses = $this->session->userdata('aksessupadmin');
        if(empty($akses)){
            redirect('login');
        }else{
            $this->load->view('superadminfranchise/gantipassword');
        }
  		
  	}

  	public function prosesgantipassword()
  	{
  		$passlama = $this->input->post('passlama');
  		$passlama = md5($passlama);
  		$passbaru = $this->input->post('passbaru');
  		$passbaru = md5($passbaru);
  		$konfirmasipassbaru = $this->input->post('konfirmasipassbaru');
  		$username = $this->input->post('username');
  		$usertype = $this->input->post('usertype');

  		$where = array('username' => $username,'password' => $passlama,'usertype' => $usertype );
  		
  		if ($this->Produk->getRowCount('alluser',$where) > 0) {
  			$data = array(
				'username' => $username,
	        	'password' => $passbaru,
	        	'usertype' => $usertype
	        );
			$success = $this->Post->Update('alluser',$data,$where);
			if ($success) {
				echo 'true';
			}else{
				echo "servererror";
			}
  		 	
  		}else{
  			echo "false";
  		} 

  	}

  	public function logout()
  	{
  		$this->session->unset_userdata('aksessupadmin');
  		$this->session->unset_userdata('usernamesupadmin');
  		redirect('login');
  	}

  	public function prosesLogin()
  	{
  		$username = $this->input->post('username');
  		$password = $this->input->post('password');
  		$password = md5($password);
  		$where = array('username' => $username,'password' => $password,'usertype' => 'superadminfranchise' );
  		
  		if ($this->Produk->getRowCount('alluser',$where) > 0) {
  			$this->session->set_userdata('aksessupadmin', 'granted');
  			$this->session->set_userdata('usernamesupadmin', $username);
  		 	echo 'true';
  		}else{
  			echo "false";
  			
  		} 
  	}
  	
	public function dashboard()
	{
		$akses = $this->session->userdata('aksessupadmin');
        if(empty($akses)){
            redirect('login');
        }else{
            $this->load->view('superadminfranchise/dashboard');
        }
		
	}

	public function masterdataproduk()
	{
		$akses = $this->session->userdata('aksessupadmin');
        if(empty($akses)){
            redirect('login');
        }else{
            $this->load->view('superadminfranchise/masterdataproduk');
			$this->load->view('superadminfranchise/datatable_produk');
        }
		
	}

	public function tambah_produk(){
		$id = $this->input->post('id');
		$where = array('id_produk' => $id);
		$count = $this->Produk->getRowCount('produk',$where);

		if ($count>0) {
			echo "ID Data Sudah ada di dalam database";
		}else{
			$data = array(
	        'id_produk' => $this->input->post('id'),
	        'nama_produk' => $this->input->post('nama'),
	        'kategori' => $this->input->post('kategori'),
	        'harga_jual' => $this->input->post('harga')
	         );
			$this->Produk->insert('produk',$data);
			echo "Berhasil Ditambahkan";
		}
		
		
	}

	public function data_kategori(){
		$data = $this->db->distinct()->select('kategori')->from('produk')->get();
		echo json_encode($data->result());
	}

	public function promo_data(){
		$this->load->library('datatables');
		$this->datatables->select('id_diskon,nama_diskon,jenis_diskon,tanggal_mulai,tanggal_akhir,hari,jam_mulai,jam_akhir,status');
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
		$id = $this->input->post('idlama');
		$where = array('id_produk' => $id);

		$idbaru = $this->input->post('id');
		$wherebaru = array('id_produk' => $idbaru);
		$count = $this->Produk->getRowCount('produk',$wherebaru);

		if ($count>0 && $id != $idbaru) {
			echo "Update Error! ID Data Sudah ada di dalam database";
		}else{
			$data = array(
			'id_produk' => $this->input->post('id'),
	        'nama_produk' => $this->input->post('nama'),
	        'kategori' => $this->input->post('kategori'),
	        'harga_jual' => $this->input->post('harga')
	         );
			$this->Post->Update('produk',$data,$where);
			echo "Berhasil Diupdate";
		}
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
		$akses = $this->session->userdata('aksessupadmin');
        if(empty($akses)){
            redirect('login');
        }else{
            $this->load->view('superadminfranchise/masterdatastan');
			$this->load->view('superadminfranchise/datatable_stan');
        }
		
	}

	public function datastan(){
		$this->load->library('datatables');
		$this->datatables->select('id_stan,nama_stan,alamat,password');
		$this->datatables->from('stan');
		echo$this->datatables->generate();
	}

	public function tambah_stan(){
		$id = $this->input->post('id');
		$where = array('id_stan' => $id);
		$count = $this->Produk->getRowCount('stan',$where);

		if ($count>0) {
			echo "ID Data Sudah ada di dalam database";
		}else{
			$data = array(
		        'id_stan' => $this->input->post('id'),
		        'nama_stan' => $this->input->post('nama'),
		        'alamat' => $this->input->post('alamat'),
		        'password' => $this->input->post('password')
		    );

			$this->Produk->insert('stan',$data);
			echo "Berhasil Ditambahkan";
		}
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

		$id = $this->input->post('id_lama');
		$where = array('id_stan' => $id);

		$idbaru = $this->input->post('id');
		$wherebaru = array('id_stan' => $idbaru);
		$count = $this->Produk->getRowCount('stan',$wherebaru);

		if ($count>0 && $id != $idbaru) {
			echo "Update Error! ID Data Sudah ada di dalam database";
		}else{
			$data = array(
				'id_stan' => $idbaru,
		        'nama_stan' => $this->input->post('nama'),
		        'alamat' => $this->input->post('alamat'),
		        'password' => $this->input->post('password')
		    );
			$this->Post->Update('stan',$data,$where);
			echo "Berhasil Diupdate";
		}
	}

	public function gajibonusstan(){
		
	}

	public function skemapromo(){
		$akses = $this->session->userdata('aksessupadmin');
        if(empty($akses)){
            redirect('login');
        }else{
            $this->load->view('superadminfranchise/skemapromo');
			$this->load->view('superadminfranchise/datatable_promo');
        }
		
	}

	//GET DATA PROMO YANG AKAN DIEDIT
	public function select_edit_promo(){
		$id = $this->input->post('id');
		$data = $this->Produk->getData("id_diskon='".$id."'",'diskon');
		echo json_encode($data);
	}

	public function select_edit_datatable_produk_promo()
	{
		$id = $this->input->post('id');
		$data = $this->Produk->getData("id_diskon='".$id."'",'detail_barang_diskon');
		echo json_encode($data);
	}

	public function select_edit_datatable_stan_promo()
	{
		$id = $this->input->post('id');
		$data = $this->Produk->getData("id_diskon='".$id."'",'detail_stan_diskon');
		echo json_encode($data);
	}

	//TAMBAH PROMO

	public function tambah_promo(){
		$statusalladd = false;
		$deleteall = false;
		//add to promo table
		$id = IDPromoGenerator();
		if ($this->input->post('jenis') == 'nominal' || $this->input->post('jenis') == 'persen') {
			$jenis = $this->input->post('jenis').$this->input->post('nilai_promo');
		}else{
			$jenis = $this->input->post('jenis');
		}

		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_akhir = $this->input->post('tanggal_akhir');

		$parttanggalmulai = explode('/', $tanggal_mulai);
		$parttanggalakhir = explode('/', $tanggal_akhir);
		$tanggal_mulai = $parttanggalmulai[2].'/'.$parttanggalmulai[1].'/'.$parttanggalmulai[0];
		$tanggal_akhir = $parttanggalakhir[2].'/'.$parttanggalakhir[1].'/'.$parttanggalakhir[0];

		$tanggal_mulai = strtotime($tanggal_mulai);
		$tanggal_mulai = date('Y-m-d',$tanggal_mulai);

		$tanggal_akhir = strtotime($tanggal_akhir);
		$tanggal_akhir = date('Y-m-d',$tanggal_akhir);
		
		// nama_promo:nama_promo,tanggal_mulai:tanggal_mulai,tanggal_akhir:tanggal_akhir,jam_mulai:jam_mulai,jam_akhir:jam_akhir,hariall:hariall,jenis:jenis,nilai_promo:nilai_promo,stanall:stanall,produkall:produkall
		$data = array(
	        'id_diskon' => $id,
	        'nama_diskon' => $this->input->post('nama_promo'),
	        'jenis_diskon' => $jenis,
	        'tanggal_mulai' => $tanggal_mulai,
	        'tanggal_akhir' => $tanggal_akhir,
	        'jam_mulai' => $this->input->post('jam_mulai'),
	        'jam_akhir' => $this->input->post('jam_akhir'),
	        'hari' => $this->input->post('hariall'),
	        'status' => "active"
        );
		$statusalladd = $this->Produk->insert('diskon',$data);

		if ($statusalladd == true) {
			$stanall = $this->input->post('stanall');
			$produkall = $this->input->post('produkall');

			$stan = explode(",",$stanall);
			$produk = explode(",",$produkall);
			//add to detail stan table
			foreach ($stan as $value) {
				$data = array(
			        'id_diskon' => $id,
			        'id_stan' => $value
		        );
				$statusalladd = $this->Produk->insert('detail_stan_diskon',$data);
				if ($statusalladd == false) {
					$deleteall = true;
				}
			}

			//add to detail product table

			foreach ($produk as $value) {
				$data = array(
			        'id_diskon' => $id,
			        'id_produk' => $value
		        );
				$statusalladd = $this->Produk->insert('detail_barang_diskon',$data);
				if ($statusalladd == false) {
					$deleteall = true;
				}
			}
		}else{
			$deleteall = true;
		}

		if ($deleteall == true) {
			$this->Produk->delete('diskon',$id);
			$this->Produk->delete('detail_barang_diskon',$id);
			$this->Produk->delete('detail_stan_diskon',$id);
		}
		if ($deleteall == true) {
			echo false;
		}else{
			echo true;
		}

	}

	public function edit_promo(){

		$statusalladd = false;
		$deleteall = false;
		//add to promo table
		$id = $this->input->post('id_simpaneditpromo');
		$where = array('id_diskon' => $id);

		if ($this->input->post('jenis_edit') == 'nominal' || $this->input->post('jenis_edit') == 'persen') {
			$jenis = $this->input->post('jenis_edit').$this->input->post('nilai_promo_edit');
		}else{
			$jenis = $this->input->post('jenis_edit');
		}

		$tanggal_mulai = $this->input->post('tanggal_mulai_edit');
		$tanggal_akhir = $this->input->post('tanggal_akhir_edit');

		$tanggal_mulai = strtotime($tanggal_mulai);
		$tanggal_mulai = date('Y-m-d',$tanggal_mulai);

		$tanggal_akhir = strtotime($tanggal_akhir);
		$tanggal_akhir = date('Y-m-d',$tanggal_akhir);
		
		// nama_promo:nama_promo,tanggal_mulai:tanggal_mulai,tanggal_akhir:tanggal_akhir,jam_mulai:jam_mulai,jam_akhir:jam_akhir,hariall:hariall,jenis:jenis,nilai_promo:nilai_promo,stanall:stanall,produkall:produkall
		$data = array(
	        'id_diskon' => $id,
	        'nama_diskon' => $this->input->post('nama_promo_edit'),
	        'jenis_diskon' => $jenis,
	        'tanggal_mulai' => $tanggal_mulai,
	        'tanggal_akhir' => $tanggal_akhir,
	        'jam_mulai' => $this->input->post('jam_mulai_edit'),
	        'jam_akhir' => $this->input->post('jam_akhir_edit'),
	        'hari' => $this->input->post('hariall_edit'),
	        'status' => $this->input->post('status_simpaneditpromo')
        );

		$statusalladd = $this->Produk->update('diskon',$data,$where);

			$stanall = $this->input->post('stanall_edit');
			$produkall = $this->input->post('produkall_edit');

			$this->Produk->delete('detail_stan_diskon',$id);
			$this->Produk->delete('detail_barang_diskon',$id);

			$stan = explode(",",$stanall);
			$produk = explode(",",$produkall);
			//add to detail stan table
			foreach ($stan as $value) {
				$data = array(
			        'id_diskon' => $id,
			        'id_stan' => $value
		        );
				$statusalladd = $this->Produk->insert('detail_stan_diskon',$data);
				if ($statusalladd == false) {
					$deleteall = true;
				}
			}

			//add to detail product table

			foreach ($produk as $value) {
				$data = array(
			        'id_diskon' => $id,
			        'id_produk' => $value
		        );
				$statusalladd = $this->Produk->insert('detail_barang_diskon',$data);
				if ($statusalladd == false) {
					$deleteall = true;
				}
			}

		if ($deleteall == true) {
			echo false;
		}else{
			echo true;
		}
	}

	public function change_status_diskon()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');

		if ($status == 'active') {
			$status = 'inactive';
		}else{
			$status = 'active';
		}

		$where = array('id_diskon' => $id);

		$data = array('status' => $status);
		$this->Post->Update('diskon',$data,$where);
		echo "Berhasil Diupdate";
	}

	public function show_list_stan()
	{
		$this->load->library('datatables');
		$this->datatables->select('id_stan,nama_stan,alamat');
		$this->datatables->from('stan');
		
		echo $this->datatables->generate();
	}

	public function show_list_produk()
	{
		$this->load->library('datatables');
		$this->datatables->select('id_produk,nama_produk,harga_jual');
		$this->datatables->from('produk');
		
		echo $this->datatables->generate();
	}

	public function get_list_stan()
	{
		$data = $this->Produk->getAllData('stan');
		echo json_encode($data);
	}

	public function get_list_produk()
	{
		$data = $this->Produk->getAllData('produk');
		echo json_encode($data);
	}

	public function masterdatakaryawan(){
		$akses = $this->session->userdata('aksessupadmin');
        if(empty($akses)){
            redirect('login');
        }else{
            $this->load->view('superadminfranchise/masterdatakaryawan');
			$this->load->view('superadminfranchise/datatable_karyawan');
        }
		
	}

	public function lappenjstan(){
		$akses = $this->session->userdata('aksessupadmin');
        if(empty($akses)){
            redirect('login');
        }else{
            $this->load->view('superadminfranchise/lappenjstan');
			$this->load->view('superadminfranchise/datatable_lappenjstan');
        }
		
	}

	public function notaData(){
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$id_stan = $this->input->post('id_stan');

		if ($tanggal_awal =='') {
			$tanggal_awal = '01/01/1970';
		}

		if ($tanggal_akhir =='') {
			$tanggal_akhir = '01/01/1970';
		}

		$parttanggalawal = explode('/', $tanggal_awal);
		$parttanggalakhir = explode('/', $tanggal_akhir);

		$tanggal_awal = $parttanggalawal[2].'/'.$parttanggalawal[1].'/'.$parttanggalawal[0];
		$tanggal_akhir = $parttanggalakhir[2].'/'.$parttanggalakhir[1].'/'.$parttanggalakhir[0];
		$tanggal_akhir = strtotime($tanggal_akhir);
		$tanggal_akhir = date('Y-m-d',$tanggal_akhir);

		$tanggal_awal = strtotime($tanggal_awal);
		$tanggal_awal = date('Y-m-d',$tanggal_awal);

		// var_dump($tanggal_akhir);

		$array = array('id_stan' => $id_stan, 'tanggal_nota >=' => $tanggal_awal, 'tanggal_nota <=' => $tanggal_akhir);

		$data = $this->Produk->getData($array,'nota');
		// var_dump($data);
		echo json_encode($data);
	}

	public function select_detail_nota()
	{
		$id = $this->input->post('id');
		$array = array('id_nota' => $id);
		$data = $this->Produk->getData($array,'nota');
		echo json_encode($data);
		//DETAIL
	}
}