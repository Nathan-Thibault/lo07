<!-- ----- debut Router -->
<?php
require('../controller/ControllerVaccin.php');
require('../controller/ControllerCentre.php');
require('../controller/ControllerPatient.php');
require('../controller/ControllerVaccination.php');
require('../controller/ControllerStock.php');
require('../controller/ControllerRendezVous.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// Ici, $param devient alors table de hachage avec comme dans l'exemple 
// --- $action contient le nom de la méthode statique recherchée 
$action = htmlspecialchars($param["action"]);

// Modification du routeur pour prendre en compte l'ensemble des parametres
$action = $param['action'];

// --- On supprime l'élément action de la structure
unset($param['action']);

// --- Tout ce qui reste sont des arguments 
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
    case "vaccinReadAll" :
    case "vaccinCreate" :
    case "vaccinCreated" :
    case "vaccinReadId" :
    case "vaccinUpdated" :
    case "vaccinRemove" :
        ControllerVaccin::$action($args);
        break;

    case "centreReadAll" :
    case "centreCreate" :
    case "centreCreated" :
    case "centreReadCentre" :

        ControllerCentre::$action($args);
        break;

    case "patientReadAll" :
    case "patientCreate" :
    case "patientCreated" :
        ControllerPatient::$action($args);
        break;

    case "stockReadAll" :
    case "stockGetCount" :
    case "stockAdd" :
    case "stockUpdate" :
    case "stockTransfer" :
    case "stockTransfered" :
    case "stockPartiallyTransfered" :
        ControllerStock::$action($args);
        break;

    case "rendezVousReadPatient" :
    case "rendezVousGestionDossier" :
    case "rendezVousPrendre" :
    case "rendezVousPrendrePremier" :
        ControllerRendezVous::$action($args);
        break;

    case "vaccinationAccueil" :
    case "documentationInnovation1" :
    case "documentationInnovation2" :
    case "documentationInnovation3" :
    case "pointDeVueProjet" :

        ControllerVaccination::$action();
        break;

    // Appel par défaut
    default:
        $action = "vaccinationAccueil";
        ControllerVaccination::$action();
}
?>
<!-- ----- Fin Router -->


