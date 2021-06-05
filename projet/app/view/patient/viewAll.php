<!-- ----- début viewAll -->
<?php
require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
?>

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">nom</th>
        <th scope="col">prenom</th>
        <th scope="col">adresse</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // La liste des vaccins est dans une variable $results
    foreach ($results as $element) {
        printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getId(),
            $element->getNom(), $element->getPrenom(), $element->getAdresse());
    }
    ?>
    </tbody>
</table>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>
<!-- ----- fin viewAll -->


