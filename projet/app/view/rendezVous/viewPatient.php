<!-- ----- début viewPatient -->
<?php
require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
?>

<form role="form" method='get' action='router2.php'>
    <div class="form-group">
        <input type="hidden" name='action' value='rendezVousGestionDossier'>
        <label for="patient">Choisir un patient : </label> <select class="form-control" id='patient' name='patient_id' style="width: 300px">
            <?php
            foreach ($results as $patient) {
                //$results contient la liste des patients
                echo('<option value="'.$patient->getId().'">'.$patient->getPrenom().' '.$patient->getNom().'</option>');
            }
            ?>
        </select>
    </div>
    <button class="btn btn-primary" type="submit">Voir dossier</button>
</form>

<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewPatient -->