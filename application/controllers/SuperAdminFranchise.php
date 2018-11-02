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
  		$admin = $this->session->userdata('aksesadmin');
        if(empty($adminId) && empty($admin)){
            $this->load->view('superadminfranchise/login');
        }else{
        	if (!empty($adminId)) {
        		redirect('dashboardsuperadmin');
        	}else{
        		redirect('dashboardadmin');
        	}
            
        }
  	}

  	public function gantipassword()
  	{
  		$akses = $this->session->userdata('aksessupadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('superadminfranchise/navigationbar');
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
  		$this->session->unset_userdata('aksesadmin');
  		$this->session->unset_userdata('aksessupadmin');
  		$this->session->unset_userdata('username');
  		redirect('login');
  	}

  	public function prosesLogin()
  	{
  		$username = $this->input->post('username');
  		$password = $this->input->post('password');
  		$password = md5($password);
  		$where = array('username' => $username,'password' => $password);
  		$data = $this->Produk->getData($where,'alluser');
  		
  		if ($this->Produk->getRowCount('alluser',$where) > 0) {
  			if ($data[0]->usertype == 'superadminfranchise') {
  				$this->session->set_userdata('aksessupadmin', 'granted');
  			}else if ($data[0]->usertype == 'adminfranchise') {
  				$this->session->set_userdata('aksesadmin', 'granted');
  			}
  			$this->session->set_userdata('username', $username);
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
        	$this->load->view('superadminfranchise/navigationbar');
            $this->load->view('superadminfranchise/dashboard');
        }
		
	}

	public function masterdataproduk()
	{
		$akses = $this->session->userdata('aksessupadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('superadminfranchise/navigationbar');
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
        	$this->load->view('superadminfranchise/navigationbar');
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
		$akses = $this->session->userdata('aksessupadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('superadminfranchise/navigationbar');
            $this->load->view('superadminfranchise/gajibonusstan');
			// $this->load->view('superadminfranchise/datatable_promo');
        }
	}

	public function skemapromo(){
		$akses = $this->session->userdata('aksessupadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	// $this->updateDiskon();
        	$this->load->view('superadminfranchise/navigationbar');
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

		// $parttanggalmulai = explode('/', $tanggal_mulai);
		// $parttanggalakhir = explode('/', $tanggal_akhir);
		// $tanggal_mulai = $parttanggalmulai[2].'/'.$parttanggalmulai[1].'/'.$parttanggalmulai[0];
		// $tanggal_akhir = $parttanggalakhir[2].'/'.$parttanggalakhir[1].'/'.$parttanggalakhir[0];

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
        	$this->load->view('superadminfranchise/navigationbar');
            $this->load->view('superadminfranchise/masterdatakaryawan');
			$this->load->view('superadminfranchise/datatable_karyawan');
        }
		
	}

	public function lappenjstan(){
		$akses = $this->session->userdata('aksessupadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('superadminfranchise/navigationbar');
            $this->load->view('superadminfranchise/lappenjstan');
			$this->load->view('superadminfranchise/datatable_lappenjstan');
        }
		
	}

	public function notaData(){
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$id_stan = $this->input->post('id_stan');
		$shift = $this->input->post('shift');

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

		if ($shift == 'all') {
			$array = array('id_stan' => $id_stan, 'tanggal_nota >=' => $tanggal_awal, 'tanggal_nota <=' => $tanggal_akhir);
		}else{
			$array = array('id_stan' => $id_stan, 'tanggal_nota >=' => $tanggal_awal, 'tanggal_nota <=' => $tanggal_akhir, 'shift' => $shift);
		}
		

		$data = $this->Produk->getData($array,'nota');
		// var_dump($data);
		echo json_encode($data);
	}

	public function detailNotaData()
	{
		$id_nota = $this->input->post('id_nota');
		$array = array('id_nota' => $id_nota);
		$data = $this->Produk->getData($array,'detail_nota');
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

	public function sendDataStan()
	{
		$data = $this->Produk->getAllData('stan');
		echo json_encode($data);
	}

	public function sendDataProduk()
	{
		$data = $this->Produk->getAllData('produk');
		echo json_encode($data);
	}

	public function sendDataDiskon()
	{
		// $this->updateDiskon();
		// $datenow = date("Y/m/d");
		// $daynow = date("w");
		// switch ($daynow) {
		// 	case 0:
		// 		$daynow = 'minggu';
		// 		break;
		// 	case 1:
		// 		$daynow = 'senin';
		// 		break;
		// 	case 2:
		// 		$daynow = 'selasa';
		// 		break;
		// 	case 3:
		// 		$daynow = 'rabu';
		// 		break;
		// 	case 4:
		// 		$daynow = 'kamis';
		// 		break;
		// 	case 5:
		// 		$daynow = 'jumat';
		// 		break;
		// 	case 6:
		// 		$daynow = 'sabtu';
		// 		break;
			
		// 	default:
		// 		break;
		// }

		$id = $this->input->post('id_stan');
		$where = array('id_stan' => $id);
		$listdiskon = array();
		$datas = $this->Produk->getData($where,'detail_stan_diskon');

		foreach ($datas as $data) {
			$where2 = array('id_diskon' => $data->id_diskon);
			$query = $this->Produk->getFirstRowData($where2,'diskon');
			if ($query->status == 'active') {
				// $days =  explode(",", $perdiskonaktif->hari);
				// $get = true;
				// if ($perdiskonaktif->tanggal_mulai > $datenow || $perdiskonaktif->tanggal_akhir < $datenow) {
				// 	$get = false;
				// }

				// if (!in_array($daynow, $days)) {
				// 	$get = false;
				// }

				// if ($get) {
					array_push($listdiskon, $data->id_diskon);
				// }
				
			}
			
		}

		if (count($listdiskon) == 0) {
			array_push($listdiskon, '');
		}

		$diskondata = $this->Produk->getDataIn('diskon',$listdiskon);
		echo json_encode($diskondata);
	}

	public function sendDataOrder()
	{
		$where = array('status' => 'done');
		$data = $this->Produk->getData($where,'order_bahan_jadi_stan');
		echo json_encode($data);
	}

	// public function updateDiskon()
	// {
	// 	$whereact = array('status' => 'active');
	// 	$alldiskonactive = $this->Produk->getData($whereact,'diskon');
	// 	$datenow = date("Y/m/d");
	// 	$daynow = date("w");
	// 	switch ($daynow) {
	// 		case 0:
	// 			$daynow = 'minggu';
	// 			break;
	// 		case 1:
	// 			$daynow = 'senin';
	// 			break;
	// 		case 2:
	// 			$daynow = 'selasa';
	// 			break;
	// 		case 3:
	// 			$daynow = 'rabu';
	// 			break;
	// 		case 4:
	// 			$daynow = 'kamis';
	// 			break;
	// 		case 5:
	// 			$daynow = 'jumat';
	// 			break;
	// 		case 6:
	// 			$daynow = 'sabtu';
	// 			break;
			
	// 		default:
	// 			break;
	// 	}

	// 	foreach ($alldiskonactive as $perdiskonaktif) {
	// 		$days =  explode(",", $perdiskonaktif->hari);
	// 		$update = false;
	// 		if ($perdiskonaktif->tanggal_mulai > $datenow || $perdiskonaktif->tanggal_akhir < $datenow) {
	// 			$update = true;
	// 		}

	// 		if (!in_array($daynow, $days)) {
	// 			$update = true;
	// 		}

	// 		if ($update) {
	// 			$wheretoinactive = array('id_diskon' => $perdiskonaktif->id_diskon);
	// 			$datatoinactive = array('status' => 'inactive');
	// 			$this->Produk->update('diskon', $datatoinactive, $wheretoinactive);
	// 		}
	// 	}
	// }

	public function sendDataDetailDiskonProduk()
	{

		$id = $this->input->post('id_stan');
		$where = array('id_stan' => $id);
		$listdiskon = array();
		$datas = $this->Produk->getData($where,'detail_stan_diskon');

		foreach ($datas as $data) {
			$where2 = array('id_diskon' => $data->id_diskon);
			$query = $this->Produk->getFirstRowData($where2,'diskon');
			if ($query->status == 'active') {
				// $days =  explode(",", $perdiskonaktif->hari);
				// $get = true;
				// if ($perdiskonaktif->tanggal_mulai > $datenow || $perdiskonaktif->tanggal_akhir < $datenow) {
				// 	$get = false;
				// }

				// if (!in_array($daynow, $days)) {
				// 	$get = false;
				// }

				// if ($get) {
					array_push($listdiskon, $data->id_diskon);
				// }
				
			}
			
		}

		if (count($listdiskon) == 0) {
			array_push($listdiskon, '');
		}

		$dataproduk = $this->Produk->getDataIn('detail_barang_diskon',$listdiskon);
		echo json_encode($dataproduk);
	}

	public function sendDataBahanJadi()
	{
		$data = $this->Produk->getAllData('bahan_jadi');
		echo json_encode($data);
	}

	public function insertDataNota()
	{
		$data_nota = json_decode($this->input->post('allnota'));
		$data_detail_nota = json_decode($this->input->post('detailnota'));
		$id_stan = $this->input->post('id_stan');
		$ress = true;

		foreach ($data_nota as $pernota) {
			$where = array('id_nota' => $pernota->id_nota);
			$newdata = array(
				'id_nota' => $pernota->id_nota,
				'id_stan' => $id_stan,
				'tanggal_nota' => $pernota->tanggal_nota,
				'waktu_nota' => $pernota->waktu_nota, 
				'nama_diskon' => $pernota->nama_diskon,
				'jenis_diskon' => $pernota->jenis_diskon,
				'status' => $pernota->status,
				'total_harga' => $pernota->total_harga,
				'pembayaran' => $pernota->pembayaran,
				'keterangan' => $pernota->keterangan,
				'shift' => $pernota->shift
				// 'id_nota' => $pernota->id_nota,
				// 'nama_produk' => $pernota->nama_produk,
				// 'jumlah_produk' => $pernota->jumlah_produk,
				// 'kategori_produk' => $pernota->kategori_produk,
				// 'harga_produk' => $pernota->harga_produk,
				// 'total_harga_produk' => $pernota->total_harga_produk
			);

			// var_dump($newdata);
			if ($this->Produk->checkExist('nota',$where)) {
				$stat = $this->Produk->update('nota', $newdata, $where);
			}else{
				$stat = $this->Produk->insert('nota',$newdata);
			}
			
			if (!$stat) {
				$ress = false;
			}
			// var_dump($pernota);
		}

		foreach ($data_detail_nota as $perdetail) {
			$where = array('id_nota' => $perdetail->id_nota,'nama_produk' => $perdetail->nama_produk);
			// $newdetail = array(
			// 	'id_nota' => $perdetail->id_nota,
			// 	'nama_produk' => $perdetail->nama_produk,
			// 	'jumlah_produk' => $perdetail->jumlah_produk,
			// 	'kategori_produk' => $perdetail->kategori_produk,
			// 	'harga_produk' => $perdetail->harga_produk,
			// 	'total_harga_produk' => $perdetail->total_harga_produk
			// );
			if (!$this->Produk->checkExist('detail_nota',$where)) {
				$stat2 = $this->Produk->insert('detail_nota',$perdetail);
			}
			
			if (!$stat2) {
				$ress = false;
			}
		}

		// echo gettype($data_nota)." ".gettype($data_detail_nota);
		if ($ress) {
			echo 'true';
		}else{
			echo 'false';
		}
		
	}

	public function insertDataStok()
	{
		$data_stok = json_decode($this->input->post('allstok'));
		$id_stan = $this->input->post('id_stan');
		$ress = true;

		foreach ($data_stok as $perstok) {

			$where = array('id_bahan_jadi' => $perstok->id_bahan_jadi,'id_stan' => $id_stan,'tanggal' => $perstok->tanggal);
			$newdata = array(
				'id_bahan_jadi' => $perstok->id_bahan_jadi,
				'id_stan' => $id_stan,
				'nama_bahan_jadi' => $perstok->nama_bahan_jadi,
				'stok_masuk' => $perstok->stok_masuk, 
				'stok_keluar' => $perstok->stok_keluar,
				'stok_sisa' => $perstok->stok_sisa,
				'tanggal' => $perstok->tanggal
			);

			if ($this->Produk->checkExist('stok_bahan_jadi',$where)) {
				$stat = $this->Produk->update('stok_bahan_jadi', $newdata, $where);
			}else{
				$stat = $this->Produk->insert('stok_bahan_jadi',$newdata);
			}

			// if (!$this->Produk->checkExist('stok_bahan_jadi',$where)) {
			// 	$stat = $this->Produk->insert('stok_bahan_jadi',$newdata);
			// }
			
			// if (!$stat) {
			// 	$ress = false;
			// }
		}

		// echo gettype($data_nota)." ".gettype($data_detail_nota);
		if ($ress) {
			echo 'true';
		}else{
			echo 'false';
		}
		
	}

	public function masterbahanjadi()
	{
		$akses = $this->session->userdata('aksessupadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('superadminfranchise/navigationbar');
            $this->load->view('superadminfranchise/masterbahanjadi');
			// $this->load->view('superadminfranchise/datatable_produk');

        }
	}

	public function tambahbahanjadi()
	{
		$id = $this->input->post('id');
		$where = array('id_bahan_jadi' => $id);
		$count = $this->Produk->getRowCount('bahan_jadi',$where);

		if ($count>0) {
			echo "ID Data Sudah ada di dalam database";
		}else{
			$data = array(
		        'id_bahan_jadi' => $this->input->post('id'),
		        'nama_bahan_jadi' => $this->input->post('nama'),
	         );
			$this->Produk->insert('bahan_jadi',$data);
			echo "Berhasil Ditambahkan";
		}
	}

	public function select_edit_bahanjadi()
	{
		$id = $this->input->post('id');
		$data = $this->Produk->getData("id_bahan_jadi='".$id."'",'bahan_jadi');
		echo json_encode($data);
	}

	public function delete_bahanjadi()
	{
		$id = $this->input->post('id');
		$this->Produk->Delete('bahan_jadi',$id);
	}

	public function edit_bahanjadi()
	{
		$id = $this->input->post('idlama');
		$where = array('id_bahan_jadi' => $id);

		$idbaru = $this->input->post('id');
		$wherebaru = array('id_bahan_jadi' => $idbaru);
		$count = $this->Produk->getRowCount('bahan_jadi',$wherebaru);

		if ($count>0 && $id != $idbaru) {
			echo "Update Error! ID Data Sudah ada di dalam database";
		}else{
			$data = array(
				'id_bahan_jadi' => $this->input->post('id'),
		        'nama_bahan_jadi' => $this->input->post('nama'),
	         );
			$this->Post->Update('bahan_jadi',$data,$where);
			echo "Berhasil Diupdate";
		}
	}

	public function bahanjadi_data()
	{
		$this->load->library('datatables');
		$this->datatables->select('id_bahan_jadi,nama_bahan_jadi');
		$this->datatables->from('bahan_jadi');
		
		echo $this->datatables->generate();
	}

	public function lapsisastok()
	{
		$akses = $this->session->userdata('aksessupadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('superadminfranchise/navigationbar');
            $this->load->view('superadminfranchise/lapsisastok');
			$this->load->view('superadminfranchise/datatable_lapsisastok');
        }
	}

	public function stokData(){
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

		$array = array('id_stan' => $id_stan, 'tanggal >=' => $tanggal_awal, 'tanggal <=' => $tanggal_akhir);

		$data = $this->Produk->getData($array,'stok_bahan_jadi');
		// var_dump($data);
		echo json_encode($data);
	}

	public function insertDataPengeluaran()
	{
		$data_pengeluaran = json_decode($this->input->post('allpengeluaran'));
		$id_stan = $this->input->post('id_stan');
		$ress = true;

		foreach ($data_pengeluaran as $perpengeluaran) {
			$where = array('id_pengeluaran' => $perpengeluaran->id_pengeluaran, 'id_stan' => $id_stan);
			$newdata = array(
				'id_pengeluaran' => $perpengeluaran->id_pengeluaran,
				'id_stan' => $id_stan,
				'tanggal' => $perpengeluaran->tanggal,
				'keterangan' => $perpengeluaran->keterangan, 
				'pengeluaran' => $perpengeluaran->pengeluaran,
				'shift' => $perpengeluaran->shift
			);

			// var_dump($newdata);
			if ($this->Produk->checkExist('pengeluaran_lain',$where)) {
				$stat = $this->Produk->update('pengeluaran_lain', $newdata, $where);
			}else{
				$stat = $this->Produk->insert('pengeluaran_lain',$newdata);
			}
			
			if (!$stat) {
				$ress = false;
			}
		}

		// if ($ress) {
			echo 'true';
		// }else{
		// 	echo 'false';
		// }
			// var_dump($pernota);
	}

	public function insertDataKas()
	{
		$data_kas = json_decode($this->input->post('allkas'));
		$id_stan = $this->input->post('id_stan');
		$ress = true;

		foreach ($data_kas as $perkas) {
			$where = array('tanggal' => $perkas->tanggal, 'id_stan' => $id_stan, 'shift' => $perkas->shift);
			$newdata = array(
				'tanggal' => $perkas->tanggal,
				'id_stan' => $id_stan,
				'shift' => $perkas->shift,
				'kas_awal' => $perkas->kas_awal
			);

			// var_dump($newdata);
			if ($this->Produk->checkExist('kas',$where)) {
				$stat = $this->Produk->update('kas', $newdata, $where);
			}else{
				$stat = $this->Produk->insert('kas',$newdata);
			}
			
			if (!$stat) {
				$ress = false;
			}
		}

		// if ($ress) {
			echo 'true';
		// }else{
		// 	echo 'false';
		// }
			// var_dump($pernota);
	}

	public function deleteDataPengeluaran()
	{
		$pengeluaran_lain = $this->input->post('id_pengeluaran');
		$id_stan = $this->input->post('id_stan');
		$where = array('id_pengeluaran' => $pengeluaran_lain , 'id_stan' => $id_stan);

		$this->Produk->DeleteWhere('pengeluaran_lain',$where);
		echo "true";
	}

	public function insertDataKaryawanFingerspot()
	{
		$data_karyawan = json_decode($this->input->post('allkaryawan'));
		$id_stan = $this->input->post('id_stan');
		$ress = true;

		foreach ($data_karyawan as $perkaryawan) {
			$where = array('pin' => $perkaryawan->pin, 'id_stan' => $id_stan);
			$newdata = array(
				'pin' => $perkaryawan->pin,
				'id_stan' => $id_stan,
				'nama' => $perkaryawan->nama
			);

			// var_dump($newdata);
			if ($this->Produk->checkExist('karyawan_fingerspot',$where)) {
				$stat = $this->Produk->update('karyawan_fingerspot', $newdata, $where);
			}else{
				$stat = $this->Produk->insert('karyawan_fingerspot',$newdata);
			}
			
			if (!$stat) {
				$ress = false;
			}
		}
			echo 'true';
	}

	public function insertDataPresensiKaryawan()
	{
		$data_presensi = json_decode($this->input->post('allpresensi'));
		$id_stan = $this->input->post('id_stan');
		$ress = true;

		foreach ($data_presensi as $perpresensi) {
			$where = array('scan_date' => $perpresensi->scan_date, 'id_stan' => $id_stan, 'pin' => $perpresensi->pin);
			$newdata = array(
				'scan_date' => $perpresensi->scan_date,
				'id_stan' => $id_stan,
				'pin' => $perpresensi->pin,
				'verify_mode' => $perpresensi->verify_mode,
				'io_mode' => $perpresensi->io_mode,
				'work_code' => $perpresensi->work_code
			);

			// var_dump($newdata);
			if ($this->Produk->checkExist('presensi_karyawan',$where)) {
				$stat = $this->Produk->update('presensi_karyawan', $newdata, $where);
			}else{
				$stat = $this->Produk->insert('presensi_karyawan',$newdata);
			}
			
			if (!$stat) {
				$ress = false;
			}
		}
		echo 'true';
	}

	public function insertDataOrder()
	{
		$data_order = json_decode($this->input->post('allorder'));
		$data_detail_order = json_decode($this->input->post('detailorder'));
		$id_stan = $this->input->post('id_stan');
		$ress = true;

		foreach ($data_order as $perorder) {
			$where = array('id_order' => $perorder->id_order);
			$newdata = array(
				'id_order' => $perorder->id_order,
				'tanggal_order' => $perorder->tanggal_order,
				'status' => $perorder->status
			);
			if ($this->Produk->checkExist('order_bahan_jadi_stan',$where)) {
				$stat = $this->Produk->update('order_bahan_jadi_stan', $newdata, $where);
			}else{
				$stat = $this->Produk->insert('order_bahan_jadi_stan',$newdata);
			}
			
			if (!$stat) {
				$ress = false;
			}
		}

		foreach ($data_detail_order as $perdetail) {
			$where = array('id_detail_order' => $perdetail->id_detail_order);
			if (!$this->Produk->checkExist('detail_order_bahan_jadi_stan',$where)) {
				$stat2 = $this->Produk->insert('detail_order_bahan_jadi_stan',$perdetail);
			}
			
			if (!$stat2) {
				$ress = false;
			}
		}
		if ($ress) {
			echo 'true';
		}else{
			echo 'false';
		}
	}

	public function sendUpdateOrder()
	{
		$list_data = $this->input->post('list_id_not_done');
		$id_stan = $this->input->post('id_stan');
		$where = array('status' => 'done');

		$alldatanotdone = $this->Produk->getDataInTableAndSpecificWhere('order_bahan_jadi_stan',$list_data,'id_order',$where);

		$data = array();

		foreach ($alldatanotdone as $perdatanotdone) {
			array_push($data, $perdatanotdone->id_order);
		}

		$stringfromdata = implode(",",$data);

		echo $stringfromdata;
	}

	public function get_list_bahan_jadi()
	{
		$data = $this->Produk->getAllData('bahan_jadi');
		echo json_encode($data);
	}

	public function rekapharianstan()
	{
		$akses = $this->session->userdata('aksessupadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('superadminfranchise/navigationbar');
            $this->load->view('superadminfranchise/rekapdataharian');
        }
	}

	public function getdetailpengeluaranrekap()
	{
	    $id_stan = $this->input->post('id_stan');
	    $tanggal_rekap = $this->input->post('tanggal_rekap');
	    $tanggal_rekap = explode("/", $tanggal_rekap);
	    $tanggal_rekap = $tanggal_rekap[2]."-".$tanggal_rekap[1]."-".$tanggal_rekap[0];

	    $where = array(
	    	'id_stan' => $id_stan,
	    	'tanggal' => $tanggal_rekap
	    );

	    $datalist = $this->Produk->getData($where,'pengeluaran_lain');

	    echo json_encode($datalist);
	}

	public function getrekapdata()
  {
    date_default_timezone_set("Asia/Bangkok");
    $datenow = date("Y-m-d");
    $id_stan = $this->input->post('id_stan');
    $tanggal_rekap = $this->input->post('tanggal_rekap');
    $tanggal_rekap = explode("/", $tanggal_rekap);
    $tanggal_rekap = $tanggal_rekap[2]."-".$tanggal_rekap[1]."-".$tanggal_rekap[0];

    $where = array('id_stan' => $id_stan, 'tanggal' => $tanggal_rekap);
    $wherenota = array('id_stan' => $id_stan, 'tanggal_nota' => $tanggal_rekap);

    $datapengeluaran = $this->Produk->getData($where,'pengeluaran_lain');
    $datakas = $this->Produk->getData($where,'kas');
    $datapenjualan = $this->Produk->getData($wherenota,'nota');

    $kasawal = 0;
    $kaspagi = 0;
      $kasmalam = 0;
    

    if (empty($datakas)) {
      
    }else{

      foreach ($datakas as $perkas) {
        if ($perkas->shift == 'pagi') {
          $kaspagi = $perkas->kas_awal;
        }else{
          $kasmalam = $perkas->kas_awal;
        }
        $kasawal = $perkas->kas_awal;
        //+
      }
    }

    if (empty($datapengeluaran)) {
      $pengeluaran = 0;
    }else{
      $pengeluaran = 0;
      foreach ($datapengeluaran as $perpengeluaran) {
        $pengeluaran+=$perpengeluaran->pengeluaran;
      }
    }

    $hasilpenjualan = 0;
    $cashdetail = 0;
    $ovodetail = 0;
    $debitdetail = 0;
    $totalkasir = 0;

    if (!empty($datapenjualan)) {
      foreach ($datapenjualan as $perpenjualan) {
        if ($perpenjualan->pembayaran == 'cash') {
          $cashdetail += $perpenjualan->total_harga;
        }else if ($perpenjualan->pembayaran == 'debit') {
          $debitdetail += $perpenjualan->total_harga;
        }else if ($perpenjualan->pembayaran == 'ovo') {
          $ovodetail += $perpenjualan->total_harga;
        }
      }

      $hasilpenjualan = $cashdetail+$debitdetail+$ovodetail;
    }

    $totalkasir = $kasawal+$cashdetail-$pengeluaran;
    $totalpemasukan = $hasilpenjualan-$pengeluaran;

    $lastarraysend = array(
      'kasawal' => $kasawal,
      'pengeluaran' => $pengeluaran,
      'hasilpenjualan' => $hasilpenjualan,
      'cashdetail' => $cashdetail,
      'ovodetail' => $ovodetail,
      'debitdetail' => $debitdetail,
      'totalkasir' => $totalkasir,
      'totalpemasukan' => $totalpemasukan,
      'kaspagi' => $kaspagi,
      'kasmalam' => $kasmalam
    );

    echo json_encode($lastarraysend);
  }

  public function savegajibonus()
  {
  	$persen = $this->input->post('persen');
  	$idstan = $this->input->post('idstan');
  	$omset = $this->input->post('omset');
  	$id_gaji_bonus = 'IDGajiBonusGenerator()';

  	$data = array(
  		'id_gaji_bonus' => $id_gaji_bonus,
  		'id_stan' => $idstan,
  		'omset_minimal' => $omset,
  		'persentase_bonus' => $persen,
  		'status' => 'active'
  	);

  	echo "sukses";
  }
}