
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
        echo("<pre>");
        print_r($results);
        echo("</pre>");
        ?>

        <form role="form" method='get' action='router2.php'>
            <div class="form-group">
                <input type="hidden" name='action' value='rendezVousNbr'>
                <label for="patient">id : </label> <select class="form-control" id='patient' name='patient' style="width: 300px">
                    <?php
                    foreach ($results as $cle => $valeur) {
                        $infoPatient = implode(' : ', $valeur);
                        echo ("<option>$infoPatient</option>");
                    }
                    ?>
                </select>

            </div>
            <p/>
            <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
        <p/>
    </div>

    <?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

    <!-- ----- fin viewId -->