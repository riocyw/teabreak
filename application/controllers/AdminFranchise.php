<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class AdminFranchise extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->helper('url');
	    $this->load->helper('site_helper');
	    $this->load->model('Post');
	    $this->load->model('Produk');
	    $this->load->library('session');
  	}

  	public function dashboardadmin()
  	{
  		$akses = $this->session->userdata('aksesadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('adminfranchise/navigationbar');
          $this->load->view('adminfranchise/dashboard');
        }
  	}

  	public function stokproduk(){
  		$akses = $this->session->userdata('aksesadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('adminfranchise/navigationbar');
          $this->load->view('adminfranchise/stokproduk');
        }
  	}

  	public function pembelian(){
  		$akses = $this->session->userdata('aksesadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('adminfranchise/navigationbar');
          $this->load->view('adminfranchise/pembelianproduk');
        }
  	}

  	public function pengeluaranlain(){
  		$akses = $this->session->userdata('aksesadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('adminfranchise/navigationbar');
          $this->load->view('adminfranchise/pengeluaranlain');
        }
  	}

	public function distribusi(){
  		$akses = $this->session->userdata('aksesadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('adminfranchise/navigationbar');
          $this->load->view('adminfranchise/distribusi');
        }
  	}

	public function stokkeluar(){
  		$akses = $this->session->userdata('aksesadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('adminfranchise/navigationbar');
          $this->load->view('adminfranchise/stokkeluar');
        }
  }

  public function orderstan()
  {
    $akses = $this->session->userdata('aksesadmin');
        if(empty($akses)){
            redirect('login');
        }else{
          $this->load->view('adminfranchise/navigationbar');
          $this->load->view('adminfranchise/orderstan');
        }
  }

  public function getAllOrder()
  {
    $this->load->library('datatables');
    $this->datatables->select('id_order,tanggal_order,status');
    $this->datatables->from('order_bahan_jadi_stan');
    echo $this->datatables->generate();
  }

  public function getSpecificOrderDetail()
  {
    $id_order = $this->input->post('id_order');
    $where = array('id_order' => $id_order);

    $this->load->library('datatables');
    $this->datatables->select('nama_bahan_jadi,jumlah');
    $this->datatables->from('detail_order_bahan_jadi_stan');
    $this->datatables->where($where);
    echo $this->datatables->generate();
    
  }

  public function changeStatusOrderToDone()
  {
    $id_order = $this->input->post('id_order');
    $where = array('id_order' => $id_order);

    $data = array(
      'status' => 'done'
    );

    $this->Post->Update('order_bahan_jadi_stan',$data,$where);
  }

  

}
?>