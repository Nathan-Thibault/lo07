<!-- ----- début viewPatient -->
<?php
require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';

// $results contient un tableau avec la liste des clés.

echo("<pre>");
print_r($results);
echo("</pre>");
?>

<form role="form" method='get' action='router2.php'>
    <div class="form-group">
        <input type="hidden" name='action' value='rendezVousNbr'>
        <label for="patient">Patient : </label> <select class="form-control" id='patient' name='patient_id' style="width: 300px">
            <?php
            foreach ($results as $patient) {
                echo('<option value="'.$patient->getId().'">'.$patient->getPrenom().' '.$patient->getNom().'</option>');
            }
            ?>
        </select>
    </div>
    <button class="btn btn-primary" type="submit">Submit form</button>
</form>

<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewId -->