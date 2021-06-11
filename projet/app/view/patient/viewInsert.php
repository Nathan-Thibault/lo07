<!-- ----- début viewInsert -->
<?php
require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
?>

<form role="form" method='get' action='router2.php'>
    <div class="form-group">
        <input type="hidden" name='action' value='patientCreated'>
        <label for="label">Nom :</label><input type="text" name='nom' size='75' value='Castex' class="form-control" style="width: 200px">
        <label for="label">Prenom : </label><input type="text" name='prenom' size='75' value='Jean' class="form-control" style="width: 200px">
        <label for="label">Adresse : </label><input type="text" name='adresse' size='75' value='Marseille' class="form-control" style="width: 200px">
    </div>
    <button class="btn btn-primary" type="submit">Ajouter le patient</button>
</form>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>
<!-- ----- fin viewInsert -->



