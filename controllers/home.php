<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 6/19/18
 * Time: 4:54 PM
 */


class Home extends Controller{
    protected function Index(){
        $viewmodel = new HomeModel();
        $this->returnView($viewmodel->Index(), true);
    }
}