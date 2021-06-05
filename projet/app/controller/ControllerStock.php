<!-- ----- debut ControllerStock -->
<?php
require_once '../model/ModelStock.php';

class ControllerStock
{
    // --- Liste des doses de chaque vacin dans chaque centre
    public static function stockReadAll()
    {
        $results = ModelStock::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewAll.php';
        if (DEBUG)
            echo("ControllerStock : stockReadAll : vue = $vue");
        require($vue);
    }

    // --- Liste des centres avec leur total de doses
    public static function stockGetCount()
    {
        $results = ModelStock::getCount();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewCount.php';
        if (DEBUG)
            echo("ControllerStock : stockReadAll : vue = $vue");
        require($vue);
    }
}

?>
<!-- ----- fin ControllerStock -->
