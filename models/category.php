<?php

/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 7/1/18
 * Time: 4:28 PM
 */

class CategoryModel extends Model
{
    public function index()
    {
        $this->query('SELECT * FROM categories ORDER BY cat_name ASC');
        $rows = $this->resultSet();
        return $rows;
    }

    public function add()
    {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        var_dump($post);
        if ($post['submit']) {
            // Insert into MySql
            $this->query('INSERT INTO categories (cat_name, cat_description)
 VALUES (:name, :description)');

            $this->bind(':name', $post['name']);
            $this->bind(':description', $post['description']);

            $this->execute();

            //Verify
            if ($this->lastInsertId()) {
                header('location: ' . ROOT_URL . 'categories');
                echo "Record added";
            }
        }
    }
}
