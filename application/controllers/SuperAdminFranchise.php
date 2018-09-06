<?php





defined('BASEPATH') OR exit('No direct script access allowed');


class SuperAdminFranchise extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->helper('url');
	    $this->load->model('Post');
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

	//FUNCTION FOR MASTER DATA PRODUK (HELPER)
	public function json(){
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('produk');
        return print_r($this->datatables->generate());
    }

    //FUNCTION FOR MASTER DATA PRODUK (HELPER)
	public function produk_data(){
		$this->load->library('datatables');
		$this->datatables->select('id_produk,nama_produk,kategori');
		$this->datatables->from('produk');
		$this->datatables->add_column('delete', ' <a type=button onclick=reload_table() class="btn btn-danger" style="color:white;">Hapus</a> ','id_produk');
		echo $this->datatables->generate();
	}

	public function masterdatastan(){
		$data = [];
      $alldata = $this->Post->getAllData("stan");
      foreach ($alldata as $value) {
      	array_push($data, array($value["id_stan"],$value["nama_stan"],$value["alamat"],$value["password"],"<button class='btn btn-warning'>Edit</button>","<button class='btn btn-danger'>Delete</button>"));
      }
      var_dump(json_encode($data));
		$this->load->view('superadminfranchise/masterdatastan');
	}

	public function datastan(){
		
      echo json_encode($data);
	}

	public function gajibonusstan(){
		
	}

	public function skemapromo(){
		
	}

	public function masterdatakaryawan(){
		
	}
}