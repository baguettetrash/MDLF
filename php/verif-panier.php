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
        <!--script src="script.js"></script-->
    </head>
    <body>

        <?php
            /*Si l'utilisateur n'est pas connecté avant d'ajouter au panier*/
            if ($_SESSION["connexion"] == 0) {
                header('location : connexion.php');
            }
            /*Sinon on vérifie les stocks*/
            else {
                /*Récupère la page de la boutique pour ouvrir le .json correspondant*/
                switch($_POST["boutique"]){
                    case 'ad':
                        $filename = "../json/stock_ad.json";
                        $id_boutique = "ad";
                        break;

                    case 'ap':
                        $filename = "../json/stock_ap.json";
                        $id_boutique = "ap";
                        break;

                    case 'tank':
                        $filename = "../json/stock_tank.json";
                        $id_boutique = "tank";
                        break;
                }

                /*Ouverture du fichier .json*/
                $Json = file_get_contents($filename);
                $myarray = json_decode($Json, true);

                /*Parcours du fichier .json*/
                foreach($myarray as $key => $value) {
                    $id = $myarray[$key]["id"];
                    $stock = $myarray[$key]["stock"];

                    /*Vérification du stock item par item et ajout de l'item dans la panier via le fichier panier.json*/
                    //Item 1
                    if ($_POST["id"] == 1 && $stock - $_POST["nbr"] > 0) {
                        $myarray[$key]["stock"] = $myarray[$key]["stock"] - $_POST["nbr"];
                        header('location : panier.php');
                    } else if($_POST["id"] == 1){
                        $_SESSION["msg_panier"] = "Pas assez de stock";
                    }
                    //Item 2
                    if ($_POST["id"] == 2 && $stock - $_POST["nbr"] > 0) {
                        $myarray[$key]["stock"] = $myarray[$key]["stock"] - $_POST["nbr"];
                        header('location : panier.php');
                    } else if($_POST["id"] == 2){
                        $_SESSION["msg_panier"] = "Pas assez de stock";
                    }
                    //Item 3
                    if ($_POST["id"] == 3 && $stock - $_POST["nbr"] > 0) {
                        $myarray[$key]["stock"] = $myarray[$key]["stock"] - $_POST["nbr"];
                        header('location : panier.php');
                    } else if($_POST["id"] == 3){
                        $_SESSION["msg_panier"] = "Pas assez de stock";
                    }
                    //Item 4
                    if ($_POST["id"] == 4 && $stock - $_POST["nbr"] > 0) {
                        $myarray[$key]["stock"] = $myarray[$key]["stock"] - $_POST["nbr"];
                        header('location : panier.php');
                    } else if($_POST["id"] == 4){
                        $_SESSION["msg_panier"] = "Pas assez de stock";
                    }
                    //Item 5
                    if ($_POST["id"] == 5 && $stock - $_POST["nbr"] > 0) {
                        $myarray[$key]["stock"] = $myarray[$key]["stock"] - $_POST["nbr"];
                        header('location : panier.php');
                    } else if($_POST["id"] == 5){
                        $_SESSION["msg_panier"] = "Pas assez de stock";
                    }
                }
            }
        ?>

       
    </body>
</php>