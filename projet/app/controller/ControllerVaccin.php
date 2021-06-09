<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelVaccin.php';

class ControllerVaccin
{
    // --- Liste des vaccins
    public static function vaccinReadAll()
    {
        $results = ModelVaccin::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewAll.php';
        if (DEBUG)
            echo("ControllerVaccin : vaccinReadAll : vue = $vue");
        require($vue);
    }

    // Ajout d'un vaccin via un formulaire
    public static function vaccinCreate()
    {
        // ----- Construction chemin de la vue vers un formulaire pour entrer données des vaccins
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewInsert.php';
        require($vue);
    }

    // Affiche un formulaire pour sélectionner un id qui existe
    public static function vaccinReadId($args) {
        $results = ModelVaccin::getAll();
        if(array_key_exists('patient_id', $_GET)) {
            $patient_id = htmlspecialchars($_GET['patient_id']);
        }
        $target = $args['target'];
        if(array_key_exists('reactivate', $_GET)){
            $results = array_filter($results,function($vaccin){
                return $vaccin->getDoses() == 0;
            });
        }else{
            $results = array_filter($results,function($vaccin){
                return $vaccin->getDoses() > 0;
            });
        }
        if (DEBUG) echo 'ControllerVaccin:vaccinReadId : target ='.$target.'<br/>';

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewId.php';
        require ($vue);
    }

    public static function vaccinCreated()
    {
        $results = ModelVaccin::insert(
            htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewInserted.php';
        require($vue);
    }

    public static function vaccinUpdated()
    {
        // On va aller update le vaccin dans le ModelVaccin
        $results = ModelVaccin::update(
            htmlspecialchars($_GET['vaccin_id']), htmlspecialchars($_GET['doses'])
        );

        // ----- Construction chemin de la vue vers un formulaire pour mettre à jour le vaccin
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewUpdated.php';
        require($vue);

    }

    //bloque l'ajout de stock de ce vaccin et supprime les stocks actuels si option sélectionné
    public static function vaccinRemove()
    {
        //on identifie les vaccins retirer par en nombre de doses nul
        ModelVaccin::update($_GET['vaccin_id'], 0);
        if(array_key_exists('remove_stock', $_GET)){
            ModelStock::removeVaccin($_GET['vaccin_id']);
        }
        self::vaccinReadAll();
    }
}

?>
<!-- ----- fin ControllerVaccin -->


