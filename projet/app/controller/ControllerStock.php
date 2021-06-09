<!-- ----- debut ControllerStock -->
<?php
require_once '../model/ModelStock.php';

class ControllerStock
{
    // --- Liste des doses de chaque vacin dans chaque centre
    public static function stockReadAll()
    {
        $results = ModelStock::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewAll.php';
        if (DEBUG)
            echo("ControllerStock : stockReadAll : vue = $vue");
        require($vue);
    }

    // --- Liste des centres avec leur total de doses
    public static function stockGetCount()
    {
        $results = ModelStock::getCount();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewCount.php';
        if (DEBUG)
            echo("ControllerStock : stockGetCount : vue = $vue");
        require($vue);
    }

    public static function stockAdd()
    {
        $centres = ModelCentre::getAll();
        $vaccins = ModelVaccin::getAll();
        //enlève les vaccins qui ne sont plus en service (identifié par nombre de doses nul)
        $vaccins = array_filter($vaccins, function ($vaccin) {
            return $vaccin->getDoses() > 0;
        });
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewAdd.php';
        if (DEBUG)
            echo("ControllerStock : stockAdd : vue = $vue");
        require($vue);
    }

    public static function stockUpdate()
    {
        $quantites = array();
        foreach (ModelVaccin::getAll() as $vaccin) {
            if(array_key_exists($vaccin->getId(), $_GET)) {
                $quantites[$vaccin->getId()] = $_GET[$vaccin->getId()];
            }
        }
        $results = ModelStock::updateCentreStock($_GET['centre_id'], $quantites);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewAdded.php';
        if (DEBUG)
            echo("ControllerStock : stockAdded : vue = $vue");
        require($vue);
    }

    public static function stockTransfer()
    {
        $centres = ModelCentre::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewTransfer.php';
        if (DEBUG)
            echo("ControllerStock : stockTransfer : vue = $vue");
        require($vue);
    }

    public static function stockTransfered()
    {
        $centre_id_source = $_GET['centre_id_source'];
        $centre_id_dest = $_GET['centre_id_dest'];
        if (array_key_exists('all_stock', $_GET)) {
            //récupère le stock du centre source
            $quantites = array();
            foreach(ModelStock::getStockDuCentre($centre_id_source) as $stock){
                $quantites[$stock->getVaccinId()] = $stock->getQuantite();
            }
            //ajoute le stock du centre source au centre destinataire
            ModelStock::updateCentreStock($centre_id_dest, $quantites);
            //remplace toutes les quantités de la liste par leur opposé (-quantite)
            $quantites = array_map(function ($quantite) {
                return -$quantite;
            }, $quantites);
            //vide le stock du centre source
            ModelStock::updateCentreStock($centre_id_source, $quantites);
            self::stockReadAll();
        } else {
            $results = array();
            $stocks = ModelStock::getStockDuCentre($centre_id_source);
            foreach ($stocks as $stock){
                $vaccin = ModelVaccin::getOne($stock->getVaccinId());
                if($stock->getQuantite()>0) {
                    $results[$vaccin->getId()] = ['label' => $vaccin->getLabel(), 'quantite' => $stock->getQuantite()];
                }
            }
            //formulaire pour choisir le stock à transférer
            include 'config.php';
            $vue = $root . '/app/view/stock/viewSelect.php';
            if (DEBUG)
                echo("ControllerStock : stockTransfered : vue = $vue");
            require($vue);
        }
    }

    public static function stockPartiallyTransfered()
    {
        //récupère le stock à transféré depuis le formulaire
        $quantites = array();
        foreach (ModelVaccin::getAll() as $vaccin) {
            if(array_key_exists($vaccin->getId(), $_GET)) {
                $quantites[$vaccin->getId()] = $_GET[$vaccin->getId()];
            }
        }
        //ajoute le stock transféré au centre destinataire
        ModelStock::updateCentreStock($_GET['centre_id_dest'], $quantites);
        //remplace toutes les quantités de la liste par leur opposé (-quantite)
        $quantites = array_map(function ($quantite) {
            return -$quantite;
        }, $quantites);
        //enlève le stock transféré au centre source
        ModelStock::updateCentreStock($_GET['centre_id_source'], $quantites);
        self::stockReadAll();
    }
}

?>
<!-- ----- fin ControllerStock -->
