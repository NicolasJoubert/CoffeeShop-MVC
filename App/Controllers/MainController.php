<?php

class MainController extends CoreController
{
    public function homepage()
    {
        $this->show("content_home");
    }

    /**
     * affichage de la page produits 
     * affichera également les produits vendant de la DB
     *@return void
     */
    public function productspage()
    {
        // instancie le modèle -> interragit avec la DB
        $productModel = new Product();
        $productFromModel = $productModel->findAll();

        $this->show("content_products", ['products' => $productFromModel]);
    }


    /**
     * affichage du détail du produit numéro 1 
     * affichera également les produits vendant de la DB
     *@return void
     */

    public function detailproduitnumero1($urlParams)

    {
        // je récupere le parametre product id défini dans la page index.php 
        $productId = $urlParams["product_id"];

        // a partir de cet idee je veux récuperer le produit dans la BDD 
        // en faisant depuis mon models SELECT * FROM product WHERE id = $productId
        $productModel = new Product();
        $productFromModel = $productModel->findById($productId);

        $data = [
            'product' => $productFromModel // contient un objet de la class product
        ];
        $this->show("detail_product", $data);
    }
}
