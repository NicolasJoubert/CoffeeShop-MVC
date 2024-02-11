<?php

class MainController
{
    public function homepage()
    {
        $this->show("content_home");
    }

    /**
     * affichage de la page produits 
     * affichera également les produits vendant de la DB
     *
     */
    public function productspage()
    {
        // instancie le modèle -> interragit avec la DB
        $productModel = new Product();
        $productFromModel = $productModel->findAll();

        $this->show("content_products", ['products' => $productFromModel]);
    }

    private function show($viewPage, $viewData = [])
    {
        require __DIR__ . "/../Views/parts/header.tpl.php";
        require __DIR__ . "/../Views/$viewPage.tpl.php";
        require __DIR__ . '/../Views/parts/footer.tpl.php';
    }
}
