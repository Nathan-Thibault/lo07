<!-- ----- début viewAdded -->
<?php
require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
?>
<!-- ===================================================== -->
<?php
if ($results) {
    echo("<h3>Le stock a été attribué</h3>");
} else {
    echo("<h3>Problème d'attribution du stock'</h3>");
}

include $root . '/app/view/fragment/fragmentVaccinationFooter.html';
?>
<!-- ----- fin viewAdded -->

    
    