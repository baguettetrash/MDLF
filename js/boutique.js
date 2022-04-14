function stocks(buttonID) {
    var elements = document.getElementsByClassName("hidden-element");
    var button = document.getElementById(buttonID);
    var i;
    if (buttonID == "show-stocks") {
        /*Chaque élément dont l'ID est hidden-element sont  affichés*/
        for(i = 0; i < elements.length; i++) {
            elements[i].style.display = "table-cell";
        }
        /*Modifications des attributs du bouton*/
        button.id = "hide-stocks";
        button.innerHTML = "Cacher les stocks";
        document.getElementById("add-to-stocks").style = "display: block;";
    } else {
        /*Chaque élément dont l'ID est hidden-element ne sont pas affichés*/
        for(i = 0; i < elements.length; i++) {
            elements[i].style.display = "none";
        }
        /*Modifications des attributs du bouton*/
        button.id = "show-stocks";
        button.innerHTML = "Afficher les stocks";
        document.getElementById("add-to-stocks").style = "display: none;";
    }
}

function magnify(imgSRC) {
    var window = document.getElementById("hidden-window");
    var img = document.getElementById("hidden-img");
    window.style.display = "block";
    img.innerHTML = "<img src='"+imgSRC+"' style='margin-top:10px; border-radius:5px;' width='256px' width='256px' ></img>";
}

function closeWindow() {
    var window = document.getElementById("hidden-window");
    var img = document.getElementById("hidden-img");
    window.style.display = "none";
    img.innerHTML = "";
}

function addToBasket(item, index) { //Problem here
    var stocks = parseInt(item.getElementsByClassName("hidden-element")[0].innerHTML);
    var quantity = parseInt(item.getElementsByClassName("quantity_counter")[0].innerHTML);
    switch (quantity) {
        case stocks:
            alert("ERREUR : Il n'y a pas suffisament de cet item en stock. ");
            break;
        case stocks-1:
            item.getElementsByClassName("quantity_counter")[0].innerHTML = quantity+1;
            item.getElementsByClassName("add_button")[0].getElementsByTagName("button")[0].className = 'indispo';
            if (stocks != 0) {
                item.getElementsByClassName("substract_button")[0].getElementsByTagName("button")[0].className = 'dispo';
            }
            break;
    
        default:
            item.getElementsByClassName("quantity_counter")[0].innerHTML = quantity+1;
            item.getElementsByClassName("add_button")[0].getElementsByTagName("button")[0].className = 'dispo';
            if (stocks != 0) {
                item.getElementsByClassName("substract_button")[0].getElementsByTagName("button")[0].className = 'dispo';
            }
            break;
    }
}

function removeFromBasket(item, index) {
    var stocks = parseInt(item.getElementsByClassName("hidden-element")[0].innerHTML);
    var quantity = parseInt(item.getElementsByClassName("quantity_counter")[0].innerHTML);

    switch (quantity) {
        case 0:
            alert("ERREUR : La quantité sélectionnée de cet item est nulle.");
            break;
        case 1:
            item.getElementsByClassName("quantity_counter")[0].innerHTML = quantity-1;
            item.getElementsByClassName("substract_button")[0].getElementsByTagName("button")[0].className = 'indispo';
            item.getElementsByClassName("add_button")[0].getElementsByTagName("button")[0].className = 'dispo';
            break;
        default:
            item.getElementsByClassName("quantity_counter")[0].innerHTML = quantity-1;
            item.getElementsByClassName("add_button")[0].getElementsByTagName("button")[0].className = 'dispo';
            break;
    }
}