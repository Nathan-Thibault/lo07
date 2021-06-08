<!-- ----- debut ModelCentre -->

<?php
require_once 'Model.php';

class ModelCentre
{

    private $id, $label, $adresse;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $label = NULL, $adresse = NULL)
    {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->adresse = $adresse;
        }
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setLabel($label)
    {
        $this->label = $label;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public static function getAll()
    {
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

    public static function getOne($id)
    {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare("select * from centre where id = :id");
            $statement->execute([
                'id' => $id
            ]);
            $array = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCentre");
            return array_pop($array);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($label, $adresse)
    {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from centre";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into centre value (:id, :label, :adresse)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'label' => $label,
                'adresse' => $adresse,
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function getLabelWithId($id)
    {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare("select * from centre where id = :id");
            $statement->execute([
                'id' => $id
            ]);
            $array = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCentre");
            return array_pop($array)->getLabel();
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}
