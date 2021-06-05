<!-- ----- debut ModelStock -->
<?php
require_once 'Model.php';

class ModelStock
{
    private $centre_id, $vaccin_id, $quantite;

    public function __construct($centre_id = NULL, $vaccin_id = NULL, $quantite = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($centre_id)) {
            $this->centre_id = $centre_id;
            $this->vaccin_id = $vaccin_id;
            $this->quantite = $quantite;
        }
    }

    public function getCentreId()
    {
        return $this->centre_id;
    }

    public function setCentreId($centre_id)
    {
        $this->centre_id = $centre_id;
    }

    public function getVaccinId()
    {
        return $this->vaccin_id;
    }

    public function setVaccinId($vaccin_id)
    {
        $this->vaccin_id = $vaccin_id;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }

    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    public function  getCentre()
    {
        return ModelCentre::getLabelWithId($this->getCentreId());
    }

    public function  getVaccin()
    {
        $vaccin_array = ModelVaccin::getOne($this->getVaccinId());
        return array_pop($vaccin_array);
    }

    public static function getAll() {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare("select * from stock");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS, "ModelStock");
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getCount() {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare("select centre_id, sum(quantite) as sum from stock group by centre_id order by sum desc");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function updateCentreStock($centre_id, $quantites) {
        try {
            $database = Model::getInstance();
            foreach ($quantites as $vaccin_id => $quantite){
                $statement = $database->prepare("update stock set quantite = quantite + :q where centre_id = :cid and vaccin_id = :vid");
                $statement->execute([
                    "q" => $quantite,
                    "cid" => $centre_id,
                    "vid" => $vaccin_id
                ]);
            }
            return true;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return false;
        }
    }
}

?>
<!-- ----- fin ModelStock -->
