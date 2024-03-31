<?php
    date_default_timezone_set('Asia/Manila');
    class Admin extends CI_Model
    {
        public function insert_product($product_info)
        {
            $image_json = array();
            $num = 1;
            for($i = 0; $i < count($_FILES['images']) - 1; $i++)
            {
                $folder_path = "assets/images/";
                $image_path = $folder_path . $_FILES['images']['name'][$i];
                move_uploaded_file($_FILES['images']['tmp_name'][$i], $image_path);
                $image_json[$num] = $image_path; /*add image*/
                echo $image_path;
                $num++;
            }
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
        public function select_all_products()
        {
            $query = "SELECT * FROM products";
            $result = $this->db->query($query)->result_array();
            return $result;
        }
        public function select_product($id)
        {
            $query = "SELECT * FROM products WHERE id = ?";
            $result = $this->db->query($query, $id)->row_array();
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