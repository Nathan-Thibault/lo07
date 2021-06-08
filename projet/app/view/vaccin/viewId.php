<!-- ----- début viewId -->

<?php
require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
?>

<form role="form" method='get' action='router2.php'>
    <div class="form-group">
        <input type="hidden" name='action' value='<?php echo $target;?>'>
        <input type="hidden" name="vaccin_id" value='<?php echo($vaccin_id);?>'>
        <input type="hidden" name="centre_id" value='<?php echo($centre_id);?>'>
        <input type="hidden" name="patient_id" value='<?php echo($patient_id);?>'>
        <input type="hidden" name="injection" value='0'>
        <label for="label">Vaccin : </label> <select class="form-control" id='label' name='vaccin_id' style="width: 200px">
            <?php
            // L'ensemble des label de vaccin sont dans le tableau $results
            foreach ($results as $vaccin) {
                echo("<option value='".$vaccin->getId()."'>".$vaccin->getLabel()."</option>");
            }
            ?>
        </select>
        <?php
        switch ($target){
            case 'vaccinUpdated' :
                echo '<label for="doses">doses : </label><input id="doses" class="form-control" style="width: 200px" type="number" name="doses">';
                break;
            case 'vaccinRemove' :
                echo '<div class="checkbox"><label><input name="remove_stock" type="checkbox" checked="">Supprimer les stocks</label></div>';
                break;
            default :
        }
        ?>
        <button class="btn btn-primary" type="submit">Sélectionner le vaccin</button>
    </div>
</form>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewId -->


