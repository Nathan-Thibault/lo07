<!-- ----- début viewInsert -->
<?php
require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
?>

<form role="form" method='get' action='router2.php'>
    <div class="form-group">
        <input type="hidden" name='action' value='vaccinCreated'>
        <label for="label">Label : </label><input type="text" name='label' size='75' value='Masque' class="form-control" style="width: 200px">
        <label for="doses">doses : </label><input type="number" name='doses' value='3' class="form-control" style="width: 200px">
    </div>
    <button class="btn btn-primary" type="submit">Ajouter le vaccin</button>
</form>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>
<!-- ----- fin viewInsert -->



