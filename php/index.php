<?php
    session_start();
?>

<!doctype php>
<php lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Marchand De La Faille</title>
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../css/navbar.css">
        <link rel="icon" type="image/png" href="../img/cursor.png"> 
        <!--script src="script.js"></script-->
    </head>
    <body>

        <?php include('common/header.php'); ?>

        <div class="contentwrapper">
            <img class="background_display" src="../img/visual.jpg" alt="background">
            <div class="contenttitle">
                <p>Bienvenue dans la Faille de l'Invocateur.</p>
            </div>
            <div class="content">
                <p> Ce site a été conçu en s'inspirant du jeu vidéo nommé League of Legends et du contenu que propose le jeu. 
                    <br><br>
                    League of Legends est un jeu d'équipe sorti en 2009, développé par Riot Games qui appartient à la catégorie des MOBAs - Multiplayer Online Battle Arena. C'est-à-dire que le principe du jeu consiste à du combat en multijoueur dans une arène en ligne.
                    <br><br>
                    Les joueurs, connu sous le titre d'invocateur, incarne des personnages appelés champions dans une arène intitulée la Faille de l'Invocateur. La Faille est composée de 3 voies, d'une base pour chaqu'une des deux équipes et d'un espace neutre dit la jungle. Le but du jeu est de détruire le gigantesque crystal situé dans la base adverse, appelée le Nexus. Des vagues de sbirs se déplacent sur les voies permettant de siéger le camp opposé. Les voies et les bases possèdent des tourrelles qui ralentissent les sièges adverses. La jungle, en revanche, est peuplé de monstres. 
                    <br><br>
                    Une partie de jeu dure en moyenne 30 minutes, où durant ce temps, les joueurs essaient d'amasser de l'or et de l'expérience en tuant des sbirs, des monstres ou des champions adverses. En gagnant suffisament d'expérience, les joueurs peuvent améliorer les sorts de leurs champions, augmentant leurs dégats ou diminuant leurs temps de recharge. Chaque champions possèdent une abilité passive, trois abilités normales et un abilité ultime. En gagnant de l'or, les joueurs peuvent acheter des items dans leur base pour augmenter les statistiques de leurs champions tel que les dégâts physiques, les dégâts magiques ou bien la resistance aux dégâts.
                    Chaque équipe est composée de cinq joueurs qui sont assignés des rôles particuliers : un 'toplaner', un 'jungler', un 'midlaner', un 'ADC' et un support.
                    <br><br>
                    Pour plus d'information, rendez-vous sur le site officiel de League of Legends.
                </p>
                <input type="button" class="return_button" onclick="location.href='https://www.leagueoflegends.com';" value="Site officiel"/>
            </div>
        </div>

        <?php include('common/footer.php'); ?>
        
    </body>
</php>