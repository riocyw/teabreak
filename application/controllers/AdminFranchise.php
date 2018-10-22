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

  public function getrekapdata()
  {
    date_default_timezone_set("Asia/Bangkok");
    $datenow = date("Y-m-d");
    $id_stan = $this->input->post('id_stan');
    $where = array('id_stan' => $id_stan, 'tanggal' => $datenow);
    $wherenota = array('id_stan' => $id_stan, 'tanggal_nota' => $datenow);

    $datapengeluaran = $this->Produk->getData($where,'pengeluaran_lain');
    $datakas = $this->Produk->getData($where,'kas');
    $datapenjualan = $this->Produk->getData($wherenota,'nota');

    if (empty($datakas)) {
      $kasawal = 0;
    }else{
      $kasawal = $datakas[0]->kas_awal;
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
    $totalpemasukan = $kasawal+$hasilpenjualan-$pengeluaran;

    $lastarraysend = array(
      'kasawal' => $kasawal,
      'pengeluaran' => $pengeluaran,
      'hasilpenjualan' => $hasilpenjualan,
      'cashdetail' => $cashdetail,
      'ovodetail' => $ovodetail,
      'debitdetail' => $debitdetail,
      'totalkasir' => $totalkasir,
      'totalpemasukan' => $totalpemasukan
    );

    echo json_encode($lastarraysend);
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
      'nama' => $namastan,
      'tanggal' => $tanggal
    );

    if ($this->Produk->insert('order_bahan_jadi_stan',$data)) {
      # code...
    }else{
      $stat = false;
    }

    

    

    if ($stat) {
      echo "true";
    }else{
      echo "false";
    }
  }

}
?>