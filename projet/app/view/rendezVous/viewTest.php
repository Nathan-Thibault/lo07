
<!-- ----- début viewPatient -->
<?php
require ($root . '/app/view/fragment/fragmentVaccinationHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
        include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';

        // $results contient un tableau avec la liste des clés.
        ?>

        <?php
        echo($vaccinId);
        echo($patientId);

        echo("<pre>");
        print_r($centresId);
        echo("</pre>");
        
        
        
        ?>

        
        <p/>
    </div>

    <?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

    <!-- ----- fin viewId -->