
<!-- ----- debut ModelCentre -->

<?php
require_once 'Model.php';

class ModelCentre {

    private $id, $label, $adresse;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $label = NULL, $adresse = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->adresse = $adresse;
        }
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLabel($label) {
        $this->label = $label;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function getId() {
        return $this->id;
    }

    function getLabel() {
        return $this->label;
    }

    function getAdresse() {
        return $this->adresse;
    }

    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "select * from centre";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCentre");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

}
