<!-- ----- debut ControllerCentre -->
<?php
require_once '../model/ModelCentre.php';

class ControllerCentre
{
    // --- Liste des vaccins
    public static function centreReadAll()
    {
        $results = ModelCentre::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/centre/viewAll.php';
        if (DEBUG)
            echo("ControllerVaccin : vinReadAll : vue = $vue");
        require($vue);
    }

    // Ajout d'un centre via un formulaire
    public static function centreCreate()
    {
        // ----- Construction chemin de la vue vers un formulaire pour entrer données des vaccins
        include 'config.php';
        $vue = $root . '/app/view/centre/viewInsert.php';
        require($vue);
    }

    public static function centreCreated()
    {
        $results = ModelCentre::insert(
            htmlspecialchars($_GET['label']), htmlspecialchars($_GET['adresse'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/centre/viewInserted.php';
        require($vue);
    }

}

?>
<!-- ----- fin ControllerCentre -->




