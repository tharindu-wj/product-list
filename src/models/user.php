<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 8/12/18
 * Time: 11:12 AM
 */

namespace App\Models;

use MvcBase\Model;

class UserModel extends Model
{
    public function register()
    {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //print_r($post);
        $psswrd = $post['password'];
        $encrypted_psswrd = md5($psswrd);
        //die($encrypted_psswrd);
        if ($post['submit']) {
            // Insert into MySql
            $this->query('INSERT INTO users (user_name, user_email, user_password) VALUES (:name, :email, :password)');

            $this->bind(':name', $post['name']);
            $this->bind(':email', $post['email']);
            $this->bind(':password', $encrypted_psswrd);

            $this->execute();

            //Verify
            if ($this->lastInsertId()) {
                header('location: ' . ROOT_URL);
            }
        }
    }

    public function login()
    {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //print_r($post);
        $psswrd = $post['password'];
        $encrypted_psswrd = md5($psswrd);
        //die($encrypted_psswrd);
        if ($post['submit']) {
            // Compare
            $this->query('SELECT * FROM users WHERE user_email = :email AND user_password = :password');

            $this->bind(':email', $post['email']);
            $this->bind(':password', $encrypted_psswrd);

            $row = $this->single();

            if ($row) {
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "id" => $row['user_id'],
                    "name" => $row['user_name'],
                    "email" => $row['user_email'],
                );
                header('location: ' . ROOT_URL . 'products');
            } else {
                Messages::setMsg('Incorrect Login', 'error');
            }
        }
    }
}