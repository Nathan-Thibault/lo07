<!-- ----- début viewDossier -->
<?php
require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';

echo '<h3>'.$titre.'</h3>';
?>

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th scope="col">Centre</th>
        <th scope="col">Patient</th>
        <th scope="col">Injection</th>
        <th scope="col">Vaccin</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // La liste des stocks est dans une variable $results

    foreach ($results as $element) {
        printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element['centre'], $element['patient'], $element['injection'], $element['vaccin']);
    }
    ?>
    </tbody>
</table>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>
<!-- ----- fin viewDossier -->


