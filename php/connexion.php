<?php
    session_start();
?>

<!doctype php>
<php lang="fr">

    <head>
        <meta charset="utf-8">
        <title>Marchand De La Faille</title>
        <link rel="stylesheet" href="../css/connexion.css">
        <link rel="stylesheet" href="../css/navbar.css">
        <link rel="icon" type="image/png" href="../img/cursor.png">
        <!--script src="script.js"></script-->
    </head>

    <body>

        <?php include('common/header.php'); ?>

        <?php               
            if ($_SESSION["connexion"] == 1 && $_POST["return"] !=1 ) {
                header('Location: panier.php');
            } else if ($_POST["return"] = 1) {
                session_destroy();
            }
        ?>

        <div class="contentwrapper">

            <div class="connexion">
                <div class="contenttitle">
                    <p>Connexion</p>
                </div>
                <div class="content">
                    <form method="POST" action="verif-connexion.php">
                        <div class="item">
                            <div class="texte">
                                <p>Identifiant: </p>
                            </div>
                            <input type="text" name="id" required>
                        </div>
                        <div class="item">
                            <div class="texte">
                                <p>Mot de passe: </p>
                            </div>
                            <input type="password" name="password" required>
                        </div>
                        <div class="submitbutton">
                                <input type="submit" name="submit" value="S'inscrire">  
                        </div>
                    </form>

                </div>

            </div>

            <?php
                if ($_SESSION["connexion"] == -1) {
                    $_SESSION["connexion"] = 0;
                    echo '<style>.connexion .content { color : #A93226 }</style>';
                }
            ?>

            <div class="inscription">
                <div class="contenttitle">
                    <p>Inscription</p>
                </div>
                <div class="content">
                    <form method="POST" action="inscription.php">

                        <div class="item">
                            <div class="texte">
                                <p>Identifiant: </p>
                            </div>
                            <input type="text" name="id" required>
                        </div>
                        <div class="item">
                            <div class="texte">
                                <p>Email : </p>
                            </div>
                            <input type="email" name="email" required>
                        </div>
                        <div class="item">
                            <div class="texte">
                                <p>Mot de passe: </p>
                            </div>
                            <input type="password" name="password" required>
                        </div>
                        <div class="submitbutton">
                            <input type="submit" name="submit" value="S'inscrire">  
                        </div>
                    </form>

                </div> 
                
                <?php
                    if ($_SESSION["connexion"] == -2) {
                        $_SESSION["connexion"] = 0;
                        echo '<style>.inscription .content { color : #A93226 }</style>';
                    }
                ?>

            </div>
        </div>

        <?php include('common/footer.php'); ?>

    </body>
</php>