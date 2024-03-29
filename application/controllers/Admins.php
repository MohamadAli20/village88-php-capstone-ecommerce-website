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
            $products = $this->Admin->select_all_products();
            return $products;
        }
        public function get_product($id)
        {
            // $this->output->enable_profiler(TRUE);
            $product = $this->Admin->select_product($id);

            // Check if product exists
            if ($product) {
                // Convert product data to JSON format
                $product_json = json_encode($product);

                // Set the response content type to JSON
                $this->output->set_content_type('application/json');

                // Output the product data as JSON
                $this->output->set_output($product_json);
            } else {
                // Product not found, return error response
                $this->output->set_status_header(404);
                $this->output->set_output(json_encode(array('error' => 'Product not found')));
            }
        }
        public function edit_product($id)
        {
            $query = "SELECT * FROM products WHERE id = ?";
            // var_dump($this->input->post();

        }
    }
?>