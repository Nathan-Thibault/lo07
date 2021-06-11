


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
            <div class="panel-heading">Documentation innovation Suspension de vaccin</div>
            <div class="panel-body">
                <p>Cette innovation a pour but de permettre à l'utilisateur de suspendre un vaccin, il peut également lever cette suspension.
                    Cela nous semblait intéréssant à mettre en place dans un but de fidélité avec la situation de vaccination dans le monde. En effet, certains vaccins ont déjà été réellement suspendus : AstraZeneca en France Janssen aux Etats Unis.
                </p>   
                <p>Si l'utilisateur souhaite désactivé un vaccin, il peut choisir, ou non, de vider l'ensemble des stocks liés à ce vaccin.</p>
                <p>Si jamais un vaccin est désactiver, alors le nombre de dose qu'il nécessite devient égale à 0, ce qui permet de l'identifier comme étant un vaccin désactivé.</p>
                <p>Cette innovation permet également à l'utilisateur de réactiver un vaccin désactivé. En le réactivant, l'utilisateur doit choisir combien de dose le vaccin nécessite désormais.</p>
                <p>Comme pour les autres innovations, nous avons essayé d'utiliser au maximum l'ensemble des fonctionnalités déjà mis en place dans la partie commune du projet. Pour cela, nous avons utilisé le principe de target dans l'attribut href du lien de la barre de navigation pour diriger les formulaires vers les méthodes adaptées.</p>
            </div>
            
        </div>


    </div>
    <?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>






