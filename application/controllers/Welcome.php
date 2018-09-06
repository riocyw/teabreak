<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
	    parent::__construct();
	    $this->output->set_header("Access-Control-Allow-Origin: *");
	    $this->load->helper('url');
  	}
	public function index()
	{
		$this->load->view('superadminfranchise/dashboard');
	}

	public function mnjproduk()
	{
		$this->load->view('superadminfranchise/mnjproduk');
		$this->load->view('superadminfranchise/datatable_produk');
	}

	function json(){
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('produk');
        return print_r($this->datatables->generate());
    }

	public function produk_data(){
		$this->load->library('datatables');
		$this->datatables->select('id_produk,nama_produk,kategori');
		$this->datatables->from('produk');
		$this->datatables->add_column('delete', ' <a type=button onclick=reload_table() class="btn btn-danger">Hapus</a> ','id_produk');
		echo $this->datatables->generate();
	}
}
