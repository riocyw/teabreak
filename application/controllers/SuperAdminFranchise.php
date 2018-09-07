<?php





defined('BASEPATH') OR exit('No direct script access allowed');


class SuperAdminFranchise extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->helper('url');
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
		$id = $this->input->post('id');
		$kategori = $this->input->post('kategori');
		$nama =$this->input->post('nama');
		$data = array(
	        'id_produk' => $id,
	        'nama_produk' => $nama,
	        'kategori' => $kategori,
	        'harga_jual' => 0
	         );
		$this->Produk->insert('produk',$data);
	}

	public function data_kategori(){
		$data = $this->db->distinct()->select('kategori')->from('produk')->get();
		echo json_encode($data->result());
	}

    //FUNCTION FOR MASTER DATA PRODUK (HELPER)
	public function produk_data(){
		$this->load->library('datatables');
		$this->datatables->select('id_produk,nama_produk,kategori');
		$this->datatables->from('produk');
		$this->datatables->add_column('edit', '<a type="button" onclick=edit_produk("$1") class="btn btn-warning" style="color:white;">Edit</a> ','id_produk');
		$this->datatables->add_column('delete', '<a type="button" onclick=delete_produk("$1") class="btn btn-danger" style="color:white;">Delete</a> ','id_produk');
		echo $this->datatables->generate();
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
	        'kategori' => $this->input->post('kategori')
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
	}

	public function datastan(){
		$this->load->library('datatables');
		$this->datatables->select('id_stan,nama_stan,alamat,password');
		$this->datatables->from('stan');
		//bagian id_stan maksud e opo?
		$this->datatables->add_column('edit', '<button onclick=edit_stan("$1") class="btn btn-warning" style="color:white;">Edit</button> ','id_stan');
		$this->datatables->add_column('delete', '<button onclick=delete_stan("$1") class="btn btn-danger" style="color:white;">Delete</button> ','id_stan');
		echo$this->datatables->generate();
	}

	public function gajibonusstan(){
		
	}

	public function skemapromo(){
		
	}

	public function masterdatakaryawan(){
		
	}
}