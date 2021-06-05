<!-- ----- debut Router -->
<?php
require ('../controller/ControllerVaccin.php');


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
    case "vaccinUpdate" :
    case "vaccinUpdated" :


        // --- Passage des arguments au contrôleur
        ControllerVaccin::$action($args);
        break;


    // Appel par défaut
    default:
        $action = "vaccinationAccueil";
        ControllerVaccin::$action();
}
?>
<!-- ----- Fin Router -->

