<?php

class MainController
{
    public function homepage()
    {
        $this->show("content_home");
    }

    public function productspage()
    {
        $this->show("content_products");
    }

    private function show($viewPage, $viewData = [])
    {
        require __DIR__ . "/../Views/parts/header.tpl.php";
        require __DIR__ . "/../Views/$viewPage.tpl.php";
        require __DIR__ . '/../Views/parts/footer.tpl.php';
    }
}
