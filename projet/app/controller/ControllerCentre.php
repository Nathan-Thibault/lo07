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
            echo("ControllerVaccin : centreReadAll : vue = $vue");
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
    
    public static function centreReadCentre() 
    {
        $patient_id = htmlspecialchars($_GET['patient_id']);
        $vaccin_id = htmlspecialchars($_GET['vaccin_id']);
        // On va chercher la liste des id des centres qui ont encore des doses du vaccin du patient
        $results = ModelStock::getCentresAvecStockPourVaccin($vaccin_id);
        // On récupère les centres à partir de leur id
        $results = array_map(function ($centre_id) {
            return ModelCentre::getOne($centre_id);
        }, $results);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/centre/viewSelectCentre.php';
        if (DEBUG)
            echo("ControllerCentre : centreReadAll : vue = $vue");
        require($vue);
        
    }

}

?>
<!-- ----- fin ControllerCentre -->




