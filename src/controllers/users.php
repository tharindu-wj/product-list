<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 8/12/18
 * Time: 11:09 AM
 */

namespace App\Contollers;

use MvcBase\Controller;

class users extends Controller
{
    protected function register()
    {
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->register(), true);
    }

    protected function login()
    {
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->login(), true);
    }

    protected function logout()
    {
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_data']);
        session_destroy();

        header('Location: ' . ROOT_URL);
    }
}