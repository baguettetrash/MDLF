<?php
    session_start();
?>

<!doctype php>
<php lang="fr">

    <head>
        <meta charset="utf-8">
        <title>Marchand De La Faille</title>
        <link rel="stylesheet" href="../css/panier.css">
        <link rel="stylesheet" href="../css/navbar.css">
        <link rel="icon" type="image/png" href="../img/cursor.png">
        <!--script src="script.js"></script-->
    </head>

    <body>
        <?php include('common/header.php'); ?>

        <div class="accueil">

            <?php
                if ($_SESSION["connexion"] == 1) {
                    echo "Connexion réussie : " . $_SESSION["id"];
                } else {
                    header('location : connexion.php');
                }
            ?>

            <br><br>
            <form method="POST" action="connexion.php">		
                <input name="return" type="hidden" value="1">															
                <input type="submit" value="Se déconnecter"/>
            </form>

        </div>
        
        <?php include('common/footer.php'); ?>
    </body>
</php>