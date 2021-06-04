
<!-- ----- debut ModelVaccin -->

<?php
require_once 'Model.php';

class ModelVin {

    private $id, $cru, $annee, $degre;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $label = NULL, $doses = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->doses = $doses;
        }
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLabel($label) {
        $this->label = $label;
    }

    function setDoses($doses) {
        $this->doses = $doses;
    }


    function getId() {
        return $this->id;
    }

    function getLabel() {
        return $this->label;
    }

    function getDoses() {
        return $this->doses;
    }


}
?>
<!-- ----- fin ModelVaccin -->
