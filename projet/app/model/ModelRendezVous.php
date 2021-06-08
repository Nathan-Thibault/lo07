<!-- ----- debut ModelRendezVous -->

<?php
require_once 'Model.php';

class ModelRendezVous
{

    private $centre_id, $patient_id, $injection, $vaccin_id;

    // pas possible d'avoir 2 constructeurs
    public function __construct($centre_id = NULL, $patient_id = NULL, $injection = NULL, $vaccin_id = NULL)
    {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($centre_id)) {
            $this->centre_id = $centre_id;
            $this->patient_id = $patient_id;
            $this->injection = $injection;
            $this->$vaccin_id = $vaccin_id;
        }
    }

    function setCentreId($centre_id)
    {
        $this->centre_id = $centre_id;
    }

    function setPatientId($patient_id)
    {
        $this->patient_id = $patient_id;
    }

    function setInjection($injection)
    {
        $this->injection = $injection;
    }

    function setVaccinId($vaccin_id)
    {
        $this->vaccin_id = $vaccin_id;
    }

    function getCentreId()
    {
        return $this->centre_id;
    }

    function getPatientId()
    {
        return $this->patient_id;
    }

    function getInjection()
    {
        return $this->injection;
    }

    function getVaccinId()
    {
        return $this->vaccin_id;
    }

    // Récupère tout les rdv d'un patient
    public static function getAllForPatient($patientId)
    {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare("select * from rendezvous where patient_id = ?");
            $statement->execute([$patientId]);
            return $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezVous");
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    // récupère le nombre d'injection recu par le patient
    public static function getNbrInjection($patientId)
    {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare("select count(*) from rendezvous where patient_id = :patientId");
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
    public static function getVaccinUtilise($patientId)
    {
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

    //insertion du rendez vous dans la base
    public static function setRendezVous($centre_id, $patient_id, $injection, $vaccin_id)
    {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare("insert into rendezvous values (:c, :p, :i, :v)");
            return $statement->execute([
                'c' => $centre_id,
                'p' => $patient_id,
                'i' => $injection,
                'v' => $vaccin_id
            ]);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
}
