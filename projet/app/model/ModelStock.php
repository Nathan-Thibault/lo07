<!-- ----- debut ModelStock -->
<?php
require_once 'Model.php';

class ModelStock
{
    private $centre_id, $vaccin_id, $quantite;

    public function __construct($centre_id = NULL, $vaccin_id = NULL, $quantite = NULL)
    {
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

    public function getCentre()
    {
        return ModelCentre::getLabelWithId($this->getCentreId());
    }

    public function getVaccin()
    {
        return ModelVaccin::getOne($this->getVaccinId());
    }

    public static function getAll()
    {
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

    //retourne la liste des centres avec leur total de doses disponibles
    public static function getCount()
    {
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

    //retourne la liste des vaccins en stock pour un centre donné
    public static function getStockDuCentre($centre_id)
    {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare("select * from stock where centre_id = ?");
            $statement->execute([$centre_id]);
            return $statement->fetchAll(PDO::FETCH_CLASS, "ModelStock");
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    //pour tous les vaccins, ajoute une quantité de doses au stock existant d'un centre donné
    //ou créer le stock s'il n'existe pas encore
    public static function updateCentreStock($centre_id, $quantites)
    {
        try {
            $database = Model::getInstance();
            foreach ($quantites as $vaccin_id => $quantite) {
                $statement = $database->prepare("select count(quantite) from stock where (vaccin_id = :vid and centre_id = :cid)");
                $statement->execute([
                    "cid" => $centre_id,
                    "vid" => $vaccin_id
                ]);
                $array= $statement->fetchAll(PDO::FETCH_COLUMN, 0);
                if(array_pop($array)>0){
                    $statement = $database->prepare("update stock set quantite = quantite + :q where (centre_id = :cid and vaccin_id = :vid)");
                    $statement->execute([
                        "q" => $quantite,
                        "cid" => $centre_id,
                        "vid" => $vaccin_id
                    ]);
                }else {
                    $statement = $database->prepare("insert into stock values (:cid, :vid, :q)");
                    $statement->execute([
                        "q" => $quantite,
                        "cid" => $centre_id,
                        "vid" => $vaccin_id
                    ]);
                }
            }
            return true;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return false;
        }
    }

    //enlève une dose d'un vaccin donné au stock d'un centre donnée
    public static function prendreDose($centre_id, $vaccin_id)
    {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare("update stock set quantite = quantite - 1 where centre_id = :c and vaccin_id = :v");
            return $statement->execute([
                "c" => $centre_id,
                "v" => $vaccin_id
            ]);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return false;
        }
    }

    // recupère l'id des centres qui possèdent des doses pour un vaccin donné
    public static function getCentresAvecStockPourVaccin($vaccinId)
    {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare("select centre_id from stock where vaccin_id = ? and quantite > 0");
            $statement->execute([$vaccinId]);
            return $statement->fetchAll(PDO::FETCH_COLUMN, 0);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    // recupère l'id des centres qui possèdent au moins une dose
    public static function getCentresAvecStock()
    {
        $stocks = self::getCount();

        //on enlève les centres où le stock est vide de la liste
        $stocks = array_filter($stocks, function ($stock) {
            return $stock['sum'] > 0;
        });

        //on transforme la liste pour qu'elle contienne les centres
        $replacebyCentreLabel = function ($stock) {
            return ModelCentre::getOne($stock['centre_id']);
        };
        $stocks = array_map($replacebyCentreLabel, $stocks);

        return array_values($stocks);
    }

    //supprime tous les stocks d'un vaccin
    public static function removeVaccin($vaccin_id)
    {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare("delete from stock where vaccin_id = ?");
            return $statement->execute([$vaccin_id]);;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
}

?>
<!-- ----- fin ModelStock -->
