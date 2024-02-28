<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{
	public function index()
	{
		$this->load->view('catalog_head');
		$this->load->view('partials/partial');
		$this->load->view('catalog_body');
	}
	public function product_view($product_id)
	{
		$this->load->view('product_view_head');
		$this->load->view('partials/partial');
		$this->load->view('partials/product_view_partial');
		$this->load->view('product_view_body');
	}
	public function cart()
	{
		$this->load->view('cart_head');
		$this->load->view('partials/partial');
		$this->load->view('partials/product_view_partial');
		$this->load->view('cart_body');
	}
}
?>
