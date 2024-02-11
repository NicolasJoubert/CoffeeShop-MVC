<?php

// point d'entrée de notre projet 

// http://localhost/S05/CoffeShop/CoffeeShop-MVC/public/ => '/' racine du projet affichera l'index du site 

// http://localhost/S05/CoffeShop/CoffeeShop-MVC/public/products => "/products' affichera les produits du site 

require __DIR__ . "/../vendor/autoload.php";

$router = new AltoRouter();
$router->setBasePath("/S05/CoffeShop/CoffeeShop-MVC/public");

// définir mes urls 
// index
$router->map('GET', '/', ['method' => 'homepage', 'controller' => 'MainController'], 'page_index');
// afficher les produits du site 
$router->map('GET', '/products', ['method' => 'productspage', 'controller' => 'MainController'], 'page_products');

// $match va soit contenir un tableau soit un booleen = false 
$match = $router->match();

var_dump($match);


if ($router->match() !== false) {
    $matchRoute = $match['target'];
    var_dump($matchRoute);

    $controller = $matchRoute['controller'];
    $method = $matchRoute['homepage'];
} else {
}

//dispatcher 

$controller = new $controller();
$controller->$method();
