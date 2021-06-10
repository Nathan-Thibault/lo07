<!-- ----- debut ControllerVaccination -->
<?php

class ControllerVaccination {

    // --- page d'acceuil
    public static function vaccinationAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewVaccinationAccueil.php';
        if (DEBUG)
            echo ("ControllerVaccination : vaccinationAccueil : vue = $vue");
        require ($vue);
    }

    public static function documentationInnovation1() {
        include 'config.php';
        $vue = $root . '/public/documentation/innovationSuspensionVaccin.php';
        if (DEBUG)
            echo ("ControllerVaccination : documentationInnovation1 : vue = $vue");
        require ($vue);
    }
    
    public static function documentationInnovation2() {
        include 'config.php';
        $vue = $root . '/public/documentation/innovationTransfertStock.php';
        if (DEBUG)
            echo ("ControllerVaccination : documentationInnovation2 : vue = $vue");
        require ($vue);
    }
    
    public static function documentationInnovation3() {
        include 'config.php';
        $vue = $root . '/public/documentation/innovationChoixVaccin.php';
        if (DEBUG)
            echo ("ControllerVaccination : documentationInnovation3 : vue = $vue");
        require ($vue);
    }

    public static function pointDeVueProjet() {
        include 'config.php';
        $vue = $root . '/public/documentation/pointDeVueProjet.php';
        if (DEBUG)
            echo ("ControllerVaccination : pointDeVueProjet : vue = $vue");
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerVaccination -->
