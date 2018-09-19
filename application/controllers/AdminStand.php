<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class AdminStand extends CI_Controller {

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
	    $this->load->model('Produk');
	    $this->load->library('session');
  	}
	public function kasir()
	{
		$akses = $this->session->userdata('aksesadminstan');
        if(empty($akses)){
            redirect('login');
        }else{
            $this->load->view('adminstand/kasir');
        }
		
	}

	public function getAllKategori()//GET KATEGORI
	{
		$where = array('kategori !=' => ,'topping' );
		$data = $this->Produk->getDistinctSpecificColumnWhere('produk','kategori');
		echo json_encode($data);
	}

	public function getProdukInKategori() //GET PRODUK DI KATEGORI TERTENTU
	{
		$kategori = $this->input->post('kategori');
		$where = array('kategori' => $kategori );
		$data = $this->Produk->getData($where,'produk');
		echo json_encode($data);
	}

	public function getListTopping() //GET LIST TOPPING SAJA
	{
		$where = array('kategori' => 'topping' );
		$data = $this->Produk->getData($where,'produk');
		echo json_encode($data);
	}
}
