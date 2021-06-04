
<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelVaccin.php';

class ControllerVaccin {

    // --- page d'acceuil
    public static function vaccinationAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewVaccinationAccueil.php';
        if (DEBUG)
            echo ("ControllerVaccin : vaccinationAccueil : vue = $vue");
        require ($vue);
    }
    
        // --- Liste des vins
    public static function vaccinReadAll() {
        $results = ModelVaccin::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewAll.php';
        if (DEBUG)
            echo ("ControllerVaccin : vinReadAll : vue = $vue");
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerVaccin -->


