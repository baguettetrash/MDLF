<?php
    function underlinePageTitle($param)
    {
        if ($_GET['page'] == $param) {
            echo 'underline_current';
        } else {
            echo 'underline';
        }
    }
?>
<div class="navwrapper">
    <div class="navbar">
        <div class="banner">
            <a href="index.php">
                <img class="navlogo" src="../img/logo.png" alt="logo">
            </a>
            <span class="navtitle">Marchand de la Faille</span>
        </div>
        <div class="navlinks">
            <a href="index.php?page=1">
                <span class="<?php underlinePageTitle(1)?>">Accueil</span>
            </a>
            <a href="boutique.php?page=2">
                <span class="<?php underlinePageTitle(2)?>">Boutique</span>
            </a>
            <a href="contact.php?page=3">
                <span class="<?php underlinePageTitle(3)?>">Contact</span>
            </a>
            <a href="connexion.php?page=4">
                <span class="<?php underlinePageTitle(4)?>">Panier</span>
            </a>
        </div>
    </div>
</div>