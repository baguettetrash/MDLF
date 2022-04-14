<?php
    session_start();
?>

<!doctype php>
<php lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Marchand De La Faille</title>
        <link rel="stylesheet" href="../css/receptioncontact.css">
        <link rel="stylesheet" href="../css/navbar.css">
        <link rel="icon" type="image/png" href="../img/cursor.png"> 
        <!--script src="../js/receptioncontact.js"></script-->
    </head>
    <body>
        <?php include('common/header.php'); ?>
        <div class="contentwrapper">
            <div class="contenttitle">Contact</div>
            <div class="content">
                <?php
                    echo $_POST["dob"];
                    echo $_POST["civil"];
                    echo $_POST["nom"];
                    echo $_POST["prenom"];
                    echo $_POST["email"];
                    echo $_POST["date"];
                    echo $_POST["fonction"];
                    echo $_POST["sujet"];
                    echo $_POST["contenu"];
                ?>
                <img src="../img/os-shopkeeper.jpg" width="60%" height="auto">
                <p>Merci pour votre retour, nous ferons au mieux pour vous répondre au plus vite.</p>
                <input type="button" class="return_button" onclick="location.href='index.php?page=1';" value="Retour à l'accueil"/>
            </div>
        </div>
        <?php include('common/footer.php'); ?>
    </body>
</php>