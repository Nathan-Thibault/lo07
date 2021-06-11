


<?php
require ($root . '/app/view/fragment/fragmentVaccinationHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
        include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
        ?>

        <div class="panel panel-primary">
            <div class="panel-heading">Documentation point de vue sur le projet</div>
            <div class="panel-body">
                <p>Selon nous, ce projet permet de mobiliser une grande partie des notions abordées lors des devoir de LO07 de ce semestre. Seul la gestion des cookies et des sessions, n'ont pas été abordés lors de ce projet. Cela montre bien que ce projet permet de mobiliser l'ensemble des compétences acquises au cours du semestre</p>
                <p>Une des difficultés du projet était que contrairement au devoir, nous n'étions pas guidé.</p>
                <p>De plus, la compréhension du fonctionnement de la logique de la base de donnée fut très importante pour faire ce projet.</p>
      
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Proposition d'amélioration, d'évolution du site</div>
            <div class="panel-body">
                <p>Nous pensons qu'il serait intéressant d'implémenter la notion de temporalité dans le cadre d'une évolution de ce site. En effet, cela permettrait de créer un calendrier de vaccination, avec pour chaque vaccin la possibilité de gérer la durée entre 2 injections
                </p>
                <p>Nous aurions aimez avoir l'opportunité d'ajouter des attributs à la base de donnée pour nos innovations. Par exemple, pouvoir séparer les adresses des centres et des patients en plusieurs attributs afin d'avoir un attribut pour le code postal et un attribut pour la ville. Cela aurait pu permettre d'attribuer à un patient le centre le plus proche de chez lui.</p>
            </div>
        </div>


    </div>
    <?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>






