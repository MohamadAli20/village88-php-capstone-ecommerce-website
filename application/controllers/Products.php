<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product');
	}
	/*
	* Render Catalog Page
	*/
	public function index()
	{
		$page = $this->input->get('page');
		if($page === null)
		{
			$page = 1;
		}
		$get_category = $this->input->get('category');
		if($get_category !== null)
		{
			$this->session->set_userdata('category', $get_category);
			$this->session->unset_userdata('search_product');
		}
		$get_search = $this->input->get('search');
		if($get_search !== null)
		{
			$this->session->set_userdata('search_product', $get_search);
			$this->session->unset_userdata('category');
		}		
		/*set the session*/
		$category = $this->session->userdata('category');
		$search = $this->session->userdata('search_product');

		$this->session->set_userdata('current_page', $page);
		$products = $this->show_products($page, $category, $search);
		$total_per_category = $this->get_total_product($category);
		$count = $this->get_all_total_product();
		$product_data = array(
			'products' => $products,
			'total_per_category' => $total_per_category,
			'count' => $count
		);
		$this->load->view('catalog_head');
		$this->load->view('partials/partial_side');
		/*if login or not*/
		if($this->session->userdata('name') === null) /*not logged in*/
		{
		$this->load->view('partials/partial_nav');
		}
		else
		{
		$this->load->view('partials/partial_success_nav');
		}
		$this->load->view('catalog_body', $product_data);
	}
	/*
	* Interact with the model for Catalog Page
	*/
	/*display products based on category or search*/
	public function show_products($current_page, $category, $search)
	{
		return $this->Product->select_products($current_page, $category, $search);
	}
	/*retrieve total per category based on category or search*/
	public function get_total_product($category)
	{
		return $this->Product->select_all_product($category);
	}
	/*retrieve the total per category*/
	public function get_all_total_product()
	{
		return $this->Product->get_count_product();
	}


	/*
	* Render Product View Page
	* Display specific product
	*/
	public function product_view($value)
	{
		$parsed_value = intval($value);
		if($parsed_value > 0)
		{
			$product = $this->get_product_by_id($value);
		}
		else
		{
			$product = $this->get_product_by_id($value);
		}
		/*set category in the session for similar items*/
		$similar_products = $this->get_similar_items($product['category']);
		$this->load->view('product_view_head');
		$this->load->view('partials/partial_side');
		$this->load->view('partials/partial_success_nav');
		$this->load->view('product_view_body', array('product' => $product, 'similar_items' => $similar_products));
	}
	/*
	* Retrieve product by product id
	*/
	public function get_product_by_id($id)
	{
		return $this->Product->select_product_by_id($id);
	}
	public function get_product_by_name($name)
	{
		return $this->Product->select_product_by_name($name);
	}
	/* 
	* Retrieve similar products by category
	*/
	public function get_similar_items($category)
	{
		return $this->Product->select_similar_products($category);
	}

	public function cart()
	{
		$this->load->view('cart_head');
		$this->load->view('partials/partial_side');
		$this->load->view('partials/partial_success_nav');
		$this->load->view('cart_body');
	}
	

	/*
	* SIGN UP & LOGIN
	* render view files
	*/
	public function signup()
	{
		$this->load->view('signup');
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function success_login()
	{
		$this->load->view('catalog_head');
		$this->load->view('partials/partial_side');
		$this->load->view('partials/partial_success_nav');
		$this->load->view('catalog_body');
	}

	/*
	* SIGN UP & LOGIN
	* interact with the model
	* form validation
	* password encryption (hashing and salting)
	*/
	public function register()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
        if($this->form_validation->run() === FALSE)
		{
			$this->view_data["errors"] = validation_errors();
			$this->session->set_userdata('errors', $this->view_data["errors"]);
		}
		else
		{
			$this->load->model('Product');
			$this->output->enable_profiler(TRUE);
			$data = $this->input->post();
			/*encrypt the password*/
			$salt = bin2hex(openssl_random_pseudo_bytes(22));
			$encrypted_password = md5($data['password'] . $salt);
			$new_user = array(
				'first_name' => $data['first_name'],
				'last_name' => $data['last_name'],
				'email' => $data['email'],
				'password' => $encrypted_password,
				'salt' => $salt
			);
			$result = $this->Product->create($new_user);

			if($result === true) /*if email is already used*/
			{
				$this->view_data["errors"] = "<p>Email is already used. Please choose another one.</p>";
				$this->session->set_userdata('errors', $this->view_data["errors"]);
			}
			if($result === false){
				$this->session->set_userdata('success', 'Successfully registered');
			}
		}
		redirect("/products/signup");
	}
	public function verify()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run() === FALSE)
		{
			$this->view_data["errors"] = validation_errors();
			$this->session->set_userdata('errors', $this->view_data["errors"]);
		}
		else
		{
			$this->load->model('Product');
			$this->output->enable_profiler(TRUE);
			$data = $this->input->post();
			$user_info = array(
				'email' => $data['email'],
				'password' => $data['password']
			);
			$result = $this->Product->verify_account($user_info);
			if(is_array($result)) /*if email exist in the database proceed to validate password*/
			{
				$name = array(
					'first_name' => $result['first_name'], 
					'last_name' => $result['last_name']);
				$this->session->set_userdata("name", $name); /*set the username in the session*/
				redirect("/");
			}
			if($result === false)
			{
				$this->view_data["errors"] = "<p>Login failed! Enter correct credentials.</p>";
				$this->session->set_userdata('errors', $this->view_data["errors"]);
				redirect("/products/login");
			}
		}
		redirect("/products/login");
	}
}
?>
