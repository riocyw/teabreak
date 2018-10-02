<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Controllerdisplay extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->helper('url');
	    $this->load->helper('site_helper');
	    $this->load->model('Post');
	    $this->load->model('Produk');
	    $this->load->library('session');
  	}

  	public function functionuntukdisplaynya()
  	{
  		# code...
  	}
}