
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

    // Ajout d'un vaccin via un formulaire
    public static function vaccinCreate() {
        // ----- Construction chemin de la vue vers un formulaire pour entrer données des vaccins
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewInsert.php';
        require ($vue);
    }

    public static function vaccinCreated() {
        $results = ModelVaccin::insert(
                        htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewInserted.php';
        require ($vue);
    }
    
    public static function vaccinUpdate() {
        // On va chercher la liste des vaccins 
        $results = ModelVaccin::getAllLabel();
        
        
        // ----- Construction chemin de la vue vers un formulaire pour mettre à jour le vaccin
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewUpdate.php';
        require ($vue);
    }
    
    public static function vaccinUpdated() {
        // On va aller update le vaccin dans le ModelVaccin
        $results = ModelVaccin::update(
                        htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses'])
        );
        
                // ----- Construction chemin de la vue vers un formulaire pour mettre à jour le vaccin
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewUpdated.php';
        require ($vue);
        
    }

}
?>
<!-- ----- fin ControllerVaccin -->


