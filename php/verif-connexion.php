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

        <?php

            /*Ouverture du fichier id.json*/
            $filename = "../json/id.json";
            $fp = fopen($filename, 'r');

            /*Vérification de la connexion*/
            $Json = file_get_contents($filename);
            $myarray = json_decode($Json, true);

            foreach($myarray as $key => $value) {
                $id = $myarray[$key]["id"];
                $password = $myarray[$key]["password"];
                
                $_SESSION["connexion"] = 0;

                /*Si l'utilisateur est reconnu et n'est pas l'administrateur*/
                if ($_POST['id'] == $id && password_verify($_POST["password"], $password) && $_POST['id'] != "admin") {
                    echo 'test1 <br>';
                    $_SESSION["id"] = $_POST["id"];
                    $_SESSION["password"] = $_POST["password"];
                    $_SESSION["connexion"] = 1;
                    header('Location: panier.php');
                    break;
                } 
                /*Si l'utilisateur est reconnu et c'est l'administrateur*/
                else if($_POST['id'] == $id && $_POST['password'] == $password && $_POST['id'] == "admin"){
                    echo 'test2 <br>';
                    $_SESSION["connexion"] == 2;
                    break;
                }
                
                echo "<br>";
            }
            echo $_SESSION["connexion"];
            /*Sinon l'utilisateur n'est pas encore inscrit*/
            if ($_SESSION["connexion"] == 0) {
                echo "test";
                $_SESSION["connexion"] = -1;
                echo 'test3 <br>';
                $_SESSION["message"] = "Erreur de connexion, <br>Identifiant ou mot de passe erroné<br>";
                header('Location: connexion.php');
            }

            fclose($fp);

        ?>

       
    </body>
</php>