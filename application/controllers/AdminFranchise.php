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
            // $this->load->view('adminfranchise/');
			// $this->load->view('adminfranchise/');
        }
  	}

  	public function stokproduk(){
  		$akses = $this->session->userdata('aksesadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('adminfranchise/navigationbar');
            // $this->load->view('adminfranchise/');
			// $this->load->view('adminfranchise/');
        }
  	}

  	public function pembelian(){
  		$akses = $this->session->userdata('aksesadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('adminfranchise/navigationbar');
            // $this->load->view('adminfranchise/');
			// $this->load->view('adminfranchise/');
        }
  	}

  	public function pengeluaranlain(){
  		$akses = $this->session->userdata('aksesadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('adminfranchise/navigationbar');
            // $this->load->view('adminfranchise/');
			// $this->load->view('adminfranchise/');
        }
  	}

	public function distribusi(){
  		$akses = $this->session->userdata('aksesadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('adminfranchise/navigationbar');
            // $this->load->view('adminfranchise/');
			// $this->load->view('adminfranchise/');
        }
  	}

	public function stokkeluar(){
  		$akses = $this->session->userdata('aksesadmin');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('adminfranchise/navigationbar');
            // $this->load->view('adminfranchise/');
			// $this->load->view('adminfranchise/');
        }
  	}

}
?>