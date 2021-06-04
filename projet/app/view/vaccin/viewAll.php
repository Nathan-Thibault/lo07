
<!-- ----- début viewAll -->
<?php
require ($root . '/app/view/fragment/fragmentVaccinationHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
        include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
        ?>

        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">id</th>
                    <th scope = "col">label</th>
                    <th scope = "col">doses</th>

                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des vaccins est dans une variable $results 
                
                foreach ($results as $element) {
                    printf("<tr><td>%d</td><td>%s</td><td>%d</td></tr>", $element->getId(),
                            $element->getLabel(), $element->getDoses());
                }

                ?>
            </tbody>
        </table>
    </div>
    <?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

    <!-- ----- fin viewAll -->


