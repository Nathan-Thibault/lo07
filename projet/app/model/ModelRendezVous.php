
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

    // Méthode permettant de récupérer l'ensemble des informations à propos des patients pour le formulaire
    public static function getAllPatient() {
        try {
            $database = Model::getInstance();
            $query = "SELECT id, nom, prenom from patient";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
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
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    // Récupère l'id du vaccin recu par patient
    public static function getVaccinId($patientId) {
        try {
            $database = Model::getInstance();


            $query = "SELECT vaccin_id FROM rendezvous WHERE patient_id = :patientId LIMIT 1";
            $statement = $database->prepare($query);
            $statement->execute([
                'patientId' => $patientId
            ]);
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    // recupere le nombre d'injection necessaire pour le vaccin du patient
    public static function getNbrInjectionVaccin($vaccinId) {
        try {
            $database = Model::getInstance();


            $query = "SELECT doses FROM vaccin WHERE id = :vaccinId";
            $statement = $database->prepare($query);
            $statement->execute([
                'vaccinId' => $vaccinId
            ]);
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    // recupère l'id des centres qui possèdent des doses pour le vaccin du patient.
    public static function getCentreId($vaccinId) {
        try {
            $database = Model::getInstance();
            $query = "SELECT centre_id FROM stock WHERE vaccin_id = :vaccinId and quantite >0";
            $statement = $database->prepare($query);
            $statement->execute([
                'vaccinId' => $vaccinId
            ]);
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

}
