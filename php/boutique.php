<?php
    session_start();
?>

<!doctype php>
<php lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Marchand De La Faille</title>
        <link rel="stylesheet" href="../css/boutique.css">
        <link rel="stylesheet" href="../css/navbar.css">
        <link rel="icon" type="image/png" href="../img/cursor.png"> 
        <!--script src="../js/boutique.js"></script-->
    </head>
    <body>
        <?php include('common/header.php'); ?>
        <div class="bodywrapper">
            <?php include('common/sidemenu.php'); ?>
            <div class="contentwrapper">
                <div class="contenttitle">
                    <p>Boutique</p>
                </div>
                <div class="content">
                    <p> Bienvenue au marché de la Faille. Nous sommes des marchands situé dans la base des équipes aux extremités de la Faille de l'Invocateur.
                        <br><br>
                        Notre marché vous proposes une variété d'artéfacts collectés à travers l'univers de Runeterra par nos meilleurs archaélogues.
                        Ces items possèdent des effets multiples sur les porteurs dont, en particulier, une augmentation d'un type de dégâts ou bien une resistance aux dégâts.
                        Vous pouvez y jeter un oeil dans le menu verticale.
                        <br><br><br>
                        Rappelez-vous... vos compétences vous font gagner la lane, nos items vous font gagner la game.
                    </p>
                    <img style="margin-top: 40px;" src="../img/shopkeeper.jpg" width="80%" height="auto">
                </div>
            </div>
        </div>
    </body>
</php>