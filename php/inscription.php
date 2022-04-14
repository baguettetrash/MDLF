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

        /*Array initial*/
        $array = Array (
            "0" => Array (
                "id" => "admin",
                "email" => "none",
                "password" => "admin"
            ),
            "1" => Array (
                "id" => $_POST['id'],
                "email" => $_POST['email'],
                "password" => password_hash($_POST["password"], PASSWORD_DEFAULT)
            )
        );
        
        $filename = '../json/id.json';  //Nom du fichier json contenant les informations de connexion

        /*Vérification de l'existence du fichier id.json*/
        /*Si le fichier existe*/
        if (file_exists($filename)) {
            /*Récupèration du fichier id.json et inclusion dans $tempArray*/     
            $inp = file_get_contents($filename);
            $tempArray = json_decode($inp);

            /*Vérification de l'enregistrement d'un nouvel utilisateur (nouveau mail/id)*/
            /*Ouverture du fichier id.json*/
            $fp = fopen($filename, 'r');
            $valid = 1;
            /*Parcours du fichier id.json*/
            $Json = file_get_contents($filename);
            $myarray = json_decode($Json, true);
            $valid = 1; //Variable de validité d'un nouvel utilisateur
            foreach($myarray as $key => $value){
                if ($myarray[$key]["id"] == $_POST["id"] || $myarray[$key]["email"] == $_POST["email"]) {
                    $valid = 0;
                }
            }
            /*Si il est valide alors on l'ajoute au tableau $data*/
            if ($valid == 1) {
                /*Cryptage du mdp de l'utilisateur*/
                $password = $_POST["password"];
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                /*Récupère variable d'inscription via la méthode post*/
                $data = ['id' => $_POST['id'], 'email' => $_POST['email'], 'password' => $hashed_password];
                /*Fusion du tableau récupéré et inscription de $data*/
                array_push($tempArray, $data);
                $jsonData = json_encode($tempArray, JSON_PRETTY_PRINT);
                file_put_contents($filename, $jsonData);
                $_SESSION["connexion"] = 0;
                header('Location: connexion.php');
            }
            /*Sinon on renvoi un message d'erreur*/
            else {
                $_SESSION["message"] = "Erreur d'inscription, Identifiant ou mot de passe déjà inscrit<br>";
                $_SESSION["connexion"] = -2;
                header('Location: connexion.php');
            }
            fclose($fp);
            
        }
        /*Sinon le fichier n'existe pas, alors on le créer*/
        else {
            $fp = fopen($filename, "a+"); //mode a+ pour le créer
            fwrite($fp, json_encode($array, JSON_PRETTY_PRINT));    //On encode le fichier avec l'array initial
            fclose($fp);
            $_SESSION["connexion"] = 0;
            header('Location: connexion.php');
        }

    ?>
       
    </body>
</php>