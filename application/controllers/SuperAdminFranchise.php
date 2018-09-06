<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class SuperAdminFranchise extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->helper('url');
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
		$this->datatables->add_column('delete', ' <a type=button onclick=reload_table() class="btn  btn-md form-control btn-danger" style="color:white;">AA</a> ','id_produk');
		echo $this->datatables->generate();
	}

	public function masterdatastan(){
		$this->load->view('superadminfranchise/masterdatastan');
		$this->load->view('superadminfranchise/datatable_produk');
	}

	public function gajibonusstan(){
		
	}

	public function skemapromo(){
		
	}

	public function masterdatakaryawan(){
		
	}
}