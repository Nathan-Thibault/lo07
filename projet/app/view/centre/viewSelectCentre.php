<!-- ----- début viewSelectCentre -->
<?php
require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
?>

<form role="form" method='get' action='router2.php'>
    <div class="form-group">
        <input type="hidden" name='action' value='rendezVousPrendre'>
        <input type="hidden" name="patient_id" value="<?php echo $patient_id?>">
        <input type="hidden" name="vaccin_id" value="<?php echo $vaccin_id?>">
        <input type="hidden" name="injection" value="0">
        <label for="centre">Choisir un centre : </label> <select class="form-control" id='centre' name='centre_id' style="width: 500px">
            <?php
            //$results contient la liste des centres avec du stock
            foreach ($results as $centre) {
                echo('<option value="'.$centre->getId().'">'.$centre->getLabel().' : '.$centre->getAdresse().'</option>');
            }
            ?>
        </select>
    </div>
    <button class="btn btn-primary" type="submit">Valider</button>
</form>

<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewSelectCentre -->