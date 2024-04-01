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
            $page = $this->input->get('page');
            if($page === null)
            {
                $page = 1;
            }
            $category = $this->input->get('category');
            if($category !== null)
            {
                $this->session->set_userdata('category', $category);
                $this->session->unset_userdata('search');
            }
            $search = $this->input->get('search');
            if($search !== null)
            {
                $this->session->set_userdata('search', $search);
                $this->session->unset_userdata('category');
            }
            $category = $this->session->userdata('category');
            $search = $this->session->userdata('search');

            $this->session->set_userdata('current_page', $page);
            $products = $this->show_products($page, $category, $search);
            $total_per_category = $this->get_total($category, $search);
            $count = $this->get_all_total();
            $product_data = array(
                'products' => $products,
                'total_per_category' => $total_per_category,
                'count' => $count
            );

            $this->load->view('admin/admin_product_head');
            $this->load->view('partials/partial_admin_side_nav');
            $this->load->view('admin/admin_product_body', $product_data);
        }

        /*functions that interact with the model*/
        public function add_product()
        {
            // $this->output->enable_profiler(TRUE);
            $data = $this->input->post();
            
            /*store image in the server and convert image path to json*/
            $this->load->library("upload");
            $image_json = array();
            $num = 1;
            foreach($_FILES['images']['name'] as $key => $filename)
            {
                $folder_path = "assets/images/";
                $image_path = $folder_path . $filename;
                move_uploaded_file($_FILES['images']['tmp_name'][$key], $image_path);
                $image_json[$num] = $image_path; /*add image*/
                $num++;
            }
            $image_json = json_encode($image_json); /*convert array to json*/

            $this->Admin->insert_product($data, $image_json);
            // redirect('/admins/products');
        }
        public function get_total($category, $search)
        {
            return $this->Admin->select_all($category, $search);
        }
        public function get_all_total()
        {
            return $this->Admin->get_count();
        }
        public function show_products($current_page, $category, $search)
        {
            $products = $this->Admin->select_products($current_page, $category, $search);
            return $products;
        }
        public function get_product($id)
        {
            // $this->output->enable_profiler(TRUE);
            $product = $this->Admin->select_product($id);

            if($product){
                /*convert product data to JSON format*/
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
        public function get_product_by_name($name)
        {
            $result = $this->Admin->select_product_by_name($name);
            if($result){
                /*convert product data to JSON format*/
                $result_json = json_encode($result);

                /*set the response content type to JSON*/
                $this->output->set_content_type('application/json');

                /*output the product data as JSON*/
                $this->output->set_output($result_json);
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
        // public function get_product_by_category()
        // {
            
        // }
    }
?>