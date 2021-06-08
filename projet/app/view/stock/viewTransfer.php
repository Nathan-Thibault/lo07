<!-- ----- début viewTransfer -->

<?php
require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
?>

<form role="form" method='get' action='router2.php'>
    <div class="form-group">
        <input type="hidden" name='action' value='stockTransfered'>
        <label for="centre_id_source">Centre source  : </label> <select class="form-control" id='centre_id_source' name='centre_id_source' style="width: 200px">
            <?php
            foreach ($centres as $centre) {
                echo('<option value="'.$centre->getId().'">'.$centre->getLabel().'</option>');
            }
            ?>
        </select>
        <label for="centre_id_dest">Centre destinataire  : </label> <select class="form-control" id='centre_id_dest' name='centre_id_dest' style="width: 200px">
            <?php
            foreach ($centres as $centre) {
                echo('<option value="'.$centre->getId().'">'.$centre->getLabel().'</option>');
            }
            ?>
        </select>
        <div class="checkbox">
            <label><input name="all_stock" type="checkbox" checked="checked">Stock complet</label>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Continuer</button>
</form>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewTransfer -->