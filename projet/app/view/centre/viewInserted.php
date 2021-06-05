<!-- ----- début viewInserted -->
<?php
require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
?>
<!-- ===================================================== -->
<?php
if ($results) {
    echo("<h3>Le nouveau centre a été ajouté </h3>");
    echo("<ul>");
    echo("<li>id = " . $results . "</li>");
    echo("<li>cru = " . $_GET['label'] . "</li>");
    echo("<li>annee = " . $_GET['adresse'] . "</li>");
    echo("</ul>");
} else {
    echo("<h3>Problème d'insertion du centre</h3>");
    echo("id = " . $_GET['label']);
}

include $root . '/app/view/fragment/fragmentVaccinationFooter.html';
?>
<!-- ----- fin viewInserted -->

    
    