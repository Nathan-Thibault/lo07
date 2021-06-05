<!-- ----- début viewUpdated -->
<?php
require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
?>
<!-- ===================================================== -->
<?php
if ($results) {
    echo("<h3>L'attribut dose du vaccin a été mis à jour</h3>");
    echo("<ul>");
    echo("<li>label = " . $results . "</li>");
    echo("<li>doses = " . $_GET['doses'] . "</li>");
    echo("</ul>");
} else {
    echo("<h3>Problème de mise à jour du Vaccin</h3>");
}

include $root . '/app/view/fragment/fragmentVaccinationFooter.html';
?>
<!-- ----- fin viewUpdated -->

    
    