<?php
    session_start();

    //Array des articles -> initialisé vide
    $items = array();

    //Fonction qui prend en paramètre l'array des articles et affiche l'article au niveau du tableau
    function ajouterArticle(&$items, $name, $srcIMG, $price){
        $itemIndex = count($items);
        $minus = "removeFromBasket(getElementById('item".$itemIndex."'),".$itemIndex.")";
        $plus = "addToBasket(getElementById('item".$itemIndex."'),".$itemIndex.")";
        $img = "../img/tank/".$srcIMG;
        //Les images stockées dans le dossier 'ad' peuvent être bloquées par des logiciels bloqueur de publicitités.
        $article = array("type"=>"tank","index"=>$itemIndex,"nom"=>$name,"prix"=>$price,"quantite"=>0);
        //Empile l'array de l'article en question dans l'array de l'ensemble des articles dont la référence est pris en paramètre
        $items[$itemIndex] = $article;
        echo '<tr id="item'.$itemIndex.'">';
        echo '  <td><img onclick="magnify(this.src)" src="'.$img.'"></td>';
        echo '  <td style="border: 2px solid white; font-size: 18px;">'.$name.'</td>';
        echo '  <td class="prix"><b>'.$price.' g</b></td>';
        echo '  <td id="stock" class="hidden-element">10</td>'; //Get stocks from a file
        echo '  <td class="hidden-element">';
        echo '      <div class="quantity_text"><span>Quantité</span></div>';
        echo '      <div class="quantity_control">';
        echo '          <div class="substract_button"><button type="button" class="indispo" onclick="'.$minus.'">-</button></div>';
        echo '          <span class="quantity_counter">'.$items[$itemIndex]["quantite"].'</span>';
        echo '          <div class="add_button"><button type="button" class="dispo" onclick="'.$plus.'">+</button></div>';
        echo '      </div>';
        echo '  </td>';
        echo '</tr>';
    }

    function getElementsByClass(&$parentNode, $tagName, $className) {
        $nodes=array();
        $childNodeList = $parentNode->getElementsByTagName($tagName);
        for ($i = 0; $i < $childNodeList->length; $i++) {
            $temp = $childNodeList->item($i);
            if ($temp->getAttribute('class') == $className) {
                $nodes[]=$temp;
            }
        }
        return $nodes;
    }
?>

<script>
    function submitPanier() {
        var xhttp = new XML
        <?php
            $_SESSION["item_tanks"] = $items;
        ?>
    }

</script>

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
            <?php include('common/sidemenu.php'); ?>
            <div class="contentwrapper">
                <div class="contenttitle">
                    <p>Articles anti-dégâts</p>
                </div>
                <div class="items_table">
                    <table id='articles'>
                        <tr class="thead">
                            <td>Icon</td>
                            <td>Article</td>
                            <td>Prix</td>
                            <td class="hidden-element">Stock</td>
                            <td class="hidden-element">Commande</td>
                        </tr>
                        <?php
                            ajouterArticle($items, 'Chimico-scaphandre turbo','item_chemtank.jpg',2800);
                            ajouterArticle($items, "Linceul d'égalité",'item_evenshroud.jpg',2500);
                            ajouterArticle($items, 'Gantelet cryopyrique','item_frostfire.jpg',3200);
                            ajouterArticle($items, "Médaillon de l'Iron Solari",'item_locket.jpg',2500);
                            ajouterArticle($items, 'Egide solaire','item_sunfire.jpg',3200);
                        ?>
                    </table>
                </div>
                    
                <div class="addToPanier">
                    <button id="add-to-stocks" class="register_button" onclick="submitPanier()">Ajouter au panier</button>
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