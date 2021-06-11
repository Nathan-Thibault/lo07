<!-- ----- début viewInsert -->
<?php
require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
?>

<form role="form" method='get' action='router2.php'>
    <div class="form-group">
        <input type="hidden" name='action' value='centreCreated'>
        <label for="label">Label : </label><input type="text" name='label' size='75' value='Élysée' class="form-control" style="width: 200px">
        <label for="adresse">adresse : </label><input type="text" name='adresse' value='55 Rue du Faubourg Saint-Honoré, 75008 Paris' class="form-control" style="width: 200px">
    </div>
    <button class="btn btn-primary" type="submit">Ajouter le centre</button>
</form>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>
<!-- ----- fin viewInsert -->



