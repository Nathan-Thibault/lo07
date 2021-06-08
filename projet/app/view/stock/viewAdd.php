<!-- ----- début viewAdd -->

<?php
require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
?>

<form role="form" method='get' action='router2.php'>
    <div class="form-group">
        <input type="hidden" name='action' value='stockUpdate'>
        <label for="centre_id">Centre auquel attribuer : </label>
        <select class="form-control" id="centre_id" name="centre_id" style="width: 200px">
            <?php
            foreach ($centres as $centre) {
                echo('<option value="' . $centre->getId() . '">' . $centre->getLabel() . '</option>');
            }
            ?>
        </select>
        <?php
        foreach ($vaccins as $vaccin) {
            echo('<label for="' . $vaccin->getId() . '">' . $vaccin->getLabel() . ' : </label><input class="form-control" style="width: 200px" type="number" id="' . $vaccin->getId() . '" name="' . $vaccin->getId() . '">');
        }
        ?>
    </div>
    <button class="btn btn-primary" type="submit">Attribuer le stock</button>
</form>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewAdd -->