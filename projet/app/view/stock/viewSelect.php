<!-- ----- début viewAdd -->

<?php
require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
?>

<form role="form" method='get' action='router2.php'>
    <div class="form-group">
        <input type="hidden" name='action' value='stockPartiallyTransfered'>
        <input type="hidden" name='centre_id_source' value='<?php echo $centre_id_source?>'>
        <input type="hidden" name='centre_id_dest' value='<?php echo $centre_id_dest?>'>
        <table class="table table-striped table-bordered">
            <caption>Stocks du centre source</caption>
            <tr>
                <th scope="col">Vaccin</th>
                <th scope="col">Nombre de doses</th>
            </tr>
            <?php
            foreach ($stocks as $stock) {
                echo '<tr><td>' . ModelVaccin::getOne($stock->getVaccinId())->getLabel() . '</td><td>' . $stock->getQuantite() . '</td></tr>';
            }
            ?>
        </table>
        <br/>
        <?php
        foreach ($results as $vaccin_id => $array) {
            echo('<label for="' . $vaccin_id . '">' . $array['label'] . ' : </label><input class="form-control" style="width: 200px" type="number" max="' . $array['quantite'] . '" id="' . $vaccin_id . '" name="' . $vaccin_id . '">');
        }
        ?>
    </div>
    <button class="btn btn-primary" type="submit">Transférer le stock</button>
</form>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewAdd -->