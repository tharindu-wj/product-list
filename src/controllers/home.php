<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 6/19/18
 * Time: 4:54 PM
 */

namespace App\Contollers;

use MvcBase\Controller;

class Home extends Controller
{
    protected function index()
    {
        $viewmodel = new HomeModel();
        $this->returnView($viewmodel->Index(), true);
    }
}