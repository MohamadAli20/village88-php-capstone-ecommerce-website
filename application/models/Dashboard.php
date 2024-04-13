<?php
    date_default_timezone_set('Asia/Manila');
    class Dashboard extends CI_Model
    {

        /*
        * FOR ORDER
        * Interact with the orders table in the database
        */
        public function select_orders($current_page, $status, $search)
        {
            $page = ($current_page - 1) * 5;
            $select = "SELECT orders.*, CONCAT(shippings.first_name, ' ', shippings.last_name) AS receiver, shippings.address1 FROM orders 
                        LEFT JOIN shippings ON orders.id = shippings.order_id";
            $limit = "LIMIT $page , 10";
            if($status === null || $status === "all")
            {
                $query = $select . " " . $limit;
                $result = $this->db->query($query)->result_array();
            }
            else
            {
                $where = "WHERE status = ?";
                $query = $select . " " . $where . " " . $limit;
                $result = $this->db->query($query, array($status))->result_array();
            }
            if($search !== null)
            {
                $where = "WHERE orders.id LIKE ?";
                $search .= "%";
                $query = $select . " " . $where . " " . $limit;
                $result = $this->db->query($query, array($search))->result_array();
            }
            
            return $result;
        }
        /*get the total per category*/
        public function get_count_order()
        {
            $all_query = "SELECT count(*) AS total FROM orders";
            $total_order = $this->db->query($all_query)->row()->total;

            $pending_query = "SELECT count(*) AS total FROM orders WHERE status = 'pending'";
            $total_pending = $this->db->query($pending_query)->row()->total;

            $on_process_query = "SELECT count(*) AS total FROM orders WHERE status = 'on-process'";
            $total_on_process = $this->db->query($on_process_query)->row()->total;

            $shipped_query = "SELECT count(*) AS total FROM orders WHERE status = 'shipped'";
            $total_shipped = $this->db->query($shipped_query)->row()->total;

            $delivered_query = "SELECT count(*) AS total FROM orders WHERE status = 'delivered'";
            $total_delivered = $this->db->query($delivered_query)->row()->total;

            return array(
                'total_order' => $total_order,
                'total_pending' => $total_pending,
                'total_on_process' => $total_on_process,
                'total_shipped' => $total_shipped,
                'total_delivered' => $total_delivered
            );
        }
        public function select_all_order($status, $search)
        {
            $query = "SELECT count(*) AS total FROM orders"; 
            if($status === null || $status === "all")
            {
                $result = $this->db->query($query)->row_array();
            }
            else
            {
                $query .= " WHERE status = ?";
                $result = $this->db->query($query, array($status))->row_array();
            }
            if($search !== null)
            {
                $where = " WHERE id LIKE ?";
                $search .= "%";
                $query .= $where;
                $result = $this->db->query($query, array($search))->row_array();
            }
            return $result;
        }
        
        public function update_status($status, $orderId)
        {
            $query = "UPDATE orders SET status = ?, updated_at = ? WHERE id = ?";
            $values = array($status, date('Y-m-d H:i:a'), $orderId);
            $this->db->query($query, $values);
        }

        /*
        * FOR PRODUCT
        * Interact with the products table in the database
        */
        public function insert_product($product_info, $image_json)
        {
            $query = "INSERT INTO products(name, description, category, price, stocks, images, main_image, created_at) VALUES(?,?,?,?,?,?,?,?)";
            $values = array(
                'name' => $product_info['name'],
                'description' => $product_info['description'],
                'category' => $product_info['category'],
                'price' => $product_info['price'],
                'stocks' => $product_info['stocks'],
                'images' => $image_json,
                'main_image' => $product_info['checkbox'],
                'created_at' => date('Y-m-d H:i:a')
            );
            $this->db->query($query, $values);
        }
        public function select_all($category, $search)
        {
            $query = "SELECT count(*) AS total FROM products"; 
            if($category === null || $category === "all")
            {
                $result = $this->db->query($query)->row_array();
            }
            else
            {
                $query .= " WHERE category = ?";
                $result = $this->db->query($query, array($category))->row_array();
            }
            if($search !== null)
            {
                $where = " WHERE name LIKE ?";
                $search .= "%";
                $query .= $where;
                $result = $this->db->query($query, array($search))->row_array();
            }
            return $result;
        }
        public function get_count()
        {
            $all_query = "SELECT count(*) AS total FROM products";
            $total_product = $this->db->query($all_query)->row()->total;

            $vegetables_query = "SELECT count(*) AS total FROM products WHERE category = 'vegetables'";
            $total_vegetables = $this->db->query($vegetables_query)->row()->total;

            $fruits_query = "SELECT count(*) AS total FROM products WHERE category = 'fruits'";
            $total_fruits = $this->db->query($fruits_query)->row()->total;

            $pork_query = "SELECT count(*) AS total FROM products WHERE category = 'pork'";
            $total_pork = $this->db->query($pork_query)->row()->total;

            $beef_query = "SELECT count(*) AS total FROM products WHERE category = 'beef'";
            $total_beef = $this->db->query($beef_query)->row()->total;

            $chicken_query = "SELECT count(*) AS total FROM products WHERE category = 'chicken'";
            $total_chicken = $this->db->query($chicken_query)->row()->total;

            return array(
                'all_total' => $total_product,
                'vegetables_total' => $total_vegetables,
                'fruits_total' => $total_fruits,
                'pork_total' => $total_pork,
                'beef_total' => $total_beef,
                'chicken_total' => $total_chicken
            );
        }

        public function select_products($current_page, $category, $search)
        {
            $page = ($current_page - 1) * 5;
            $select = "SELECT * FROM products ";
            $limit = "LIMIT $page , 5";
            if($category === null || $category === "all")
            {
                $query = $select . $limit;
                $result = $this->db->query($query)->result_array();
            }
            else
            {
                $where = "WHERE category = ?";
                $query = $select . $where . " " . $limit;
                $result = $this->db->query($query, array($category))->result_array();
            }
            if($search !== null)
            {
                $where = "WHERE name LIKE ?";
                $search .= "%";
                $query = $select . $where . " " . $limit;
                $result = $this->db->query($query, array($search))->result_array();
            }
            
            return $result;
        }
        public function select_product($id)
        {
            $query = "SELECT * FROM products WHERE id = ?";
            $result = $this->db->query($query, $id)->row_array();
            return $result;
        }
        public function select_product_by_name($name)
        {
            $query = "SELECT * FROM products WHERE name LIKE ?";
            $like = $name . "%";
            $result = $this->db->query($query, array($like))->result_array();
            return $result;
        }
        public function update_product($updated_info)
        {
            $this->load->library('upload');

            $imagesPath = array();
            $product = $updated_info['details'];
            $images = $updated_info['images'];
            for($i = 0; $i < count($images); $i++)
            {
                $dir = substr($images[$i], 0, 14);
                if($dir === "/assets/images")
                {
                    $image = substr($images[$i], 1);
                    array_push($imagesPath, $image);
                }
                else{
                    $base64_data = $images[$i];
                    $image_data = base64_decode($base64_data);
                    $upload_directory = 'assets/images/';
                    $filename = uniqid('image_') . '.jpg';
                    $target_path = $upload_directory . $filename;
                    file_put_contents($target_path, $image_data);
                    array_push($imagesPath, $target_path );
                }
            }
            $reIndex = array_combine(range(1, count($imagesPath)), array_values($imagesPath));
            $imagesPath = json_encode($reIndex);

            $query = "UPDATE products SET name = ?, description = ?, category = ?, price = ?, stocks = ?, images =?, main_image = ?, updated_at = ? WHERE id = ?";
            $values = array(
                'name' => $product[1],
                'description' => $product[2],
                'category' => $product[3],
                'price' => $product[4],
                'stocks' => $product[5],
                'images' => $imagesPath,
                'main_image' => $product[6],
                'updated_at' => date('Y-m-d H:i:a'),
                'id' => $product[0]
            );
            
            $this->db->query($query, $values);
        }
    }
?>