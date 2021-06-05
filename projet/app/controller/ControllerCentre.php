
<!-- ----- debut ControllerCentre -->
<?php
require_once '../model/ModelCentre.php';

class ControllerCentre {

    // --- page d'acceuil
    public static function vaccinationAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewVaccinationAccueil.php';
        if (DEBUG)
            echo ("ControllerVaccin : vaccinationAccueil : vue = $vue");
        require ($vue);
    }

    // --- Liste des vaccins
    public static function centreReadAll() {
        $results = ModelCentre::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/centre/viewAll.php';
        if (DEBUG)
            echo ("ControllerVaccin : vinReadAll : vue = $vue");
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerCentre -->




