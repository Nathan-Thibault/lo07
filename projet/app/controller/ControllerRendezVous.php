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
        
        // $results est une colonne avec le nombre d'injection dans la premierre ligne du tableau (indice 0)
        $results = ModelRendezVous::getNbrInjection($patientId);
         // $nbrInjection contient le nombre de dose déjà recu par le patient selectionné
        $nbrInjection = $results[0];
        
        if ($nbrInjection == 0) {
            
            // Compléter cette partie 
            
        } else {
            // cela veut dire le patient a déjà recu au moins 1 dose d'un vaccin
            // On récupère l'id du vaccin 
            $vaccinId = ModelRendezVous::getVaccinId($patientId);
            $vaccinId = $vaccinId[0];
            
            // On va maintenant récupérer le nombre d'injection nécessaire pour le vaccin en question
            $NbrInjectionNecessaire = ModelRendezVous::getNbrInjectionVaccin($vaccinId);
            $NbrInjectionNecessaire = $NbrInjectionNecessaire[0];
            
            // On compare le nombre d'injection necessaire au nombre d'injection recu pour savoir si encore besoin d'une injection
            if ($nbrInjection == $NbrInjectionNecessaire) {
                // le patient n'a plus besoin de recevoir de dose
                // Il faut compléter en affichant la liste des vaccins recu
             
                
                
            // SinonSi Le nombre d'injection recu est inférieur au nombre necessaire    
            } elseif ($nbrInjection <= $NbrInjectionNecessaire) {
                // On va chercher la liste des id des centres qui ont encore des doses du vaccin du patient
                $centresId = ModelRendezVous::getCentreId($vaccinId);
                // $centreId est alors un tableau associatif avec comme valeur les id des centres ayant le vaccin.
                
                // Il faut désormais proposer tous les centres au patient dans un formulaire
               
                
            }
            
        }
        
        
                // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rendezVous/viewTest.php';
        if (DEBUG)
            echo("ControllerVaccin : vaccinReadAll : vue = $vue");
        require($vue);


    }

}
