<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{
	/*functions that render view files for client side*/
	public function index()
	{
		$this->load->view('catalog_head');
		$this->load->view('partials/partial_side');
		$this->load->view('partials/partial_nav');
		$this->load->view('catalog_body');
	}
	public function product_view($product_id)
	{
		$this->load->view('product_view_head');
		$this->load->view('partials/partial_side');
		$this->load->view('partials/partial_success_nav');
		$this->load->view('product_view_body');
	}
	public function cart()
	{
		$this->load->view('cart_head');
		$this->load->view('partials/partial_side');
		$this->load->view('partials/partial_success_nav');
		$this->load->view('cart_body');
	}
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

	/*functions that interact with the model*/
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
				$this->session->set_userdata("name", $name);
				redirect("/products/success_login");
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
