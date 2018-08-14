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

require 'vendor/autoload.php';

use MvcBase\Bootstrap;

/*
require 'classes/Messages.php';
require 'classes/Bootstrap.php';
require 'classes/Controller.php';
require 'classes/Model.php';

require 'src/models/home.php';
require 'src/models/category.php';
require 'src/models/product.php';
require 'src/models/user.php';


require 'src/controllers/home.php';
require 'src/controllers/categories.php';
require 'src/controllers/products.php';
require 'src/controllers/users.php';
*/

$bootstrap = new Bootstrap($_GET);

$controller = $bootstrap->createController();

if ($controller) {
    $controller->executeAction();
}