
<!-- ----- debut ControllerPatient -->
<?php
require_once '../model/ModelPatient.php';

class ControllerPatient {

    // --- page d'acceuil
    public static function vaccinationAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewVaccinationAccueil.php';
        if (DEBUG)
            echo ("ControllerVaccin : vaccinationAccueil : vue = $vue");
        require ($vue);
    }

    // --- Liste des patients
    public static function patientReadAll() {
        $results = ModelPatient::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewAll.php';
        if (DEBUG)
            echo ("ControllerVaccin : vinReadAll : vue = $vue");
        require ($vue);
    }

}
