<?php
    session_start();
    function ajouterArticle($itemIndex, $name, $srcIMG, $price){
        $minus = "removeFromBasket(getElementById('".$itemIndex."'))";
        $plus = "addToBasket(getElementById('".$itemIndex."'))";
        $img = "../img/ap/".$srcIMG;
        //Les images peuvent être bloquées par des logiciels bloqueur de publicitités.
        echo '<tr id="'.$itemIndex.'">';
        echo '<td><img onclick="magnify(this.src)" src="'.$img.'"></td>';
        echo '<td style="border: 2px solid white; font-size: 18px;">'.$name.'</td>';
        echo '<td class="prix"><b>'.$price.' g</b></td>';
        echo '<td class="hidden-element">10</td>';
        echo '<td class="hidden-element">';
        echo '<div class="quantity_text"><span>Quantité</span></div>';
        echo '<div class="quantity_control">';
        echo '<div class="substract_button"><button class="indispo" onclick="'.$minus.'">-</button></div>';
        echo '<div class="quantity_counter">0</div>';
        echo '<div class="add_button"><button class="dispo" onclick="'.$plus.'">+</button></div>';
        echo '</div>';
        echo '<div class="register_button"><button>Ajouter au panier</button></div>';
        echo '</td>';
        echo '</tr>';
    }
?>

<!doctype php>
<php lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Marchand De La Faille</title>
        <link rel="stylesheet" href="../css/boutique-items.css">
        <link rel="stylesheet" href="../css/navbar.css">
        <link rel="icon" type="image/png" href="../img/cursor.png"> 
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="../js/boutique.js"></script>
    </head>
    <body>
        <?php include('common/header.php'); ?>
        <div class="bodywrapper">
            <?php include('common/sidemenu.php');?>
            <div class="contentwrapper">
                <div class="contenttitle">
                    <p>Articles de dégâts magiques</p>
                </div>
                <div class="items_table">
                    <table>
                        <tr class="thead">
                            <td>Icon</td>
                            <td>Article</td>
                            <td>Prix</td>
                            <td class="hidden-element">Stock</td>
                            <td class="hidden-element">Commande</td>
                        </tr>
                        <?php
                            ajouterArticle('item1','Gel éternel','item_everfrost.jpg',2800);
                            ajouterArticle('item2','Moissonneur nocturne','item_harvester.jpg',3200);
                            ajouterArticle('item3','Tempête de Luden','item_ludens.jpg',3200);
                            ajouterArticle('item4','Créateur de failles','item_riftmaker.jpg',3200);
                            ajouterArticle('item5','Ceinture-roquette Hextech','item_rocketbelt.jpg',3200);
                        ?>
                    </table>
                </div>
                <div class="button-content">
                    <button class="stockbutton" id="show-stocks" onclick="stocks(this.id)">Afficher les stocks</button>
                </div>
            </div>
        </div>
        <div id="hidden-window" class="hidden-window">
            <div id="hidden-content" class="hidden-content">
                <span onclick="closeWindow()" class="material-icons close">close</span>
                <div id="hidden-img">
                </div>
            </div>
        </div>
    </body>
</php>