<!-- ----- debut ControllerRendezVous -->
<?php
require_once '../model/ModelRendezVous.php';
require_once '../model/ModelStock.php';
require_once '../model/ModelVaccin.php';

class ControllerRendezVous {

    //questionnaire pour sélectionner un patient parmi un liste de patients
    public static function rendezVousReadPatient($args) {
        $target = $args['target'];
        switch($target){
            case 'vaccinReadId' :
                $results = ModelPatient::getPasVaccine();
                $next_target = 'centreReadCentre';
                break;
            case 'rendezVousGestionDossier' :
            default :
                $results = ModelPatient::getAll();
                break;
        }
        if (DEBUG)
            echo 'ControllerRendezVous:vaccinReadId : target =' . $target . '<br/>';
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rendezVous/viewPatient.php';
        if (DEBUG)
            echo("ControllerRendezVous : rendezVousReadPatient : vue = $vue");
        require($vue);
    }

    public static function rendezVousGestionDossier() {
        $patient_id = htmlspecialchars($_GET['patient_id']);

        // $nbrInjection contient le nombre de dose déjà recu par le patient selectionné
        $nbrInjection = ModelRendezVous::getNbrInjection($patient_id);

        if ($nbrInjection <= 0) {
            //choisir un centre de vaccination parmi la liste des centres disposant d'au moins une dose
            $results = ModelStock::getCentresAvecStock();
            $titre = "Le patient n'a jamais reçu de dose";

            //formulaire pour sélectionner un centre
            include 'config.php';
            $vue = $root . '/app/view/rendezVous/viewSelectCentre.php';
            if (DEBUG)
                echo("ControllerRendezVous : rendezVousGestionDossier : vue = $vue");
            require($vue);
        } else {
            // cela veut dire le patient a déjà recu au moins 1 dose d'un vaccin
            // On récupère l'id du vaccin 
            $vaccin_id = ModelRendezVous::getVaccinUtilise($patient_id);

            // On va maintenant récupérer le nombre d'injection nécessaire pour le vaccin en question
            $NbrInjectionNecessaire = ModelVaccin::getOne($vaccin_id)->getDoses();
            if ($nbrInjection < $NbrInjectionNecessaire) {
                // On va chercher la liste des id des centres qui ont encore des doses du vaccin du patient
                $results = ModelStock::getCentresAvecStockPourVaccin($vaccin_id);
                $results = array_map(function ($centre_id) {
                    return ModelCentre::getOne($centre_id);
                }, $results);
                $titre = "Le patient doit recevoir une dose suplémentaire";

                //formulaire pour sélectionner un centre
                include 'config.php';
                $vue = $root . '/app/view/rendezVous/viewSelectCentre.php';
                if (DEBUG)
                    echo("ControllerRendezVous : rendezVousGestionDossier : vue = $vue");
                require($vue);
            } else {
                // le patient n'a plus besoin de recevoir de dose on affiche son dossier
                self::rendezVousVoirDossier($patient_id, "Le patient est vacciné, voici son dossier");
            }
        }
    }

    public static function rendezVousPrendrePremier($args) {
        //récupère l'id du patient depuis les arguments
        $patient_id = $args['patient_id'];
        $centre_id = $args['centre_id'];

        $stocks = ModelStock::getStockDuCentre($centre_id);
        //transforme la liste des stock pour avoir une liste de nombre de doses par id de vaccin
        $keys = array_map(function ($stock) {
            return $stock->getVaccinId();
        }, $stocks);
        $values = array_map(function ($stock) {
            return $stock->getQuantite();
        }, $stocks);
        $stocks = array_combine($keys, $values);

        //sélectionne un id de vaccin aléatoirement parmis la liste des id de vaccins avec le stock le plus grand
        $array_max = array_keys($stocks, max($stocks));
        $vaccin_id = $array_max[array_rand($array_max, 1)];

        //mise à jour du stock
        ModelStock::prendreDose($centre_id, $vaccin_id);
        //création du rdv
        ModelRendezVous::setRendezVous($centre_id, $patient_id, 1, $vaccin_id);
        self::rendezVousVoirDossier($patient_id, "Le rendez-vous a été créé");
    }

    public static function rendezVousPrendre($args) {
        //récupère l'id du patient depuis les arguments
        $patient_id = $args['patient_id'];
        $centre_id = $args['centre_id'];
        $injection = $args['injection'] + 1;
        $vaccin_id = $args['vaccin_id'];

        //mise à jour du stock
        ModelStock::prendreDose($centre_id, $vaccin_id);
        //création du rdv
        ModelRendezVous::setRendezVous($centre_id, $patient_id, $injection, $vaccin_id);
        self::rendezVousVoirDossier($patient_id, "Le rendez-vous a été créé");
    }

    public static function rendezVousVoirDossier($patient_id, $titre) {
        $results = ModelRendezVous::getAllForPatient($patient_id);
        $replace_info = function ($rdv) {
            $patient = ModelPatient::getOne($rdv->getPatientId());
            $centre = ModelCentre::getOne($rdv->getCentreId());
            $vaccin = ModelVaccin::getOne($rdv->getVaccinId());
            switch ($rdv->getInjection()) {
                case 1 :
                    $injection = 'première';
                    break;
                case 2 :
                    $injection = 'seconde';
                    break;
                default :
                    $injection = $rdv->getInjection();
            }
            return [
        'patient' => $patient->getPrenom() . " " . $patient->getNom(),
        'centre' => $centre->getLabel() . " : " . $centre->getAdresse(),
        'vaccin' => $vaccin->getLabel(),
        'injection' => $injection
            ];
        };
        $results = array_map($replace_info, $results);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rendezVous/viewDossier.php';
        if (DEBUG)
            echo("ControllerRendezVous : rendezVousVoirDossier : vue = $vue");
        require($vue);
    }

}
