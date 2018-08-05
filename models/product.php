<?php

/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 7/1/18
 * Time: 4:28 PM
 */
class ProductModel extends Model
{
    public function Index()
    {
        $this->query('SELECT * FROM products ORDER BY name ASC');
        $rows = $this->resultSet();
        return $rows;
    }

    public function add()
    {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //var_dump($_FILES);
        //var_dump($post);

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
            $this->query('INSERT INTO products (name, description, price, image, category_id) VALUES (:name, :description, :price, :image, :category_id)');

            $this->bind(':name', $post['name']);
            $this->bind(':description', $post['description']);
            $this->bind(':price', $post['price']);
            $this->bind(':image', $file_tmp_name);
            $this->bind(':category_id', $post['category']);

            $this->execute();

            //Verify
            if ($this->lastInsertId()) {
                header('location: ' . ROOT_URL. 'products');
                //echo "Record added";
            }
        }
    }
}