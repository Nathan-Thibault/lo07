<!-- ----- debut ControllerRendezVous -->
<?php
require_once '../model/ModelRendezVous.php';
require_once '../model/ModelStock.php';
require_once '../model/ModelVaccin.php';

class ControllerRendezVous
{

    public static function rendezVousReadPatient()
    {
        $results = ModelPatient::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rendezVous/viewPatient.php';
        if (DEBUG)
            echo("ControllerRendezVous : rendezVousReadPatient : vue = $vue");
        require($vue);
    }

    public static function rendezVousGestionDossier()
    {
        $patient = ModelPatient::getOne(htmlspecialchars($_GET['patient_id']));

        // $nbrInjection contient le nombre de dose déjà recu par le patient selectionné
        $nbrInjection = ModelRendezVous::getNbrInjection($patient->getId());

        if ($nbrInjection <= 0) {
            //le patient choisit alors un centre de vaccination parmi la liste des centres
            //disposant d'au moins une dose
            $results = ModelStock::getCentresAvecStock();

            // ----- Construction chemin de la vue
            include 'config.php';
            $vue = $root . '/app/view/rendezVous/viewSelectCentre.php';
            if (DEBUG)
                echo("ControllerRendezVous : rendezVousGestionDossier : vue = $vue");
            require($vue);
        } else {
            // cela veut dire le patient a déjà recu au moins 1 dose d'un vaccin
            // On récupère l'id du vaccin 
            $vaccinId = ModelRendezVous::getVaccinId($patient->getId());

            // On va maintenant récupérer le nombre d'injection nécessaire pour le vaccin en question
            $NbrInjectionNecessaire = ModelVaccin::getOne($vaccinId)->getDoses();

            // On compare le nombre d'injection necessaire au nombre d'injection recu pour savoir si encore besoin d'une injection
            if ($nbrInjection == $NbrInjectionNecessaire) {
                // le patient n'a plus besoin de recevoir de dose
                // Il faut compléter en affichant la liste des vaccins recu


                // SinonSi Le nombre d'injection recu est inférieur au nombre necessaire
            } elseif ($nbrInjection <= $NbrInjectionNecessaire) {
                // On va chercher la liste des id des centres qui ont encore des doses du vaccin du patient
                $centresId = ModelStock::getCentresAvecStockPourVaccin($vaccinId);
                // $centreId est alors un tableau associatif avec comme valeur les id des centres ayant le vaccin.

                // Il faut désormais proposer tous les centres au patient dans un formulaire

            }
        }
    }
}
