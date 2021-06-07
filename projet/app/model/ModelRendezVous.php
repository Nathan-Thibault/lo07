
<!-- ----- debut ModelRendezVous -->

<?php
require_once 'Model.php';

class ModelRendezVous {

    private $centre_id, $patient_id, $injection, $vaccin_id;

    // pas possible d'avoir 2 constructeurs
    public function __construct($centre_id = NULL, $patient_id = NULL, $injection = NULL, $vaccin_id = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($centre_id)) {
            $this->centre_id = $centre_id;
            $this->patient_id = $patient_id;
            $this->injection = $injection;
            $this->$vaccin_id = $vaccin_id;
        }
    }

    function setCentre_id($centre_id) {
        $this->centre_id = $centre_id;
    }

    function setPatient_id($patient_id) {
        $this->patient_id = $patient_id;
    }

    function setInjection($injection) {
        $this->injection = $injection;
    }

    function setVaccin_id($vaccin_id) {
        $this->vaccin_id = $vaccin_id;
    }

    function getCentre_id() {
        return $this->centre_id;
    }

    function getPatient_id() {
        return $this->patient_id;
    }

    function getInjection() {
        return $this->injection;
    }

    function getVaccin_id() {
        return $this->vaccin_id;
    }

    // récupère le nombre d'injection recu par le patient
    public static function getNbrInjection($patientId) {
        try {
            $database = Model::getInstance();


            $query = "SELECT max(injection) FROM rendezvous WHERE patient_id = :patientId";
            $statement = $database->prepare($query);
            $statement->execute([
                'patientId' => $patientId
            ]);
            $array = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return array_pop($array);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    // Récupère l'id du vaccin recu pour un patient
    public static function getVaccinId($patientId) {
        try {
            $database = Model::getInstance();


            $query = "SELECT vaccin_id FROM rendezvous WHERE patient_id = :patientId LIMIT 1";
            $statement = $database->prepare($query);
            $statement->execute([
                'patientId' => $patientId
            ]);
            $array = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return array_pop($array);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
}
