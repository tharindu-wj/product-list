<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 6/19/18
 * Time: 4:54 PM
 */


class Categories extends Controller{
    protected function Index(){
        $viewmodel = new CategoryModel();
        $this->returnView($viewmodel->Index(), true);
    }
}