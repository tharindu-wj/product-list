<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 6/19/18
 * Time: 4:54 PM
 */


class Products extends Controller
{
    protected function index()
    {
        $viewmodel = new ProductModel();
        $this->returnView($viewmodel->Index(), true);
    }

    public function add()
    {
        $viewmodel = new ProductModel();
        $this->returnView($viewmodel->add(), true);
    }

    public function delete()
    {
        //var_dump($_GET);
        $prod_id = $_GET['id'];

        $viewmodel = new ProductModel();
        $viewmodel->delete($prod_id);
    }

    public function update()
    {
        //var_dump($_GET);
        $prod_id = $_GET['id'];

        $viewmodel = new ProductModel();
        $this->returnView($viewmodel->update($prod_id), true);
    }
}
