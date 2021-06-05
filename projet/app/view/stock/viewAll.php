<!-- ----- début viewAll -->
<?php
include($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
?>

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th scope="col">Centre</th>
        <th scope="col">Vaccin</th>
        <th scope="col">Quantite</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // La liste des stocks est dans une variable $results

    foreach ($results as $element) {
        printf("<tr><td>%s</td><td>%s</td><td>%d</td></tr>", $element->getCentre(), $element->getVaccin()->getLabel(), $element->getQuantite());
    }

    ?>
    </tbody>
</table>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewAll -->


