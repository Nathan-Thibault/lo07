<!-- ----- début viewUpdate -->

<?php
require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
?>

<form role="form" method='get' action='router2.php'>
    <div class="form-group">
        <input type="hidden" name='action' value='vaccinUpdated'>
        <label for="label">Label du vaccin à mettre à jour : </label> <select class="form-control" id='label' name='label' style="width: 200px">
            <?php
            // L'ensemble des label de vaccin sont dans le tableau $results
            foreach ($results as $cle => $valeur) {
                echo("<option>$valeur</option>");
            }
            ?>
        </select>
        <label for="doses">doses : </label><input class="form-control" style="width: 200px" type="number" name='doses'>
    </div>
    <button class="btn btn-primary" type="submit">Mettre à jour le vaccin</button>
</form>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewUpdate -->



