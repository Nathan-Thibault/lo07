


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
            <div class="panel-heading">Documentation Innovation Choix vaccin</div>
            <div class="panel-body">
                <p>En faisant le projet, nous nous sommes rendu compte que les patients n'avait pas la possibilité de choisir le vaccin avec lequel il souhaitait être vaccinés. En effet, dans la gestion des rendez-vous, tout ce fait de manière automatique et le patient ne peut choisir que le centre dans lequel il souhaite être vacciné. Nous avons donc choisi de proposer le choix du vaccin à attribuer à tout patient n'ayant pas encore recu de dose d'aucun vaccin. Via cette innovation, il est possible de choisir un patient parmis ceux qui n'ont pas reçu de dose. Ensuite, il est possible de choisir la vaccin avec lequel le patient sera vacciné. Enfin, un dernier formulaire, permet de choisir un centre. Les centres propposés dans ce formulaire sont uniquement ceux ayant le vaccin choisi en stock.</p>
                <p>Ensuite, l'attribution des rendez ce gère via les même fonctionnalités que la gestion des rendez vous classique. Ensuite évidemment, le dossier de ce patient nouvellement vacciné est également gérable via l'outil gestion de rendez Vous</p>
                <p>Nous avons choisi de mettre en place cette innovation car elle nous semble proche de la réalité du contexte actuel de vaccination en France : il est possible de choisir son vaccin.</p>
            </div>
        </div>


    </div>
    <?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>






