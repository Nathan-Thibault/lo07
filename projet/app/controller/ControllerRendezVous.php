<!-- ----- debut ControllerRendezVous -->
<?php
require_once '../model/ModelRendezVous.php';

class ControllerRendezVous {

    public static function rendezVousReadPatient() {
        $results = ModelRendezVous::getAllPatient();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rendezVous/viewPatient.php';
        if (DEBUG)
            echo("ControllerVaccin : vaccinReadAll : vue = $vue");
        require($vue);
    }

    public static function rendezVousNbr() {
        $tabPatient = explode(" : ", htmlspecialchars($_GET['patient']));
        $patientId = $tabPatient[0];
        // $patientId contient l'id du patient selectionner par le formulaire


    }

}
