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
            // $this->output->enable_profiler(TRUE);
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

            if ($product) {
                /*onvert product data to JSON format*/
                $product_json = json_encode($product);

                /*set the response content type to JSON*/
                $this->output->set_content_type('application/json');

                /*output the product data as JSON*/
                $this->output->set_output($product_json);
            } else {
                $this->output->set_status_header(404);
                $this->output->set_output(json_encode(array('error' => 'Product not found')));
            }
        }
        public function edit_product()
        {
            // $this->output->enable_profiler(TRUE);
            $updated_info = $this->input->post();
            $this->Admin->update_product($updated_info);
        }
        // public function receive_image_path()
        // {
        //     $updated_info = $_POST['updatedInfo'];
        //     print_r($updated_info);
        //     // return $imagePaths;
        // }
    }
?>