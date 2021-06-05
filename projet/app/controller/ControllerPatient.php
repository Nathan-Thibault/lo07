<!-- ----- debut ControllerPatient -->
<?php
require_once '../model/ModelPatient.php';

class ControllerPatient
{
    // --- Liste des patients
    public static function patientReadAll()
    {
        $results = ModelPatient::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewAll.php';
        if (DEBUG)
            echo("ControllerVaccin : vinReadAll : vue = $vue");
        require($vue);
    }

    // Ajout d'un patient via un formulaire
    public static function patientCreate()
    {
        // ----- Construction chemin de la vue vers un formulaire pour entrer données des vaccins
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInsert.php';
        require($vue);
    }

    public static function patientCreated()
    {
        $results = ModelPatient::insert(
            htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['adresse'])
        );
        // ---- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInserted.php';
        require($vue);
    }
}
