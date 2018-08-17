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

    public function delete($id)
    {
        $this->query('DELETE FROM categories WHERE category_id = :cat_id');
        $this->bind(':cat_id', $id);
        $this->execute();
    }

    public function update($id)
    {
        //Get product details of id
        $this->query('SELECT * FROM categories WHERE category_id = :category_id');
        $this->bind(':category_id', $id);
        $prod_array = $this->single();

        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //var_dump($post);
        if ($post['submit']) {
            // Insert into MySql
            $this->query('UPDATE categories SET 
cat_name = :name, cat_description = :description WHERE category_id = :category_id');

            $this->bind(':name', $post['name']);
            $this->bind(':description', $post['description']);
            $this->bind(':category_id', $id);

            $this->execute();
        }
        return $prod_array;
    }
}
