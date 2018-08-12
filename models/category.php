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
}