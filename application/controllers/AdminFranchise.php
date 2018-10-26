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

          $list_bahan_jadi = $this->Produk->getAllData('bahan_jadi');
          $datenow = date("Y-m-d");

          foreach ($list_bahan_jadi as $perbahanjadi) {
            $where = array('id_bahan_jadi' => $perbahanjadi->id_bahan_jadi );

            $lastData = $this->Produk->getDataWhereDesc('stok_bahan_jadi_gudang',$where,'tanggal');
            $sisa = 0;
            if (!empty($lastData)) {
              if ($lastData[0]->tanggal != $datenow) {
                $sisa = $lastData[0]->stok_sisa;

                $data = array(
                  'id_bahan_jadi' => $perbahanjadi->id_bahan_jadi,
                  'nama_bahan_jadi' => $perbahanjadi->nama_bahan_jadi,
                  'stok_masuk' => 0,
                  'stok_keluar' => 0,
                  'stok_sisa' => $sisa,
                  'tanggal' => $datenow
                );

                $this->Produk->insert('stok_bahan_jadi_gudang',$data);
              }
            }else{
              $data = array(
                'id_bahan_jadi' => $perbahanjadi->id_bahan_jadi,
                'nama_bahan_jadi' => $perbahanjadi->nama_bahan_jadi,
                'stok_masuk' => 0,
                'stok_keluar' => 0,
                'stok_sisa' => 0,
                'tanggal' => $datenow
              );

              $this->Produk->insert('stok_bahan_jadi_gudang',$data);
            }

          }
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
    $datenow = date("Y-m-d");

    $id_distribusi = IDDistribusiGenerator();

    $data = array(
      'id_distribusi' => $id_distribusi, 
      'nama_stan' => $namastan,
      'tanggal' => $datenow
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

        $where = array(
          'tanggal' => $datenow,
          'id_bahan_jadi' => $perdistribusi->idbahanjadi
        );

        $StokDataToday = $this->Produk->getData($where,'stok_bahan_jadi_gudang');

        if (empty($StokDataToday)) {
            $where = array('id_bahan_jadi' => $perdistribusi->idbahanjadi );

            $lastData = $this->Produk->getDataWhereDesc('stok_bahan_jadi_gudang',$where,'tanggal');
            $sisa = 0;
            if (!empty($lastData)) {
              if ($lastData[0]->tanggal != $datenow) {
                $sisa = $lastData[0]->stok_sisa;

                $data = array(
                  'id_bahan_jadi' => $perdistribusi->idbahanjadi,
                  'nama_bahan_jadi' => $perdistribusi->namabahanjadi,
                  'stok_masuk' => 0,
                  'stok_keluar' => $perdistribusi->jumlah,
                  'stok_sisa' => $sisa - $perdistribusi->jumlah,
                  'tanggal' => $datenow
                );

                $this->Produk->insert('stok_bahan_jadi_gudang',$data);
              }
            }else{
              $data = array(
                'id_bahan_jadi' => $perdistribusi->idbahanjadi,
                'nama_bahan_jadi' => $perdistribusi->namabahanjadi,
                'stok_masuk' => 0,
                'stok_keluar' => $perdistribusi->jumlah,
                'stok_sisa' => 0- $perdistribusi->jumlah,
                'tanggal' => $datenow
              );

              $this->Produk->insert('stok_bahan_jadi_gudang',$data);
            }
        }else{
          $data = array(
            'stok_keluar' => $StokDataToday[0]->stok_keluar + $perdistribusi->jumlah,
            'stok_sisa' => $StokDataToday[0]->stok_sisa -$perdistribusi->jumlah
          );

          $this->Produk->update('stok_bahan_jadi_gudang',$data,$where);
        }
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
    $id = $this->input->post('id_distribusi');
    $where = array('id_distribusi' => $id);

    // $datalist = $this->Produk->getData($where,'detail_distribusi');
    $this->load->library('datatables');
    $this->datatables->select('nama_bahan_jadi,jumlah');
    $this->datatables->from('detail_distribusi');
    $this->datatables->where($where);
    echo $this->datatables->generate();

    // echo json_encode($datalist);
  }

  public function get_list_bahan_jadi_distribusi_cetak()
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

  public function tambah_pengeluaran_lain()
  {
    $keterangan = $this->input->post('keterangan');
    $jumlahpengeluaran = $this->input->post('jumlahpengeluaran');

    $datenow = date("Y-m-d");
    
    $data = array(
      'tanggal' => $datenow,
      'keterangan' => $keterangan,
      'pengeluaran' => $jumlahpengeluaran
     );

    $success = $this->Produk->insert('pengeluaran_lain_gudang',$data);

    if ($success) {
      echo "Berhasil Ditambahkan";
    }
    
  }

  public function getpengeluaranlain()
  {
    $this->load->library('datatables');
    $this->datatables->select('id_pengeluaran,tanggal,keterangan,pengeluaran');
    $this->datatables->from('pengeluaran_lain_gudang');
    echo $this->datatables->generate();
  }

  public function delete_pengeluaran()
  {
    $id_pengeluaran = $this->input->post('id');

    $wheredel = array('id_pengeluaran' => $id_pengeluaran);
    $sst = $this->Produk->deleteWhere('pengeluaran_lain_gudang',$wheredel);

    if ($sst) {
      echo "SUCCESSSAVE";
    }else{
      echo "ERROR";
    }
  }

  public function edit_pengeluaran_lain()
  {
    $keteranganbaru = $this->input->post('keteranganbaru');
    $pengeluaranbaru = $this->input->post('pengeluaranbaru');
    $id_pengeluaran = $this->input->post('id_pengeluaran');

    $where = array('id_pengeluaran' => $id_pengeluaran);

    $data = array(
      'keterangan' => $keteranganbaru,
      'pengeluaran' => $pengeluaranbaru
     );

    $realdata = $this->Produk->getData($where,'pengeluaran_lain_gudang');

    if ($realdata[0]->keterangan != $keteranganbaru || $realdata[0]->pengeluaran != $pengeluaranbaru ) {
      $cek = $this->Produk->Update('pengeluaran_lain_gudang',$data,$where);
    }else{
      $cek = true;
    }

    if ($cek) {
      echo "Berhasil Diupdate";
    }else{
      echo "gagal";
    }
  }
}
?>