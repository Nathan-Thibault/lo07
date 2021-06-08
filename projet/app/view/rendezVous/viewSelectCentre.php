<!-- ----- début viewPatient -->
<?php
require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
?>

<form role="form" method='get' action='router2.php'>
    <h3>Le patient n'a reçu aucune dose de vaccin</h3>
    <p>Choisir un centre ci-dessous pour avoir un rendez-vous.</p>
    <div class="form-group">
        <input type="hidden" name='action' value='rendezVousGestionDossier'>
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

<!-- ----- fin viewId -->