<?php
    class Admins extends CI_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('Admin');
        }
        /*function that render view files for admin side*/
        public function orders()
        {
            $this->load->view('admin/admin_order_head');
            $this->load->view('partials/partial_admin_side_nav');
            $this->load->view('admin/admin_order_body');
        }
        public function products()
        {
            $products = $this->show_products();
            $this->load->view('admin/admin_product_head');
            $this->load->view('partials/partial_admin_side_nav');
            $this->load->view('admin/admin_product_body', array('products' => $products));
        }

        /*functions that interact with the model*/
        public function add_product()
        {
            $this->output->enable_profiler(TRUE);
            $data = $this->input->post();
            $this->Admin->insert_product($data);

            redirect('/admins/products');
        }
        public function show_products()
        {
            $products = $this->Admin->selectAllProducts();
            return $products;
        }
    }
?>