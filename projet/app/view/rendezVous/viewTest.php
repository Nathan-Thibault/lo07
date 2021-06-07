<!-- ----- début viewPatient -->
<?php
require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';

echo($vaccinId."<br/>");
echo($patient->getId());

echo("<pre>");
print_r($centresId);
echo("</pre>");

include $root . '/app/view/fragment/fragmentVaccinationFooter.html';
?>
<!-- ----- fin viewId -->