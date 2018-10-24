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

    $this->Produk->Update('order_bahan_jadi_stan',$data,$where);
  }
  
  public function saveDistribusi()
  {
    $namastan = $this->input->post('namastan');
    $tanggal = $this->input->post('tanggal');
    $arrayDistribusi = json_decode($this->input->post('arrayDistribusi'));
    $stat = true;

    $id_distribusi = IDDistribusiGenerator();

    $data = array(
      'id_distribusi' => $id_distribusi, 
      'nama_stan' => $namastan,
      'tanggal' => $tanggal
    );

    if ($this->Produk->insert('distribusi',$data)) {
      $stat = true;
    }else{
      $stat = false;
    }


    $angka = 0;
    foreach ($arrayDistribusi as $perdistribusi) {
      $angka++;
      $data = array(
        'id_detail_distribusi' => $id_distribusi."_".$angka,
        'id_distribusi' => $id_distribusi,
        'nama_bahan_jadi' => $perdistribusi->namabahanjadi,
        'jumlah' => $perdistribusi->jumlah
      );

      if ($this->Produk->insert('detail_distribusi',$data)) {
        
      }else{
        $stat = false;
      }
    }
    

    if ($stat) {
      echo "true";
    }else{
      echo "false";
    }
  }

  public function datatabledistribusi()
  {
    $this->load->library('datatables');
    $this->datatables->select('id_distribusi,nama_stan,tanggal');
    $this->datatables->from('distribusi');
    echo $this->datatables->generate();
  }

  public function delete_distribusi()
  {
    $id = $this->input->post('id');
    $where = array('id_distribusi' => $id);

    $this->Produk->DeleteWhere('distribusi',$where);
  }

  public function get_list_bahan_jadi_distribusi()
  {
    $id = $this->input->post('id');
    $where = array('id_distribusi' => $id);

    $datalist = $this->Produk->getData($where,'detail_distribusi');

    echo json_encode($datalist);
  }

  public function saveUpdateDistribusi()
  {
    $namastan = $this->input->post('namastan');
    $tanggal = $this->input->post('tanggal');
    $editarrayDistribusi = json_decode($this->input->post('editarrayDistribusi'));
    $stat = true;

    $id_distribusi = $this->input->post('id_distribusi');

    $data = array(
      'nama_stan' => $namastan,
      'tanggal' => $tanggal
    );
    $where = array('id_distribusi' => $id_distribusi);

    if ($this->Produk->update('distribusi', $data, $where)) {
      $stat = true;
    }else{
      // $stat = false;
    }

    $this->Produk->DeleteWhere('detail_distribusi',$where);
    $angka = 0;
    foreach ($editarrayDistribusi as $perdistribusi) {
      $angka++;
      $data = array(
        'id_detail_distribusi' => $id_distribusi."_".$angka,
        'id_distribusi' => $id_distribusi,
        'nama_bahan_jadi' => $perdistribusi->namabahanjadi,
        'jumlah' => $perdistribusi->jumlah
      );

      if ($this->Produk->insert('detail_distribusi',$data)) {
        
      }else{
        $stat = false;
      }
    }
    

    if ($stat) {
      echo "true";
    }else{
      echo "false";
    }
  }
}
?>