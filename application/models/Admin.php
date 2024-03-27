<?php
    date_default_timezone_set('Asia/Manila');
    class Admin extends CI_Model
    {
        public function insert_product($product_info)
        {
            $image_json = array();
            $num = 1;
            for($i = 0; $i < count($_FILES['images']['tmp_name']); $i++)
            {
                $image_data = file_get_contents($_FILES['images']['tmp_name'][$i]);
                $base64_image = base64_encode($image_data);
                $image_json[$num] = $base64_image; /*add image*/
                $num++;
            }
            // var_dump($image_json);
            $image_json = json_encode($image_json); /*convert array to json*/
            

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
        public function get_products()
        {
            $query = "SELECT * FROM products";
            $result = $this->db->query($query)->row_array();

            $data = $result['images'];
            $jsonArray = json_decode($data, true);
            var_dump($jsonArray);
        }
    }
?>