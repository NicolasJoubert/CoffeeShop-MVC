<?php

// point d'entrée de notre projet 

// http://localhost/S05/CoffeShop/CoffeeShop-MVC/public/ => '/' racine du projet affichera l'index du site 

// http://localhost/S05/CoffeShop/CoffeeShop-MVC/public/products => "/products' affichera les produits du site 

require __DIR__ . "/../vendor/autoload.php";
require __DIR__ . "/../App/Controllers/CoreController.php";
require __DIR__ . "/../App/Controllers/MainController.php";


// requie fichier models et utils 
require __DIR__ . "/../App/Models/CoreModel.php";
require __DIR__ . "/../App/Utils/Database.php";
require __DIR__ . "/../App/Models/Product.php";

$router = new AltoRouter();
$router->setBasePath("/S05/CoffeShop/CoffeeShop-MVC/public");

// définir mes urls 
// index
$router->map('GET', '/', ['method' => 'homepage', 'controller' => 'MainController'], 'page_index');
// afficher les produits du site 
$router->map('GET', '/products', ['method' => 'productspage', 'controller' => 'MainController'], 'page_products');
// afficher le détail d'un produit (par ex ici le produit numéro 1)
$router->map('GET', '/product/[i:product_id]', ['method' => 'detailproduitnumero1', 'controller' => 'MainController'], 'detail_product');

// $match va soit contenir un tableau soit un booleen = false 
$match = $router->match();

if ($router->match() !== false) {
    $matchRoute = $match['target'];

    $controller = $matchRoute['controller'];
    $method = $matchRoute['method'];
} else {

    // erreur 404 
    var_dump("Erreur 404 page non trouvée");
    die();
}

//dispatcher 

$controller = new $controller();
$controller->$method($match["params"]);


//*nouvelle méthode 
// $resultRoutes = [
//     '/home' => [
//         'controller' => 'MainController',
//         'method' => 'addition'
//     ],
//     '/contact' => [
//         'controller' => 'PageController',
//         'method' => 'contactAction'
//     ]
    
// ];

// echo "<br>";

// Notre dispatcher
// $method = $resultRoute['method'];
// $controller = new $resultRoute['controller']();       // $controller = new MainController()
// echo $controller->$method(1, 2);                // $controller->addition();


// PLUS SIMPLE ET PLUS MAINTENABLE QUE D'ECRIRE CECI

// if($page === '/home') {
//     $mainController = new MainController();
//     $mainController->addition(1 ,2);
// } else if ($page === '/contact') {
//     $pageController = new PageController();
//     $pageController->contactAction();
// }