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
        public function select_product_by_id($id)
        {
            $query = "SELECT products.*, AVG(ratings.rating) AS average_rating, COUNT(ratings.rating) AS num_rating FROM products
                        LEFT JOIN ratings ON products.id = ratings.product_id
                        WHERE products.id = ?";
            return $this->db->query($query, array($id))->row_array();
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
    }
?>