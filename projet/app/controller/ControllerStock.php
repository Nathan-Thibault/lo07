<!-- ----- debut ControllerStock -->
<?php
require_once '../model/ModelStock.php';

class ControllerStock
{
    // --- Liste des stocks
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
}

?>
<!-- ----- fin ControllerStock -->
