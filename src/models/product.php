<?php

/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 7/1/18
 * Time: 4:28 PM
 */

namespace App\Models;

use MvcBase\Model;

class ProductModel extends Model
{
    public function index()
    {
        $this->query('SELECT * FROM products INNER JOIN categories ON products.category_id = categories.category_id;');
        $rows = $this->resultSet();
        return $rows;
    }

    public function add()
    {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //var_dump($_FILES);
        var_dump($post);

        if ($post['submit']) {
            //Upload image to uploads
            if (isset($_FILES['image'])) {
                $errors = array();
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
                $file_tmp_name = uniqid() . '-' . $file_name;

                $expensions = array("jpeg", "jpg", "png");

                if (in_array($file_ext, $expensions) === false) {
                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                }

                if (empty($errors) == true) {
                    move_uploaded_file($file_tmp, "uploads/" . $file_tmp_name);
                    //echo "Success";
                } else {
                    var_dump($errors);
                }
            }

            // Insert into MySql
            $this->query('INSERT INTO products (prod_name, prod_description, prod_price, 	prod_image, category_id)
 VALUES (:name, :description, :price, :image, :category_id)');

            $this->bind(':name', $post['name']);
            $this->bind(':description', $post['description']);
            $this->bind(':price', $post['price']);
            $this->bind(':image', $file_tmp_name);
            $this->bind(':category_id', $post['category']);

            $this->execute();

            //Verify
            if ($this->lastInsertId()) {
                header('location: ' . ROOT_URL . 'products');
                echo "Record added";
            }
        }

        //Get all categories
        $categories = $this->getCategories();
        return $categories;
    }

    public function delete($id)
    {
        $this->query('DELETE FROM products WHERE product_id = :prod_id');
        $this->bind(':prod_id', $id);
        $this->execute();
    }

    public function update($id)
    {
        //Get product details of id
        $this->query('SELECT * FROM products WHERE product_id = :prod_id');
        $this->bind(':prod_id', $id);
        $prod_array = $this->single();

        //Get categories
        $categories = $this->getCategories();

        $return_arr = [];
        $return_arr[0] = $prod_array;
        $return_arr[1] = $categories;

        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //var_dump($_FILES);
        //var_dump($post);

        if ($post['submit']) {
            if (!empty($_FILES['image']['name'])) {
                $errors = array();
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
                $file_tmp_name = uniqid() . '-' . $file_name;

                $expensions = array("jpeg", "jpg", "png");

                if (in_array($file_ext, $expensions) === false) {
                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                }

                if (empty($errors) == true) {
                    move_uploaded_file($file_tmp, "uploads/" . $file_tmp_name);
                    //echo "Success";
                } else {
                    var_dump($errors);
                }
            } else {
                $file_tmp_name = $prod_array['prod_image'];
            }

            // Insert into MySql
            $this->query('UPDATE products SET 
prod_name = :name, prod_description = :description, prod_price = :price, category_id = :category_id, prod_image  = :image
 WHERE product_id = :prod_id');

            $this->bind(':name', $post['name']);
            $this->bind(':description', $post['description']);
            $this->bind(':price', $post['price']);
            $this->bind(':category_id', $post['category']);
            $this->bind(':image', $file_tmp_name);
            $this->bind(':prod_id', $id);

            $this->execute();

            $status = $this->rowCount();
            if ($status) {
                header('location: ' . ROOT_URL . 'products');
                Messages::setMsg("Success", 'successMsg');
            }
        }

        return $return_arr;
    }

    public function getCategories()
    {
        $this->query('SELECT * FROM categories ORDER BY cat_name ASC');
        $cat_rows = $this->resultSet();
        return $cat_rows;
    }
}
