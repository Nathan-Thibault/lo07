
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

}
?>
<!-- ----- fin ControllerVaccin -->


