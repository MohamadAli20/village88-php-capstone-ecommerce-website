<?php
    date_default_timezone_set('Asia/Manila');
    class Product extends CI_Model
    {
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
    }
?>