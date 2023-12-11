<?php

$router = $di->getRouter();


// Define your routes here
$router->add('teste', [
    'controller' => 'teste',
    'action' => 'index'
]);


    $router->addGet("/products/list", array(
        'controller' => 'Product',
        'action' => 'list'
    ));

    /*
      GET product by ID
    */
    $router->addGet("/product/find/([0-9]+)", array(
        'controller' => 'Product',
        'id'         => 1,
        'action' => 'find'
    ));

    // Create a rate for a specific product
    $router->add('/product/create', array(
        'controller' => 'Product',
        'id'         => 1,
        'action'     => 'create'
    ));

    // Update a product
    $router->addPut("/product/update/([0-9]+)", array(
        'controller' => 'Product',
        'id'         => 1,
        'action' => 'update'
    ));
	
	
	 // Delete a product
    $router->addDelete("/product/remove/([0-9]+)", array(
        'controller' => 'Product',
        'id'         => 1,
        'action' => 'remove'
    ));



$router->add("/api/users/:params", array(
	'module' 		=> 'api',
	'controller' 	=> 'crud',
	'action' 		=> 'index',
	'params'		=> 1
));

$router->handle($_SERVER['REQUEST_URI']);

 