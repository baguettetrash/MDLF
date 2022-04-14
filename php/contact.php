<?php
    /*Ouverture de session*/
    session_start();

    /*Validation du formulaire*/
    //Variables définient en tant que chaînes de caractères
    $informationError = array(
        1 => "",
        2 => "",
        3 => "",
        4 => "",
        5 => "",
        6 => "",
        7 => "",
        8 => "",
        9 => "",
    );
    $information = array(
        1 => "",
        2 => "",
        3 => "",
        4 => "",
        5 => "",
        6 => "",
        7 => "",
        8 => "",
        9 => "",
    );

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["dob"])) {
            $informationError[1] = "<p class='error_msg'>Veuillez insérer votre date de naissance</p>";
        } else {
            $information[1] = verifInsertion($_POST["dob"]);
        }

        if (empty($_POST["civil"])) {
            $informationError[2] = "<p class='error_msg'>Veuillez préciser votre civilité</p>";
        } else {
            $information[2] = verifInsertion($_POST["civil"]);
        }

        if (empty($_POST["nom"])) {
            $informationError[3] = "<p class='error_msg'>Veuillez préciser votre nom</p>";
        } else {
            $information[3] = verifInsertion($_POST["nom"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$information[3])) {
                $informationError[3] = "<p class='error_msg'>Veuillez utilisez que des lettres et espaces</p>";
            }
        }

        if (empty($_POST["prenom"])) {
            $informationError[4] = "<p class='error_msg'>Veuillez préciser votre prenom</p>";
        } else {
            $information[4] = verifInsertion($_POST["prenom"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$information[4])) {
                $informationError[4] = "<p class='error_msg'>Veuillez utilisez que des lettres et espaces</p>";
            }
        }

        if (empty($_POST["email"])) {
            $informationError[5] = "<p class='error_msg'>Veuillez préciser votre mail</p>";
        } else {
            $information[5] = verifInsertion($_POST["email"]);
            if (!filter_var($information[5], FILTER_VALIDATE_EMAIL)) {
                $informationError[5] = "<p class='error_msg'>Le format d'un mail: pseudo@mail.domain</p>";
            }
        }

        if (empty($_POST["date"])) {
            $informationError[6] = "<p class='error_msg'>Veuillez insérer la date d'envoi</p>";
        } else {
            $information[6] = verifInsertion($_POST["date"]);
        }

        if (empty($_POST["fonction"])) {
            $informationError[7] = "<p class='error_msg'>Veuillez préciser votre fonction</p>";
        } else {
            $information[7] = verifInsertion($_POST["fonction"]);
        }

        if (empty($_POST["sujet"])) {
            $informationError[8] = "<p class='error_msg'>Veuillez insérer un objet au courriel</p>";
        } else {
            $information[8] = verifInsertion($_POST["sujet"]);
        }

        if (empty($_POST["contenu"])) {
            $informationError[9] = "<p class='error_msg'>Veuillez détailler ce que vous avez à dire</p>";
        } else {
            $information[9] = verifInsertion($_POST["contenu"]);
        }
    }



    function verifInsertion($donnee) {
        $donnee = trim($donnee);
        $donnee = stripslashes($donnee);
        $donnee = htmlspecialchars($donnee);
        return $donnee;
    }
?>


<!doctype php>
<php lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Marchand De La Faille</title>
        <link rel="stylesheet" href="../css/contact.css">
        <link rel="stylesheet" href="../css/navbar.css">
        <link rel="icon" type="image/png" href="../img/cursor.png"> 
        <script src="../js/contact.js"></script>
    </head>
    <body>
        <?php include('common/header.php'); ?>
        <div class="contentwrapper">
            <div class="contenttitle">
                <p>Contact</p>
            </div>
            <div class="content">
                <p> Si vous souhaitez nous contacter pour toutes formes de requêtes, merci de remplir le formulaire suivant :</p>
                
                <!--<form method="POST" action="receptioncontact.php?page=3">-->
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="information">
                        <div class="leftinfo">
                            <div class="item">
                                <div class="texte">
                                    <p>Date de naissance: </p>
                                </div>
                                <div><?php echo $informationError[1]?></div>
                                <div>
                                    <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($_POST["dob"] ?? "", ENT_QUOTES); ?>">
                                </div>
                            </div>
                            <div class="item">
                                <div id="text">
                                    <p>Civilité :</p>
                                </div>
                                <div><?php echo $informationError[2]?></div>
                                <div class="label">
                                    <div>
                                        <input class="checkbox" type="radio" id="m" name="civil" value="m"/><p>Monsieur</p>
                                    </div>
                                    <div>
                                        <input class="checkbox" type="radio" id="mme" name="civil" value="mme"/><p>Madame</p>
                                    </div>
                                    <div>
                                        <input class="checkbox" type="radio" id="mlle" name="civil" value="mlle"/><p>Mademoiselle</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="texte">
                                    <p>Nom :</p>
                                </div>
                                <div><?php echo $informationError[3]?></div>
                                <div>
                                    <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($_POST["nom"] ?? "", ENT_QUOTES); ?>">
                                </div>
                            </div>
                            <div class="item">
                                <div class="texte">
                                    <p>Prénom :</p>
                                </div>
                                <div><?php echo $informationError[4]?></div>
                                <div>
                                    <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($_POST["prenom"] ?? "", ENT_QUOTES); ?>">
                                </div>
                            </div>
                            <div class="item">
                                <div class="texte">
                                    <p>Courriel : </p>
                                </div>
                                <div><?php echo $informationError[5]?></div>
                                <div>
                                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST["email"] ?? "", ENT_QUOTES); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="rightinfo">
                            <div class="item">
                                <div id="text">Date :</div>
                                <div><?php echo $informationError[6]?></div>
                                <div>
                                    <input class="input" type="date" id="date" name="date" value="<?php echo htmlspecialchars($_POST["date"] ?? "", ENT_QUOTES); ?>">
                                </div>
                            </div>
                            <div class="item">
                                <div class="texte">
                                    <p>Fonction :</p>
                                </div>
                                <div><?php echo $informationError[7]?></div>
                                <div>
                                    <select id="fonction" name="fonction" size="1">
                                        <option disabled selected value> -- fonction -- </option>
                                        <option value="Invocateur"<?php echo (isset($_POST["fonction"]) && $_POST["fonction"] === "Invocateur") ? "selected" : ""; ?>>Invocateur</option>
                                        <option value="Champion" <?php echo (isset($_POST["fonction"]) && $_POST["fonction"] === "Champion") ? "selected" : ""; ?>>Champion</option>
                                        <option value="Monstre"<?php echo (isset($_POST["fonction"]) && $_POST["fonction"] === "Monstre") ? "selected" : ""; ?>>Monstre</option>
                                        <option value="Sbir"<?php echo (isset($_POST["fonction"]) && $_POST["fonction"] === "Sbir") ? "selected" : ""; ?>>Sbir</option>
                                        <option value="Arcanewatcher"<?php echo (isset($_POST["fonction"]) && $_POST["fonction"] === "Arcanewatcher") ? "selected" : ""; ?>>Arcanewatcher</option>
                                        <option value="Autres" <?php echo (isset($_POST["fonction"]) && $_POST["fonction"] === "Autres") ? "selected" : ""; ?>>Autres</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item">
                                <div class="texte">
                                    <p>Sujet :</p>
                                </div>
                                <div><?php echo $informationError[8]?></div>
                                <div>
                                    <input class="input" type="text" id="sujet" name="sujet" value="<?php echo htmlspecialchars($_POST["sujet"] ?? "", ENT_QUOTES); ?>">
                                </div>
                            </div>
                            <div class="item">
                                <div class="texte">
                                    <p>Contenu :</p>
                                </div>
                                <div><?php echo $informationError[9]?></div>
                                <div>
                                    <textarea id="contenu" name="contenu" cols="40" rows="13">
                                        <?php echo isset($_POST["contenu"]) ? htmlspecialchars($_POST["contenu"], ENT_QUOTES) : ""; ?>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submitbutton">
                        <input type="submit" class="input" name="submit" value="Envoyer">
                        <!--Vérification des insertions par JS désactivée pour ce rendu-->
                        <!--<input type="button" class="input" name="send" onclick="contactFormValide()" value="Envoyer"></input>-->
                    </div>
                </form>
            </div>
        </div>
        <?php include('common/footer.php'); ?>
    </body>
</php>