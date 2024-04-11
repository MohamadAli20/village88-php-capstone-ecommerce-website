<?php
    date_default_timezone_set('Asia/Manila');
    class Product extends CI_Model
    {
        /*
        * FOR CATALOG PAGE
        * retrieve product information from the database
        */
        public function select_products($current_page, $category, $search)
        {
            $page = ($current_page - 1) * 15;
            $select = "SELECT products.id, products.name, products.images, products.main_image, products.price, AVG(ratings.rating) AS average_rating, COUNT(ratings.rating) AS total FROM products";
            $join = "LEFT JOIN ratings ON products.id = ratings.product_id";
            $group_by = "GROUP BY products.id LIMIT $page, 15";
            if($category === null || $category === "all")
            {
                $query = $select . " " . $join . " " . $group_by;
                $result = $this->db->query($query)->result_array();
            } 
            else 
            {
                $where = "WHERE category = ?";
                $query = $select . " " .  $join . " " . $where . " " . $group_by;
                $result = $this->db->query($query, array($category))->result_array();    
            }
            if($search !== null)
            {
                $where = "WHERE name LIKE ?";
                $search .= "%";
                $query = $select . " " . $join . " " . $where . " " . $group_by;
                $result = $this->db->query($query, array($search))->result_array();
            }
            return $result;
        }
        public function select_all_product($category)
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
            return $result;
        }

        public function get_count_product()
        {
            $all_query = "SELECT count(*) AS total FROM products";
            $total_products = $this->db->query($all_query)->row()->total;

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
                'total_products' => $total_products,
                'total_vegetables' => $total_vegetables,
                'total_fruits' => $total_fruits,
                'total_pork' => $total_pork,
                'total_beef' => $total_beef,
                'total_chicken' => $total_chicken
            );
        }

        
        /*retrieve the total product*/
        public function get_total_products($category = null)
        {
            $query = "SELECT COUNT(*) as total_product FROM products";
            return $this->db->query($query)->row_array();
        }

        /*
        * insert, retrieve and verify user account with the database
        */
        public function create($user_info)
        {
            $isEmailExist = $this->get_user_by_email($user_info['email']);
            if(isset($isEmailExist))
            {
                return true; /*meaning email already used by other user*/
            }
            else{
                $query = "INSERT INTO users(first_name, last_name, email, encrypted_password, salt, created_at) VALUES(?,?,?,?,?,?)";
                $values = array(
                    'first_name' => $user_info['first_name'], 
                    'last_name' => $user_info['last_name'], 
                    'email' => $user_info['email'], 
                    'password' => $user_info['password'], 
                    'salt' => $user_info['salt'], 
                    'created_at' => date('Y-m-d H:i:a'));
                $this->db->query($query, $values);
                return false;
            }
        }
        public function get_user_by_email($email)
        {
            $query = "SELECT * FROM users WHERE email = ?";
            return $this->db->query($query, $email)->row_array();
        }
        public function verify_account($user_info)
        {
            $isEmailExist = $this->get_user_by_email($user_info['email']);
            if(isset($isEmailExist))
            {
                $password = md5($user_info['password'] . $isEmailExist['salt']);
                if($password === $isEmailExist['encrypted_password'])
                {
                    $user_name = array(
                        "id" => $isEmailExist['id'],
                        "first_name" => $isEmailExist['first_name'],
                        "last_name" => $isEmailExist['last_name']
                    );
                    return $user_name;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }

        /*
        * FOR PRODUCT VIEW
        */
        public function select_product_by_value($value)
        {
            
            $query = "SELECT products.*, AVG(ratings.rating) AS average_rating, COUNT(ratings.rating) AS num_rating FROM products
                    LEFT JOIN ratings ON products.id = ratings.product_id";
                        
            if($value > 0)/*true*/
            { 
                $where = "WHERE products.id = ?";
                $query .= " " . $where;
                $result = $this->db->query($query, array($value))->row_array();
            }
            else /*string is false*/
            {
                $where = "WHERE products.name LIKE ?";
                $query .= " " . $where;
                $result = $this->db->query($query, array($value . "%"))->row_array();
            }
            return $result;
        }
        public function select_similar_products($category)
        {
            $query = "SELECT products.*, AVG(ratings.rating) AS average_rating, COUNT(ratings.rating) AS num_rating 
                    FROM products
                    LEFT JOIN ratings ON products.id = ratings.product_id
                    WHERE products.category = ?
                    GROUP BY products.id
                    ORDER BY average_rating DESC
                    LIMIT 5";
            return $this->db->query($query, array($category))->result_array();
        }
        public function insert_to_cart($cart_info)
        {
            $query = "INSERT INTO carts(user_id, product_id, quantity, total_amount, created_at) VALUES(?,?,?,?,?)";
            $this->db->query($query, $cart_info);
        }
        public function select_count_cart($user_id)
        {
            $query = "SELECT COUNT(*) AS total FROM carts WHERE user_id = ?";
            return $this->db->query($query, $user_id)->row_array();
        }

        /*
        * Retrieve data for Cart
        */
        public function select_all_cart($user_id)
        {
            $query = "SELECT carts.*, products.category, products.price, products.images, products.main_image 
                        FROM carts
                        LEFT JOIN products ON carts.user_id = products.id
                        WHERE carts.user_id = ?";
            return $this->db->query($query, $user_id)->result_array();
        }
        /*
        * Delete specific cart
        */
        public function delete_cart_by_id($cart_id)
        {
            $query = "DELETE FROM carts WHERE id = ?";
            $this->db->query($query, $cart_id);
        }
        public function select_total_amount($user_id)
        {
            $query = "SELECT SUM(total_amount) AS total_items
                        FROM carts
                        WHERE user_id = ?";
            return $this->db->query($query, $user_id)->row_array();
        }
        /*
        * Insert shipping, billing and order
        */
        public function insert_order($user_id, $data)
        {
            $count_query = "SELECT COUNT(*) AS count FROM orders";
            $result = $this->db->query($count_query)->row_array();
            
            /*Insert order information*/
            $query1 = "INSERT INTO orders(id, user_id, total_items, order_date, total_amount, status, created_at) VALUES(?,?,?,?,?,?,?)";
            $values1 = array(
                'id' => intval($result['count']) + 1,
                'user_id' => $user_id,
                'total_items' => $data['orderSummary'][2]['value'],
                'order_date' => date('Y-m-d H:i:a'),
                'total_amount' => $data['orderSummary'][3]['value'],
                'status' => "Pending",
                'created_at' => date('Y-m-d H:i:a')
            );
            $this->db->query($query1, $values1);
            
            /*Insert shipping information*/
            $query2 = "INSERT INTO shippings(order_id, first_name, last_name, address1, address2, city, state, zip, created_at) VALUES(?,?,?,?,?,?,?,?,?)";
            $values2 = array(
                'order_id' => intval($result['count']) + 1,
                'first_name' => $data['shippingData'][1]['value'],
                'last_name' => $data['shippingData'][2]['value'],
                'address1' => $data['shippingData'][3]['value'],
                'address2' => $data['shippingData'][4]['value'],
                'city' => $data['shippingData'][5]['value'],
                'state' => $data['shippingData'][6]['value'],
                'zip' => $data['shippingData'][7]['value'],
                'created_at' => date('Y-m-d H:i:a')
            );
            $this->db->query($query2, $values2);

            /*Insert billing information*/
            $query3 = "INSERT INTO billings(order_id, first_name, last_name, address1, address2, city, state, zip, created_at) VALUES(?,?,?,?,?,?,?,?,?)";
            $values3 = array(
                'order_id' => intval($result['count']) + 1,
                'first_name' => $data['billingData'][1]['value'],
                'last_name' => $data['billingData'][2]['value'],
                'address1' => $data['billingData'][3]['value'],
                'address2' => $data['billingData'][4]['value'],
                'city' => $data['billingData'][5]['value'],
                'state' => $data['billingData'][6]['value'],
                'zip' => $data['billingData'][7]['value'],
                'created_at' => date('Y-m-d H:i:a')
            );
            $this->db->query($query3, $values3);
        }
    }
?>