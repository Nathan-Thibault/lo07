


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
            <div class="panel-heading">Documentation innovation Transfert de Stock</div>
            <div class="panel-body">
                <p>L'innovation de Transfert de stock permet à l'utilisateur de faire transiter des stocks de vaccin d'un centre à 1 autre, l'utilisateur choisi dans un premier temps le centre donneur et le centre receveur. Il peut choisir de transférer directement l'intégralité des stocks de tout les vaccins du centre donneur vers le centre receveur. L'utilisateur peut également choisir de ne transférer qu'une partie du stock de centre donneur, il peut en effet choisir le nombre de dose à transférer pour chaque vaccin.</p> 
                <p>Il nous a semblé intéressant de mettre en place cette innovation car comme nous l'avons vu au cours depuis le début de l'épidémie, certaines zones géographiques ont été plus touché que d'autres sur l'ensemble du territoire francais. Ainsi il nous a semblé important de rajouter la possibillité de transférer des stocks de vaccin entre différents centres, pour répondre au mieux aux besoins géographiques de vaccination.</p>
            </div>
        </div>


    </div>
    <?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>






