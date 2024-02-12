<?php
// Classe parente des controllers
// du coup on va faire hériter de la class main controller de la clase controller 
class CoreController
{
    protected function show($viewPage, $viewData = [])
    {

        // ici je récupere le sous chemin du localhost 
        $urlAbsolute = $_SERVER["BASE_URI"];

        require __DIR__ . "/../Views/parts/header.tpl.php";
        require __DIR__ . "/../Views/$viewPage.tpl.php";
        require __DIR__ . '/../Views/parts/footer.tpl.php';
    }
}
