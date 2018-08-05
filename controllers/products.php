<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 6/19/18
 * Time: 4:54 PM
 */


class Products extends Controller{
    protected function Index(){
        $viewmodel = new ProductModel();
        $this->returnView($viewmodel->Index(), true);
    }

    public function add(){
        $viewmodel = new ProductModel();
        $this->returnView($viewmodel->add(), true);
    }
}