<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 6/18/18
 * Time: 5:09 PM
 */

// Start Session
session_start();

require 'config.php';

require 'classes/Messages.php';
require 'classes/Bootstrap.php';
require 'classes/Controller.php';
require 'classes/Model.php';

require 'models/home.php';
require 'models/category.php';
require 'models/product.php';

require 'controllers/home.php';
require 'controllers/categories.php';
require 'controllers/products.php';

//require 'vendor/autoload.php';
//
//use MvcBase\Messages;
//use MvcBase\Bootstrap;
//use MvcBase\Controller;
//use MvcBase\Model;


$bootstrap = new Bootstrap($_GET);

$controller = $bootstrap->createController();

if($controller){
    $controller->executeAction();
}