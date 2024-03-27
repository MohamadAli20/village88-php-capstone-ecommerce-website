<?php
    class Admins extends CI_Controller
    {
        /*function that render view files for admin side*/
        public function orders()
        {
            $this->load->view('admin/admin_order_head');
            $this->load->view('partials/partial_admin_side_nav');
            $this->load->view('admin/admin_order_body');
        }
        public function products()
        {
            $this->load->view('admin/admin_product_head');
            $this->load->view('partials/partial_admin_side_nav');
            $this->load->view('admin/admin_product_body');
        }

        /*functions that interact with the model*/
        public function add_product()
        {
            $this->load->model('Admin');
            $this->output->enable_profiler(TRUE);
            $data = $this->input->post();
            $this->Admin->insert_product($data);

            redirect('/admins/products');
        }
    }
?>